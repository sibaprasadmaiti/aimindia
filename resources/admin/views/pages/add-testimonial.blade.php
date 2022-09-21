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
                    <form action="/admin/save-testimonial" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" @if($testimonial) value="{{ $testimonial->id }}" @endif>
                        <div class="form-group">
                            <label for="testimonial_section_title">Section_title</label>
                            <textarea name="testimonial_section_title" id="testimonial_section_title" class="form-control cleditor @error('testimonial_section_title') is-invalid @enderror">@if($testimonial) {{ $testimonial->testimonial_section_title }} @endif</textarea>
                            <span class="text-danger">@error('testimonial_section_title') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="testimonial_image">Image</label>
                            <input type="file" name="testimonial_image" class="form-control @error('testimonial_image') is-invalid @enderror">
                            <span class="text-danger">@error('testimonial_image') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="testimonial_name">Name</label>
                            <input type="text" name="testimonial_name" @if($testimonial) value="{{ $testimonial->testimonial_name }}" @endif class="form-control @error('testimonial_name') is-invalid @enderror">
                            <span class="text-danger">@error('testimonial_name') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="testimonial_comment">Comment</label>
                            <textarea name="testimonial_comment" class="form-control cleditor @error('testimonial_comment') is-invalid @enderror">@if($testimonial) {{ $testimonial->testimonial_comment }} @endif</textarea>
                            <span class="text-danger">@error('testimonial_comment') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="testimonial_location">Location</label>
                            <input type="text" name="testimonial_location" @if($testimonial) value="{{ $testimonial->testimonial_location }}" @endif class="form-control @error('testimonial_location') is-invalid @enderror">
                            <span class="text-danger">@error('testimonial_location') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="sequence">Sequence</label>
                            <input type="number" min="1" name="sequence" @if($testimonial) value="{{ $testimonial->sequence }}" @endif class="form-control @error('sequence') is-invalid @enderror">
                            <span class="text-danger">@error('sequence') {{ $message }} @enderror</span>
                        </div>

                        @if(!empty($testimonial))
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status">
                            <option value="ACTIVE" @if($testimonial->status == 'ACTIVE') selected @endif>ACTIVE</option>
                            <option value="INACTIVE" @if($testimonial->status == 'INACTIVE') selected @endif>INACTIVE</option>
                            </select>
                            <span class="text-danger">@error('status') {{ $message }} @enderror</span>
                        </div>
                        @endif
                        <div class="mb-3"></div>

                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                       <a class="btn btn-secondary btn-sm" href="/admin/testimonial">Cancel</a>
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
        fetchTitle('testimonial_section_title');
    });

    function fetchTitle(id) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
            },
            url: "/admin/fetch-testimonial-title",
            type: "POST",
            data: {},
            success: function(response) {
                console.log(response);
                if (response) {
                    $("#"+id).val(response.testimonial_section_title).blur();
                }else{
                    $("#"+id).val('').blur();
                }
            }
        });
    }
</script>
@endsection
