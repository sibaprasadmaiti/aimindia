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
                    <form action="/admin/addedit-blog-save" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="page_type">Page</label>
                            <select class="form-control  @error('page_type') is-invalid @enderror" name="page_type" id="page_type">
                                <option value="">Select Page</option>
                                <option value="about" @if($blogManagement) @if($blogManagement->type == 'about') selected @endif @endif>About</option>
                                <option value="architect" @if($blogManagement) @if($blogManagement->type == 'architect') selected @endif @endif>Architect</option>
                                <option value="system-designer" @if($blogManagement) @if($blogManagement->type == 'system-designer') selected @endif @endif>System Designer</option>
                                <option value="privacy-policy" @if($blogManagement) @if($blogManagement->type == 'privacy-policy') selected @endif @endif>Privacy Policy</option>
                                <option value="terms-and-conditions" @if($blogManagement) @if($blogManagement->type == 'terms-and-conditions') selected @endif @endif>Terms And Conditions</option>
                            </select>
                            <span class="text-danger">@error('page_type') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="text_alignment">Text Alignment</label>
                            <select class="form-control  @error('text_alignment') is-invalid @enderror" name="text_alignment" id="text_alignment">
                                <option value="">Select Option</option>
                                <option value="right_side" @if($blogManagement) @if($blogManagement->text_alignment == 'right_side') selected @endif @endif>Right Side</option>
                                <option value="left_side" @if($blogManagement) @if($blogManagement->text_alignment == 'left_side') selected @endif @endif>Left Side</option>
                            </select>
                            <span class="text-danger">@error('text_alignment') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="hidden" name="id" @if(!empty($blogManagement)) value="{{ $blogManagement->id }}" @endif>
                            <input name="title" class="form-control @error('title') is-invalid @enderror" value="@if(!empty($blogManagement)) {{ $blogManagement->title }} @endif">
                            <span class="text-danger">@error('title') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input name="description" class="form-control @error('description') is-invalid @enderror" value="@if(!empty($blogManagement)) {{ $blogManagement->description }} @endif">
                            <span class="text-danger">@error('description') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" class="form-control cleditor @error('content') is-invalid @enderror">@if(!empty($blogManagement)) {{ $blogManagement->content }} @endif</textarea>
                            <span class="text-danger">@error('content') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
                            <span class="text-danger">@error('image') {{ $message }} @enderror</span>
                        </div>

                        @if(!empty($blogManagement))
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                            <option value="on" @if($blogManagement->status == 'on') selected @endif>ON</option>
                            <option value="off" @if($blogManagement->status == 'off') selected @endif>OFF</option>
                            </select>
                            <span class="text-danger">@error('status') {{ $message }} @enderror</span>
                        </div>
                        @endif
                        <div class="mb-3"></div>

                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                       <a class="btn btn-secondary btn-sm" href="/admin/page-content-management">Cancel</a>
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
