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
                        <form action="/admin/addedit-mouce-hover" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="page_type">Page Type</label>
                                <input type="hidden" name="id"
                                    @if ($pageMouce) value="{{ $pageMouce->id }}" @endif>
                                <select class="form-control" name="page_type" id="page_type">
                                    <option value="home"
                                        @if ($pageMouce) @if ($pageMouce->type == 'home') selected @endif
                                        @endif>Home</option>
                                    <option value="manufacturer"
                                        @if ($pageMouce) @if ($pageMouce->type == 'manufacturer') selected @endif
                                        @endif>Manufacturer</option>
                                        <option value="sound-engineer"
                                        @if ($pageMouce) @if ($pageMouce->type == 'sound-engineer') selected @endif
                                        @endif>Sound Engineer</option>
                                        <option value="architect-1"
                                        @if ($pageMouce) @if ($pageMouce->type == 'architect-1') selected @endif
                                        @endif>Architect 1</option>
                                        <option value="architect-2"
                                        @if ($pageMouce) @if ($pageMouce->type == 'architect-2') selected @endif
                                        @endif>Architect 2</option>
                                        <option value="system-designer-1"
                                        @if ($pageMouce) @if ($pageMouce->type == 'system-designer-1') selected @endif
                                        @endif>System Designer 1</option>
                                        <option value="system-designer-2"
                                        @if ($pageMouce) @if ($pageMouce->type == 'system-designer-2') selected @endif
                                        @endif>System Designer 2</option>
                                        <option value="system-designer-3"
                                        @if ($pageMouce) @if ($pageMouce->type == 'system-designer-3') selected @endif
                                        @endif>System Designer 3</option>
                                </select>
                                <span class="text-danger">
                                    @error('page_type')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="heading">Heding</label>
                                {{-- <textarea name="heading" id="heading" class="form-control cleditor @error('heading') is-invalid @enderror">@if (!empty($pageMouce)) {{ $pageMouce->heading }} @endif</textarea> --}}
                                <input name="heading" id="heading"
                                    class="form-control @error('heading') is-invalid @enderror"
                                    value="@if (!empty($pageMouce)) {{ $pageMouce->heading }} @endif">
                                <span class="text-danger">
                                    @error('heading')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input name="title" class="form-control @error('title') is-invalid @enderror"
                                    value="@if (!empty($pageMouce)) {{ $pageMouce->title }} @endif">
                                <span class="text-danger">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="subtitle">Sub-Title</label>
                                <input name="subtitle" class="form-control @error('subtitle') is-invalid @enderror"
                                    value="@if (!empty($pageMouce)) {{ $pageMouce->subtitle }} @endif">
                                <span class="text-danger">
                                    @error('subtitle')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            @if (!empty($pageMouce))
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input name="slug" class="form-control @error('slug') is-invalid @enderror"
                                    value="@if (!empty($pageMouce)) {{ $pageMouce->slug }} @endif" readonly>
                                <span class="text-danger">
                                    @error('slug')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="image1">Image-1</label>
                                <input type="file" name="image1"
                                    class="form-control @error('image1') is-invalid @enderror" id="image1">
                                <span class="text-danger">
                                    @error('image1')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="image2">Image-2</label>
                                <input type="file" name="image2"
                                    class="form-control @error('image2') is-invalid @enderror" id="image2">
                                <span class="text-danger">
                                    @error('image2')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="image3">Image-3</label>
                                <input type="file" name="image3"
                                    class="form-control @error('image3') is-invalid @enderror" id="image3">
                                <span class="text-danger">
                                    @error('image3')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="image4">Image-4</label>
                                <input type="file" name="image4"
                                    class="form-control @error('image4') is-invalid @enderror" id="image4">
                                <span class="text-danger">
                                    @error('image4')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="image5">Image-5</label>
                                <input type="file" name="image5"
                                    class="form-control @error('image5') is-invalid @enderror" id="image5">
                                <span class="text-danger">
                                    @error('image5')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="image6">Image-6</label>
                                <input type="file" name="image6"
                                    class="form-control @error('image6') is-invalid @enderror" id="image6">
                                <span class="text-danger">
                                    @error('image6')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            @if (!empty($pageMouce))
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" name="status"
                                        id="status">
                                        <option value="on" @if ($pageMouce->status == 'on') selected @endif>ON
                                        </option>
                                        <option value="off" @if ($pageMouce->status == 'off') selected @endif>OFF
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
                            <a class="btn btn-secondary btn-sm" href="/admin/on-mouce-hover-management">Cancel</a>
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
            var page_type = $("#page_type").val();
            fetchTitle(page_type);
        });
        $("#page_type").change(function() {
            var page_type = $(this).val();
            fetchTitle(page_type);
        });

        function fetchTitle(type) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "/admin/fetch-on-mouce-hover-title",
                type: "POST",
                data: {
                    page_type: type
                },
                success: function(response) {
                    if (response) {
                        $("#heading").val(response.heading);
                    }else{
                        $("#heading").val("");
                    }
                }
            });
        }
    </script>
@endsection
