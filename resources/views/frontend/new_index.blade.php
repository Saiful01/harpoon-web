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

        .image-container {
            position: relative; /* Necessary for absolute positioning of child elements */
            width: 100%; /* Ensure the container takes full width */
            height: 0; /* Set initial height to 0 */
            padding-bottom: 100%; /* Adjust the percentage to match the desired aspect ratio */
        }

        .image-container {
            width: 100%;
            /* Adjust the height based on your desired aspect ratio */
            height: 300px; /* Example: For a 16:9 aspect ratio */
        }

        #uploadedImage {
            object-fit: contain;
            width: 100%;
            height: 100%;
        }

        #uploadedImage {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensures image fills the container without distortion */
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



        img {
            max-width: 100%;
            height: auto; /* Maintain aspect ratio */
            object-fit: contain; /* Ensure full fit without distortion */
        }

    </style>
</head>
<body>
    @include('sweetalert::alert')
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
                    #Business_Conference_2024 <br>
#DBLCeramics #BrightCeramics
                </li>
                <li>
                    
                    <!--<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSct4dqEXVGB6d0oNVA_YuR0B8g0crIwFeS1Ye-0koSON5AVbQ/viewform?embedded=true" width="640" height="804" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>-->
                </li>
            </ol>
            
            
        </div>
        <!-- Right Column -->
        <div class="col-md-6">
            <div class="preview image-container" id="frame">
                <img id="uploadedImage" >
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
                    <input type="range" class="form-range scale-slider" id="scale" min="0.1" max="2" step="0.1" value="1" style="width: 100%;">
                </div>
            </div>

        </div>
    </div>
</div>

<section class="share-section">
    <div class="container py-5">
        <h4 class="mb-4 text-center">
            নিজের তথ্য দিয়ে নিবন্ধন করুন
        </h4>
        <form action="{{ route('blog.save')}}" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">আপনার নাম</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="আপনার নাম" required>
                    <div class="invalid-feedback">অনুগ্রহ করে আপনার নাম দিন।</div>
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">মোবাইল নম্বর</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="মোবাইল নম্বর" required>
                    <div class="invalid-feedback">অনুগ্রহ করে একটি বৈধ মোবাইল নম্বর দিন।</div>
                </div>
            </div>
            <div class="mb-3">
                <label for="fb_post_link" class="form-label">ফেসবুক পোস্ট লিংক</label>
                <input type="url" class="form-control" id="fb_post_link" name="fb_link" placeholder="ফেসবুক পোস্ট লিংক" required>
                <div class="invalid-feedback">অনুগ্রহ করে একটি বৈধ লিংক দিন।</div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn " style="background: #1476B7; color: white">
                    সাবমিট করুন
                </button>
            </div>
        </form>
    </div>
</section>

<!--<div class="container social-section">-->
<!--    <div class="social-icons">-->
<!--        Share at:-->
<!--        <a href="{{$shares['facebook']}}" target="_blank">-->
<!--            <i class="fab fa-facebook"></i>-->
<!--        </a>-->
<!--        <a href="{{$shares['twitter']}}" target="_blank">-->
<!--            <i class="fab fa-twitter"></i>-->
<!--        </a>-->
<!--        <a href="{{$shares['linkedin']}}" target="_blank">-->
<!--            <i class="fab fa-linkedin"></i>-->
<!--        </a>-->
<!--        <a href={{$shares['whatsapp']}}#" target="_blank">-->
<!--            <i class="fab fa-whatsapp"></i>-->
<!--        </a>-->
<!--    </div>-->
<!--</div>-->

<script>
    const upload = document.getElementById('upload');
    const frame = document.getElementById('frame');
    const uploadedImage = document.getElementById('uploadedImage');
    const staticFrame = document.getElementById('staticFrame');
    const rotation = document.getElementById('rotation');
    const scale = document.getElementById('scale');
    const downloadBtn = document.getElementById('downloadBtn');

    let imageTransform = { rotate: 0, scale: 1.33 };
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
// Download combined image
// Download combined image
downloadBtn.addEventListener('click', () => {
    if (!originalImage) {
        alert('Please upload an image first.');
        return;
    }

    const canvas = document.createElement('canvas');
    const ctx = canvas.getContext('2d');

    // Fixed frame size
    const canvasWidth = 1080;
    const canvasHeight = 1080;

    canvas.width = canvasWidth;
    canvas.height = canvasHeight;

    // Fill canvas with white background
    ctx.fillStyle = 'white';
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    // Calculate scaling and positioning to zoom small images while maintaining aspect ratio
    const imgAspectRatio = originalImage.width / originalImage.height;
    const frameAspectRatio = canvasWidth / canvasHeight;

    let drawWidth, drawHeight, offsetX, offsetY;

    if (imgAspectRatio > frameAspectRatio) {
        // Image is wider than the frame
        drawWidth = canvasWidth;
        drawHeight = canvasWidth / imgAspectRatio;

        // If the image width is small, scale up to fit the canvas width
        if (originalImage.width < canvasWidth) {
            const scaleUpFactor = canvasWidth / originalImage.width;
            drawWidth *= scaleUpFactor;
            drawHeight *= scaleUpFactor;
        }

        offsetX = 0;
        offsetY = (canvasHeight - drawHeight) / 2;
    } else {
        // Image is taller than the frame or square
        drawHeight = canvasHeight;
        drawWidth = canvasHeight * imgAspectRatio;

        // If the image height is small, scale up to fit the canvas height
        if (originalImage.height < canvasHeight) {
            const scaleUpFactor = canvasHeight / originalImage.height;
            drawWidth *= scaleUpFactor;
            drawHeight *= scaleUpFactor;
        }

        offsetX = (canvasWidth - drawWidth) / 2;
        offsetY = 0;
    }

    // Apply transformations for rotation and scaling
    ctx.translate(canvasWidth / 2, canvasHeight / 2);
    ctx.rotate((imageTransform.rotate * Math.PI) / 180);
    ctx.scale(imageTransform.scale, imageTransform.scale);
    ctx.translate(-canvasWidth / 2, -canvasHeight / 2);

    // Draw the uploaded image with adjusted dimensions
    ctx.drawImage(originalImage, offsetX, offsetY, drawWidth, drawHeight);

    // Reset transformations
    ctx.setTransform(1, 0, 0, 1, 0, 0);

    // Draw the static frame overlay
    const staticFrameImg = new Image();
    staticFrameImg.onload = () => {
        ctx.drawImage(staticFrameImg, 0, 0, canvasWidth, canvasHeight);
        const finalImage = canvas.toDataURL('image/png');
        const link = document.createElement('a');
        link.href = finalImage;
        link.download = 'dbl-ceramics-business-conference-2024.png';
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

