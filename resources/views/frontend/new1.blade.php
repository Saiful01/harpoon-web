<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload Section</title>
    <style>
        .image-frame {
            display: inline-block;
            width: 150px;
            height: 150px;
            border: 2px solid #333;
            margin: 10px;
            cursor: pointer;
            position: relative;
        }
        .image-frame img.frame-background {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
        }
        .image-frame img.uploaded-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 2;
            mix-blend-mode: multiply; /* This allows layering images */
        }
        .selected {
            border-color: #00f;
        }
        .preview-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="upload-section">
    <h3>Select a Frame and Upload an Image</h3>
    <div id="frame1" class="image-frame" onclick="selectFrame('frame1')">
        <img class="frame-background" src="{{ asset('assets/web/PhotoFrame_v2.png') }}" alt="Frame 1">
    </div>
    <div id="frame2" class="image-frame" onclick="selectFrame('frame2')">
        <img class="frame-background" src="{{ asset('assets/web/PhotoFrame.png') }}" alt="Frame 2">
    </div>
    <input type="file" id="imageInput" onchange="uploadImage()" accept="image/*">
</div>

<div class="preview-container">
    <h3>Preview</h3>
    <div id="preview-frame" class="image-frame">
        <img id="preview-background" class="frame-background" src="#" alt="Preview Frame">
        <img id="preview-uploaded" class="uploaded-image" src="#" alt="Preview Image">
    </div>
</div>
<div class="button-container">
    <button id="save-button">Save</button>
    <button id="share-button">Share on Facebook</button>
</div>

<script>
    let selectedFrameId = null;

    function selectFrame(frameId) {
        // Deselect other frames
        document.querySelectorAll('.image-frame').forEach(frame => {
            frame.classList.remove('selected');
        });

        // Select the clicked frame
        selectedFrameId = frameId;
        document.getElementById(frameId).classList.add('selected');

        // Set the background of the preview frame based on the selected frame
        const backgroundSrc = document.querySelector(`#${frameId} .frame-background`).src;
        const previewBackground = document.getElementById('preview-background');
        previewBackground.src = backgroundSrc;
        previewBackground.style.display = 'block';
    }

    function uploadImage() {
        if (!selectedFrameId) {
            alert('Please select a frame first!');
            return;
        }

        const fileInput = document.getElementById('imageInput');
        const file = fileInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                // Show the uploaded image in the preview frame
                const previewImg = document.getElementById('preview-uploaded');
                previewImg.src = e.target.result;
                previewImg.style.display = 'block';

                // Wait for the image to fully load before creating combined image
                previewImg.onload = function() {
                    createCombinedImage(); // Now create the combined image
                };
            };
            reader.readAsDataURL(file);
        }
    }

    function createCombinedImage() {
        const previewFrame = document.getElementById('preview-frame');
        const previewBackground = document.getElementById('preview-background');
        const previewUploaded = document.getElementById('preview-uploaded');

        // Ensure both images (background and uploaded) are fully loaded
        if (!previewBackground.complete || !previewUploaded.complete) {
            console.error("Images not fully loaded.");
            return null;
        }

        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');

        // Set canvas size to a larger size for better resolution
        const scaleFactor = 4; // Increase this for even higher resolution
        canvas.width = previewFrame.offsetWidth * scaleFactor;
        canvas.height = previewFrame.offsetHeight * scaleFactor;

        // Draw the uploaded image first, scaled up
        ctx.drawImage(previewUploaded, 0, 0, canvas.width, canvas.height);

        // Draw the background image (frame) on top with 'multiply' blend mode, scaled up
        ctx.globalCompositeOperation = 'multiply';
        ctx.drawImage(previewBackground, 0, 0, canvas.width, canvas.height);

        // Reset the composite operation
        ctx.globalCompositeOperation = 'source-over';

        // Get the combined image as a data URL (PNG format)
        return canvas.toDataURL('image/png');
    }

    // Save button click handler
    document.getElementById('save-button').addEventListener('click', function() {
        const combinedImageDataURL = createCombinedImage();

        if (combinedImageDataURL) {
            // Create a download link for the combined image
            const link = document.createElement('a');
            link.href = combinedImageDataURL;
            link.download = 'combined_image.png'; // Set the desired filename
            link.click();
        } else {
            alert('Failed to create the combined image.');
        }
    });

    // Share button click handler
    document.getElementById('share-button').addEventListener('click', function() {
        const combinedImageDataURL = createCombinedImage();

        if (combinedImageDataURL) {
            // Create a share URL for Facebook
            const shareURL = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(combinedImageDataURL);

            // Open the share URL in a new window
            window.open(shareURL, '_blank');
        } else {
            alert('Failed to create the combined image.');
        }
    });
</script>

</body>
</html>
