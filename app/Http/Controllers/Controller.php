<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Blog;
use App\Models\Certificate;
use App\Models\Video;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;
use Jorenvh\Share\Share;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function home()
    {
        $title = "Harpoon Campaign";
        $description = "Harpoon Campaign";
        $pageUrl = "";
        $image = "/assets/images/Banner1.jpg";

        $blogs= Blog::limit(9)->get();
        $videos= Video::with(['media'])->limit(9)->get();

        return view('frontend.index',
            compact('title',
                'blogs',
                'videos',
                'description',
                'pageUrl',
                'image'));

    }

    public function urlRedirect($value)
    {

        $image= '/certificates/'.$value.'_certificate.png';

        return \view('welcome',compact('image'));
        // return redirect()->route('home');
    }

    public function certificate()
    {
        $applicantIds = request()->session()->get('applicant_id');
        if (!$applicantIds) {
            return redirect()->route('home');
        }
        $firstApplicantId = $applicantIds[0];

        $applicant = Applicant::find($firstApplicantId);
        $updatedFilename = str_replace("_certificate.png", "", $applicant->file);

        $shareComponent = \Share::page(
            "" . $updatedFilename,
            "Harpoon Campaign",
        )->facebook([
            'title' => "Harpoon Campaign ",
            'description' => "Harpoon Campaign ",
            'image' => $applicant->file
        ]);
        /*  ->twitter()
          ->linkedin()
          ->telegram()
          ->whatsapp()
          ->reddit();*/


        $title = "Harpoon Campaign";
        $description = "Harpoon Campaign";
        $pageUrl = "" . $applicant->file;
        $image = "" . $applicant->file;

        Session::forget('applicant_id');

        return view('frontend.certificate', compact('applicant', 'shareComponent', 'title', 'description', 'pageUrl', 'image'));

    }

    public function certificateSave(Request $request , $value)
    {
        //return $request->all();
        if ($request->method() === 'GET') {
            return redirect()->route('home');
        }


        try {

            // Load the certificate template image
            $template = Image::make(public_path('/assets/certificates/Certificate.png'));

// Calculate the x-coordinate to center the text horizontally
            $x = $template->getWidth() / 2;

// Add the applicant's name to the certificate, centered horizontally
            $template->text($request['name'], $x, 150, function ($font) {
                $font->file(public_path('/font/HindSiliguri-Bold.ttf'));
                $font->size(50);
                $font->color('#0051a3');
                $font->align('center'); // Align the text to the center point
            });



            // Save the certificate image with a dynamic name
            $imageName = time(). '_certificate.png';
            $template->save(public_path('certificates/' . $imageName));
            $request['file'] = 'certificates/' . $imageName;

            $certificate = Certificate::create($request->all());





            $title = "Harpoon Campaign";
            $description = "Harpoon Campaign";
            $pageUrl = "" . $certificate->file;
            $image = "" . $certificate->file;
            $shareComponent= [];


            return view('frontend.certificate', compact('certificate', 'shareComponent', 'title', 'description', 'pageUrl', 'image','value'));

        } catch (\Exception $e) {
            return [
                'code' => 400,
                'message' => $e->getMessage(),
            ];
        }

    }
    public function blogSave(Request $request)
    {
        //return $request->all();
        if ($request->method() === 'GET') {
            return redirect()->route('home');
        }


        try {

            $certificate = Blog::create($request->all());


            return redirect()->route('home');



        } catch (\Exception $e) {
          return redirect()->route('home');
        }

    }

    public function videoSave(Request $request)
    {
        // Validate the file upload
        $request->validate([
            'video' => 'required|mimes:mp4,avi,mov|max:204800' // max size in kilobytes (200 MB)
        ]);

        if ($request->hasFile('video')) {
            // Create a new video entry in the database
            $video = Video::create($request->all()); // Adjust as needed

            // Get the uploaded video file
            $uploadedVideo = $request->file('video');

            // Move the video to a temporary location
            $tempPath = $uploadedVideo->storeAs('tmp/uploads', $uploadedVideo->getClientOriginalName(), 'public');

            // Add the video to the media collection
            $video->addMedia(storage_path('app/public/' . $tempPath))->toMediaCollection('video');

            return back()->with('success', 'Video uploaded successfully!');
        }

        return back()->with('error', 'Video upload failed.');
    }

}


