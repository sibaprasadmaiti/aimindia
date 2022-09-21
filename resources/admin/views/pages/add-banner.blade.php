@extends('layouts.app_admin')
@section('content')
<div class="container">
    <div class="row mb-3 mt-4">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $title }}<h3>
                </div>
                <div class="card-body">
                    <form action="/admin/save-banner" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id"
                        @if ($banner) value="{{ $banner->id }}" @endif>

                        <div class="form-group">
                            <label for="banner_type">Type <span style="color: red">*</span></label>
                            <select class="form-control" name="banner_type" id="banner_type" onchange="changeType()">
                                <option value="ADVERTISE" @if($banner) @if($banner->type == 'ADVERTISE') selected @endif @endif>ADVERTISE</option>
                                <option value="SLIDER" @if($banner)  @if($banner->type == 'SLIDER') selected @endif @endif>SLIDER</option>
                            </select>
                            <span class="text-danger">@error('banner_type') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="banner_page">Page <span style="color: red">*</span></label>
                            <select class="form-control" name="banner_page" id="banner_page">
                                <option value="HOME" @if($banner) @if($banner->banner_page == 'HOME') selected @endif @endif>HOME</option>
                                <option value="ORGANISATION" @if($banner)  @if($banner->banner_page == 'ORGANISATION') selected @endif @endif>ORGANISATION</option>
                                <option value="TESTIMONIALS" @if($banner)  @if($banner->banner_page == 'TESTIMONIALS') selected @endif @endif>TESTIMONIALS</option>
                                <option value="GALLERY" @if($banner)  @if($banner->banner_page == 'GALLERY') selected @endif @endif>GALLERY</option>
                                <option value="OUR-TEAM" @if($banner)  @if($banner->banner_page == 'OUR-TEAM') selected @endif @endif>OUR-TEAM</option>
                                <option value="ACTIVITIES" @if($banner)  @if($banner->banner_page == 'ACTIVITIES') selected @endif @endif>ACTIVITIES</option>
                                <option value="BLOG" @if($banner)  @if($banner->banner_page == 'BLOG') selected @endif @endif>BLOG</option>
                                <option value="CONTACT" @if($banner)  @if($banner->banner_page == 'CONTACT') selected @endif @endif>CONTACT</option>
                            </select>
                            <span class="text-danger">@error('banner_page') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="banner_title">Title <span style="color: red">*</span></label>
                            <input type="text" name="banner_title" class="form-control @error('banner_title') is-invalid @enderror" value="@if($banner) {{ $banner->banner_title }} @endif">
                            <span class="text-danger">@error('banner_title') {{ $message }} @enderror</span>
                        </div>

                        @if($banner)
                        <div class="form-group">
                            <label for="banner_image">Image</label>
                            <input type="file" name="banner_image" class="form-control @error('banner_image') is-invalid @enderror" id="banner_image">
                            <span class="text-danger">@error('banner_image') {{ $message }} @enderror</span>
                        </div>
                         <div class="form-group">
                            <label for="sequence">Sequence</label>
                            <input type="number" min="1" name="sequence" class="form-control @error('sequence') is-invalid @enderror" value="{{ $banner->sequence }}">
                            <span class="text-danger">@error('sequence') {{ $message }} @enderror</span>
                        </div>
                        @else
                        <div class="form-group">
                            <label for="banner_image">Image <span style="color: red">*</span></label>
                            <div id="appendImage">
                                <div style="display: flex">
                                    <input type="file" name="banner_image[]"
                                        class="form-control @error('banner_image[]') is-invalid @enderror"
                                        style="margin-right: 4px">
                                    <input type="number" min="1" name="sequence[]" class="form-control"
                                        placeholder="Sequence">
                                </div>

                                <div class="block">
                                    <button type="button" style="margin-top: 7px;display: none;" class="btn btn-primary btn-sm" id="addMoreBtn">Add More</button>
                                </div>
                            </div>


                            <span class="text-danger">
                                @error('banner_image')
                                    {{ $message }}
                                @enderror
                            </span><br />
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="banner_short_description">Short Description</label>
                            <textarea name="banner_short_description" class="form-control cleditor @error('banner_short_description') is-invalid @enderror">@if($banner) {{ $banner->banner_short_description }} @endif</textarea>
                            <span class="text-danger">@error('banner_short_description') {{ $message }} @enderror</span>
                        </div>

                        @if($banner)
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                            <option value="ACTIVE" @if($banner->status == 'ACTIVE') selected @endif>ACTIVE</option>
                            <option value="INACTIVE" @if($banner->status == 'INACTIVE') selected @endif>INACTIVE</option>
                            </select>
                            <span class="text-danger">@error('status') {{ $message }} @enderror</span>
                        </div>
                        @endif
                        <div class="mb-3"></div>

                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                       <a class="btn btn-secondary btn-sm" href="/admin/banner">Cancel</a>
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
    function changeType(){
        var type = $("#banner_type").val();
        if(type == "SLIDER"){
            $("#addMoreBtn").show();
        }else{
            $("#addMoreBtn").hide();
        }
    }
    $('#addMoreBtn').click(function() {
            $('.block:last').before(
                '<div class="block" style="display: flex;margin-top: 7px;"><input type="file" name="gallery_image[]" class="form-control @error('gallery_image[]') is-invalid @enderror" style="margin-right:4px;"><input type="number" min="1" name="sequence[]" class="form-control" placeholder="Sequence" style="margin-right:4px;"><button type="button" class=" btn btn-danger btn-sm remove">Remove</button></div>'
                );
        });

        $('#appendImage').on('click', '.remove', function() {
            $(this).parent().remove();
        });
</script>
@endsection
