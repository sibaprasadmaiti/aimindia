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
                        <form action="/admin/save-cms" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id"
                                @if ($cms) value="{{ $cms->id }}" @endif>
                            <div class="form-group">
                                <label for="type">Type<span style="color: red">*</span></label>
                                <select class="form-control" name="type">
                                    <option value="our-work"
                                        @if ($cms) @if ($cms->type == 'our-work') selected @endif
                                        @endif>Our Work</option>
                                    <option value="be-friend"
                                        @if ($cms) @if ($cms->type == 'be-friend') selected @endif
                                        @endif>Be Friend</option>
                                </select>
                                <span class="text-danger">
                                    @error('type')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="menu_name">Menu name<span style="color: red">*</span></label>
                                <input type="text" name="menu_name"
                                class="form-control @error('menu_name') is-invalid @enderror"  @if ($cms) value="{{ $cms->menu_name }}" @endif>
                                <span class="text-danger">
                                    @error('menu_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="title">Title<span style="color: red">*</span></label>
                                <textarea name="title" id="title" class="form-control cleditor @error('title') is-invalid @enderror">
                                    @if ($cms) {{ $cms->title }} @endif
                                    </textarea>
                                <span class="text-danger">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="short_description">Short Description</label>
                                <textarea name="short_description" id="short_description"
                                    class="form-control cleditor @error('short_description') is-invalid @enderror">
                                    @if ($cms) {{ $cms->short_description }} @endif
                                    </textarea>
                                <span class="text-danger">
                                    @error('short_description')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="content">Content<span style="color: red">*</span></label>
                                <textarea name="content" id="content" class="form-control cleditor @error('content') is-invalid @enderror">
                                    @if ($cms) {{ $cms->content }} @endif
                                    </textarea>
                                <span class="text-danger">
                                    @error('content')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="cms_image">Image</label>
                                <input type="file" name="image"
                                    class="form-control @error('image') is-invalid @enderror">
                                <span class="text-danger">
                                    @error('image')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="video_link">Video Link</label>
                                <input type="text" name="video_link"
                                    @if ($cms) value="{{ $cms->video_link }}" @endif
                                    class="form-control @error('video_link') is-invalid @enderror">
                                <span class="text-danger">
                                    @error('video_link')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            @if (!empty($cms))
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" name="status">
                                        <option value="ACTIVE" @if ($cms->status == 'ACTIVE') selected @endif>ACTIVE
                                        </option>
                                        <option value="INACTIVE" @if ($cms->status == 'INACTIVE') selected @endif>
                                            INACTIVE</option>
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
                            <a class="btn btn-secondary btn-sm" href="/admin/cms">Cancel</a>
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
    </script>
    <script>
        $("document").ready(function() {
            fetchTitle('cms_section_title');
        });

        function fetchTitle(id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "/admin/fetch-cms-title",
                type: "POST",
                data: {},
                success: function(response) {
                    console.log(response);
                    if (response) {
                        $("#" + id).val(response.cms_section_title).blur();
                    } else {
                        $("#" + id).val('').blur();
                    }
                }
            });
        }
    </script>
@endsection
