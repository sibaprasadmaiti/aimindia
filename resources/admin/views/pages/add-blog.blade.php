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
                        <form action="/admin/save-blog" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id"
                                @if ($blog) value="{{ $blog->id }}" @endif>
                            <div class="form-group">
                                <label for="blog_category">Category</label>
                                <select class="form-control" name="blog_category">
                                    <option value="">Chhose Option</option>
                                    @foreach($cmss as $cms)
                                    <option value="{{$cms->menu_name}}"
                                        @if ($blog) @if ($cms->menu_name == $blog->blog_category) selected @endif
                                        @endif>{{$cms->menu_name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                    @error('blog_category')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="blog_heading">Heading<span style="color: red">*</span></label>
                                <textarea name="blog_heading" id="blog_heading" class="form-control cleditor @error('blog_heading') is-invalid @enderror">
                                    @if ($blog) {{ $blog->blog_heading }} @endif
                                    </textarea>
                                <span class="text-danger">
                                    @error('blog_heading')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="blog_image">Image</label>
                                <input type="file" name="blog_image"
                                    class="form-control @error('blog_image') is-invalid @enderror">
                                <span class="text-danger">
                                    @error('blog_image')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="blog_title">Title<span style="color: red">*</span></label>
                                <textarea name="blog_title" id="blog_title"
                                    class="form-control cleditor @error('blog_title') is-invalid @enderror">
                                    @if ($blog) {{ $blog->blog_title }} @endif
                                    </textarea>
                                <span class="text-danger">
                                    @error('blog_title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="blog_content">Content<span style="color: red">*</span></label>
                                <textarea name="blog_content" id="blog_content" class="form-control cleditor @error('blog_content') is-invalid @enderror">
                                    @if ($blog) {{ $blog->blog_content }} @endif
                                    </textarea>
                                <span class="text-danger">
                                    @error('blog_content')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="blog_comment">Comment</label>
                                <input type="number" name="blog_comment"
                                    class="form-control @error('blog_comment') is-invalid @enderror" min="1">
                                <span class="text-danger">
                                    @error('blog_comment')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="blog_posted_by">Posted By</label>
                                <input type="text" name="blog_posted_by"
                                    @if ($blog) value="{{ $blog->blog_posted_by }}" @endif
                                    class="form-control @error('blog_posted_by') is-invalid @enderror">
                                <span class="text-danger">
                                    @error('blog_posted_by')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="blog_posted_date">Added Date</label>
                                <input type="date" name="blog_posted_date"
                                    @if ($blog) value="{{ $blog->blog_posted_date }}" @endif
                                    class="form-control @error('blog_posted_date') is-invalid @enderror">
                                <span class="text-danger">
                                    @error('blog_posted_date')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="sequence">Sequence</label>
                                <input type="number" name="sequence" min="1"
                                    @if ($blog) value="{{ $blog->sequence }}" @endif
                                    class="form-control @error('sequence') is-invalid @enderror">
                                <span class="text-danger">
                                    @error('sequence')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            @if (!empty($blog))
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" name="status">
                                        <option value="ACTIVE" @if ($blog->status == 'ACTIVE') selected @endif>ACTIVE
                                        </option>
                                        <option value="INACTIVE" @if ($blog->status == 'INACTIVE') selected @endif>
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
                            <a class="btn btn-secondary btn-sm" href="/admin/blog">Cancel</a>
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
            fetchTitle('blog_heading');
        });

        function fetchTitle(id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "/admin/fetch-blog-heading",
                type: "POST",
                data: {},
                success: function(response) {
                    console.log(response);
                    if (response) {
                        $("#" + id).val(response.blog_heading).blur();
                    } else {
                        $("#" + id).val('').blur();
                    }
                }
            });
        }
    </script>
@endsection
