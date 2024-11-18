<?php

namespace App\Http\Controllers;


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

use RealRashid\SweetAlert\Facades\Alert;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

use Jorenvh\Share\Share;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function home()
    {
        $title = "Harpoon: Hygiene for All, Power for Her";
        $description = "Harpoon: Hygiene for All, Power for Her";
        $pageUrl = "";



        if (Session::has('certificate')) {
            $certificate = Session::get('certificate');
            if (is_array($certificate)) {
                // Get the last value from the array
                $image = end($certificate);
            } else {
                // If it's not an array, use the value directly
                $image = $certificate;
            }
        } else {
            $image = "";
        }





        $blogs= Blog::orderBy('created_at',"DESC")->limit(9)->get();
        $videos= Video::with(['media'])->orderBy('created_at',"DESC")->limit(9)->get();

        return view('frontend.index',
            compact('title',
                'blogs',
                'videos',
                'description',
                'pageUrl',
                'image'));

    }


    public function certificateSave(Request $request , $value)
    {
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
            $imageName = time() . '_certificate.png';
            $template->save(public_path('certificates/' . $imageName));
            $request['file'] = 'certificates/' . $imageName;

            // Create the certificate record
            $certificate = Certificate::create($request->all());



            // Meta information for social sharing
            $title = "Harpoon: Hygiene for All, Power for Her";
            $description = "Harpoon: Hygiene for All, Power for Her";
            $pageUrl = "https://hygieneforall.co/certificate-save/" . $value;

            // Ensure to use the absolute path for image URL
            $image = url($certificate->file);  // Absolute URL for Facebook to scrape

            Session::push('certificate', $image);

            return redirect()->route('certificate.show',['id' => $certificate->id]);




            return view('frontend.certificate', compact('certificate', 'title', 'description', 'pageUrl', 'image', 'value'));

        } catch (\Exception $e) {
            return [
                'code' => 400,
                'message' => $e->getMessage(),
            ];
        }
    }


    public function show($id)
    {
        $certificate = Certificate::findOrFail($id);

        $title = "Harpoon: Hygiene for All, Power for Her - Certificate for " . $certificate->name;
        $description = "View the Harpoon: Hygiene for All, Power for Her certificate for " . $certificate->name;
        $pageUrl = route('certificate.show', ['id' => $id]);
        $image = url($certificate->file);

        return view('frontend.certificate', compact('certificate', 'title', 'description', 'pageUrl', 'image', 'id'));
    }

    public function blogSave(Request $request)
    {
        //return $request->all();
        if ($request->method() === 'GET') {
            return redirect()->route('home');
        }


        try {

            $certificate = Blog::create($request->all());

            Alert::success('ধন্যবাদ', ' আপনার ডাটা সাবমিট হয়েছে  ');



            return redirect()->route('home');



        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
          return redirect()->route('home');
        }

    }

    public function videoSave(Request $request)
    {



        if (!$request->hasFile('video')) {

            Alert::error('Error', "Please upload Your video");

            return back()->with('error', 'Video upload failed.');


        }

        // Validate the file upload
        $request->validate([
            'video' => 'required|mimes:mp4,avi,mov|max:204800' // max size in kilobytes (200 MB)
        ]);


        try {
            if ($request->hasFile('video')) {
                // Create a new video entry in the database
                $video = Video::create($request->all()); // Adjust as needed

                // Get the uploaded video file
                $uploadedVideo = $request->file('video');

                // Move the video to a temporary location
                $tempPath = $uploadedVideo->storeAs('tmp/uploads', $uploadedVideo->getClientOriginalName(), 'public');

                // Add the video to the media collection
                $video->addMedia(storage_path('app/public/' . $tempPath))->toMediaCollection('video');

                Alert::success('ধন্যবাদ', ' আপনার ডাটা সাবমিট হয়েছে  ');

                return back()->with('success', 'Video uploaded successfully!');
            }
        }catch (\Exception $e) {

            Alert::error('Error', $e->getMessage());

            return back()->with('error', 'Video upload failed.');

        }




    }

    // Example controller method in Laravel
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $path = $image->store('public/images'); // Save the image in the public directory

            // Return the URL of the uploaded image
            return response()->json(['url' => asset('storage/images/' . basename($path))]);
        }

        return response()->json(['error' => 'No file uploaded.'], 400);
    }

}


