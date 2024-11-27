<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/dbl-ceramics-limited.png">
    <title>DBL CERAMICS BUSINESS CONFERENCE 2024</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <meta property="og:image" content="@yield('image')"/>
    <meta property="og:image:width" content="1200"/>
    <meta property="og:image:height" content="630"/>
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description"
          content="@yield('description')">

    <style>
        body{
            font-weight: bold;

        }
        .social-section {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .social-icons a {
            text-decoration: none;
            color: #333;
            margin: 0 10px;
            font-size: 16px;
            display: flex;
            align-items: center;
        }

        .social-icons a i {
            margin-right: 5px;
            font-size: 24px;
        }

        .social-icons a:hover {
            color: #1476B7;
        }

        .preview {
            border: 1px solid #ddd;
            aspect-ratio: 1 / 1;
            width: 100%;
            position: relative;
            overflow: hidden;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #uploadedImage {
            position: absolute;
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            transition: transform 0.2s ease;
        }

        #staticFrame {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            object-fit: cover;
        }

        .form-label {
            color: #333;
            font-size: 1.1rem;
        }

        .form-range {
            appearance: none;
            height: 7px;
            background: #a39f9f;
            border-radius: 5px;
            outline: none;
            transition: background 0.3s;
        }

        .form-range:hover {
            background: #bbb;
        }

        /* Customize the track for a blue progress effect */
        .form-range::-webkit-slider-runnable-track {
            background: linear-gradient(to right, #1476B7 0%, #1476B7 var(--progress), #ddd var(--progress), #ddd 100%);
            height: 5px;
            border-radius: 5px;
        }

        /* Thumb customization */
        .form-range::-webkit-slider-thumb {
            appearance: none;
            width: 15px;
            height: 15px;
            background: #1476B7;
            border-radius: 50%;
            cursor: pointer;
            transition: background 0.3s;
        }

        .form-range::-webkit-slider-thumb:hover {
            background: #0056b3;
        }

        /* For Firefox */
        .form-range::-moz-range-thumb {
            width: 15px;
            height: 15px;
            background: #1476B7;
            border-radius: 50%;
            cursor: pointer;
            transition: background 0.3s;
        }

        .form-range::-moz-range-track {
            background: linear-gradient(to right, #1476B7 0%, #1476B7 var(--progress), #ddd var(--progress), #ddd 100%);
            height: 5px;
            border-radius: 5px;
        }


        a {
            text-decoration: none;
            color: #333;
            margin: 0 10px;
            font-size: 16px;
        }

        a i {
            margin-right: 5px;
            font-size: 20px;
        }

        a:hover {
            color: #1476B7;
        }

        .custom-upload-label {
            background-color: #f8f9fa;
            border: 2px dashed #1476B7;
            color: #1476B7;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .custom-upload-label:hover {
            background-color: #1476B7;
            color: #ffffff;
        }

        #file-name {
            font-size: 0.9rem;
            color: #333;
        }

        .mb-3 {
            margin-bottom: 2rem !important;
        }

    </style>
</head>
<body>
<div class="container my-5">
    <div class="row">
        <!-- Left Column -->
        <div class="col-md-6">
            <h3 class="text-center mb-4">DBL CERAMICS BUSINESS CONFERENCE 2024</h3>
            <ol class="list-unstyled">
                <li class="mb-3">
                    <strong>1.</strong> Add your image here:
                    <div class="border p-3 mt-2">
                        <label for="upload" class="custom-upload-label d-block text-center p-2">
                            Upload Image Here
                        </label>
                        <input type="file" class="form-control d-none" id="upload" accept="image/*">
                        <div id="file-name" class="mt-2 text-muted"></div>
                    </div>

                </li>
                <li class="mb-3">
                    <strong>2.</strong> Use the photo tools to scale and rotate your image inside the frame.
                </li>
                <li class="mb-3">
                    <strong>3.</strong> Click to download your customized photo!
                    <button style="background: #1476B7; color: white" class="btn  w-100 mt-2" id="downloadBtn">Download your photo</button>
                </li>
                <li>
                    <strong>4.</strong> Post on social media using the hashtag
                    #শ্রেষ্ঠত্বেরনতুনদিগন্ত <br>#Business_conference_2024 #dblceramics #Brightceramics
                </li>
               <li><iframe src="https://docs.google.com/forms/d/e/1FAIpQLSct4dqEXVGB6d0oNVA_YuR0B8g0crIwFeS1Ye-0koSON5AVbQ/viewform?embedded=true" width="640" height="804" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe></li>
            </ol>
        </div>
        <!-- Right Column -->
        <div class="col-md-6">
            <div class="preview" id="frame">
                <img id="uploadedImage" src="" alt="">
                <img id="staticFrame" src="/assets/images/FaceBook-Profile.png" alt="Frame">
            </div>
            <div class="mt-3">
                <label for="rotation" class="form-label fw-bold">Rotation:</label>
                <div class="d-flex align-items-center justify-content-center">
                    <input type="range" class="form-range rotation-slider" id="rotation" min="0" max="360" value="0" style="width: 100%;">
                </div>
            </div>
            <div class="mt-3">
                <label for="scale" class="form-label fw-bold">Scale:</label>
                <div class="d-flex align-items-center justify-content-center">
                    <input type="range" class="form-range scale-slider" id="scale" min="0.1" max="1" step="0.1" value="0" style="width: 100%;">
                </div>
            </div>

        </div>
    </div>
</div>

<div class="container social-section">
    <div class="social-icons">
        Share at:
        <a href="{{$shares['facebook']}}" target="_blank">
            <i class="fab fa-facebook"></i>
        </a>
        <a href="{{$shares['twitter']}}" target="_blank">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="{{$shares['linkedin']}}" target="_blank">
            <i class="fab fa-linkedin"></i>
        </a>
        <a href={{$shares['whatsapp']}}#" target="_blank">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>
</div>

<script>
    const upload = document.getElementById('upload');
    const frame = document.getElementById('frame');
    const uploadedImage = document.getElementById('uploadedImage');
    const staticFrame = document.getElementById('staticFrame');
    const rotation = document.getElementById('rotation');
    const scale = document.getElementById('scale');
    const downloadBtn = document.getElementById('downloadBtn');

    let imageTransform = { rotate: 0, scale: 1 };
    let originalImage = null;

    // Handle file upload
    upload.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                originalImage = new Image();
                originalImage.onload = () => {
                    fitImageToFrame();
                };
                originalImage.src = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
            alert('Please upload an image file.');
        }
    });

    // Fit image to frame
    function fitImageToFrame() {
        uploadedImage.src = originalImage.src;
        uploadedImage.style.maxWidth = '100%';
        uploadedImage.style.maxHeight = '100%';
        uploadedImage.style.position = 'absolute';
        uploadedImage.style.top = '50%';
        uploadedImage.style.left = '50%';
        uploadedImage.style.transform = 'translate(-50%, -50%)';
        updateImageTransform();
    }

    // Handle rotation input
    rotation.addEventListener('input', () => {
        imageTransform.rotate = rotation.value;
        updateImageTransform();
    });

    // Handle scale input
    scale.addEventListener('input', () => {
        imageTransform.scale = scale.value;
        updateImageTransform();
    });

    function updateImageTransform() {
        uploadedImage.style.transform = `translate(-50%, -50%) rotate(${imageTransform.rotate}deg) scale(${imageTransform.scale})`;
    }

    // Download combined image
    downloadBtn.addEventListener('click', () => {
        if (!originalImage) {
            alert('Please upload an image first.');
            return;
        }

        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');

        // High resolution size (e.g., 1080x1080)
        const canvasWidth = 2000;
        const canvasHeight = 2000;

        canvas.width = canvasWidth;
        canvas.height = canvasHeight;

        // Fill canvas with white background
        ctx.fillStyle = 'white';
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        // Calculate scale factor for transformations
        const frameRect = frame.getBoundingClientRect();
        const imageRect = uploadedImage.getBoundingClientRect();
        const scaleFactorX = canvasWidth / frameRect.width;
        const scaleFactorY = canvasHeight / frameRect.height;

        const centerX = (imageRect.left + imageRect.width / 2 - frameRect.left) * scaleFactorX;
        const centerY = (imageRect.top + imageRect.height / 2 - frameRect.top) * scaleFactorY;

        ctx.translate(centerX, centerY);
        ctx.rotate((imageTransform.rotate * Math.PI) / 180);
        ctx.scale(imageTransform.scale, imageTransform.scale);

        const imgWidth = imageRect.width * scaleFactorX;
        const imgHeight = imageRect.height * scaleFactorY;

        ctx.drawImage(
            originalImage,
            -imgWidth / 2,
            -imgHeight / 2,
            imgWidth,
            imgHeight
        );

        // Reset transformations
        ctx.setTransform(1, 0, 0, 1, 0, 0);

        // Draw the static frame
        const staticFrameImg = new Image();
        staticFrameImg.onload = () => {
            ctx.drawImage(staticFrameImg, 0, 0, canvas.width, canvas.height);
            const finalImage = canvas.toDataURL('image/png');
            const link = document.createElement('a');
            link.href = finalImage;
            link.download = 'dbl-ceramics-business-conference 2024.png';
            link.click();
        };
        staticFrameImg.src = staticFrame.src;
    });

    document.querySelectorAll('.form-range').forEach(slider => {
        slider.addEventListener('input', function () {
            const progress = (this.value - this.min) / (this.max - this.min) * 100;
            this.style.setProperty('--progress', `${progress}%`);
        });
    });

    document.getElementById('upload').addEventListener('change', function () {
        const fileNameDiv = document.getElementById('file-name');
        if (this.files && this.files.length > 0) {
            fileNameDiv.textContent = `Selected File: ${this.files[0].name}`;
        } else {
            fileNameDiv.textContent = '';
        }
    });



</script>

</body>
</html>

