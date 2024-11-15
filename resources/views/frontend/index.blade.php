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

    <!-- Hero Section with Carousel -->
    <section class="carousel">
        <div class="carousel-container">
            <div class="carousel-slide">
                <img
                    src="/assets/images/Banner1.jpg"
                    alt="Slide 1"
                    class="carousel-image"
                />
            </div>
            <div class="carousel-slide">
                <img
                    src="/assets/images/Banner2.jpg"
                    alt="Slide 2"
                    class="carousel-image"
                />
            </div>
            <div class="carousel-slide">
                <img
                    src="/assets/images/Banner3.jpg"
                    alt="Slide 3"
                    class="carousel-image"
                />
            </div>
        </div>
        <!-- Dots for Navigation -->
        <div class="carousel-dots">
            <span class="dot" onclick="currentSlide(0)"></span>
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
        </div>
    </section>

    <!-- Power for her -->
    <section class="harpon">
        <img src="/assets/images/Harpon.png" alt=""/>
    </section>

    <div id="fb-root"></div>


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


    <!-- Shopoth Section -->
    <section id="shopoth">
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
                <img src="/assets/images/shopothnin.png" alt=""/>
            </div>
            <div
                class=""
                style="background: linear-gradient(90deg, #000078, #017fcb)"
            ></div>
        </div>
        <section class="share-section">
            <div style="margin: 30px 0">
                <h4>
                    সার্টিফিকেট পেতে <br/>
                    নিজের তথ্য দিয়ে নিবন্ধন করুন
                </h4>
                <form action="{{ route('certificate.save', ['value' => time()]) }}" method="post">
                    @csrf
                    <div class="input-data">
                        <input type="text" name="name" placeholder="আপনার নাম"/>
                        <input type="tel" name="phone" placeholder="মোবাইল নম্বর"/>
                        <input type="text" name="email" placeholder="ইমেইল"/>
                    </div>
                    <button style="background: none; border: none;" type="submit">
                        <img src="/assets/JPG/Certificate-Download-Button.png" alt=""/>
                    </button>
                </form>
            </div>
        </section>
    </section>

    <!-- Story Section -->
    <div class="" id="story">
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
                <img src="/assets/images/awaztulun.png" alt=""/>
            </div>
            <div
                class=""
                style="background: linear-gradient(90deg, #000078, #017fcb)"
            ></div>
        </div>
        <section class="story-section">
            <h2>
                আপনার গল্পটি এখানে লিখে <br/>
                সবার সাথে শেয়ার করুন
            </h2>

            <form class="story-form" action="{{route('blog.save')}}" method="post">
                @csrf
                <div class="input-group">
                    <input type="text" name="name" placeholder="আপনার নাম*" required/>
                    <input type="email" name="email" placeholder="ই-মেইল*" required/>
                </div>
                <textarea name="details"
                    placeholder="আপনার গল্পটি সর্বোচ্চ ৩০০ শব্দের মধ্যে এখানে লিখুন"
                ></textarea>
                <button
                    type="submit"
                    style="
              padding: 10px 0px;
              color: white;
              cursor: pointer;
              border: none;
              box-shadow: 20px;
              background: linear-gradient(90deg, #000078, #017fcb);
            "
                    class="submit-button"
                >
                    শেয়ার করুন
                </button>
            </form>
        </section>
    </div>
    <!-- Video Upload Section -->
    <section>
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
                <img src="/assets/images/videoBanan.png" alt=""/>
            </div>
            <div
                class=""
                style="background: linear-gradient(90deg, #000078, #017fcb)"
            ></div>
        </div>
        <div
            style="
          display: flex;
          justify-content: center;
          text-align: center;
          margin: 20px 0px;
        "
        >
            <div>
                <h4 style="margin: 20px 0">
                    ভিডিও আপলোড করতে <br/>
                    নিচের আপলোড বাটন ক্লিক করুন
                </h4>
                <!--  -->
                <form action="{{route('video.save')}}" method="post" enctype="multipart/form-data">

                    @csrf


                <div>
                    <img
                        src="/assets/JPG/Video-Link-Button.png"
                        alt="Upload"
                        style="cursor: pointer"
                        onclick="document.getElementById('fileInput').click()"
                    />

                    <input type="file" id="fileInput" name="video" style="display: none" accept="video/mp4, video/avi, video/mov" />

                </div>
                    <button type="submit">Upload Video</button> <!-- Optional submit button -->
                </form>
            </div>
        </div>
    </section>

    <!-- Comment Section -->
    <section style="margin: 20px 0">
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
                <img src="/assets/images/blogGallary.png" alt=""/>
            </div>
            <div
                class=""
                style="background: linear-gradient(90deg, #000078, #017fcb)"
            ></div>
        </div>
        <div style="display: flex; justify-content: center; margin: 20px 0">
            <div class="comment" style="">
                <!-- Repeat the comment box as needed -->
                @if(count($blogs)>0)

                    @foreach($blogs as $item)

                    <div
                        style="
              background-color: white;
              padding: 15px;
              border-radius: 5px;
              box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
              text-align: center;
            "
                    >
                        <h3 style="margin: 0; font-size: 18px; color: gray">
                           {{$item->name}}
                        </h3>
                        <p style="margin: 10px 0; font-size: 14px; color: gray">
                            {{ \Illuminate\Support\Str::limit($item->details, 200, '') }}

                        </p>
                        <a href="#" style="color: #007bff; font-size: 14px">আরও পড়ুন...</a>
                    </div>

                    @endforeach

                @else

                    <div
                        style="
              background-color: white;
              padding: 15px;
              border-radius: 5px;
              box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
              text-align: center;
            "
                    >
                        <h3 style="margin: 0; font-size: 18px; color: gray">
                            সুমাইয়া বরকতউল্লাহ
                        </h3>
                        <p style="margin: 10px 0; font-size: 14px; color: gray">
                            ফিল্ম হাউজিং নিয়ে কথা বলতে গেলে অবশ্যই আলো গবেষকের পরিপ্রেক্ষিত
                            বিবেচনা।
                        </p>
                        <a href="#" style="color: #007bff; font-size: 14px">আরও পড়ুন...</a>
                    </div>

                    <div
                        style="
              background-color: white;
              padding: 15px;
              border-radius: 5px;
              box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
              text-align: center;
            "
                    >
                        <h3 style="margin: 0; font-size: 18px; color: gray">শমী ওয়াদিদ</h3>
                        <p style="margin: 10px 0; font-size: 14px; color: gray">
                            ফিল্ম হাউজিং নিয়ে কথা বলতে গেলে অবশ্যই আলো গবেষকের পরিপ্রেক্ষিত
                            বিবেচনা।
                        </p>
                        <a href="#" style="color: #007bff; font-size: 14px">আরও পড়ুন...</a>
                    </div>

                    <div
                        style="
              background-color: white;
              padding: 15px;
              border-radius: 5px;
              box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
              text-align: center;
            "
                    >
                        <h3 style="margin: 0; font-size: 18px; color: gray">
                            হেদায়েত উল্লাহ
                        </h3>
                        <p style="margin: 10px 0; font-size: 14px; color: gray">
                            ফিল্ম হাউজিং নিয়ে কথা বলতে গেলে অবশ্যই আলো গবেষকের পরিপ্রেক্ষিত
                            বিবেচনা।
                        </p>
                        <a href="#" style="color: #007bff; font-size: 14px">আরও পড়ুন...</a>
                    </div>
                @endif

            </div>
        </div>
    </section>

    <!-- Video Section -->
    <section>
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
                <img src="/assets/images/videoGallary.png" alt=""/>
            </div>
            <div
                class=""
                style="background: linear-gradient(90deg, #000078, #017fcb)"
            ></div>
        </div>

        <div style="margin: 20px 0">
            <div class="video-section">
                @if(count($videos)>0)

                    @foreach($videos as $item)

                        @if($item->video)
                            <video controls height="300px">
                                <source src="{{ $item->video->original_url }}" type="video/mp4"/>
                                Your browser does not support the video tag.
                            </video>
                        @endif


                    @endforeach


                @else

                    <video controls>
                        <source src="path/to/video1.mp4" type="video/mp4"/>
                        Your browser does not support the video tag.
                    </video>
                    <video controls>
                        <source src="path/to/video1.mp4" type="video/mp4"/>
                        Your browser does not support the video tag.
                    </video>
                    <video controls>
                        <source src="path/to/video1.mp4" type="video/mp4"/>
                        Your browser does not support the video tag.
                    </video>
                @endif

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-left">
                <p>#harpoon #hygieneforallpowerforher</p>
            </div>
            <div class="footer-right">
                <p>Follow Us On:</p>
                <a href="#" class="social-icon"
                ><img src="assets/logo/facebook.png" alt="Facebook"
                    /></a>

                <a href="#" class="social-icon"
                ><img src="assets/logo/instagram.png" alt="Instagram"
                    /></a>
            </div>
        </div>
    </footer>


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
            const previewContainer = document.getElementById('preview-container');
            const previewBackground = document.getElementById('preview-background');
            const previewUploaded = document.getElementById('preview-uploaded');

            if (!previewBackground.complete || !previewUploaded.complete) {
                console.error("Images not fully loaded.");
                return null;
            }

            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');

            const scaleFactor = 4;
            canvas.width = previewContainer.offsetWidth * scaleFactor;
            canvas.height = previewContainer.offsetHeight * scaleFactor;

            // Draw white background
            ctx.fillStyle = 'white';
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            // Draw uploaded image
            ctx.drawImage(previewUploaded, 0, 0, canvas.width, canvas.height);

            // Draw frame
            ctx.globalCompositeOperation = 'multiply';
            ctx.drawImage(previewBackground, 0, 0, canvas.width, canvas.height);
            ctx.globalCompositeOperation = 'source-over';

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
                alert('স���যুক্ত ছবি তৈরি করতে ব্যর্থ হয়েছে।');
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
            // Convert data URL to blob
            const blob = dataURLtoBlob(imageDataURL);

            // Create a form and append the image file
            const formData = new FormData();
            formData.append('file', blob, 'combined_image.png');

            // Simulate uploading the image and getting a URL
            // In a real scenario, you would upload this to your server
            simulateImageUpload(formData)
                .then(imageUrl => {
                    // Once you have the image URL, share it on Facebook
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
            return new Blob([u8arr], {type: mime});
        }

        function simulateImageUpload(formData) {
            // This function simulates uploading an image and returning a URL
            // In a real scenario, you would replace this with actual server communication
            return new Promise((resolve, reject) => {
                setTimeout(() => {
                    // Simulate a successful upload
                    const fakeImageUrl = 'https://example.com/uploaded-image.png';
                    resolve(fakeImageUrl);

                    // Uncomment the following line to simulate an error
                    // reject(new Error('Upload failed'));
                }, 1000); // Simulate a 1-second upload time
            });
        }
    </script>




@endsection
