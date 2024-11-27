<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Image Upload with Frame</title>
    <style>
        #staticFrame {
            position: relative;
            width: 300px;
            height: 300px;
            background: url('/assets/images/FaceBook-Profile.png') no-repeat center center;
            background-size: cover;
            margin: 20px auto;
        }

        #uploadedImage {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 90%;
            max-height: 90%;
            object-fit: cover;
            transition: transform 0.2s ease;
        }
    </style>
</head>
<body>
<div id="staticFrame">
    <img id="uploadedImage" src="" alt="Uploaded Preview">
</div>
<input type="file" id="upload" accept="image/*">
<br>
<label for="rotation">Rotate</label>
<input type="range" id="rotation" min="0" max="360" value="0">
<br>
<label for="scale">Scale</label>
<input type="range" id="scale" min="0.5" max="2" step="0.1" value="1">
<br>
<button id="downloadButton">Download Combined Image</button>

<script>
    const upload = document.querySelector('#upload');
    const uploadedImage = document.querySelector('#uploadedImage');
    const rotation = document.querySelector('#rotation');
    const scale = document.querySelector('#scale');
    const downloadButton = document.querySelector('#downloadButton');
    const staticFrame = document.querySelector('#staticFrame');

    // Initialize transform properties
    let imageTransform = {
        rotate: 0,
        scale: 1,
    };

    // Apply transformations to the uploaded image
    const applyTransformations = () => {
        const { rotate, scale } = imageTransform;
        uploadedImage.style.transform = `translate(-50%, -50%) rotate(${rotate}deg) scale(${scale})`;
    };

    // Handle image upload
    upload.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                uploadedImage.src = e.target.result;

                // Reset transformations
                imageTransform = { rotate: 0, scale: 1 };
                rotation.value = 0;
                scale.value = 1;

                applyTransformations();
            };
            reader.readAsDataURL(file);
        }
    });

    // Handle rotation slider
    rotation.addEventListener('input', (event) => {
        imageTransform.rotate = parseInt(event.target.value, 10);
        applyTransformations();
    });

    // Handle scale slider
    scale.addEventListener('input', (event) => {
        imageTransform.scale = parseFloat(event.target.value);
        applyTransformations();
    });

    // Download the combined image
    downloadButton.addEventListener('click', () => {
        const canvas = document.createElement('canvas');
        const context = canvas.getContext('2d');

        // Set canvas size to match the frame size
        const frameWidth = staticFrame.offsetWidth;
        const frameHeight = staticFrame.offsetHeight;
        canvas.width = frameWidth;
        canvas.height = frameHeight;

        // Draw the frame image
        const frameImage = new Image();
        frameImage.src = '/assets/images/FaceBook-Profile.png';

        frameImage.onload = () => {
            context.drawImage(frameImage, 0, 0, frameWidth, frameHeight);

            // Draw the uploaded image
            if (uploadedImage.src) {
                const { rotate, scale } = imageTransform;
                const img = new Image();
                img.src = uploadedImage.src;

                img.onload = () => {
                    const imgWidth = img.width;
                    const imgHeight = img.height;

                    // Calculate scaled dimensions
                    const scaledWidth = imgWidth * scale;
                    const scaledHeight = imgHeight * scale;

                    // Translate and rotate context
                    context.translate(frameWidth / 2, frameHeight / 2);
                    context.rotate((rotate * Math.PI) / 180);

                    // Draw the image
                    context.drawImage(
                        img,
                        -scaledWidth / 2, // Center horizontally
                        -scaledHeight / 2, // Center vertically
                        scaledWidth,
                        scaledHeight
                    );

                    // Reset transformation
                    context.setTransform(1, 0, 0, 1, 0, 0);

                    // Create a download link
                    const link = document.createElement('a');
                    link.download = 'combined_image.png';
                    link.href = canvas.toDataURL();
                    link.click();
                };
            }
        };
    });
</script>
</body>
</html>
