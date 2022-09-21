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
                        <form action="/admin/save-gallery" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id"
                                @if ($gallery) value="{{ $gallery->id }}" @endif>
                            <div class="form-group">
                                <label for="gallery_section_title">Section_title</label>
                                <textarea name="gallery_section_title" id="gallery_section_title"
                                    class="form-control cleditor @error('gallery_section_title') is-invalid @enderror">
                                @if ($gallery)
                                {{ $gallery->gallery_section_title }}
                                @endif
                                </textarea>
                                <span class="text-danger">
                                    @error('gallery_section_title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="gallery_title">Title</label>
                                <input type="text" name="gallery_title"
                                    @if ($gallery) value="{{ $gallery->gallery_title }}" @endif
                                    class="form-control @error('gallery_title') is-invalid @enderror">
                                <span class="text-danger">
                                    @error('gallery_title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                                <div class="form-group">
                                    <label for="gallery_image">Image</label>
                                    <input type="file" name="gallery_image"
                                        class="form-control @error('gallery_image') is-invalid @enderror">
                                    <span class="text-danger">
                                        @error('sequence')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for="sequence">Sequence</label>
                                    <input type="number" min="1" name="sequence"
                                        @if ($gallery) value="{{ $gallery->sequence }}" @endif
                                        class="form-control @error('sequence') is-invalid @enderror">
                                    <span class="text-danger">
                                        @error('sequence')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                {{-- <div class="form-group">
                                    <label for="gallery_image">Image</label>
                                    <div id="appendImage">
                                        <div style="display: flex">
                                            <input type="file" name="gallery_image[]"
                                                class="form-control @error('gallery_image[]') is-invalid @enderror"
                                                style="margin-right: 4px">
                                            <input type="number" min="1" name="sequence[]" class="form-control"
                                                placeholder="Sequence">
                                        </div>

                                        <div class="block">
                                            <button type="button" style="margin-top: 7px;" class="btn btn-primary btn-sm" id="addMoreBtn">Add More</button>
                                        </div>
                                    </div>


                                    <span class="text-danger">
                                        @error('gallery_image')
                                            {{ $message }}
                                        @enderror
                                    </span><br />
                                </div>
                            @endif --}}


                            @if ($gallery)
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" name="status">
                                        <option value="ACTIVE" @if ($gallery->status == 'ACTIVE') selected @endif>ACTIVE
                                        </option>
                                        <option value="INACTIVE" @if ($gallery->status == 'INACTIVE') selected @endif>INACTIVE
                                        </option>
                                    </select>
                                    <span class="text-danger">
                                        @error('status')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            @endif
                            <div class="mb-3"></div>

                            <button type="submit" class="btn btn-success btn-sm">Submit</button>
                            <a class="btn btn-secondary btn-sm" href="/admin/gallery">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".cleditor").cleditor();
        });

        $('#addMoreBtn').click(function() {
            $('.block:last').before(
                '<div class="block" style="display: flex;margin-top: 7px;"><input type="file" name="gallery_image[]" class="form-control @error('gallery_image[]') is-invalid @enderror" style="margin-right:4px;"><input type="number" min="1" name="sequence[]" class="form-control" placeholder="Sequence" style="margin-right:4px;"><button type="button" class=" btn btn-danger btn-sm remove">Remove</button></div>'
                );
        });

        $('#appendImage').on('click', '.remove', function() {
            $(this).parent().remove();
        });


        // $("#addMoreBtn").click(function () {
        // var template = '<input type="file" name="gallery_image[]" class="form-control @error('gallery_image[]') is-invalid @enderror" style="margin-top: 8px;margin-bottom: 8px;">';
        // $("#appendImage").append(template);
        // });
    </script>
    <script>
        $("document").ready(function() {
            fetchTitle('gallery_section_title');
        });

        function fetchTitle(id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "/admin/fetch-gallery-section-title",
                type: "POST",
                data: {},
                success: function(response) {
                    console.log(response);
                    if (response) {
                        $("#"+id).val(response.gallery_section_title).blur();
                    }else{
                        $("#"+id).val('').blur();
                    }
                }
            });
        }
    </script>
@endsection
