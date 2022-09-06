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
                    <form action="/admin/add-banner" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="page_type">Page Type</label>
                            <select class="form-control" name="page_type" id="page_type">
                                <option value="home" @if($banner)  @if($banner->type == 'home') selected @endif @endif>Home</option>
                                <option value="manufacturer" @if($banner) @if($banner->type == 'manufacturer') selected @endif @endif>Manufacturer</option>
                                <option value="audio-calculator" @if($banner) @if($banner->type == 'audio-calculator') selected @endif @endif>Audio Calculator</option>
                                <option value="design-center" @if($banner) @if($banner->type == 'design-center') selected @endif @endif>Design Center</option>
                                <option value="about" @if($banner) @if($banner->type == 'about') selected @endif @endif>About</option>
                                <option value="sound-engineer" @if($banner) @if($banner->type == 'sound-engineer') selected @endif @endif>Sound Engineer</option>
                                <option value="architect" @if($banner) @if($banner->type == 'architect') selected @endif @endif>Architect</option>
                                <option value="system-designer" @if($banner) @if($banner->type == 'system-designer') selected @endif @endif>System Designer</option>
                            </select>
                            <span class="text-danger">@error('page_type') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="right_align_text">Right Align Text</label>
                            <input type="hidden" name="bannerId" @if(!empty($banner)) value="{{ $banner->id }}" @endif>
                            <textarea name="right_align_text" class="form-control cleditor @error('right_align_text') is-invalid @enderror">@if(!empty($banner)) {{ $banner->right_align_text }} @endif</textarea>
                            <span class="text-danger">@error('right_align_text') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="left_align_text">Left Align Text</label>
                            <textarea name="left_align_text" class="form-control cleditor @error('left_align_text') is-invalid @enderror">@if(!empty($banner)) {{ $banner->left_align_text }} @endif</textarea>
                            <span class="text-danger">@error('left_align_text') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="bottom_text">Bottom Text</label>
                            <input name="bottom_text" class="form-control @error('bottom_text') is-invalid @enderror" value="@if(!empty($banner)) {{ $banner->bottom_text }} @endif">
                            <span class="text-danger">@error('bottom_text') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="image1">Image-1</label>
                            <input type="file" name="image1" class="form-control @error('image1') is-invalid @enderror" id="image1">
                            <span class="text-danger">@error('image1') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="image2">Image-2</label>
                            <input type="file" name="image2" class="form-control @error('image2') is-invalid @enderror" id="image2">
                            <span class="text-danger">@error('image2') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="image3">Image-3</label>
                            <input type="file" name="image3" class="form-control @error('image3') is-invalid @enderror" id="image3">
                            <span class="text-danger">@error('image3') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="image4">Image-4</label>
                            <input type="file" name="image4" class="form-control @error('image4') is-invalid @enderror" id="image4">
                            <span class="text-danger">@error('image4') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="image5">Image-5</label>
                            <input type="file" name="image5" class="form-control @error('image5') is-invalid @enderror" id="image5">
                            <span class="text-danger">@error('image5') {{ $message }} @enderror</span>
                        </div>
                        @if(!empty($banner))
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                            <option value="on" @if($banner->status == 'on') selected @endif>ON</option>
                            <option value="off" @if($banner->status == 'off') selected @endif>OFF</option>
                            </select>
                            <span class="text-danger">@error('status') {{ $message }} @enderror</span>
                        </div>
                        @endif
                        <div class="mb-3"></div>

                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                       <a class="btn btn-secondary btn-sm" href="/admin/banner-management">Cancel</a>
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
@endsection
