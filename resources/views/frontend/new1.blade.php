@extends("layouts.frontend")
@section('title', $title)
@section('description', $description)
@section('image', $image)
@section("content")
    <style>
        .image-frame {
            border: 2px solid transparent;
            display: inline-block;
            cursor: pointer;
        }
        .image-frame.selected {
            border-color: red;
        }
        #preview-frame {
            position: relative;
            width: 300px;
            height: 300px;
            margin: 0 auto;
        }
        #preview-container {
            width: 100%;
            height: 100%;
            background-color: white;
            position: relative;
        }
        #preview-uploaded, #preview-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        #preview-uploaded {
            z-index: 1;
        }
        #preview-background {
            z-index: 2;
        }
    </style>
    <!-- Join Us Section -->
    <div class="join-us" id="join-now">
        <!-- title  -->
        <div
            class=""
            style="
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      width: 100%;
      height: 40px;
    "
        >
            <div
                class=""
                style="
        background-color: white;
        display: flex;
        justify-content: end;
        padding: 2px 30px;
      "
            >
                <img src="/assets/images/joinkorun.png" alt=""/>
            </div>
            <div
                class=""
                style="background: linear-gradient(90deg, #000078, #017fcb)"
            ></div>
        </div>
        <div class="" style="margin: 50px 0px">
            <div class="photo-frame">
                <div>
                    <h3>ফ্রেম ১</h3>
                    <div id="frame1" class="image-frame" onclick="selectFrame('frame1')">
                        <img
                            style="background-color: white"
                            src="/assets/images/PhotoFrame_v2.png"
                            alt=""
                        />
                    </div>

                </div>
                <div>
                    <h3>ফ্রেম ২</h3>
                    <div id="frame2" class="image-frame" onclick="selectFrame('frame2')">
                        <img src="/assets/images/PhotoFrame.png" alt=""/>
                    </div>

                </div>
            </div>
            <div class="photo-frame">
                <div>
                    <h3>ফ্রেম নির্বাচন করুন</h3>
                    <div>
                        <img
                            src="/assets/JPG/upload.png"
                            alt="Upload"
                            style="cursor: pointer; width: 200px; height: 170px"
                            onclick="document.getElementById('imageInput').click()"
                        />
                        <input type="file"  id="imageInput" onchange="uploadImage()" style="display: none"/>
                    </div>
                    <h3>ছবি আপলোড করুন</h3>
                </div>
            </div>
            <div class="show-image">
                <h3 id="preview-text">ছবি আপলোড করার পর আপনার পোস্টার এখানে শো করবে</h3>
                <div id="preview-frame" style="display: none;">
                    <div id="preview-container">
                        <img id="preview-uploaded" src="" alt="Uploaded Image">
                        <img id="preview-background" src="" alt="Selected Frame">
                    </div>
                </div>
            </div>
            <div class="personal-poster">
                <h3>আপনার পোস্টার</h3>
                <button style="background: none; border: none;" id="save-button"><img src="/assets/JPG/Save-Button.png" alt=""/></button>
                <button style="background: none; border: none;" id="share-button"><img src="/assets/JPG/Share-Button.png" alt=""/>
                </button>
            </div>
        </div>
    </div>
    <script>
        let selectedFrameId = null;

        function selectFrame(frameId) {
            document.querySelectorAll('.image-frame').forEach(frame => {
                frame.classList.remove('selected');
            });

            selectedFrameId = frameId;
            document.getElementById(frameId).classList.add('selected');

            const backgroundSrc = document.querySelector(`#${frameId} img`).src;
            const previewBackground = document.getElementById('preview-background');
            previewBackground.src = backgroundSrc;
        }

        function uploadImage() {
            if (!selectedFrameId) {
                alert('দয়া করে প্রথমে একটি ফ্রেম নির্বাচন করুন!');
                return;
            }

            const fileInput = document.getElementById('imageInput');
            const file = fileInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const previewImg = document.getElementById('preview-uploaded');
                    previewImg.src = e.target.result;
                    document.getElementById('preview-text').style.display = 'none';
                    document.getElementById('preview-frame').style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }

        function createCombinedImage() {
            const previewBackground = document.getElementById('preview-background');
            const previewUploaded = document.getElementById('preview-uploaded');

            if (!previewBackground.complete || !previewUploaded.complete) {
                console.error("Images not fully loaded.");
                return null;
            }

            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');

            canvas.width = previewBackground.naturalWidth;
            canvas.height = previewBackground.naturalHeight;

            // Draw white background
            ctx.fillStyle = 'white';
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            // Draw uploaded image
            ctx.drawImage(previewUploaded, 0, 0, canvas.width, canvas.height);

            // Draw frame
            ctx.drawImage(previewBackground, 0, 0, canvas.width, canvas.height);

            return canvas.toDataURL('image/png');
        }

        document.getElementById('save-button').addEventListener('click', function() {
            const combinedImageDataURL = createCombinedImage();

            if (combinedImageDataURL) {
                const link = document.createElement('a');
                link.href = combinedImageDataURL;
                link.download = 'combined_image.png';
                link.click();
            } else {
                alert('সংযুক্ত ছবি তৈরি করতে ব্যর্থ হয়েছে।');
            }
        });

        document.getElementById('share-button').addEventListener('click', function() {
            const combinedImageDataURL = createCombinedImage();

            if (combinedImageDataURL) {
                shareOnFacebook(combinedImageDataURL);
            } else {
                alert('সংযুক্ত ছবি তৈরি করতে ব্যর্থ হয়েছে।');
            }
        });

        function shareOnFacebook(imageDataURL) {
            const blob = dataURLtoBlob(imageDataURL);

            const formData = new FormData();
            formData.append('file', blob, 'combined_image.png');

            simulateImageUpload(formData)
                .then(imageUrl => {
                    const shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(imageUrl)}`;
                    window.open(shareUrl, 'Share on Facebook', 'width=600,height=400');
                })
                .catch(error => {
                    console.error('Error uploading image:', error);
                    alert('ছবি আপলোড করতে ব্যর্থ হয়েছে। দয়া করে আবার চেষ্টা করুন।');
                });
        }

        function dataURLtoBlob(dataURL) {
            const arr = dataURL.split(',');
            const mime = arr[0].match(/:(.*?);/)[1];
            const bstr = atob(arr[1]);
            let n = bstr.length;
            const u8arr = new Uint8Array(n);
            while (n--) {
                u8arr[n] = bstr.charCodeAt(n);
            }
            return new Blob([u8arr], { type: mime });
        }

        function simulateImageUpload(formData) {
            return new Promise((resolve, reject) => {
                setTimeout(() => {
                    const fakeImageUrl = 'https://hygieneforall.co/'; // Replace with actual upload URL in real use
                    resolve(fakeImageUrl);
                }, 1000);
            });
        }

    </script>
@endsection
