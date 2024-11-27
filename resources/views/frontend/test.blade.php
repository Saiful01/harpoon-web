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
          content="@yield('description')">   <style>
        body {
            font-weight: bold;
        }
        .frame-container {
            position: relative;
            width: 100%;
            max-width: 500px;
        }
        #canvas {
            position: absolute;
            top: 0;
            left: 0;
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

    </style>
</head>
<body>
@include('sweetalert::alert')
<div class="container py-5">

    <div class="row">
        <div class="col-md-6 mb-4">
            <h3 class="text-center mb-4">DBL CERAMICS BUSINESS CONFERENCE 2024</h3>
            <ol class="list-unstyled">
                <li class="mb-3">
                    <strong>1.</strong> Add your image here:
                    <div class="border p-3 mt-2">
                        <label for="imageUpload" class="custom-upload-label d-block text-center p-2">
                            Upload Image Here
                            <input type="file" class="form-control d-none" id="imageUpload" accept="image/*">
                        </label>
                        <div id="file-name" class="mt-2 text-muted"></div>
                    </div>

                </li>
                <li class="mb-3">
                    <strong>2.</strong> Use the photo tools to scale and rotate your image inside the frame.
                </li>
                <li class="mb-3">
                    <strong>3.</strong> Click to download your customized photo!
                    <button style="background: #1476B7; color: white" class="btn w-100 mt-2" id="downloadBtn">Download your photo</button>
                </li>
                <li>
                    <strong>4.</strong> Post on social media using the hashtag
                    #Business_Conference_2024 <br>
                    #DBLCeramics #BrightCeramics
                </li>
            </ol>
        </div>
        <div class="col-md-6">
            <div class="frame-container mx-auto border">
                <canvas id="canvas" class="img-fluid"></canvas>
                <img src="/assets/images/FaceBook-Profile-500-x-500.png" alt="Frame" id="frame" class="img-fluid">
            </div>
            <div class="mb-3 mt-2">
                <label for="scaleSlider" class="form-label">Scale</label>
                <input type="range" class="form-range" id="scaleSlider" min="0.1" max="2" step="0.1" value="1">
            </div>
            <div class="mb-3">
                <label for="rotationSlider" class="form-label">Rotation</label>
                <input type="range" class="form-range" id="rotationSlider" min="-180" max="180" step="1" value="0">
            </div>
            <div class="mb-3">
                <label for="xOffsetSlider" class="form-label">Horizontal Position</label>
                <input type="range" class="form-range" id="xOffsetSlider" min="-100" max="100" step="1" value="0">
            </div>
            <div class="mb-3">
                <label for="yOffsetSlider" class="form-label">Vertical Position</label>
                <input type="range" class="form-range" id="yOffsetSlider" min="-100" max="100" step="1" value="0">
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
</div>

<script>
    const imageUpload = document.getElementById('imageUpload');
    const frame = document.getElementById('frame');
    const canvas = document.getElementById('canvas');
    const ctx = canvas.getContext('2d');
    const scaleSlider = document.getElementById('scaleSlider');
    const rotationSlider = document.getElementById('rotationSlider');
    const xOffsetSlider = document.getElementById('xOffsetSlider');
    const yOffsetSlider = document.getElementById('yOffsetSlider');
    const downloadBtn = document.getElementById('downloadBtn');

    let image = null;

    imageUpload.addEventListener('change', handleImageUpload);
    scaleSlider.addEventListener('input', updateCanvas);
    rotationSlider.addEventListener('input', updateCanvas);
    xOffsetSlider.addEventListener('input', updateCanvas);
    yOffsetSlider.addEventListener('input', updateCanvas);
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
        const xOffset = parseFloat(xOffsetSlider.value);
        const yOffset = parseFloat(yOffsetSlider.value);

        canvas.width = frame.width;
        canvas.height = frame.height;

        ctx.fillStyle = 'white';
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        const imageAspect = image.width / image.height;
        const canvasAspect = canvas.width / canvas.height;

        let drawWidth, drawHeight;
        if (imageAspect > canvasAspect) {
            drawWidth = canvas.width;
            drawHeight = canvas.width / imageAspect;
        } else {
            drawHeight = canvas.height;
            drawWidth = canvas.height * imageAspect;
        }

        const xOffsetPixels = xOffset * canvas.width / 100;
        const yOffsetPixels = yOffset * canvas.height / 100;

        ctx.save();
        ctx.translate(canvas.width / 2, canvas.height / 2);
        ctx.rotate((rotation * Math.PI) / 180);
        ctx.scale(scale, scale);
        ctx.translate(-drawWidth / 2 + xOffsetPixels, -drawHeight / 2 + yOffsetPixels);
        ctx.drawImage(image, 0, 0, drawWidth, drawHeight);
        ctx.restore();

        ctx.drawImage(frame, 0, 0, canvas.width, canvas.height);
    }

    function handleDownload() {
        const downloadCanvas = document.createElement('canvas');
        const downloadCtx = downloadCanvas.getContext('2d');

        downloadCanvas.width = canvas.width * 2;
        downloadCanvas.height = canvas.height * 2;

        downloadCtx.scale(2, 2);

        downloadCtx.fillStyle = 'white';
        downloadCtx.fillRect(0, 0, canvas.width, canvas.height);

        const scale = parseFloat(scaleSlider.value);
        const rotation = parseFloat(rotationSlider.value);
        const xOffset = parseFloat(xOffsetSlider.value);
        const yOffset = parseFloat(yOffsetSlider.value);

        const imageAspect = image.width / image.height;
        const canvasAspect = canvas.width / canvas.height;

        let drawWidth, drawHeight;
        if (imageAspect > canvasAspect) {
            drawWidth = canvas.width;
            drawHeight = canvas.width / imageAspect;
        } else {
            drawHeight = canvas.height;
            drawWidth = canvas.height * imageAspect;
        }

        const xOffsetPixels = xOffset * canvas.width / 100;
        const yOffsetPixels = yOffset * canvas.height / 100;

        downloadCtx.save();
        downloadCtx.translate(canvas.width / 2, canvas.height / 2);
        downloadCtx.rotate((rotation * Math.PI) / 180);
        downloadCtx.scale(scale, scale);
        downloadCtx.translate(-drawWidth / 2 + xOffsetPixels, -drawHeight / 2 + yOffsetPixels);
        downloadCtx.drawImage(image, 0, 0, drawWidth, drawHeight);
        downloadCtx.restore();

        downloadCtx.drawImage(frame, 0, 0, canvas.width, canvas.height);

        const link = document.createElement('a');
        link.download = 'dbl-ceramics-business-conference-2024.png';
        link.href = downloadCanvas.toDataURL();
        link.click();
    }

    document.querySelectorAll('.form-range').forEach(slider => {
        slider.addEventListener('input', function () {
            const progress = (this.value - this.min) / (this.max - this.min) * 100;
            this.style.setProperty('--progress', `${progress}%`);
        });
    });

    document.getElementById('imageUpload').addEventListener('change', function(event) {
        const fileName = event.target.files[0]?.name || "No file chosen";
        document.getElementById('file-name').innerText = fileName;
    });

</script>
</body>
</html>
