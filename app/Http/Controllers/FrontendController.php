<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Organisation;
use App\Models\Testimonials;
use App\Models\Gallery;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    public function __construct()
    {
        // $user = User::first();
        // $response = json_decode($user->footer_data);
        // config(['footerData' => $response]);
    }
    public function home(){
        return view("pages.home");
    }

    public function activities(){
        return view("pages.activities");
    }

    public function activitiesDetails(){
        return view("pages.activities-details");
    }

    public function blog(){
        return view("pages.blog");
    }

    public function contact(){
        return view("pages.contact");
    }

    public function environmentInitiative(){
        return view("pages.environment-initiative");
    }

    public function gallery(){
        $banner = Banner::where('status', 'ACTIVE')->where('banner_type', 'ADVERTISE')->where('banner_page', 'GALLERY')->first();
        $gallery = Gallery::where('status', 'ACTIVE')->orderBy('sequence', 'ASC')->get();
        return view("pages.gallery")->with('banner', $banner)->with('gallery', $gallery);
    }

    public function joinVolunteer(){
        return view("pages.join-volunteer");
    }

    public function organisation(){
        $banner = Banner::where('status', 'ACTIVE')->where('banner_type', 'ADVERTISE')->where('banner_page', 'ORGANISATION')->first();
        $organisation = Organisation::where('status', 'ACTIVE')->orderBy('id', 'DESC')->first();
        return view("pages.organisation")->with('banner', $banner)->with('organisation', $organisation);
    }

    public function ourTeam(){
        return view("pages.our-team");
    }

    public function testimonials(){
        $banner = Banner::where('status', 'ACTIVE')->where('banner_type', 'ADVERTISE')->where('banner_page', 'TESTIMONIALS')->first();
        $testimonial = Testimonials::where('status', 'ACTIVE')->orderBy('sequence', 'ASC')->get();
        return view("pages.testimonials")->with('banner', $banner)->with('testimonial', $testimonial);
    }


    // public function designCenter(){
    //     $banners = Banner::where('status', 'on')->where('type', 'design-center')->first();
    //     $imagArr = [];
    //     if ($banners){
    //         if ($banners->image1)
    //         $imagArr[0] = $banners->image1;
    //         if ($banners->image2)
    //         $imagArr[1] = $banners->image2;
    //         if ($banners->image3)
    //         $imagArr[3] = $banners->image3;
    //         if ($banners->image4)
    //         $imagArr[4] = $banners->image4;
    //         if ($banners->image5)
    //         $imagArr[5] = $banners->image5;
    //         $banners->sliderimg = $imagArr;
    //     }
    //     $designCenterCms = DesignCenterCms::orderBy('id', 'DESC')->get();

    //     return view("pages.design-center")->with('banners', $banners)->with('designCenterCms', $designCenterCms);
    // }

    // public function audioCalculator(){
    //     $banners = Banner::where('status', 'on')->where('type', 'audio-calculator')->first();
    //     $imagArr = [];
    //     if ($banners){
    //         if ($banners->image1)
    //         $imagArr[0] = $banners->image1;
    //         if ($banners->image2)
    //         $imagArr[1] = $banners->image2;
    //         if ($banners->image3)
    //         $imagArr[3] = $banners->image3;
    //         if ($banners->image4)
    //         $imagArr[4] = $banners->image4;
    //         if ($banners->image5)
    //         $imagArr[5] = $banners->image5;
    //         $banners->sliderimg = $imagArr;
    //     }

    //     return view("pages.audio-calculator")->with('banners', $banners);
    // }
    // public function about(){
    //     $banners = Banner::where('status', 'on')->where('type', 'about')->first();
    //     $imagArr = [];
    //     if ($banners){
    //         if ($banners->image1)
    //         $imagArr[0] = $banners->image1;
    //         if ($banners->image2)
    //         $imagArr[1] = $banners->image2;
    //         if ($banners->image3)
    //         $imagArr[3] = $banners->image3;
    //         if ($banners->image4)
    //         $imagArr[4] = $banners->image4;
    //         if ($banners->image5)
    //         $imagArr[5] = $banners->image5;
    //         $banners->sliderimg = $imagArr;
    //     }
    //     $blogManagements = BlogManagement::where('status', 'on')->where('type', 'about')->get();

    //     return view("pages.about")->with('banners', $banners)->with('blogManagements', $blogManagements);
    // }
    // public function getInTouch(){
    //     return view("pages.get-in-touch");
    // }
    // public function manufacturer(){
    //     $banners = Banner::where('status', 'on')->where('type', 'manufacturer')->first();
    //     $imagArr = [];
    //     if ($banners){
    //         if ($banners->image1)
    //         $imagArr[0] = $banners->image1;
    //         if ($banners->image2)
    //         $imagArr[1] = $banners->image2;
    //         if ($banners->image3)
    //         $imagArr[3] = $banners->image3;
    //         if ($banners->image4)
    //         $imagArr[4] = $banners->image4;
    //         if ($banners->image5)
    //         $imagArr[5] = $banners->image5;
    //         $banners->sliderimg = $imagArr;
    //     }

    //     $PageOnMouceHover = PageOnMouceHover::where('status', 'on')->where('type', 'manufacturer')->get();
    //     return view("pages.manufacturer")->with('banners', $banners)->with('PageOnMouceHover', $PageOnMouceHover);
    // }
    // public function requestDemo(){
    //     return view("pages.request-demo");
    // }
    // public function contactUs(){
    //     return view("pages.contact-us");
    // }
    // public function soundEngineer(){
    //     $banners = Banner::where('status', 'on')->where('type', 'sound-engineer')->first();
    //     $imagArr = [];
    //     if ($banners){
    //         if ($banners->image1)
    //         $imagArr[0] = $banners->image1;
    //         if ($banners->image2)
    //         $imagArr[1] = $banners->image2;
    //         if ($banners->image3)
    //         $imagArr[3] = $banners->image3;
    //         if ($banners->image4)
    //         $imagArr[4] = $banners->image4;
    //         if ($banners->image5)
    //         $imagArr[5] = $banners->image5;
    //         $banners->sliderimg = $imagArr;
    //     }

    //     $PageOnMouceHover = PageOnMouceHover::where('status', 'on')->where('type', 'sound-engineer')->get();
    //     return view("pages.sound-engineer")->with('banners', $banners)->with('PageOnMouceHover', $PageOnMouceHover);
    // }
    // public function architect(){
    //     $banners = Banner::where('status', 'on')->where('type', 'architect')->first();
    //     $imagArr = [];
    //     if ($banners){
    //         if ($banners->image1)
    //         $imagArr[0] = $banners->image1;
    //         if ($banners->image2)
    //         $imagArr[1] = $banners->image2;
    //         if ($banners->image3)
    //         $imagArr[3] = $banners->image3;
    //         if ($banners->image4)
    //         $imagArr[4] = $banners->image4;
    //         if ($banners->image5)
    //         $imagArr[5] = $banners->image5;
    //         $banners->sliderimg = $imagArr;
    //     }

    //     $PageOnMouceHover1 = PageOnMouceHover::where('status', 'on')->where('type', 'architect-1')->get();
    //     $PageOnMouceHover2 = PageOnMouceHover::where('status', 'on')->where('type', 'architect-2')->get();
    //     $blogManagements = BlogManagement::where('status', 'on')->where('type', 'architect')->get();

    //     return view("pages.architect")->with('banners', $banners)->with('PageOnMouceHover1', $PageOnMouceHover1)->with('PageOnMouceHover2', $PageOnMouceHover2)->with('blogManagements', $blogManagements);
    // }
    // public function customerSupport(){
    //     return view("pages.customer-support");
    // }
    // public function systemDesigner(){
    //     $banners = Banner::where('status', 'on')->where('type', 'system-designer')->first();
    //     $imagArr = [];
    //     if ($banners){
    //         if ($banners->image1)
    //         $imagArr[0] = $banners->image1;
    //         if ($banners->image2)
    //         $imagArr[1] = $banners->image2;
    //         if ($banners->image3)
    //         $imagArr[3] = $banners->image3;
    //         if ($banners->image4)
    //         $imagArr[4] = $banners->image4;
    //         if ($banners->image5)
    //         $imagArr[5] = $banners->image5;
    //         $banners->sliderimg = $imagArr;
    //     }

    //     $PageOnMouceHover1 = PageOnMouceHover::where('status', 'on')->where('type', 'system-designer-1')->get();
    //     $PageOnMouceHover2 = PageOnMouceHover::where('status', 'on')->where('type', 'system-designer-2')->get();
    //     $PageOnMouceHover3 = PageOnMouceHover::where('status', 'on')->where('type', 'system-designer-3')->get();
    //     $blogManagements = BlogManagement::where('status', 'on')->where('type', 'system-designer')->get();
    //     return view("pages.system-designer")->with('banners', $banners)->with('PageOnMouceHover1', $PageOnMouceHover1)->with('PageOnMouceHover2', $PageOnMouceHover2)->with('PageOnMouceHover3', $PageOnMouceHover3)->with('blogManagements', $blogManagements);
    // }
    // public function saveFormData(Request $request){
    //     if($request->type == 'subscribe'){
    //         $request->validate([
    //             'business_email'=>'required|email',
    //         ]);
    //     }else if($request->type == 'customer-support'){
    //         $request->validate([
    //             'first_name'=>'required|min:2',
    //             'business_email'=>'required|email',
    //             'business_phone'=>'required|numeric|digits_between:8,10',
    //             'privacy_policy'=>'required',
    //         ]);
    //     }else{
    //         $request->validate([
    //             'first_name'=>'required|min:2',
    //             'last_name'=>'required|min:2',
    //             'company'=>'required|min:2',
    //             'business_email'=>'required|email',
    //             'business_phone'=>'required|numeric|digits_between:8,10',
    //             'jobtitle'=>'required|min:2',
    //             'country'=>'required|min:2',
    //             'how_we_can_help'=>'required|min:2',
    //             'privacy_policy'=>'required',
    //         ]);
    //     }

    //     $form = new Form();
    //     $form->first_name = $request->first_name;
    //     $form->last_name = $request->last_name;
    //     $form->company = $request->company;
    //     $form->business_email = $request->business_email;
    //     $form->business_phone = $request->business_phone;
    //     $form->jobtitle = $request->jobtitle;
    //     $form->country = $request->country ? $request->country : "india";
    //     $form->how_we_can_help = $request->how_we_can_help;
    //     $form->privacy_policy = $request->privacy_policy == 'on' ? 1 : 0;
    //     $form->type = $request->type;
    //     $form->question = $request->question;
    //     $form->technical_problem = $request->technical_problem;
    //     $form->feedback = $request->feedback;
    //     if ($request->file('attched_file')) {
    //         $fileName = time() . '.' . $request->attched_file->extension();
    //         $request->attched_file->move(public_path('uploads/images'), $fileName);
    //         $form->file = $fileName;
    //     }
    //     $res = $form->save();
    //         if($res){
    //             return redirect()->back()->with('success','Form submit successfully!');
    //         }else{
    //             return redirect()->back()->with('fail','Form submit faield!');
    //         }
    // }
    // public function indutrialDesign(){
    //     return view("pages.indutrial-design");
    // }
    // public function interactionDesign(){
    //     return view("pages.interaction-design");
    // }
    // public function privacyPolicy(){
    //     $pageContents = BlogManagement::where('status', 'on')->where('type', 'privacy-policy')->first();
    //     return view("pages.privacy-policy")->with('pageContents', $pageContents);
    // }
    // public function termsAndConditions(){
    //     $pageContents = BlogManagement::where('status', 'on')->where('type', 'terms-and-conditions')->first();
    //     return view("pages.terms-and-conditions")->with('pageContents', $pageContents);
    // }

    // public function fetchDbuVoltage(Request $request){
    //     $result = AudioCalculator::select('dbu', 'dbu_rms_voltage')->where('dbu', $request->dbu_value)->first();
    //     return $result;
    // }

    // public function fetchDbvVoltage(Request $request){
    //     $result = AudioCalculator::select('dbv', 'dbv_rms_voltage')->where('dbv', $request->dbv_value)->first();
    //     return $result;
    // }

    // public function serviceManagement($slug){
    //     if($slug == 'industrial-design' || $slug == 'interaction-design' || $slug == 'mechanical-engineering'|| $slug == 'electrical-and-electronics-engineering' || $slug == 'design-migration-re-engineering'){
    //         $indutrialDesign = ServiceManagement::where('slug', 'industrial-design')->first();
    //         $interactionDesign = ServiceManagement::where('slug', 'interaction-design')->first();
    //         $mechanicalEngineering = ServiceManagement::where('slug', 'mechanical-engineering')->first();
    //         $electricalElectronicsEngineering = ServiceManagement::where('slug', 'electrical-and-electronics-engineering')->first();
    //         $designMigrationReEngineering = ServiceManagement::where('slug', 'design-migration-re-engineering')->first();
    //         return view("pages.service-1")->with('indutrialDesign', $indutrialDesign)
    //         ->with('interactionDesign', $interactionDesign)
    //         ->with('mechanicalEngineering', $mechanicalEngineering)
    //         ->with('electricalElectronicsEngineering', $electricalElectronicsEngineering)
    //         ->with('designMigrationReEngineering', $designMigrationReEngineering);
    //     }
    //     if($slug == 'prototyping'){
    //         $prototyping = ServiceManagement::where('slug', 'prototyping')->first();
    //         return view("pages.service-2")->with('prototyping', $prototyping);
    //     }
    //     if($slug == 'acoustical-design-and-engineering'){
    //         $acousticalDesignEngineering = ServiceManagement::where('slug', 'acoustical-design-and-engineering')->first();
    //         return view("pages.service-3")->with('acousticalDesignEngineering', $acousticalDesignEngineering);
    //     }
    // }
}
