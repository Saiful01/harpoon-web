@extends("layouts.frontend")
@section('title', $title)
@section('description', $description)
@section('image', $image)
@section("content")

    <style>
        body {
            background-color: #cdebf8;
            padding: 0;
            margin: 0;
        }

        /* General styles for container */
        .container {
            padding: 30px 380px;
        }

        /* Certificate header styling */
        .certificate-header {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Buttons section styling */
        .buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }

        /* Share section styling */

        .share-section p {
            margin: 0;
            font-weight: bold;
            color: #333;
        }

        .social-icons img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            transition: transform 0.2s;
        }
        .social-icons img:hover {
            transform: scale(1.1);
        }

        /* Footer section styling */
        .footer {
            background: linear-gradient(90deg, #000078, #017fcb);
            height: 80px;
            display: flex;
            justify-content: center;
            position: relative;
            margin-top: 50px;
        }

        /* Logo styling for footer */
        .footer img {
            position: absolute;
            top: -40px;
        }

        /* Responsive styles for smaller devices */
        @media (max-width: 768px) {
            .container {
                position: relative;
                padding: 15px;
            }
            .share-section {
                margin-left: 10px !important;
            }

            .brands img {
                width: 200px;
            }

            .footer {
                margin-top: 20px;
            }
            .footer img {
                width: 200px;
                top: 0px;
            }
        }
    </style>

<div class="container">
    <!-- certificate header -->
    <div class="certificate-header">

        <img src="{{ asset($certificate->file) }}" style="width: 100%;" alt="Certificate">


    </div>
    <!-- buttons -->
    <div class="buttons">
        <a href="/">
            <img src="/assets/certificates/Home-Page.png" alt="Home" />
        </a>
        <div class="actions" style="display: flex">
            <a href="/{{$certificate->file}}" download="hygiene for all_certificate" >
                <img
                    src="/assets/certificates/Download.png"
                    style="cursor: pointer"
                    width="100px"
                    height="50px"
                    alt="Download"
                />
            </a>
            <div class="share-section" style="margin-left: 100px">
                <p>শেয়ার করুন</p> <br>
                <div
                    class="social-icons"
                    style="display: flex; justify-content: center"
                >
                   {{-- <a href="https://www.facebook.com/sharer/sharer.php?u={{ $pageUrl }}" target="_blank" rel="noopener noreferrer">
                        <img src="/assets/logo/facebook.png" alt="Facebook" />
                    </a>--}}

                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $pageUrl }}" target="_blank" rel="noopener noreferrer">
                        <img src="/assets/logo/facebook.png" alt="Facebook" />
                    </a>
                   {{-- <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode('https://hygieneforall.co/certificate-save/'. $value) }}" target="_blank" rel="noopener noreferrer">
                        <img src="/assets/logo/facebook.png" alt="Facebook" />
                    </a>--}}

                   {{-- <a href="#" target="_blank" rel="noopener noreferrer">
                        <img src="/assets/logo/instagram.png" alt="Instagram" />
                    </a>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- brands -->
    <div class="brands" style="display: flex; justify-content: center">
        <img src="/assets/certificates/Ovinondon.png" alt="Brand" />
    </div>
</div>

<!-- footer section -->
<div class="footer">
    <img src="/assets/certificates/Logo-with-Text.png" alt="Logo" />
</div>
@endsection







