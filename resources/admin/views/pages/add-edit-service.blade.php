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
                    <form action="/admin/addUpdate-service" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="hidden" name="id" @if($serviceManagement) value="{{ $serviceManagement->id }}" @endif>
                            <select class="form-control  @error('slug') is-invalid @enderror" name="slug" id="slug">
                                <option value="">Select Slug</option>
                                @foreach($slugs as $slug)
                                <option value="{{ $slug->slug }}" @if($serviceManagement) @if($serviceManagement->slug == $slug->slug) selected @endif @endif>{{ $slug->slug }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('slug') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" class="form-control cleditor @error('content') is-invalid @enderror">@if($serviceManagement) {{ $serviceManagement->content }} @endif</textarea>
                            <span class="text-danger">@error('content') {{ $message }} @enderror</span>
                        </div>

                        <div class="mb-3"></div>

                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                       <a class="btn btn-secondary btn-sm" href="/admin/service-management">Cancel</a>
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
