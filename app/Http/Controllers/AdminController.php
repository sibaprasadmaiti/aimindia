<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Banner;
use App\Models\PageOnMouceHover;
use App\Models\Form;
use App\Models\HomePageCms;
use App\Models\DesignCenterCms;
use App\Models\BlogManagement;
use App\Models\ServiceManagement;

class AdminController extends Controller
{
    public function bannerManagement(){
        $banners = Banner::orderBy('id', 'DESC')->get();
        return view('pages.banner')->with('banners', $banners);
    }

    public function addBanner($id=null){
        if ($id) {
            $banner = Banner::where('id', $id)->first();
            $title = "Edit Banner";
        }else {
            $banner = null;
            $title = "Add Banner";
        }
        return view("pages.add-banner")->with('banner', $banner)->with('title', $title);
    }

    public function addBannerImage(Request $request){
        if($request->bannerId){
            $request->validate([
                // 'right_align_text'=>'min:5',
                // 'left_align_text'=>'min:5',
            ]);
            $banner = Banner::where('id', $request->bannerId)->first();
            $updateData = [];

            $updateData['status']=$request->status;
            if ($request->file('image1')) {
                $imagePath1 = public_path('uploads/images/'.$banner->image1);
                if($banner->image1)
                $this->unlinkImage($imagePath1);
                $image1Name = $this->bannerImageUpload($request->image1, 1);
                $updateData['image1'] = $image1Name;
            }
            if ($request->file('image2')) {
                $imagePath2 = public_path('uploads/images/'.$banner->image2);
                if($banner->image2)
                $this->unlinkImage($imagePath2);
                $image2Name = $this->bannerImageUpload($request->image2, 2);
                $updateData['image2'] = $image2Name;
            }
            if ($request->file('image3')) {
                $imagePath3 = public_path('uploads/images/'.$banner->image3);
                if($banner->image3)
                $this->unlinkImage($imagePath3);
                $image3Name = $this->bannerImageUpload($request->image3, 3);
                $updateData['image3'] = $image3Name;
            }
            if ($request->file('image4')) {
                $imagePath4 = public_path('uploads/images/'.$banner->image4);
                if($banner->image4)
                $this->unlinkImage($imagePath4);
                $image4Name = $this->bannerImageUpload($request->image4, 4);
                $updateData['image4'] = $image4Name;
            }
            if ($request->file('image5')) {
                $imagePath5 = public_path('uploads/images/'.$banner->image5);
                if($banner->image5)
                $this->unlinkImage($imagePath5);
                $image5Name = $this->bannerImageUpload($request->image5, 5);
                $updateData['image5'] = $image5Name;
            }

            $updateData['right_align_text'] = $request->right_align_text;

            $updateData['left_align_text'] = $request->left_align_text;

            $updateData['bottom_text'] = $request->bottom_text;

            $updateData['type'] = $request->page_type;

            $res = Banner::where('id', $request->bannerId)->update($updateData);
            if($res){
                return redirect('/admin/banner-management')->with('success','Banner update successfully!');
            }else{
                return redirect('/admin/banner-management')->with('fail','Banner update faield!');
            }
        } else {
            $request->validate([
                // 'right_align_title'=>'min:5',
                // 'right_align_description'=>'min:5',
                // 'left_align_title'=>'min:5',
                // 'left_align_description'=>'min:5',
                'image1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image4' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image5' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $banner = new Banner();
            if ($request->file('image1')) {
                $image1Name = $this->bannerImageUpload($request->image1, 1);
                // $imageName = time() . '.' . $request->image->extension();
                // $request->image->move(public_path('uploads/images'), $imageName);
                 $banner->image1 = $image1Name;
            }
            if ($request->file('image2')) {
                $image2Name = $this->bannerImageUpload($request->image2, 2);
                 $banner->image2 = $image2Name;
            }
            if ($request->file('image3')) {
                $image3Name = $this->bannerImageUpload($request->image3, 3);
                 $banner->image3 = $image3Name;
            }
            if ($request->file('image4')) {
                $image4Name = $this->bannerImageUpload($request->image4, 4);
                 $banner->image4 = $image4Name;
            }
            if ($request->file('image5')) {
                $image5Name = $this->bannerImageUpload($request->image5, 5);
                 $banner->image5 = $image5Name;
            }
            if($request->right_align_text)
            $banner->right_align_text = $request->right_align_text;

            if($request->left_align_text)
            $banner->left_align_text = $request->left_align_text;

            if($request->bottom_text)
            $banner->bottom_text = $request->bottom_text;

            if($request->page_type)
            $banner->type = $request->page_type;

            $banner->status = 'on';

            $res = $banner->save();
            if($res){
                return redirect('/admin/banner-management')->with('success','Banner added successfully!');
            }else{
                return redirect('/admin/banner-management')->with('fail','Banner added faield!');
            }
        }
    }

    private function bannerImageUpload($file, $no){
        $imageName = time() . $no .'.' . $file->extension();
        $file->move(public_path('uploads/images'), $imageName);
        return $imageName;
    }

    public function deleteBanner($id){
        $banner = Banner::where('id', $id)->first();
        $imagePath1 = public_path('uploads/images/'.$banner->image1);
        $imagePath2 = public_path('uploads/images/'.$banner->image2);
        $imagePath3 = public_path('uploads/images/'.$banner->image3);
        $imagePath4 = public_path('uploads/images/'.$banner->image4);
        $imagePath5 = public_path('uploads/images/'.$banner->image5);
        if($banner->image1)
        $this->unlinkImage($imagePath1);
        if($banner->image2)
        $this->unlinkImage($imagePath2);
        if($banner->image3)
        $this->unlinkImage($imagePath3);
        if($banner->image4)
        $this->unlinkImage($imagePath4);
        if($banner->image5)
        $this->unlinkImage($imagePath5);

        Banner::where('id', $id)->delete();
        return redirect('/admin/banner-management')->with('success','Banner deleted successfully!');
    }

    public function unlinkImage($path){
        if(File::exists($path)){
            unlink($path);
        }
    }

    public function setting(){

        $user = User::where('id', '=', Session::get('loginUserId'))->first();
        $response = json_decode($user->footer_data);
        // print_r($response->content);die();
        return view("pages.setting.setting")->with('user', $response);
    }

    public function changePassword(Request $request){
        $request->validate([
            'oldPassword'=>'required|min:5|max:12',
            'newPassword'=>'required|min:5|max:12',
            'confirmPassword'=>'required|min:5|same:newPassword',
        ]);
        $adminId = $request->session()->get('loginUserId');
        $user = User::where('id', '=', $adminId)->first();
        if ($user) {
            if(Hash::check($request->oldPassword, $user->password)){
                if(!Hash::check($request->newPassword, $user->password)){
                    $newpassword = Hash::make($request->newPassword);
                    User::where('id', $adminId)->update(['password' => $newpassword]);
                    return back()->with('success','Password update successfully!');
                }else{
                    return back()->with('fail', 'Your old password and new password is same!');
                }
            }else{
                return back()->with('fail', 'Invalid old password!');
            }
        }
    }

    public function homePageFooterCms(){
        $homePageCms = HomePageCms::orderBy('id', 'DESC')->get();
        return view("pages.home-page-footer-cms")->with('homePageCms', $homePageCms);
    }

    public function addeditHomePageFooterCms($id=null){
        if ($id) {
            $homePageFooter = HomePageCms::where('id', $id)->first();
            $title = "Edit Home Page Footer CMS";
        }else {
            $homePageFooter = null;
            $title = "Add Home Page Footer CMS";
        }
        return view("pages.addedit-home-page-footer-cms")->with('homePageFooter', $homePageFooter)->with('title', $title);
    }

    public function addHomePageFooterCms(Request $request){
        if($request->id){
            $request->validate([
                'title'=>'required|min:5',
                'content1'=>'required|min:5',
                'content2'=>'required|min:5',
                'content3'=>'required|min:5',
                'content4'=>'required|min:5',
            ]);
            $updateData = [];
            $updateData['title'] = $request->title;
            $updateData['content1'] = $request->content1;
            $updateData['content2'] = $request->content2;
            $updateData['content3'] = $request->content3;
            $updateData['content4'] = $request->content4;
            $updateData['status']= $request->status;

            $res = HomePageCms::where('id', $request->id)->update($updateData);
            if($res){
                return redirect('/admin/home-page-footer-cms')->with('success','Data update successfully!');
            }else{
                return redirect('/admin/home-page-footer-cms')->with('fail','Data update faield!');
            }
        } else {
            $request->validate([
                'title'=>'required|min:5',
                'content1'=>'required|min:5',
                'content2'=>'required|min:5',
                'content3'=>'required|min:5',
                'content4'=>'required|min:5',
            ]);
            $homePageFooter = new HomePageCms();

            if($request->title)
            $homePageFooter->title = $request->title;

            if($request->content1)
            $homePageFooter->content1 = $request->content1;

            if($request->content2)
            $homePageFooter->content2 = $request->content2;

            if($request->content3)
            $homePageFooter->content3 = $request->content3;

            if($request->content4)
            $homePageFooter->content4 = $request->content4;

            $homePageFooter->status = 'on';

            $res = $homePageFooter->save();
            if($res){
                return redirect('/admin/home-page-footer-cms')->with('success','Data added successfully!');
            }else{
                return redirect('/admin/home-page-footer-cms')->with('fail','Data added faield!');
            }
        }
    }

    public function deleteHomePageFooterCms($id){
        HomePageCms::where('id', $id)->delete();
        return redirect('/admin/home-page-footer-cms')->with('success','Records deleted successfully!');
    }

    public function onMouceHoverManagement(){
        $pageMouces = PageOnMouceHover::orderBy('id', 'DESC')->get();
        return view("pages.on-mouce-hover-management")->with('pageMouces', $pageMouces);
    }

    public function fetchOnMouceHoverTitle(Request $request){
        $pageMouces = PageOnMouceHover::where('type', $request->page_type)->whereNotNull('heading')->first();
        return $pageMouces;
    }

    public function addMouceHoverCms($id=null){
        if ($id) {
            $pageMouce = PageOnMouceHover::where('id', $id)->first();
            $title = "Edit Mouce Hover Content";
        }else {
            $pageMouce = null;
            $title = "Add Mouce Hover Content";
        }
        return view("pages.addedit-mouce-hover-content")->with('pageMouce', $pageMouce)->with('title', $title);
    }

    public function addeditMouceHover(Request $request){
        if($request->id){
            $request->validate([
                'page_type'=>'required|min:2',
                // 'left_align_text'=>'min:5',
            ]);
            $onMouceHover = PageOnMouceHover::where('id', $request->id)->first();
            $updateData = [];
            $updateData['type'] = $request->page_type;

            if ($request->file('image1')) {
                $imagePath1 = public_path('uploads/images/'.$onMouceHover->image1);
                if($onMouceHover->image1)
                $this->unlinkImage($imagePath1);

                $image1Name = $this->bannerImageUpload($request->image1, 1);
                $updateData['image1'] = $image1Name;
            }
            if ($request->file('image2')) {
                $imagePath2 = public_path('uploads/images/'.$onMouceHover->image2);
                if($onMouceHover->image2)
                $this->unlinkImage($imagePath2);
                $image2Name = $this->bannerImageUpload($request->image2, 2);
                $updateData['image2'] = $image2Name;
            }
            if ($request->file('image3')) {
                $imagePath3 = public_path('uploads/images/'.$onMouceHover->image3);
                if($onMouceHover->image2)
                $this->unlinkImage($imagePath3);
                $image3Name = $this->bannerImageUpload($request->image3, 3);
                $updateData['image3'] = $image3Name;
            }
            if ($request->file('image4')) {
                $imagePath4 = public_path('uploads/images/'.$onMouceHover->image4);
                if($onMouceHover->image4)
                $this->unlinkImage($imagePath4);
                $image4Name = $this->bannerImageUpload($request->image4, 4);
                $updateData['image4'] = $image4Name;
            }
            if ($request->file('image5')) {
                $imagePath5 = public_path('uploads/images/'.$onMouceHover->image5);
                if($onMouceHover->image5)
                $this->unlinkImage($imagePath5);
                $image5Name = $this->bannerImageUpload($request->image5, 5);
                $updateData['image5'] = $image5Name;
            }
            if ($request->file('image6')) {
                $imagePath6 = public_path('uploads/images/'.$onMouceHover->image6);
                if($onMouceHover->image6)
                $this->unlinkImage($imagePath6);
                $image6Name = $this->bannerImageUpload($request->image6, 6);
                $updateData['image6'] = $image6Name;
            }
            $updateData['heading'] = $request->heading;
            $updateData['title'] = $request->title;
            $updateData['subtitle'] = $request->subtitle;
            $slug = Str::slug($request->title);
            $updateData['slug'] = $slug;
            $updateData['status']= $request->status;

            $res = PageOnMouceHover::where('id', $request->id)->update($updateData);
            if($res){
                return redirect('/admin/on-mouce-hover-management')->with('success','Mouce hover data update successfully!');
            }else{
                return redirect('/admin/on-mouce-hover-management')->with('fail','Mouce hover data update faield!');
            }
        } else {
            $request->validate([
                'page_type'=>'required|min:2',
                // 'right_align_description'=>'min:5',
                // 'left_align_title'=>'min:5',
                // 'left_align_description'=>'min:5',
                'image1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image4' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image5' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image6' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $onMouceHover = new PageOnMouceHover();
            if ($request->file('image1')) {
                $image1Name = $this->bannerImageUpload($request->image1, 1);
                 $onMouceHover->image1 = $image1Name;
            }
            if ($request->file('image2')) {
                $image2Name = $this->bannerImageUpload($request->image2, 2);
                 $onMouceHover->image2 = $image2Name;
            }
            if ($request->file('image3')) {
                $image3Name = $this->bannerImageUpload($request->image3, 3);
                 $onMouceHover->image3 = $image3Name;
            }
            if ($request->file('image4')) {
                $image4Name = $this->bannerImageUpload($request->image4, 4);
                 $onMouceHover->image4 = $image4Name;
            }
            if ($request->file('image5')) {
                $image5Name = $this->bannerImageUpload($request->image5, 5);
                 $onMouceHover->image5 = $image5Name;
            }
            if ($request->file('image6')) {
                $image6Name = $this->bannerImageUpload($request->image6, 6);
                 $onMouceHover->image6 = $image6Name;
            }

            if($request->heading)
            $onMouceHover->heading = $request->heading;

            if($request->title){
                $onMouceHover->title = $request->title;
                $slug = Str::slug($request->title);
                $onMouceHover->slug = $slug;
            }

            if($request->subtitle)
            $onMouceHover->subtitle = $request->subtitle;

            $onMouceHover->status = 'on';
            $onMouceHover->type = $request->page_type;
            $res = $onMouceHover->save();
            if($res){
                return redirect('/admin/on-mouce-hover-management')->with('success','Mouce Hover Data added successfully!');
            }else{
                return redirect('/admin/on-mouce-hover-management')->with('fail','Mouce Hover Data faield!');
            }
        }
    }
    public function deleteMouceHoverCms($id){
        $onMouceHover = PageOnMouceHover::where('id', $id)->first();
        $imagePath1 = public_path('uploads/images/'.$onMouceHover->image1);
        $imagePath2 = public_path('uploads/images/'.$onMouceHover->image2);
        $imagePath3 = public_path('uploads/images/'.$onMouceHover->image3);
        $imagePath4 = public_path('uploads/images/'.$onMouceHover->image4);
        $imagePath5 = public_path('uploads/images/'.$onMouceHover->image5);
        $imagePath6 = public_path('uploads/images/'.$onMouceHover->image6);
        if($onMouceHover->image1)
        $this->unlinkImage($imagePath1);
        if($onMouceHover->image2)
        $this->unlinkImage($imagePath2);
        if($onMouceHover->image3)
        $this->unlinkImage($imagePath3);
        if($onMouceHover->image4)
        $this->unlinkImage($imagePath4);
        if($onMouceHover->image5)
        $this->unlinkImage($imagePath5);
        if($onMouceHover->image6)
        $this->unlinkImage($imagePath6);

        PageOnMouceHover::where('id', $id)->delete();
        return redirect('/admin/on-mouce-hover-management')->with('success','On Mouce Hover CMS deleted successfully!');
    }

    public function formManagement(){
        $forms = Form::orderBy('id', 'DESC')->paginate(5);
        return view('pages.form')->with('forms', $forms);
    }

    public function deleteForm($id){
        Form::where('id', $id)->delete();
        return redirect('/admin/form-management')->with('success','Form deleted successfully!');
    }

    public function footerSetting(Request $request){
            // $request->validate([
            //     'page_type'=>'required|min:2',
            //     // 'left_align_text'=>'min:5',
            // ]);
            $adminId = $request->session()->get('loginUserId');
            $updateData = [];
            $updateData['content'] = $request->content;
            $updateData['phone'] = $request->phone;
            $updateData['email'] = $request->email;
            $updateData['fb_link'] = $request->fb_link;
            $updateData['twitter_link'] = $request->twitter_link;
            $updateData['linkedin_link']= $request->linkedin_link;
            $updateData['insta_link']= $request->insta_link;

            $res = User::where('id', $adminId)->update(['footer_data' => $updateData]);
            if($res){
                return redirect()->back()->with('success','Footer data update successfully!');
            }else{
                return redirect()->back()->with('fail','Footer data update faield!');
            }
    }

    public function designCenterCms(){
        $designCenterCms = DesignCenterCms::orderBy('id', 'DESC')->get();
        return view("pages.design-center-cms")->with('designCenterCms', $designCenterCms);
    }

    public function addeditDesignCenterCms($id=null){
        if ($id) {
            $designCenterCms = DesignCenterCms::where('id', $id)->first();
            $title = "Edit Design Center CMS";
        }else {
            $designCenterCms = null;
            $title = "Add Design Center CMS";
        }
        return view("pages.addedit-design-center-cms")->with('designCenterCms', $designCenterCms)->with('title', $title);
    }

    public function addEditDesignCenterCmsSave(Request $request){

        if($request->id){
            $request->validate([
                'title' => 'required|min:2',
                'category' => 'required',
                'tab' => 'required',
            ]);
            $designCenterCms = DesignCenterCms::where('id', $request->id)->first();
            $updateData = [];

            if ($request->file('thumbnail_image')) {
                $imagePath1 = public_path('uploads/images/'.$designCenterCms->thumbnail_image);
                if($designCenterCms->thumbnail_image)
                $this->unlinkImage($imagePath1);
                $image1Name = $this->bannerImageUpload($request->thumbnail_image, 1);
                $updateData['thumbnail_image'] = $image1Name;
            }

            $updateData['title'] = $request->title;
            $updateData['category'] = $request->category;
            $updateData['tab'] = $request->tab;
            $updateData['status']=$request->status;
            $res = DesignCenterCms::where('id', $request->id)->update($updateData);
            if($res){
                return redirect('/admin/design-center-cms')->with('success','Design Center CMS update successfully!');
            }else{
                return redirect('/admin/design-center-cms')->with('fail','Design Center CMS update faield!');
            }
        } else {
            $request->validate([
                'title' => 'required|min:2',
                'category' => 'required',
                'tab' => 'required',
                'thumbnail_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $designCenterCms = new DesignCenterCms();
            if ($request->file('thumbnail_image')) {
                $thumbnail_image = $this->bannerImageUpload($request->thumbnail_image, 1);
                 $designCenterCms->thumbnail_image = $thumbnail_image;
            }
            if($request->title)
            $designCenterCms->title = $request->title;
            $designCenterCms->category = $request->category;
            $designCenterCms->tab = $request->tab;
            $designCenterCms->status = 'on';

            $res = $designCenterCms->save();
            if($res){
                return redirect('/admin/design-center-cms')->with('success','Design Center CMS added successfully!');
            }else{
                return redirect('/admin/design-center-cms')->with('fail','Design Center CMS added faield!');
            }
        }
    }

    public function deleteDesignCenterCms($id){
        $designCenterCms = DesignCenterCms::where('id', $id)->first();
        $imagePath1 = public_path('uploads/images/'.$designCenterCms->thumbnail_image);

        if($designCenterCms->thumbnail_image)
        $this->unlinkImage($imagePath1);

        DesignCenterCms::where('id', $id)->delete();
        return redirect('/admin/design-center-cms')->with('success','Design Center CMS deleted successfully!');
    }

    public function pageContentManagement(){
        $blogManagements = BlogManagement::orderBy('id', 'DESC')->get();
        return view("pages.blog-management")->with('blogManagements', $blogManagements);
    }

    public function addeditBlogview($id=null){
        if ($id) {
            $blogManagement = BlogManagement::where('id', $id)->first();
            $title = "Edit Page Blog";
        }else {
            $blogManagement = null;
            $title = "Add Page Blog";
        }
        return view("pages.add-edit-blog")->with('blogManagement', $blogManagement)->with('title', $title);
    }

    public function addEditBlogSave(Request $request){

        if($request->id){
            $request->validate([
                'title'=>'required|min:5',
                'page_type'=>'required',
                'text_alignment'=>'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $blogManagement = BlogManagement::where('id', $request->id)->first();
            $updateData = [];
            if ($request->file('image')) {
                $imagePath1 = public_path('uploads/images/'.$blogManagement->image);
                if($blogManagement->image)
                $this->unlinkImage($imagePath1);
                $image1Name = $this->bannerImageUpload($request->image, 1);
                $updateData['image'] = $image1Name;
            }

            $updateData['title'] = $request->title;
            $updateData['type'] = $request->page_type;
            $updateData['text_alignment'] = $request->text_alignment;
            $updateData['description'] = $request->description;
            $updateData['content'] = $request->content;
            $updateData['status']=$request->status;
            $res = BlogManagement::where('id', $request->id)->update($updateData);
            if($res){
                return redirect('/admin/page-content-management')->with('success','Page Content update successfully!');
            }else{
                return redirect('/admin/page-content-management')->with('fail','Page Content update failed!');
            }
        } else {
            $request->validate([
                'title'=>'required|min:5',
                'page_type'=>'required',
                'text_alignment'=>'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $blogManagement = new BlogManagement();
            if ($request->file('image')) {
                $image = $this->bannerImageUpload($request->image, 1);
                 $blogManagement->image = $image;
            }
            if($request->title)
            $blogManagement->title = $request->title;
            $blogManagement->type = $request->page_type;
            $blogManagement->text_alignment = $request->text_alignment;
            $blogManagement->description = $request->description;
            $blogManagement->content = $request->content;
            $blogManagement->status = 'on';
            $res = $blogManagement->save();
            if($res){
                return redirect('/admin/page-content-management')->with('success','Page Content added successfully!');
            }else{
                return redirect('/admin/page-content-management')->with('fail','Page Content added failed!');
            }
        }
    }

    public function deleteBlog($id){
        $blogManagement = BlogManagement::where('id', $id)->first();
        $imagePath1 = public_path('uploads/images/'.$blogManagement->image);

        if($blogManagement->image)
        $this->unlinkImage($imagePath1);

        BlogManagement::where('id', $id)->delete();
        return redirect('/admin/page-content-management')->with('success','Blog deleted successfully!');
    }

    public function serviceManagement(){
        $serviceManagements = ServiceManagement::orderBy('id', 'DESC')->get();
        return view("pages.service-management")->with('serviceManagements', $serviceManagements);
    }

    public function addeditSericeView($id=null){
        if ($id) {
            $serviceManagement = ServiceManagement::where('id', $id)->first();
            $title = "Edit Service";
        }else {
            $serviceManagement = null;
            $title = "Add Service";
        }
        $slugs = PageOnMouceHover::select('slug')->where('type', 'home')->whereNotNull('slug')->get();
        return view("pages.add-edit-service")->with('serviceManagement', $serviceManagement)->with('title', $title)->with('slugs', $slugs);
    }

    public function addUpdateService(Request $request){

        if($request->id){
            $request->validate([
                'slug'=>'required',
                'content'=>'required',
            ]);
            $updateData = [];
            $updateData['slug'] = $request->slug;
            $updateData['content'] = $request->content;
            $res = ServiceManagement::where('id', $request->id)->update($updateData);
            if($res){
                return redirect('/admin/service-management')->with('success','Service update successfully!');
            }else{
                return redirect('/admin/service-management')->with('fail','Service update faield!');
            }
        } else {
            $request->validate([
                'slug'=>'required',
                'content'=>'required',
            ]);
            $serviceManagement = new ServiceManagement();
            $serviceManagement->slug = $request->slug;
            $serviceManagement->content = $request->content;
            $res = $serviceManagement->save();
            if($res){
                return redirect('/admin/service-management')->with('success','Service added successfully!');
            }else{
                return redirect('/admin/service-management')->with('fail','Service added faield!');
            }
        }
    }
    public function deleteService($id){
        ServiceManagement::where('id', $id)->delete();
        return redirect('/admin/service-management')->with('success','Service deleted successfully!');
    }
    public function removeImage(Request $request){
        if($request->table == 'banners'){
            $banner = Banner::where('id', $request->id)->get();
                $imagePath = public_path('uploads/images/'.$banner[0][$request->columnName]);
                //print_r($imagePath);
                if($banner[0][$request->columnName])
                $this->unlinkImage($imagePath);
                $updateData[$request->columnName] = null;
                $res = Banner::where('id', $request->id)->update($updateData);
                if($res)
                return true;
                else
                return false;
        }
        if($request->table == 'page_on_mouce_hovers'){
            $page_on_mouce_hovers = PageOnMouceHover::where('id', $request->id)->get();
                $imagePath = public_path('uploads/images/'.$page_on_mouce_hovers[0][$request->columnName]);
                //print_r($imagePath);
                if($page_on_mouce_hovers[0][$request->columnName])
                $this->unlinkImage($imagePath);
                $updateData[$request->columnName] = null;
                $res = PageOnMouceHover::where('id', $request->id)->update($updateData);
                if($res)
                return true;
                else
                return false;
        }
        if($request->table == 'blog_management'){
            $blogManagement = BlogManagement::where('id', $request->id)->get();
                $imagePath = public_path('uploads/images/'.$blogManagement[0][$request->columnName]);
                //print_r($imagePath);
                if($blogManagement[0][$request->columnName])
                $this->unlinkImage($imagePath);
                $updateData[$request->columnName] = null;
                $res = BlogManagement::where('id', $request->id)->update($updateData);
                if($res)
                return true;
                else
                return false;
        }
        if($request->table == 'design_center_cms'){
            $designCenterCms = DesignCenterCms::where('id', $request->id)->get();
                $imagePath = public_path('uploads/images/'.$designCenterCms[0][$request->columnName]);
                //print_r($imagePath);
                if($designCenterCms[0][$request->columnName])
                $this->unlinkImage($imagePath);
                $updateData[$request->columnName] = null;
                $res = DesignCenterCms::where('id', $request->id)->update($updateData);
                if($res)
                return true;
                else
                return false;
        }
    }
}
