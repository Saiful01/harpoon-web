@extends("layouts.frontend")
@section('title', $title)
@section('description', $description)
@section('image', $image)
@section("content")
    <meta property="og:image" content="{{ $image }}"/>

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
    <!-- Header Navigation -->
    <header class="header-nav">
        <nav>
            <div class="logo">
                <a href="/">
                    <img
                        src="/assets/images/Harpon.png"
                        class="logo-image"
                        alt="Harpon Logo"
                    />
                </a>
                <div class="divider"></div>
                <img
                    src="/assets/images/WTD.png"
                    class="logo-image"
                    alt="WTD Logo"
                />
            </div>
            <ul class="nav-links">
                <li><a href="#join-now">জয়েন করুন</a></li>
                <li><a href="#shopoth">শপথ নিন</a></li>
                <li><a href="#story">আওয়াজ তুলুন</a></li>
                <li><a href="#video">সাথে থাকুন</a></li>
            </ul>
            <div class="hamburger" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>


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
                        <input type="file" id="imageInput" onchange="uploadImage()" style="display: none"/>
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
                <button style="background: none; border: none;" id="save-button"><img src="/assets/JPG/Save-Button.png"
                                                                                      alt=""/></button>
                {{-- <button style="background: none; border: none;" id="shareButton"><img src="/assets/JPG/Share-Button.png"
                                                                                       alt=""/>--}}
                </button>
            </div>
            <div class="hash-section">
                <p>নিচের হ্যাশট্যাগ গুলো ব্যবহার করে সোশ্যাল মিডিয়াতে পোস্ট করুন: <br>#Harpoon
                    #HygieneForAllPowerForHer</p>
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
                        <input type="text" name="name" placeholder="আপনার নাম" required/>
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
                    <input type="email" name="email" placeholder="ই-মেইল*"/>
                </div>
                <textarea name="details"
                          placeholder="আপনার গল্পটি সর্বোচ্চ ৩০০ শব্দের মধ্যে এখানে লিখুন" maxlength="500"
                          required></textarea>
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
                    <img src="/assets/JPG/Share-Button.png"  alt="">
                </button>
            </form>
        </section>
    </div>
    <!-- Video Upload Section -->
    <section id="video">
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
                    নিচের আপলোড বাটন ক্লিক করুন (সর্বোচ্চ ২৫ এমবি)
                </h4>
                <!--  -->
                <form action="{{route('video.save')}}" method="post" enctype="multipart/form-data">

                    @csrf


                    <div>


                        <!-- Custom label for file input -->
                        <label for="fileInput"
                               style="cursor: pointer; background-color: #0051a3; color: white; padding: 5px 5px; border-radius: 5px; display: inline-block;">
                            <p style="font-size: 12px">আপলোড ভিডিও</p>

                        </label>
                        <input type="file" id="fileInput" name="video" style="display: none;"
                               accept="video/mp4, video/avi, video/mov" required/>

                        <!-- Element to display the file name -->
                        <div id="fileNameDisplay" style="margin-top: 10px; font-size: 16px;"></div>


                    </div>
                    <button type="submit" style="background: #0051a3; border: none; margin-top: 10px"><img
                            src="/assets/JPG/Video-Submit-Button.png"
                            alt="Upload"
                            style="cursor: pointer"
                            {{--onclick="document.getElementById('fileInput').click()"--}}
                        /></button> <!-- Optional submit button -->
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

                        <!-- Comment 1 -->
                        <div
                            style="
              background-color: white;
              padding: 15px;
              border-radius: 5px;
              box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
              text-align: center;
              margin-bottom: 15px;
            "
                        >
                            <h3 style="margin: 0; font-size: 18px; color: gray">
                                {{$item->name}}
                            </h3>
                            <p style="margin: 10px 0; font-size: 14px; color: gray">
                                {{ \Illuminate\Support\Str::limit($item->details, 200, '') }}

                            </p>
                            <button
                                style="color: #007bff; font-size: 14px; padding: 0px 5px"
                                onclick="openModal('{{ addslashes($item->name) }}', '{{ addslashes($item->details) }}')"
                            >
                                আরও পড়ুন...
                            </button>

                        </div>



                    @endforeach

                @else


                    <!-- Comment 1 -->
                    <div
                        style="
              background-color: white;
              padding: 15px;
              border-radius: 5px;
              box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
              text-align: center;
              margin-bottom: 15px;
            "
                    >
                        <h3 style="margin: 0; font-size: 18px; color: gray">
                            সুমাইয়া বরকতউল্লাহ
                        </h3>
                        <p style="margin: 10px 0; font-size: 14px; color: gray">
                            ফিল্ম হাউজিং নিয়ে কথা বলতে গেলে অবশ্যই আলো গবেষকের পরিপ্রেক্ষিত
                            বিবেচনা।
                        </p>
                        <button
                            style="color: #007bff; font-size: 14px; padding: 0px 5px"
                            onclick="openModal('সুমাইয়া বরকতউল্লাহ', 'ফিল্ম হাউজিং নিয়ে কথা বলতে গেলে অবশ্যই আলো গবেষকের পরিপ্রেক্ষিত বিবেচনা।')"
                        >
                            আরও পড়ুন...
                        </button>
                    </div>

                    <!-- Comment 2 -->
                    <div
                        style="
              background-color: white;
              padding: 15px;
              border-radius: 5px;
              box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
              text-align: center;
              margin-bottom: 15px;
            "
                    >
                        <h3 style="margin: 0; font-size: 18px; color: gray">শমী ওয়াদিদ</h3>
                        <p style="margin: 10px 0; font-size: 14px; color: gray">
                            ফিল্ম হাউজিং নিয়ে কথা বলতে গেলে অবশ্যই আলো গবেষকের পরিপ্রেক্ষিত
                            বিবেচনা।
                        </p>
                        <button
                            style="color: #007bff; font-size: 14px"
                            onclick="openModal('শমী ওয়াদিদ', 'ফিল্ম হাউজিং নিয়ে কথা বলতে গেলে অবশ্যই আলো গবেষকের পরিপ্রেক্ষিত বিবেচনা।')"
                        >
                            আরও পড়ুন...
                        </button>
                    </div>

                    <!-- Comment 3 -->
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
                        <button
                            style="color: #007bff; font-size: 14px"
                            onclick="openModal('হেদায়েত উল্লাহ', 'ফিল্ম হাউজিং নিয়ে কথা বলতে গেলে অবশ্যই আলো গবেষকের পরিপ্রেক্ষিত বিবেচনা।')"
                        >
                            আরও পড়ুন...
                        </button>
                    </div>


                @endif

            </div>
        </div>




        <!-- Modal -->
        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="modal-close" onclick="closeModal()">&times;</span>
                <h3 id="modal-title"></h3>
                <p id="modal-content"></p>
            </div>
        </div>


        <!-- Modal -->
        <div id="myModal" style="display: none">
            <div
                style="
          background-color: white;
          padding: 20px;
          border-radius: 5px;
          width: 90%;
          max-width: 500px;
          margin: 100px auto;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
          text-align: center;
          position: relative;
        "
            >
                <h3 style="margin: 0; font-size: 18px">শমী ওয়াদিদ</h3>
                <p style="margin: 10px 0; font-size: 14px">
                    বিস্তারিত আলোচনা এখানে দেওয়া হয়েছে। ফিল্ম হাউজিং ও আলোর গুরুত্ব
                    সম্পর্কে আরও জানুন।
                </p>
                <button
                    id="closeModal"
                    style="
            background-color: #007bff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
          "
                >
                    বন্ধ করুন
                </button>
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

        <div style="margin: 20px 0; display: flex; justify-content: center">
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
                <a href="https://www.facebook.com/harpoon.bd" class="social-icon"
                ><img src="assets/logo/facebook.png" alt="Facebook"
                    /></a>

                <a href="https://www.instagram.com/harpoonqel" class="social-icon"
                ><img src="assets/logo/instagram.png" alt="Instagram"
                    /></a>
                <a href="https://www.youtube.com/@quazienterpriseslimited4993" class="social-icon"
                ><img src="assets/logo/Youtube-Icon.png" alt="Youtube"
                    /></a>
            </div>
        </div>
    </footer>



    <script>
        let selectedFrameId = null;
        let uploadedImage = null;

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
                    uploadedImage = new Image();
                    uploadedImage.onload = function () {
                        const previewImg = document.getElementById('preview-uploaded');
                        previewImg.src = e.target.result;
                        document.getElementById('preview-text').style.display = 'none';
                        document.getElementById('preview-frame').style.display = 'block';
                    }
                    uploadedImage.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }

        async function createCombinedImage() {
            const previewBackground = document.getElementById('preview-background');

            if (!previewBackground.complete || !uploadedImage) {
                console.error("Images not fully loaded.");
                return null;
            }

            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');

            if (!ctx) {
                console.error("Unable to create canvas context");
                return null;
            }

            canvas.width = previewBackground.naturalWidth;
            canvas.height = previewBackground.naturalHeight;

            // Draw white background
            ctx.fillStyle = 'white';
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            // Maintain aspect ratio for uploaded image
            const aspectRatio = uploadedImage.width / uploadedImage.height;
            let drawWidth, drawHeight;

            if (canvas.width / canvas.height > aspectRatio) {
                drawHeight = canvas.height;
                drawWidth = drawHeight * aspectRatio;
            } else {
                drawWidth = canvas.width;
                drawHeight = drawWidth / aspectRatio;
            }

            const offsetX = (canvas.width - drawWidth) / 2;
            const offsetY = (canvas.height - drawHeight) / 2;

            // Draw uploaded image in the center
            ctx.drawImage(uploadedImage, offsetX, offsetY, drawWidth, drawHeight);

            // Draw the frame over the uploaded image
            ctx.drawImage(previewBackground, 0, 0, canvas.width, canvas.height);

            return new Promise(resolve => {
                canvas.toBlob(blob => {
                    resolve(blob);
                }, 'image/png');
            });
        }

        document.getElementById('save-button').addEventListener('click', async function () {


            const blob = await createCombinedImage();
            if (blob) {
                const url = URL.createObjectURL(blob);
                const link = document.createElement('a');
                link.href = url;
                link.download = 'HygieneForAll.png';
                link.click();
                URL.revokeObjectURL(url);

                const messageElement = document.createElement('div');
                messageElement.textContent = 'আপনার ছবি ডাউনলোড হচ্ছে, অনুগ্রহ করে অপেক্ষা করুন।';
                messageElement.style.cssText = 'position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #0051a3; color: white; padding: 20px; border-radius: 5px; z-index: 1000;';
                document.body.appendChild(messageElement);

                setTimeout(() => {
                    document.body.removeChild(messageElement);
                }, 3000);
            } else {
                alert('সংযুক্ত ছবি তৈরি করতে ব্যর্থ হয়েছে।');
            }


        });

        // Add event listener for the file input
        document.getElementById('imageInput').addEventListener('change', uploadImage);

        // Add event listeners for the frame selection
        document.querySelectorAll('.image-frame').forEach(frame => {
            frame.addEventListener('click', function () {
                selectFrame(this.id);
            });
        });
    </script>

    <script>
        // JavaScript to display the file name after upload
        document.getElementById('fileInput').addEventListener('change', function () {
            const fileNameDisplay = document.getElementById('fileNameDisplay');
            if (this.files.length > 0) {
                fileNameDisplay.textContent = `Selected file: ${this.files[0].name}`;
            } else {
                fileNameDisplay.textContent = ''; // Clear if no file is selected
            }
        });


        // Open the modal and set its content
        function openModal(title, content) {
            document.getElementById("modal-title").innerText = title;
            document.getElementById("modal-content").innerHTML = content;
            document.getElementById("modal").style.display = "block";
        }

        // Close the modal
        function closeModal() {
            document.getElementById("modal").style.display = "none";
        }

        // Close the modal when clicking outside the modal content
        window.onclick = function (event) {
            const modal = document.getElementById("modal");
            if (event.target == modal) {
                closeModal();
            }
        };
    </script>

@endsection
