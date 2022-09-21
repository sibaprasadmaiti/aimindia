<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Organisation;
use App\Models\Testimonials;
use App\Models\Gallery;
use App\Models\OurTeam;
use App\Models\Cms;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\SiteSetting;
use App\Models\Banner;
use App\Models\Activity;

class AdminController extends Controller
{
    //helper function start
    private function imageUpload($file, $no)
    {
        $imageName = time() . $no . '.' . $file->extension();
        $file->move(public_path('uploads/images'), $imageName);
        return $imageName;
    }
    public function unlinkImage($path)
    {
        if (File::exists($path)) {
            unlink($path);
        }
    }
    public function removeImage(Request $request)
    {
        if ($request->table == 'Organisation')
            $data = Organisation::where('id', $request->id)->get();
        if ($request->table == 'Testimonials')
            $data = Testimonials::where('id', $request->id)->get();
        if ($request->table == 'Galleries')
            $data = Gallery::where('id', $request->id)->get();
        if ($request->table == 'OurTeam')
            $data = OurTeam::where('id', $request->id)->get();
        if ($request->table == 'Cms')
            $data = Cms::where('id', $request->id)->get();
        if ($request->table == 'Blog')
            $data = Blog::where('id', $request->id)->get();
        if ($request->table == 'Banners')
            $data = Banner::where('id', $request->id)->get();
        if ($request->table == 'Activities')
            $data = Activity::where('id', $request->id)->get();

        $imagePath = public_path('uploads/images/' . $data[0][$request->columnName]);
        if ($data[0][$request->columnName])
            $this->unlinkImage($imagePath);
        $updateData[$request->columnName] = null;

        if ($request->table == 'Organisation')
            $res = Organisation::where('id', $request->id)->update($updateData);
        if ($request->table == 'Testimonials')
            $res = Testimonials::where('id', $request->id)->update($updateData);
        if ($request->table == 'Galleries')
            $res = Gallery::where('id', $request->id)->update($updateData);
        if ($request->table == 'OurTeam')
            $res = OurTeam::where('id', $request->id)->update($updateData);
        if ($request->table == 'Cms')
            $res = Cms::where('id', $request->id)->update($updateData);
        if ($request->table == 'Blog')
            $res = Blog::where('id', $request->id)->update($updateData);
        if ($request->table == 'Banners')
            $res = Banner::where('id', $request->id)->update($updateData);
        if ($request->table == 'Activities')
            $res = Activity::where('id', $request->id)->update($updateData);

        if ($res)
            return true;
        else
            return false;
    }
    public function fetchTestimonialTitle(Request $request)
    {
        $data = Testimonials::select('testimonial_section_title')->orderBy('id', 'ASC')->first();
        return $data;
    }
    public function fetchTeamSectionTitle(Request $request)
    {
        $data = OurTeam::select('team_section_title')->orderBy('id', 'ASC')->first();
        return $data;
    }
    public function fetchBlogHeading(Request $request)
    {
        $data = Blog::select('blog_heading')->orderBy('id', 'ASC')->first();
        return $data;
    }
    public function fetchActivitiesHeading(Request $request)
    {
        $data = Activity::select('activities_heading')->orderBy('id', 'ASC')->first();
        return $data;
    }
    public function fetchGallerySectionTitle(Request $request)
    {
        $data = Gallery::select('gallery_section_title')->orderBy('id', 'ASC')->first();
        return $data;
    }


    // organisation start
    public function organisation()
    {
        $organisations = Organisation::orderBy('id', 'DESC')->get();
        return view('pages.organisation')->with('organisations', $organisations);
    }

    public function addOrganisation($id = null)
    {
        if ($id) {
            $organisation = Organisation::where('id', $id)->first();
            $title = "Edit Organisation";
        } else {
            $organisation = null;
            $title = "Add Organisation";
        }

        return view("pages.add-organisation")->with('organisation', $organisation)->with('title', $title);
    }

    public function saveOrganisation(Request $request)
    {
        $request->validate([
            'about_section_title' => 'required|min:5',
            'about_section_image1' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'about_section_image2' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'fact_counter_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'legal_section_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if ($request->id) {

            $organisation = Organisation::where('id', $request->id)->first();
            $updateData = [];
            if ($request->file('about_section_image1')) {
                $imagePath = public_path('uploads/images/' . $organisation->about_section_image1);
                if ($organisation->about_section_image1)
                    $this->unlinkImage($imagePath);
                $imageName = $this->imageUpload($request->about_section_image1, 1);
                $updateData['about_section_image1'] = $imageName;
            }
            if ($request->file('about_section_image2')) {
                $imagePath = public_path('uploads/images/' . $organisation->about_section_image2);
                if ($organisation->about_section_image2)
                    $this->unlinkImage($imagePath);
                $imageName = $this->imageUpload($request->about_section_image2, 2);
                $updateData['about_section_image2'] = $imageName;
            }
            if ($request->file('fact_counter_image')) {
                $imagePath = public_path('uploads/images/' . $organisation->fact_counter_image);
                if ($organisation->fact_counter_image)
                    $this->unlinkImage($imagePath);
                $imageName = $this->imageUpload($request->fact_counter_image, 3);
                $updateData['fact_counter_image'] = $imageName;
            }
            if ($request->file('legal_section_image')) {
                $imagePath = public_path('uploads/images/' . $organisation->legal_section_image);
                if ($organisation->legal_section_image)
                    $this->unlinkImage($imagePath);
                $imageName = $this->imageUpload($request->legal_section_image, 4);
                $updateData['legal_section_image'] = $imageName;
            }

            $updateData['about_section_title'] = $request->about_section_title;
            $updateData['about_section_video_link'] = $request->about_section_video_link;
            $updateData['about_section_description'] = $request->about_section_description;
            $updateData['fact_counter1'] = $request->fact_counter1;
            $updateData['fact_counter1_title'] = $request->fact_counter1_title;
            $updateData['fact_counter2'] = $request->fact_counter2;
            $updateData['fact_counter2_title'] = $request->fact_counter2_title;
            $updateData['fact_counter3'] = $request->fact_counter3;
            $updateData['fact_counter3_title'] = $request->fact_counter3_title;
            $updateData['legal_section_title'] = $request->legal_section_title;
            $updateData['legal_section_description'] = $request->legal_section_description;
            $updateData['legal_section_image_title'] = $request->legal_section_image_title;
            $updateData['status'] = $request->status;

            $res = Organisation::where('id', $request->id)->update($updateData);
            if ($res) {
                return redirect('/admin/organisation')->with('success', 'Organisation update successfully!');
            } else {
                return redirect('/admin/organisation')->with('fail', 'Organisation update faield!');
            }
        } else {
            $Organisation = new Organisation();
            if ($request->file('about_section_image1')) {
                $imageName = $this->imageUpload($request->about_section_image1, 1);
                // $imageName = time() . '.' . $request->image->extension();
                // $request->image->move(public_path('uploads/images'), $imageName);
                $Organisation->about_section_image1 = $imageName;
            }
            if ($request->file('about_section_image2')) {
                $imageName = $this->imageUpload($request->about_section_image2, 2);
                $Organisation->about_section_image2 = $imageName;
            }
            if ($request->file('fact_counter_image')) {
                $imageName = $this->imageUpload($request->fact_counter_image, 3);
                $Organisation->fact_counter_image = $imageName;
            }
            if ($request->file('legal_section_image')) {
                $imageName = $this->imageUpload($request->legal_section_image, 4);
                $Organisation->legal_section_image = $imageName;
            }


            if ($request->about_section_video_link)
                $Organisation->about_section_video_link = $request->about_section_video_link;

            if ($request->about_section_title)
                $Organisation->about_section_title = $request->about_section_title;

            if ($request->about_section_description)
                $Organisation->about_section_description = $request->about_section_description;

            if ($request->fact_counter1)
                $Organisation->fact_counter1 = $request->fact_counter1;

            if ($request->fact_counter1_title)
                $Organisation->fact_counter1_title = $request->fact_counter1_title;

            if ($request->fact_counter2)
                $Organisation->fact_counter2 = $request->fact_counter2;

            if ($request->fact_counter2_title)
                $Organisation->fact_counter2_title = $request->fact_counter2_title;

            if ($request->fact_counter3)
                $Organisation->fact_counter3 = $request->fact_counter3;

            if ($request->fact_counter3_title)
                $Organisation->fact_counter3_title = $request->fact_counter3_title;

            if ($request->legal_section_title)
                $Organisation->legal_section_title = $request->legal_section_title;

            if ($request->legal_section_description)
                $Organisation->legal_section_description = $request->legal_section_description;

            if ($request->legal_section_image_title)
                $Organisation->legal_section_image_title = $request->legal_section_image_title;

            $Organisation->status = 'ACTIVE';

            $res = $Organisation->save();
            if ($res) {
                return redirect('/admin/organisation')->with('success', 'Organisation added successfully!');
            } else {
                return redirect('/admin/organisation')->with('fail', 'Organisation added faield!');
            }
        }
    }

    public function deleteOrganisation($id)
    {
        $organisation = Organisation::where('id', $id)->first();
        if ($organisation->about_section_image1) {
            $imagePath1 = public_path('uploads/images/' . $organisation->about_section_image1);
            $this->unlinkImage($imagePath1);
        }
        if ($organisation->about_section_image2) {
            $imagePath2 = public_path('uploads/images/' . $organisation->about_section_image2);
            $this->unlinkImage($imagePath2);
        }
        if ($organisation->fact_counter_image) {
            $imagePath3 = public_path('uploads/images/' . $organisation->fact_counter_image);
            $this->unlinkImage($imagePath3);
        }
        if ($organisation->legal_section_image) {
            $imagePath4 = public_path('uploads/images/' . $organisation->legal_section_image);
            $this->unlinkImage($imagePath4);
        }

        Organisation::where('id', $id)->delete();
        return redirect('/admin/organisation')->with('success', 'Organisation deleted successfully!');
    }

    // testimonial start
    public function testimonial()
    {
        $testimonials = Testimonials::orderBy('sequence', 'DESC')->get();
        return view('pages.testimonial')->with('testimonials', $testimonials);
    }

    public function addTestimonial($id = null)
    {
        if ($id) {
            $testimonial = Testimonials::where('id', $id)->first();
            $title = "Edit Testimonial";
        } else {
            $testimonial = null;
            $title = "Add Testimonial";
        }

        return view("pages.add-testimonial")->with('testimonial', $testimonial)->with('title', $title);
    }

    public function saveTestimonial(Request $request)
    {
        $request->validate([
            'testimonial_section_title' => 'required|min:5',
            'testimonial_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if ($request->id) {
            $testimonial = Testimonials::where('id', $request->id)->first();
            $updateData = [];
            if ($request->file('testimonial_image')) {
                $imagePath = public_path('uploads/images/' . $testimonial->testimonial_image);
                if ($testimonial->testimonial_image)
                    $this->unlinkImage($imagePath);
                $imageName = $this->imageUpload($request->testimonial_image, 1);
                $updateData['testimonial_image'] = $imageName;
            }
            $updateData['testimonial_section_title'] = $request->testimonial_section_title;
            $updateData['testimonial_comment'] = $request->testimonial_comment;
            $updateData['testimonial_name'] = $request->testimonial_name;
            $updateData['testimonial_location'] = $request->testimonial_location;
            $updateData['sequence'] = $request->sequence;
            $updateData['status'] = $request->status;

            $res = Testimonials::where('id', $request->id)->update($updateData);
            if ($res) {
                return redirect('/admin/testimonial')->with('success', 'Testimonial update successfully!');
            } else {
                return redirect('/admin/testimonial')->with('fail', 'Testimonial update faield!');
            }
        } else {
            $testimonial = new Testimonials();
            if ($request->file('testimonial_image')) {
                $imageName = $this->imageUpload($request->testimonial_image, 1);
                $testimonial->testimonial_image = $imageName;
            }
            if ($request->testimonial_section_title)
                $testimonial->testimonial_section_title = $request->testimonial_section_title;

            if ($request->testimonial_comment)
                $testimonial->testimonial_comment = $request->testimonial_comment;

            if ($request->testimonial_name)
                $testimonial->testimonial_name = $request->testimonial_name;

            if ($request->testimonial_location)
                $testimonial->testimonial_location = $request->testimonial_location;

            if ($request->sequence)
                $testimonial->sequence = $request->sequence;

            $testimonial->status = 'ACTIVE';

            $res = $testimonial->save();
            if ($res) {
                return redirect('/admin/testimonial')->with('success', 'Testimonial added successfully!');
            } else {
                return redirect('/admin/testimonial')->with('fail', 'Testimonial added faield!');
            }
        }
    }

    public function deleteTestimonial($id)
    {
        $testimonial = Testimonials::where('id', $id)->first();
        if ($testimonial->testimonial_image) {
            $imagePath1 = public_path('uploads/images/' . $testimonial->testimonial_image);
            $this->unlinkImage($imagePath1);
        }

        Testimonials::where('id', $id)->delete();
        return redirect('/admin/testimonial')->with('success', 'Testimonial deleted successfully!');
    }

    // gallery start
    public function gallery()
    {
        $galleries = Gallery::orderBy('sequence', 'DESC')->get();
        return view('pages.gallery')->with('galleries', $galleries);
    }
    public function addGallery($id = null)
    {
        if ($id) {
            $gallery = Gallery::where('id', $id)->first();
            $title = "Edit Gallery";
        } else {
            $gallery = null;
            $title = "Add Gallery";
        }

        return view("pages.add-gallery")->with('gallery', $gallery)->with('title', $title);
    }
    public function saveGallery(Request $request)
    {

        if ($request->id) {
            $request->validate([
                'gallery_section_title' => 'required|min:5',
                'gallery_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            $gallery = Gallery::where('id', $request->id)->first();
            $updateData = [];
            if ($request->file('gallery_image')) {
                $imagePath = public_path('uploads/images/' . $gallery->gallery_image);
                if ($gallery->gallery_image)
                    $this->unlinkImage($imagePath);
                $imageName = $this->imageUpload($request->gallery_image, 1);
                $updateData['gallery_image'] = $imageName;
            }
            $updateData['gallery_section_title'] = $request->gallery_section_title;
            $updateData['gallery_title'] = $request->gallery_title;
            $updateData['sequence'] = $request->sequence;
            $updateData['status'] = $request->status;

            $res = Gallery::where('id', $request->id)->update($updateData);
            if ($res) {
                return redirect('/admin/gallery')->with('success', 'Gallery update successfully!');
            } else {
                return redirect('/admin/gallery')->with('fail', 'Gallery update faield!');
            }
        } else {
            $request->validate([
                'gallery_section_title' => 'required|min:5',
                'gallery_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            $gallery = new Gallery();
            if ($request->file('gallery_image')) {
                // for ($i = 0; $i < count($request->gallery_image); $i++) {

                $imageName = $this->imageUpload($request->gallery_image, 1);
                $gallery->gallery_image = $imageName;
            }
            if ($request->gallery_section_title)
                $gallery->gallery_section_title = $request->gallery_section_title;
            if ($request->gallery_title)
                $gallery->gallery_title = $request->gallery_title;
            if ($request->sequence)
                $gallery->sequence = $request->sequence;

            $gallery->status = 'ACTIVE';
            $res = $gallery->save();
            // }


            if ($res) {
                return redirect('/admin/gallery')->with('success', 'Gallery added successfully!');
            } else {
                return redirect('/admin/gallery')->with('fail', 'Gallery added faield!');
            }
        }
    }
    public function deleteGallery($id)
    {
        $gallery = Gallery::where('id', $id)->first();
        if ($gallery->gallery_image) {
            $imagePath1 = public_path('uploads/images/' . $gallery->gallery_image);
            $this->unlinkImage($imagePath1);
        }

        Gallery::where('id', $id)->delete();
        return redirect('/admin/gallery')->with('success', 'Gallery deleted successfully!');
    }

    // Our Team start
    public function ourTeam()
    {
        $ourTeams = OurTeam::orderBy('sequence', 'DESC')->get();
        $title = "Our Team Management List";
        return view('pages.our-team')->with('ourTeams', $ourTeams)->with('title', $title);;
    }
    public function addOurTeam($id = null)
    {
        if ($id) {
            $ourTeam = OurTeam::where('id', $id)->first();
            $title = "Edit Team Member";
        } else {
            $ourTeam = null;
            $title = "Add Team Member";
        }

        return view("pages.add-our-team")->with('ourTeam', $ourTeam)->with('title', $title);
    }
    public function saveOurTeam(Request $request)
    {
        $request->validate([
            'team_section_title' => 'required|min:5',
            'team_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if ($request->id) {
            $team = OurTeam::where('id', $request->id)->first();
            $updateData = [];
            if ($request->file('team_image')) {
                $imagePath = public_path('uploads/images/' . $team->team_image);
                if ($team->team_image)
                    $this->unlinkImage($imagePath);
                $imageName = $this->imageUpload($request->team_image, 1);
                $updateData['team_image'] = $imageName;
            }
            $updateData['team_section_title'] = $request->team_section_title;
            $updateData['team_position'] = $request->team_position;
            $updateData['team_name'] = $request->team_name;
            $updateData['team_email'] = $request->team_email;
            $updateData['team_phone'] = $request->team_phone;
            $updateData['team_pinterest_link'] = $request->team_pinterest_link;
            $updateData['team_twitter_link'] = $request->team_twitter_link;
            $updateData['team_facebook_link'] = $request->team_facebook_link;
            $updateData['sequence'] = $request->sequence;
            $updateData['status'] = $request->status;

            $res = OurTeam::where('id', $request->id)->update($updateData);
            if ($res) {
                return redirect('/admin/our-team')->with('success', 'Team member update successfully!');
            } else {
                return redirect('/admin/our-team')->with('fail', 'Team member update faield!');
            }
        } else {
            $team = new OurTeam();
            if ($request->file('team_image')) {
                $imageName = $this->imageUpload($request->team_image, 1);
                $team->team_image = $imageName;
            }
            if ($request->team_section_title)
                $team->team_section_title = $request->team_section_title;

            if ($request->team_name)
                $team->team_name = $request->team_name;

            if ($request->team_position)
                $team->team_position = $request->team_position;

            if ($request->team_email)
                $team->team_email = $request->team_email;

            if ($request->team_phone)
                $team->team_phone = $request->team_phone;

            if ($request->team_pinterest_link)
                $team->team_pinterest_link = $request->team_pinterest_link;

            if ($request->team_twitter_link)
                $team->team_twitter_link = $request->team_twitter_link;

            if ($request->team_facebook_link)
                $team->team_facebook_link = $request->team_facebook_link;

            if ($request->sequence)
                $team->sequence = $request->sequence;

            $team->status = 'ACTIVE';

            $res = $team->save();
            if ($res) {
                return redirect('/admin/our-team')->with('success', 'Team member added successfully!');
            } else {
                return redirect('/admin/our-team')->with('fail', 'Team member added faield!');
            }
        }
    }
    public function deleteOurTeam($id)
    {
        $team = OurTeam::where('id', $id)->first();
        if ($team->team_image) {
            $imagePath1 = public_path('uploads/images/' . $team->team_image);
            $this->unlinkImage($imagePath1);
        }

        OurTeam::where('id', $id)->delete();
        return redirect('/admin/our-team')->with('success', 'Team member deleted successfully!');
    }

    // CMS
    public function cms()
    {
        $cmss = Cms::orderBy('id', 'DESC')->get();
        $title = "CMS Management List";
        return view('pages.cms')->with('cmss', $cmss)->with('title', $title);;
    }
    public function addCms($id = null)
    {
        if ($id) {
            $cms = Cms::where('id', $id)->first();
            $title = "Edit CMS";
        } else {
            $cms = null;
            $title = "Add CMS";
        }

        return view("pages.add-cms")->with('cms', $cms)->with('title', $title);
    }
    public function saveCms(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'menu_name' => 'required|min:3',
            'title' => 'required|min:5',
            'content' => 'required|min:5',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if ($request->id) {
            $cms = Cms::where('id', $request->id)->first();
            $updateData = [];
            if ($request->file('image')) {
                $imagePath = public_path('uploads/images/' . $cms->image);
                if ($cms->image)
                    $this->unlinkImage($imagePath);
                $imageName = $this->imageUpload($request->image, 1);
                $updateData['image'] = $imageName;
            }
            $updateData['title'] = $request->title;
            $updateData['type'] = $request->type;
            $updateData['menu_name'] = $request->menu_name;
            $updateData['short_description'] = $request->short_description;
            $updateData['content'] = $request->content;
            $updateData['video_link'] = $request->video_link;
            $updateData['status'] = $request->status;

            $res = Cms::where('id', $request->id)->update($updateData);
            if ($res) {
                return redirect('/admin/cms')->with('success', 'CMS content update successfully!');
            } else {
                return redirect('/admin/cms')->with('fail', 'CMS content update faield!');
            }
        } else {
            $cms = new Cms();
            if ($request->file('image')) {
                $imageName = $this->imageUpload($request->image, 1);
                $cms->image = $imageName;
            }
            if ($request->title) {
                $slug = Str::slug($request->title);
                $cms->title = $request->title;
                $cms->slug = $slug;
            }

            if ($request->type)
                $cms->type = $request->type;

            if ($request->menu_name)
                $cms->menu_name = $request->menu_name;

            if ($request->short_description)
                $cms->short_description = $request->short_description;

            if ($request->content)
                $cms->content = $request->content;

            if ($request->video_link)
                $cms->video_link = $request->video_link;

            $cms->status = 'ACTIVE';

            $res = $cms->save();
            if ($res) {
                return redirect('/admin/cms')->with('success', 'CMS content added successfully!');
            } else {
                return redirect('/admin/cms')->with('fail', 'CMS content added faield!');
            }
        }
    }
    public function deleteCms($id)
    {
        $cms = Cms::where('id', $id)->first();
        if ($cms->image) {
            $imagePath1 = public_path('uploads/images/' . $cms->image);
            $this->unlinkImage($imagePath1);
        }

        Cms::where('id', $id)->delete();
        return redirect('/admin/cms')->with('success', 'CMS content deleted successfully!');
    }

    // Blog
    public function blog()
    {
        $blogs = Blog::orderBy('id', 'DESC')->get();
        $title = "Blog Management List";
        return view('pages.blog')->with('blogs', $blogs)->with('title', $title);;
    }
    public function addBlog($id = null)
    {
        if ($id) {
            $blog = Blog::where('id', $id)->first();
            $title = "Edit Blog";
        } else {
            $blog = null;
            $title = "Add Blog";
        }
        $cmss = Cms::select('menu_name')->where('type', 'our-work')->orderBy('menu_name', 'ASC')->get();
        return view("pages.add-blog")->with('blog', $blog)->with('title', $title)->with('cmss', $cmss);
    }
    public function saveBlog(Request $request)
    {
        $request->validate([
            'blog_heading' => 'required|min:3',
            'activities_title' => 'required|min:5',
            'blog_content' => 'required|min:5',
            'blog_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if ($request->id) {
            $blog = Blog::where('id', $request->id)->first();
            $updateData = [];
            if ($request->file('blog_image')) {
                $imagePath = public_path('uploads/images/' . $blog->blog_image);
                if ($blog->blog_image)
                    $this->unlinkImage($imagePath);
                $imageName = $this->imageUpload($request->blog_image, 1);
                $updateData['blog_image'] = $imageName;
            }
            $updateData['blog_heading'] = $request->blog_heading;
            $updateData['blog_title'] = $request->blog_title;
            $updateData['blog_content'] = $request->blog_content;
            $updateData['blog_comment'] = $request->blog_comment;
            $updateData['blog_posted_by'] = $request->blog_posted_by;
            $updateData['blog_category'] = $request->blog_category;
            $updateData['blog_posted_date'] = $request->blog_posted_date;
            $updateData['sequence'] = $request->sequence;
            $updateData['status'] = $request->status;

            $res = Blog::where('id', $request->id)->update($updateData);
            if ($res) {
                return redirect('/admin/blog')->with('success', 'Blog update successfully!');
            } else {
                return redirect('/admin/blog')->with('fail', 'Blog update faield!');
            }
        } else {
            $blog = new Blog();
            if ($request->file('blog_image')) {
                $imageName = $this->imageUpload($request->blog_image, 1);
                $blog->blog_image = $imageName;
            }
            if ($request->blog_heading) {
                $blog->blog_heading = $request->blog_heading;
            }
            if ($request->blog_title) {
                $blog->blog_title = $request->blog_title;
            }

            if ($request->blog_content)
                $blog->blog_content = $request->blog_content;

            if ($request->blog_category)
                $blog->blog_category = $request->blog_category;

            if ($request->blog_comment)
                $blog->blog_comment = $request->blog_comment;

            if ($request->blog_posted_by)
                $blog->blog_posted_by = $request->blog_posted_by;

            if ($request->blog_category)
                $blog->blog_category = $request->blog_category;

            if ($request->blog_posted_date)
                $blog->blog_posted_date = $request->blog_posted_date;

            if ($request->sequence)
                $blog->sequence = $request->sequence;

            $blog->status = 'ACTIVE';

            $res = $blog->save();
            if ($res) {
                return redirect('/admin/blog')->with('success', 'Blog added successfully!');
            } else {
                return redirect('/admin/blog')->with('fail', 'Blog added faield!');
            }
        }
    }
    public function deleteBlog($id)
    {
        $blog = Blog::where('id', $id)->first();
        if ($blog->blog_image) {
            $imagePath1 = public_path('uploads/images/' . $blog->blog_image);
            $this->unlinkImage($imagePath1);
        }

        Blog::where('id', $id)->delete();
        return redirect('/admin/blog')->with('success', 'Blog deleted successfully!');
    }

    //Activity
    public function activities()
    {
        $activities = Activity::orderBy('id', 'DESC')->get();
        $title = "Activity Management List";
        return view('pages.activities')->with('activities', $activities)->with('title', $title);;
    }
    public function addActivities($id = null)
    {
        if ($id) {
            $activity = Activity::where('id', $id)->first();
            $title = "Edit Activity";
        } else {
            $activity = null;
            $title = "Add Activity";
        }

        return view("pages.add-activities")->with('activities', $activity)->with('title', $title);
    }
    public function saveActivities(Request $request)
    {
        $request->validate([
            'activities_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'activities_title' => 'required|min:3',
            'activities_content' => 'required|min:5',
        ]);
        if ($request->id) {
            $activity = Activity::where('id', $request->id)->first();
            $updateData = [];
            if ($request->file('activities_image')) {
                $imagePath = public_path('uploads/images/' . $activity->activities_image);
                if ($activity->activities_image)
                    $this->unlinkImage($imagePath);
                $imageName = $this->imageUpload($request->activities_image, 1);
                $updateData['activities_image'] = $imageName;
            }
            $updateData['activities_heading'] = $request->activities_heading;
            $updateData['activities_title'] = $request->activities_title;
            $updateData['activities_content'] = $request->activities_content;
            $updateData['activities_date'] = $request->activities_date;
            $updateData['sequence'] = $request->sequence;
            $updateData['status'] = $request->status;

            $res = Activity::where('id', $request->id)->update($updateData);
            if ($res) {
                return redirect('/admin/activities')->with('success', 'Activity update successfully!');
            } else {
                return redirect('/admin/activities')->with('fail', 'Activity update faield!');
            }
        } else {
            $activity = new Activity();
            if ($request->file('activities_image')) {
                $imageName = $this->imageUpload($request->activities_image, 1);
                $activity->activities_image = $imageName;
            }
            if ($request->activities_heading) {
                $activity->activities_heading = $request->activities_heading;
            }
            if ($request->activities_title) {
                $activity->activities_title = $request->activities_title;
            }

            if ($request->activities_content)
                $activity->activities_content = $request->activities_content;

            if ($request->activities_date)
                $activity->activities_date = $request->activities_date;

            if ($request->sequence)
                $activity->sequence = $request->sequence;

            $activity->status = 'ACTIVE';

            $res = $activity->save();
            if ($res) {
                return redirect('/admin/activities')->with('success', 'Activity added successfully!');
            } else {
                return redirect('/admin/activities')->with('fail', 'Activity added faield!');
            }
        }
    }
    public function deleteActivities($id)
    {
        $activity = Activity::where('id', $id)->first();
        if ($activity->activities_image) {
            $imagePath1 = public_path('uploads/images/' . $activity->activities_image);
            $this->unlinkImage($imagePath1);
        }

        Activity::where('id', $id)->delete();
        return redirect('/admin/activities')->with('success', 'Activity deleted successfully!');
    }

    //Contact & Subscribe
    public function contact()
    {
        $contacts = Contact::orderBy('id', 'DESC')->get();
        $title = "Contact & Subscribe Management List";
        return view('pages.contact')->with('contacts', $contacts)->with('title', $title);;
    }
    public function addContact($id = null)
    {
        if ($id) {
            $contact = Contact::where('id', $id)->first();
            $title = "Edit Contact";
        } else {
            $contact = null;
            $title = "Add Contact";
        }

        return view("pages.add-contact")->with('contact', $contact)->with('title', $title);
    }
    public function saveContact(Request $request)
    {
        $request->validate([
            'type' => 'required|min:3',
            'contact_name' => 'required|min:5',
            'contact_email' => 'required|min:5',
        ]);
        if ($request->id) {
            $contact = Contact::where('id', $request->id)->first();
            $updateData = [];
            $updateData['contact_name'] = $request->contact_name;
            $updateData['contact_email'] = $request->contact_email;
            $updateData['contact_subject'] = $request->contact_subject;
            $updateData['contact_message'] = $request->contact_message;
            $updateData['type'] = $request->type;
            $res = Contact::where('id', $request->id)->update($updateData);
            if ($res) {
                return redirect('/admin/contact')->with('success', 'Contact update successfully!');
            } else {
                return redirect('/admin/contact')->with('fail', 'Contact update faield!');
            }
        } else {
            $contact = new Contact();
            if ($request->contact_name)
                $contact->contact_name = $request->contact_name;

            if ($request->contact_email)
                $contact->contact_email = $request->contact_email;

            if ($request->contact_subject)
                $contact->contact_subject = $request->contact_subject;

            if ($request->contact_message)
                $contact->contact_message = $request->contact_message;

            if ($request->type)
                $contact->type = $request->type;

            $res = $contact->save();
            if ($res) {
                return redirect('/admin/contact')->with('success', 'Contact added successfully!');
            } else {
                return redirect('/admin/contact')->with('fail', 'Contact added faield!');
            }
        }
    }
    public function deleteContact($id)
    {
        Contact::where('id', $id)->delete();
        return redirect('/admin/contact')->with('success', 'Contact deleted successfully!');
    }

    //Site Setting
    public function siteSetting()
    {
        $siteSetting = SiteSetting::orderBy('id', 'DESC')->first();
        $title = "Site-Setting";

        return view("pages.add-edit-site-setting")->with('siteSetting', $siteSetting)->with('title', $title);
    }

    public function saveSiteSetting(Request $request)
    {
        $request->validate([
            'email' => 'required|min:3',
            'address' => 'required|min:5',
            'phone_no' => 'required|min:5',
        ]);
        if ($request->id) {
            $siteSetting = SiteSetting::where('id', $request->id)->first();
            $updateData = [];
            if ($request->file('site_logo')) {
                $imagePath = public_path('uploads/images/' . $siteSetting->site_logo);
                if ($siteSetting->site_logo)
                    $this->unlinkImage($imagePath);
                $imageName = $this->imageUpload($request->site_logo, 1);
                $updateData['site_logo'] = $imageName;
            }
            if ($request->file('footer_logo')) {
                $imagePath = public_path('uploads/images/' . $siteSetting->footer_logo);
                if ($siteSetting->footer_logo)
                    $this->unlinkImage($imagePath);
                $imageName = $this->imageUpload($request->footer_logo, 1);
                $updateData['footer_logo'] = $imageName;
            }
            $updateData['title'] = $request->title;
            $updateData['name'] = $request->name;
            $updateData['email'] = $request->email;
            $updateData['phone_no'] = $request->phone_no;
            $updateData['site_url'] = $request->site_url;
            $updateData['address'] = $request->address;
            $updateData['site_description'] = $request->site_description;
            $updateData['facebook_link'] = $request->facebook_link;
            $updateData['twitter_link'] = $request->twitter_link;
            $updateData['linkedin_link'] = $request->linkedin_link;
            $updateData['instagram_link'] = $request->instagram_link;
            $updateData['preinsta_link'] = $request->preinsta_link;
            $updateData['latitude'] = $request->latitude;
            $updateData['longitude'] = $request->longitude;

            $res = SiteSetting::where('id', $request->id)->update($updateData);
            if ($res) {
                return redirect('/admin/site-setting')->with('success', 'Setting update successfully!');
            } else {
                return redirect('/admin/site-setting')->with('fail', 'Setting update faield!');
            }
        } else {
            $siteSetting = new SiteSetting();
            if ($request->file('site_logo')) {
                $imageName = $this->imageUpload($request->site_logo, 1);
                $siteSetting->site_logo = $imageName;
            }
            if ($request->file('footer_logo')) {
                $imageName = $this->imageUpload($request->footer_logo, 2);
                $siteSetting->footer_logo = $imageName;
            }
            if ($request->title) {
                $siteSetting->title = $request->title;
            }
            if ($request->name) {
                $siteSetting->name = $request->name;
            }

            if ($request->phone_no)
                $siteSetting->phone_no = $request->phone_no;

            if ($request->email)
                $siteSetting->email = $request->email;

            if ($request->site_url)
                $siteSetting->site_url = $request->site_url;

            if ($request->address)
                $siteSetting->address = $request->address;

            if ($request->site_description)
                $siteSetting->site_description = $request->site_description;

            if ($request->facebook_link)
                $siteSetting->facebook_link = $request->facebook_link;

            if ($request->twitter_link)
                $siteSetting->twitter_link = $request->twitter_link;

            if ($request->linkedin_link)
                $siteSetting->linkedin_link = $request->linkedin_link;

            if ($request->instagram_link)
                $siteSetting->instagram_link = $request->instagram_link;

            if ($request->preinsta_link)
                $siteSetting->preinsta_link = $request->preinsta_link;

            if ($request->latitude)
                $siteSetting->latitude = $request->latitude;

            if ($request->longitude)
                $siteSetting->longitude = $request->longitude;

            $res = $siteSetting->save();
            if ($res) {
                return redirect('/admin/site-setting')->with('success', 'Setting added successfully!');
            } else {
                return redirect('/admin/site-setting')->with('fail', 'Setting added faield!');
            }
        }
    }

    //Banner
    public function banner()
    {
        $banners = Banner::orderBy('id', 'DESC')->get();
        $title = "Banner Management List";
        return view('pages.banner')->with('banners', $banners)->with('title', $title);
    }

    public function addBanner($id = null)
    {
        if ($id) {
            $banner = Banner::where('id', $id)->first();
            $title = "Edit Banner";
        } else {
            $banner = null;
            $title = "Add Banner";
        }
        return view("pages.add-banner")->with('banner', $banner)->with('title', $title);
    }

    public function saveBanner(Request $request)
    {
        if ($request->id) {
            $request->validate([
                'banner_type' => 'required|min:3',
                'banner_page' => 'required|min:3',
                'banner_title' => 'required|min:3',
                'banner_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            $banner = Banner::where('id', $request->id)->first();
            $updateData = [];

            if ($request->file('banner_image')) {
                $imagePath = public_path('uploads/images/' . $banner->banner_image);
                if ($banner->banner_image)
                    $this->unlinkImage($imagePath);
                $imageName = $this->imageUpload($request->banner_image, 1);
                $updateData['banner_image'] = $imageName;
            }

            $updateData['banner_type'] = $request->banner_type;
            $updateData['banner_page'] = $request->banner_page;
            $updateData['banner_title'] = $request->banner_title;
            $updateData['banner_short_description'] = $request->banner_short_description;
            $updateData['sequence'] = $request->sequence;
            $updateData['status'] = $request->status;

            $res = Banner::where('id', $request->id)->update($updateData);

            if ($res) {
                return redirect('/admin/banner')->with('success', 'Banner update successfully!');
            } else {
                return redirect('/admin/banner')->with('fail', 'Banner update faield!');
            }
        } else {
            $request->validate([
                'banner_type' => 'required|min:3',
                'banner_page' => 'required|min:3',
                'banner_title' => 'required|min:3',
                'banner_image[]' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            if ($request->file('banner_image')) {
                for ($i = 0; $i < count($request->banner_image); $i++) {
                    $banner = new Banner();

                    $imageName = $this->imageUpload($request->banner_image[$i], $i);
                    $banner->banner_image = $imageName;

                    if ($request->banner_type)
                        $banner->banner_type = $request->banner_type;

                    if ($request->banner_page)
                        $banner->banner_page = $request->banner_page;

                    if ($request->banner_title)
                        $banner->banner_title = $request->banner_title;

                    if ($request->sequence[$i])
                        $banner->sequence = $request->sequence[$i];

                    if ($request->banner_short_description)
                        $banner->banner_short_description = $request->banner_short_description;

                    $banner->status = 'ACTIVE';
                    $banner->save();
                }
            }

            $res = 1;
            if ($res) {
                return redirect('/admin/banner')->with('success', 'Banner added successfully!');
            } else {
                return redirect('/admin/banner')->with('fail', 'Banner added faield!');
            }
        }
    }

    public function deleteBanner($id)
    {
        $banner = Banner::where('id', $id)->first();
        $imagePath1 = public_path('uploads/images/' . $banner->banner_image);
        if ($banner->banner_image)
            $this->unlinkImage($imagePath1);

        Banner::where('id', $id)->delete();
        return redirect('/admin/banner')->with('success', 'Banner deleted successfully!');
    }



    public function setting()
    {

        $user = User::where('id', '=', Session::get('loginUserId'))->first();
        $response = json_decode($user->footer_data);
        // print_r($response->content);die();
        return view("pages.setting.setting")->with('user', $response);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'oldPassword' => 'required|min:5|max:12',
            'newPassword' => 'required|min:5|max:12',
            'confirmPassword' => 'required|min:5|same:newPassword',
        ]);
        $adminId = $request->session()->get('loginUserId');
        $user = User::where('id', '=', $adminId)->first();
        if ($user) {
            if (Hash::check($request->oldPassword, $user->password)) {
                if (!Hash::check($request->newPassword, $user->password)) {
                    $newpassword = Hash::make($request->newPassword);
                    User::where('id', $adminId)->update(['password' => $newpassword]);
                    return back()->with('success', 'Password update successfully!');
                } else {
                    return back()->with('fail', 'Your old password and new password is same!');
                }
            } else {
                return back()->with('fail', 'Invalid old password!');
            }
        }
    }

    public function homePageFooterCms()
    {
        $homePageCms = HomePageCms::orderBy('id', 'DESC')->get();
        return view("pages.home-page-footer-cms")->with('homePageCms', $homePageCms);
    }

    public function addeditHomePageFooterCms($id = null)
    {
        if ($id) {
            $homePageFooter = HomePageCms::where('id', $id)->first();
            $title = "Edit Home Page Footer CMS";
        } else {
            $homePageFooter = null;
            $title = "Add Home Page Footer CMS";
        }
        return view("pages.addedit-home-page-footer-cms")->with('homePageFooter', $homePageFooter)->with('title', $title);
    }

    public function addHomePageFooterCms(Request $request)
    {
        if ($request->id) {
            $request->validate([
                'title' => 'required|min:5',
                'content1' => 'required|min:5',
                'content2' => 'required|min:5',
                'content3' => 'required|min:5',
                'content4' => 'required|min:5',
            ]);
            $updateData = [];
            $updateData['title'] = $request->title;
            $updateData['content1'] = $request->content1;
            $updateData['content2'] = $request->content2;
            $updateData['content3'] = $request->content3;
            $updateData['content4'] = $request->content4;
            $updateData['status'] = $request->status;

            $res = HomePageCms::where('id', $request->id)->update($updateData);
            if ($res) {
                return redirect('/admin/home-page-footer-cms')->with('success', 'Data update successfully!');
            } else {
                return redirect('/admin/home-page-footer-cms')->with('fail', 'Data update faield!');
            }
        } else {
            $request->validate([
                'title' => 'required|min:5',
                'content1' => 'required|min:5',
                'content2' => 'required|min:5',
                'content3' => 'required|min:5',
                'content4' => 'required|min:5',
            ]);
            $homePageFooter = new HomePageCms();

            if ($request->title)
                $homePageFooter->title = $request->title;

            if ($request->content1)
                $homePageFooter->content1 = $request->content1;

            if ($request->content2)
                $homePageFooter->content2 = $request->content2;

            if ($request->content3)
                $homePageFooter->content3 = $request->content3;

            if ($request->content4)
                $homePageFooter->content4 = $request->content4;

            $homePageFooter->status = 'on';

            $res = $homePageFooter->save();
            if ($res) {
                return redirect('/admin/home-page-footer-cms')->with('success', 'Data added successfully!');
            } else {
                return redirect('/admin/home-page-footer-cms')->with('fail', 'Data added faield!');
            }
        }
    }

    public function deleteHomePageFooterCms($id)
    {
        HomePageCms::where('id', $id)->delete();
        return redirect('/admin/home-page-footer-cms')->with('success', 'Records deleted successfully!');
    }

    public function onMouceHoverManagement()
    {
        $pageMouces = PageOnMouceHover::orderBy('id', 'DESC')->get();
        return view("pages.on-mouce-hover-management")->with('pageMouces', $pageMouces);
    }

    public function addMouceHoverCms($id = null)
    {
        if ($id) {
            $pageMouce = PageOnMouceHover::where('id', $id)->first();
            $title = "Edit Mouce Hover Content";
        } else {
            $pageMouce = null;
            $title = "Add Mouce Hover Content";
        }
        return view("pages.addedit-mouce-hover-content")->with('pageMouce', $pageMouce)->with('title', $title);
    }

    public function addeditMouceHover(Request $request)
    {
        if ($request->id) {
            $request->validate([
                'page_type' => 'required|min:2',
                // 'left_align_text'=>'min:5',
            ]);
            $onMouceHover = PageOnMouceHover::where('id', $request->id)->first();
            $updateData = [];
            $updateData['type'] = $request->page_type;

            if ($request->file('image1')) {
                $imagePath1 = public_path('uploads/images/' . $onMouceHover->image1);
                if ($onMouceHover->image1)
                    $this->unlinkImage($imagePath1);

                $image1Name = $this->bannerImageUpload($request->image1, 1);
                $updateData['image1'] = $image1Name;
            }
            if ($request->file('image2')) {
                $imagePath2 = public_path('uploads/images/' . $onMouceHover->image2);
                if ($onMouceHover->image2)
                    $this->unlinkImage($imagePath2);
                $image2Name = $this->bannerImageUpload($request->image2, 2);
                $updateData['image2'] = $image2Name;
            }
            if ($request->file('image3')) {
                $imagePath3 = public_path('uploads/images/' . $onMouceHover->image3);
                if ($onMouceHover->image2)
                    $this->unlinkImage($imagePath3);
                $image3Name = $this->bannerImageUpload($request->image3, 3);
                $updateData['image3'] = $image3Name;
            }
            if ($request->file('image4')) {
                $imagePath4 = public_path('uploads/images/' . $onMouceHover->image4);
                if ($onMouceHover->image4)
                    $this->unlinkImage($imagePath4);
                $image4Name = $this->bannerImageUpload($request->image4, 4);
                $updateData['image4'] = $image4Name;
            }
            if ($request->file('image5')) {
                $imagePath5 = public_path('uploads/images/' . $onMouceHover->image5);
                if ($onMouceHover->image5)
                    $this->unlinkImage($imagePath5);
                $image5Name = $this->bannerImageUpload($request->image5, 5);
                $updateData['image5'] = $image5Name;
            }
            if ($request->file('image6')) {
                $imagePath6 = public_path('uploads/images/' . $onMouceHover->image6);
                if ($onMouceHover->image6)
                    $this->unlinkImage($imagePath6);
                $image6Name = $this->bannerImageUpload($request->image6, 6);
                $updateData['image6'] = $image6Name;
            }
            $updateData['heading'] = $request->heading;
            $updateData['title'] = $request->title;
            $updateData['subtitle'] = $request->subtitle;
            $slug = Str::slug($request->title);
            $updateData['slug'] = $slug;
            $updateData['status'] = $request->status;

            $res = PageOnMouceHover::where('id', $request->id)->update($updateData);
            if ($res) {
                return redirect('/admin/on-mouce-hover-management')->with('success', 'Mouce hover data update successfully!');
            } else {
                return redirect('/admin/on-mouce-hover-management')->with('fail', 'Mouce hover data update faield!');
            }
        } else {
            $request->validate([
                'page_type' => 'required|min:2',
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

            if ($request->heading)
                $onMouceHover->heading = $request->heading;

            if ($request->title) {
                $onMouceHover->title = $request->title;
                $slug = Str::slug($request->title);
                $onMouceHover->slug = $slug;
            }

            if ($request->subtitle)
                $onMouceHover->subtitle = $request->subtitle;

            $onMouceHover->status = 'on';
            $onMouceHover->type = $request->page_type;
            $res = $onMouceHover->save();
            if ($res) {
                return redirect('/admin/on-mouce-hover-management')->with('success', 'Mouce Hover Data added successfully!');
            } else {
                return redirect('/admin/on-mouce-hover-management')->with('fail', 'Mouce Hover Data faield!');
            }
        }
    }
    public function deleteMouceHoverCms($id)
    {
        $onMouceHover = PageOnMouceHover::where('id', $id)->first();
        $imagePath1 = public_path('uploads/images/' . $onMouceHover->image1);
        $imagePath2 = public_path('uploads/images/' . $onMouceHover->image2);
        $imagePath3 = public_path('uploads/images/' . $onMouceHover->image3);
        $imagePath4 = public_path('uploads/images/' . $onMouceHover->image4);
        $imagePath5 = public_path('uploads/images/' . $onMouceHover->image5);
        $imagePath6 = public_path('uploads/images/' . $onMouceHover->image6);
        if ($onMouceHover->image1)
            $this->unlinkImage($imagePath1);
        if ($onMouceHover->image2)
            $this->unlinkImage($imagePath2);
        if ($onMouceHover->image3)
            $this->unlinkImage($imagePath3);
        if ($onMouceHover->image4)
            $this->unlinkImage($imagePath4);
        if ($onMouceHover->image5)
            $this->unlinkImage($imagePath5);
        if ($onMouceHover->image6)
            $this->unlinkImage($imagePath6);

        PageOnMouceHover::where('id', $id)->delete();
        return redirect('/admin/on-mouce-hover-management')->with('success', 'On Mouce Hover CMS deleted successfully!');
    }

    public function formManagement()
    {
        $forms = Form::orderBy('id', 'DESC')->paginate(5);
        return view('pages.form')->with('forms', $forms);
    }

    public function deleteForm($id)
    {
        Form::where('id', $id)->delete();
        return redirect('/admin/form-management')->with('success', 'Form deleted successfully!');
    }

    public function footerSetting(Request $request)
    {
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
        $updateData['linkedin_link'] = $request->linkedin_link;
        $updateData['insta_link'] = $request->insta_link;

        $res = User::where('id', $adminId)->update(['footer_data' => $updateData]);
        if ($res) {
            return redirect()->back()->with('success', 'Footer data update successfully!');
        } else {
            return redirect()->back()->with('fail', 'Footer data update faield!');
        }
    }

    public function designCenterCms()
    {
        $designCenterCms = DesignCenterCms::orderBy('id', 'DESC')->get();
        return view("pages.design-center-cms")->with('designCenterCms', $designCenterCms);
    }

    public function addeditDesignCenterCms($id = null)
    {
        if ($id) {
            $designCenterCms = DesignCenterCms::where('id', $id)->first();
            $title = "Edit Design Center CMS";
        } else {
            $designCenterCms = null;
            $title = "Add Design Center CMS";
        }
        return view("pages.addedit-design-center-cms")->with('designCenterCms', $designCenterCms)->with('title', $title);
    }

    public function addEditDesignCenterCmsSave(Request $request)
    {

        if ($request->id) {
            $request->validate([
                'title' => 'required|min:2',
                'category' => 'required',
                'tab' => 'required',
            ]);
            $designCenterCms = DesignCenterCms::where('id', $request->id)->first();
            $updateData = [];

            if ($request->file('thumbnail_image')) {
                $imagePath1 = public_path('uploads/images/' . $designCenterCms->thumbnail_image);
                if ($designCenterCms->thumbnail_image)
                    $this->unlinkImage($imagePath1);
                $image1Name = $this->bannerImageUpload($request->thumbnail_image, 1);
                $updateData['thumbnail_image'] = $image1Name;
            }

            $updateData['title'] = $request->title;
            $updateData['category'] = $request->category;
            $updateData['tab'] = $request->tab;
            $updateData['status'] = $request->status;
            $res = DesignCenterCms::where('id', $request->id)->update($updateData);
            if ($res) {
                return redirect('/admin/design-center-cms')->with('success', 'Design Center CMS update successfully!');
            } else {
                return redirect('/admin/design-center-cms')->with('fail', 'Design Center CMS update faield!');
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
            if ($request->title)
                $designCenterCms->title = $request->title;
            $designCenterCms->category = $request->category;
            $designCenterCms->tab = $request->tab;
            $designCenterCms->status = 'on';

            $res = $designCenterCms->save();
            if ($res) {
                return redirect('/admin/design-center-cms')->with('success', 'Design Center CMS added successfully!');
            } else {
                return redirect('/admin/design-center-cms')->with('fail', 'Design Center CMS added faield!');
            }
        }
    }

    public function deleteDesignCenterCms($id)
    {
        $designCenterCms = DesignCenterCms::where('id', $id)->first();
        $imagePath1 = public_path('uploads/images/' . $designCenterCms->thumbnail_image);

        if ($designCenterCms->thumbnail_image)
            $this->unlinkImage($imagePath1);

        DesignCenterCms::where('id', $id)->delete();
        return redirect('/admin/design-center-cms')->with('success', 'Design Center CMS deleted successfully!');
    }

    public function pageContentManagement()
    {
        $blogManagements = BlogManagement::orderBy('id', 'DESC')->get();
        return view("pages.blog-management")->with('blogManagements', $blogManagements);
    }

    public function addeditBlogview($id = null)
    {
        if ($id) {
            $blogManagement = BlogManagement::where('id', $id)->first();
            $title = "Edit Page Blog";
        } else {
            $blogManagement = null;
            $title = "Add Page Blog";
        }
        return view("pages.add-edit-blog")->with('blogManagement', $blogManagement)->with('title', $title);
    }

    public function addEditBlogSave(Request $request)
    {

        if ($request->id) {
            $request->validate([
                'title' => 'required|min:5',
                'page_type' => 'required',
                'text_alignment' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $blogManagement = BlogManagement::where('id', $request->id)->first();
            $updateData = [];
            if ($request->file('image')) {
                $imagePath1 = public_path('uploads/images/' . $blogManagement->image);
                if ($blogManagement->image)
                    $this->unlinkImage($imagePath1);
                $image1Name = $this->bannerImageUpload($request->image, 1);
                $updateData['image'] = $image1Name;
            }

            $updateData['title'] = $request->title;
            $updateData['type'] = $request->page_type;
            $updateData['text_alignment'] = $request->text_alignment;
            $updateData['description'] = $request->description;
            $updateData['content'] = $request->content;
            $updateData['status'] = $request->status;
            $res = BlogManagement::where('id', $request->id)->update($updateData);
            if ($res) {
                return redirect('/admin/page-content-management')->with('success', 'Page Content update successfully!');
            } else {
                return redirect('/admin/page-content-management')->with('fail', 'Page Content update failed!');
            }
        } else {
            $request->validate([
                'title' => 'required|min:5',
                'page_type' => 'required',
                'text_alignment' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $blogManagement = new BlogManagement();
            if ($request->file('image')) {
                $image = $this->bannerImageUpload($request->image, 1);
                $blogManagement->image = $image;
            }
            if ($request->title)
                $blogManagement->title = $request->title;
            $blogManagement->type = $request->page_type;
            $blogManagement->text_alignment = $request->text_alignment;
            $blogManagement->description = $request->description;
            $blogManagement->content = $request->content;
            $blogManagement->status = 'on';
            $res = $blogManagement->save();
            if ($res) {
                return redirect('/admin/page-content-management')->with('success', 'Page Content added successfully!');
            } else {
                return redirect('/admin/page-content-management')->with('fail', 'Page Content added failed!');
            }
        }
    }

    public function serviceManagement()
    {
        $serviceManagements = ServiceManagement::orderBy('id', 'DESC')->get();
        return view("pages.service-management")->with('serviceManagements', $serviceManagements);
    }

    public function addeditSericeView($id = null)
    {
        if ($id) {
            $serviceManagement = ServiceManagement::where('id', $id)->first();
            $title = "Edit Service";
        } else {
            $serviceManagement = null;
            $title = "Add Service";
        }
        $slugs = PageOnMouceHover::select('slug')->where('type', 'home')->whereNotNull('slug')->get();
        return view("pages.add-edit-service")->with('serviceManagement', $serviceManagement)->with('title', $title)->with('slugs', $slugs);
    }

    public function addUpdateService(Request $request)
    {

        if ($request->id) {
            $request->validate([
                'slug' => 'required',
                'content' => 'required',
            ]);
            $updateData = [];
            $updateData['slug'] = $request->slug;
            $updateData['content'] = $request->content;
            $res = ServiceManagement::where('id', $request->id)->update($updateData);
            if ($res) {
                return redirect('/admin/service-management')->with('success', 'Service update successfully!');
            } else {
                return redirect('/admin/service-management')->with('fail', 'Service update faield!');
            }
        } else {
            $request->validate([
                'slug' => 'required',
                'content' => 'required',
            ]);
            $serviceManagement = new ServiceManagement();
            $serviceManagement->slug = $request->slug;
            $serviceManagement->content = $request->content;
            $res = $serviceManagement->save();
            if ($res) {
                return redirect('/admin/service-management')->with('success', 'Service added successfully!');
            } else {
                return redirect('/admin/service-management')->with('fail', 'Service added faield!');
            }
        }
    }
    public function deleteService($id)
    {
        ServiceManagement::where('id', $id)->delete();
        return redirect('/admin/service-management')->with('success', 'Service deleted successfully!');
    }
}
