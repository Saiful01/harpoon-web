<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Frame Editor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }
        @media (min-width: 768px) {
            .grid {
                grid-template-columns: 1fr 1fr;
            }
        }
        .frame-container {
            position: relative;
            width: 100%;
            max-width: 500px;
        }
        #frame, #canvas {
            width: 100%;
            height: auto;
        }
        #canvas {
            position: absolute;
            top: 0;
            left: 0;
        }
        .slider-container {
            margin-bottom: 20px;
        }
        .slider-container label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="range"] {
            width: 100%;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:disabled {
            background-color: #cccccc;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="grid">
        <div>
            <input type="file" id="imageUpload" accept="image/*">
            <div class="frame-container">
                <canvas id="canvas"></canvas>
                <img src="/assets/images/FaceBook-Profile-500-x-500.png" alt="Frame" id="frame">
            </div>
        </div>
        <div>
            <div class="slider-container">
                <label for="scaleSlider">Scale</label>
                <input type="range" id="scaleSlider" min="0.1" max="2" step="0.1" value="1">
            </div>
            <div class="slider-container">
                <label for="rotationSlider">Rotation</label>
                <input type="range" id="rotationSlider" min="-180" max="180" step="1" value="0">
            </div>
            <button id="downloadBtn" disabled>Download</button>
        </div>
    </div>
</div>
<script>
    const imageUpload = document.getElementById('imageUpload');
    const frame = document.getElementById('frame');
    const canvas = document.getElementById('canvas');
    const ctx = canvas.getContext('2d');
    const scaleSlider = document.getElementById('scaleSlider');
    const rotationSlider = document.getElementById('rotationSlider');
    const downloadBtn = document.getElementById('downloadBtn');

    let image = null;

    imageUpload.addEventListener('change', handleImageUpload);
    scaleSlider.addEventListener('input', updateCanvas);
    rotationSlider.addEventListener('input', updateCanvas);
    downloadBtn.addEventListener('click', handleDownload);

    function handleImageUpload(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                image = new Image();
                image.onload = function() {
                    updateCanvas();
                    downloadBtn.disabled = false;
                }
                image.src = event.target.result;
            }
            reader.readAsDataURL(file);
        }
    }

    function updateCanvas() {
        if (!image) return;

        const scale = parseFloat(scaleSlider.value);
        const rotation = parseFloat(rotationSlider.value);

        canvas.width = frame.width;
        canvas.height = frame.height;

        ctx.fillStyle = 'white';
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        // Calculate the scaling factor to fit the entire image within the frame
        const frameAspectRatio = canvas.width / canvas.height;
        const imageAspectRatio = image.width / image.height;
        let fitScale;
        if (frameAspectRatio < imageAspectRatio) {
            fitScale = canvas.width / image.width;
        } else {
            fitScale = canvas.height / image.height;
        }

        // Apply user-defined scale
        fitScale *= scale;

        // Calculate dimensions to center the image
        const scaledWidth = image.width * fitScale;
        const scaledHeight = image.height * fitScale;
        const x = (canvas.width - scaledWidth) / 2;
        const y = (canvas.height - scaledHeight) / 2;

        // Draw scaled and rotated image
        ctx.save();
        ctx.translate(canvas.width / 2, canvas.height / 2);
        ctx.rotate(rotation * Math.PI / 180);
        ctx.translate(-canvas.width / 2, -canvas.height / 2);
        ctx.drawImage(image, x, y, scaledWidth, scaledHeight);
        ctx.restore();

        // Draw frame on top
        ctx.drawImage(frame, 0, 0, canvas.width, canvas.height);
    }

    function handleDownload() {
        const link = document.createElement('a');
        link.download = 'framed_image.png';
        link.href = canvas.toDataURL();
        link.click();
    }

    // Set canvas size initially
    canvas.width = frame.width;
    canvas.height = frame.height;
</script>
</body>
</html>
