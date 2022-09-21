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
                    <form action="/admin/save-organisation" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" @if($organisation) value="{{ $organisation->id }}" @endif>
                        <div class="form-group">
                            <label for="about_section_image1">About Section Image-1</label>
                            <input type="file" name="about_section_image1" class="form-control @error('about_section_image1') is-invalid @enderror">
                            <span class="text-danger">@error('about_section_image1') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="about_section_image2">About Section Image-2</label>
                            <input type="file" name="about_section_image2" class="form-control @error('about_section_image2') is-invalid @enderror">
                            <span class="text-danger">@error('about_section_image2') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="about_section_video_link">About Section Video Link</label>
                            <input type="text" name="about_section_video_link" @if($organisation) value="{{ $organisation->about_section_video_link }}" @endif class="form-control @error('about_section_video_link') is-invalid @enderror">
                            <span class="text-danger">@error('about_section_video_link') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="about_section_title">About Section Title</label>
                            <input type="text" name="about_section_title"  @if($organisation) value="{{ $organisation->about_section_title }}" @endif class="form-control @error('about_section_title') is-invalid @enderror">
                            <span class="text-danger">@error('about_section_title') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="about_section_description">About Section Description</label>
                            <textarea name="about_section_description" class="form-control cleditor @error('about_section_description') is-invalid @enderror">@if($organisation) {{ $organisation->about_section_description }} @endif</textarea>
                            <span class="text-danger">@error('about_section_description') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="fact_counter_image">Fact Counter Background Image</label>
                            <input type="file" name="fact_counter_image" class="form-control @error('fact_counter_image') is-invalid @enderror">
                            <span class="text-danger">@error('fact_counter_image') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="fact_counter1">Fact 1st Count</label>
                            <input type="text" name="fact_counter1" @if($organisation) value="{{ $organisation->fact_counter1 }}" @endif class="form-control @error('fact_counter1') is-invalid @enderror">
                            <span class="text-danger">@error('fact_counter1') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="fact_counter1_title">Fact 1st Counter Title</label>
                            <input type="text" name="fact_counter1_title" @if($organisation) value="{{ $organisation->fact_counter1_title }}" @endif class="form-control @error('fact_counter1_title') is-invalid @enderror">
                            <span class="text-danger">@error('fact_counter1_title') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="fact_counter2">Fact 2st Count</label>
                            <input type="text" name="fact_counter2" @if($organisation) value="{{ $organisation->fact_counter2 }}" @endif class="form-control @error('fact_counter2') is-invalid @enderror">
                            <span class="text-danger">@error('fact_counter2') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="fact_counter2_title">Fact 2st Counter Title</label>
                            <input type="text" name="fact_counter2_title" @if($organisation) value="{{ $organisation->fact_counter2_title }}" @endif class="form-control @error('fact_counter2_title') is-invalid @enderror">
                            <span class="text-danger">@error('fact_counter2_title') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="fact_counter3">Fact 3rd Count</label>
                            <input type="text" name="fact_counter3" @if($organisation) value="{{ $organisation->fact_counter3 }}" @endif class="form-control @error('fact_counter3') is-invalid @enderror">
                            <span class="text-danger">@error('fact_counter3') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="fact_counter3_title">Fact 3rd Counter Title</label>
                            <input type="text" name="fact_counter3_title" @if($organisation) value="{{ $organisation->fact_counter3_title }}" @endif class="form-control @error('fact_counter3_title') is-invalid @enderror">
                            <span class="text-danger">@error('fact_counter3_title') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="legal_section_title">Legal Section Title</label>
                            <input type="text" name="legal_section_title" @if($organisation) value="{{ $organisation->legal_section_title }}" @endif class="form-control @error('legal_section_title') is-invalid @enderror">
                            <span class="text-danger">@error('legal_section_title') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="legal_section_description">Legal Section Description</label>
                            <textarea name="legal_section_description" class="form-control cleditor @error('legal_section_description') is-invalid @enderror">@if($organisation) {{ $organisation->legal_section_description }} @endif</textarea>
                            <span class="text-danger">@error('legal_section_description') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="legal_section_image">Legal Section Image</label>
                            <input type="file" name="legal_section_image" class="form-control @error('legal_section_image') is-invalid @enderror">
                            <span class="text-danger">@error('legal_section_image') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="legal_section_image_title">Legal Section Image Title</label>
                            <input type="text" name="legal_section_image_title" @if($organisation) value="{{ $organisation->legal_section_image_title }}" @endif class="form-control @error('legal_section_image_title') is-invalid @enderror">
                            <span class="text-danger">@error('legal_section_image_title') {{ $message }} @enderror</span>
                        </div>

                        @if(!empty($organisation))
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status">
                            <option value="ACTIVE" @if($organisation->status == 'ACTIVE') selected @endif>ACTIVE</option>
                            <option value="INACTIVE" @if($organisation->status == 'INACTIVE') selected @endif>INACTIVE</option>
                            </select>
                            <span class="text-danger">@error('status') {{ $message }} @enderror</span>
                        </div>
                        @endif
                        <div class="mb-3"></div>

                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                       <a class="btn btn-secondary btn-sm" href="/admin/organisation">Cancel</a>
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
