@extends('layouts.app_admin')
@section('content')
<div class="container">
    <div class="row mb-3 mt-4">

        <div class="col-md-6 offset-md-3">
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>{{ $title }}<h3>
                </div>
                <div class="card-body">
                    <form action="/admin/save-site-setting" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" @if($siteSetting) value="{{ $siteSetting->id }}" @endif>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" @if($siteSetting) value="{{ $siteSetting->title }}" @endif class="form-control @error('title') is-invalid @enderror">
                            <span class="text-danger">@error('title') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="name">Site Name</label>
                            <input type="text" name="name" @if($siteSetting) value="{{ $siteSetting->name }}" @endif class="form-control @error('name') is-invalid @enderror">
                            <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="email">Site Email</label>
                            <input type="email" name="email" @if($siteSetting) value="{{ $siteSetting->email }}" @endif class="form-control @error('email') is-invalid @enderror">
                            <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="phone_no">Phone No.</label>
                            <input type="text" name="phone_no" @if($siteSetting) value="{{ $siteSetting->phone_no }}" @endif class="form-control @error('phone_no') is-invalid @enderror">
                            <span class="text-danger">@error('phone_no') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="email">Site URL</label>
                            <input type="text" name="site_url" @if($siteSetting) value="{{ $siteSetting->site_url }}" @endif class="form-control @error('site_url') is-invalid @enderror">
                            <span class="text-danger">@error('site_url') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="address">Site Address</label>
                            <textarea name="address" class="form-control cleditor @error('address') is-invalid @enderror">@if($siteSetting) {{ $siteSetting->address }} @endif</textarea>
                            <span class="text-danger">@error('address') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="site_description">Site Description</label>
                            <textarea name="site_description" class="form-control cleditor @error('site_description') is-invalid @enderror">@if($siteSetting) {{ $siteSetting->site_description }} @endif</textarea>
                            <span class="text-danger">@error('site_description') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="facebook_link">Facebook Link</label>
                            <textarea name="facebook_link" class="form-control cleditor @error('facebook_link') is-invalid @enderror">@if($siteSetting) {{ $siteSetting->facebook_link }} @endif</textarea>
                            <span class="text-danger">@error('facebook_link') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="twitter_link">Twitter Link</label>
                            <textarea name="twitter_link" class="form-control cleditor @error('twitter_link') is-invalid @enderror">@if($siteSetting) {{ $siteSetting->twitter_link }} @endif</textarea>
                            <span class="text-danger">@error('twitter_link') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="linkedin_link">Linkedin Link</label>
                            <textarea name="linkedin_link" class="form-control cleditor @error('linkedin_link') is-invalid @enderror">@if($siteSetting) {{ $siteSetting->linkedin_link }} @endif</textarea>
                            <span class="text-danger">@error('linkedin_link') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="instagram_link">Instagram Link</label>
                            <textarea name="instagram_link" class="form-control cleditor @error('instagram_link') is-invalid @enderror">@if($siteSetting) {{ $siteSetting->instagram_link }} @endif</textarea>
                            <span class="text-danger">@error('instagram_link') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="preinsta_link">Preinsta Link</label>
                            <textarea name="preinsta_link" class="form-control cleditor @error('preinsta_link') is-invalid @enderror">@if($siteSetting) {{ $siteSetting->preinsta_link }} @endif</textarea>
                            <span class="text-danger">@error('preinsta_link') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="latitude">Latitude</label>
                            <input type="text" name="latitude" @if($siteSetting) value="{{ $siteSetting->latitude }}" @endif class="form-control @error('latitude') is-invalid @enderror">
                            <span class="text-danger">@error('latitude') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="longitude">Longitude</label>
                            <input type="text" name="longitude" @if($siteSetting) value="{{ $siteSetting->longitude }}" @endif class="form-control @error('longitude') is-invalid @enderror">
                            <span class="text-danger">@error('longitude') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="site_logo">Site Logo</label>
                            <input type="file" name="site_logo" class="form-control @error('site_logo') is-invalid @enderror">
                            <span class="text-danger">@error('site_logo') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="footer_logo">Footer Logo</label>
                            <input type="file" name="footer_logo" class="form-control @error('footer_logo') is-invalid @enderror">
                            <span class="text-danger">@error('footer_logo') {{ $message }} @enderror</span>
                        </div>

                        <div class="mb-3"></div>

                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(".cleditor").cleditor();
    });
</script>
<script>
    $("document").ready(function() {
        fetchTitle('title');
    });

    function fetchTitle(id) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
            },
            url: "/admin/fetch-siteSetting-title",
            type: "POST",
            data: {},
            success: function(response) {
                console.log(response);
                if (response) {
                    $("#"+id).val(response.siteSetting_section_title).blur();
                }else{
                    $("#"+id).val('').blur();
                }
            }
        });
    }
</script>
@endsection
