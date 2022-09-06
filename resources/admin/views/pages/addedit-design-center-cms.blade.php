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
                    <form action="/admin/addedit-design-center-save" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control  @error('category') is-invalid @enderror" name="category" id="category">
                                <option value="">Select Category</option>
                                <option value="category-1" @if($designCenterCms) @if($designCenterCms->category == 'category-1') selected @endif @endif>Category 1</option>
                                <option value="category-2" @if($designCenterCms) @if($designCenterCms->category == 'category-2') selected @endif @endif>Category 2</option>
                            </select>
                            <span class="text-danger">@error('category') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="tab">Tab</label>
                            <select class="form-control  @error('tab') is-invalid @enderror" name="tab">
                                <optgroup label="Category 1">
                                <option value="amplifiers" @if($designCenterCms) @if($designCenterCms->tab == 'amplifiers') selected @endif @endif>Amplifiers</option>
                                <option value="interfaces-&-controllers" @if($designCenterCms) @if($designCenterCms->tab == 'interfaces-&-controllers') selected @endif @endif>Interfaces & Controllers</option>
                                <option value="mixing-consoles" @if($designCenterCms) @if($designCenterCms->tab == 'mixing-consoles') selected @endif @endif>Mixing Consoles</option>
                                <option value="synth-modules" @if($designCenterCms) @if($designCenterCms->tab == 'synth-modules') selected @endif @endif>Synth Modules</option>
                                <option value="signal-processors" @if($designCenterCms) @if($designCenterCms->tab == 'signal-processors') selected @endif @endif>Signal Processors</option>
                                <option value="stomp-boxes" @if($designCenterCms) @if($designCenterCms->tab == 'stomp-boxes') selected @endif @endif>Stomp Boxes</option>
                            </optgroup>
                            <optgroup label="Category 2">
                                <option value="auditorium" @if($designCenterCms) @if($designCenterCms->tab == 'auditorium') selected @endif @endif>Auditorium</option>
                                <option value="corporate" @if($designCenterCms) @if($designCenterCms->tab == 'corporate') selected @endif @endif>Corporate</option>
                                <option value="education" @if($designCenterCms) @if($designCenterCms->tab == 'education') selected @endif @endif>Education</option>
                                <option value="government" @if($designCenterCms) @if($designCenterCms->tab == 'government') selected @endif @endif>government</option>
                                <option value="healthcare" @if($designCenterCms) @if($designCenterCms->tab == 'healthcare') selected @endif @endif>Healthcare</option>
                                <option value="high-rise-residential" @if($designCenterCms) @if($designCenterCms->tab == 'high-rise-residential') selected @endif @endif>High-rise Residential</option>
                                <option value="leisure-&-hospitality" @if($designCenterCms) @if($designCenterCms->tab == 'leisure-&-hospitality') selected @endif @endif>Leisure & Hospitality</option>
                                <option value="retail-destination" @if($designCenterCms) @if($designCenterCms->tab == 'retail-destination') selected @endif @endif>Retail Destination</option>
                                <option value="stadium-arena" @if($designCenterCms) @if($designCenterCms->tab == 'stadium-arena') selected @endif @endif>Stadium-Arena</option>
                                <option value="transportation" @if($designCenterCms) @if($designCenterCms->tab == 'transportation') selected @endif @endif>Transportation</option>
                                <option value="worship-centre" @if($designCenterCms) @if($designCenterCms->tab == 'worship-centre') selected @endif @endif>Worship Centre</option>
                            </optgroup>
                            </select>
                            <span class="text-danger">@error('tab') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="hidden" name="id" @if(!empty($designCenterCms)) value="{{ $designCenterCms->id }}" @endif>
                            <input name="title" class="form-control @error('title') is-invalid @enderror" value="@if(!empty($designCenterCms)) {{ $designCenterCms->title }} @endif">
                            <span class="text-danger">@error('title') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="thumbnail_image">Thumbnail Image</label>
                            <input type="file" name="thumbnail_image" class="form-control @error('thumbnail_image') is-invalid @enderror" id="thumbnail_image">
                            <span class="text-danger">@error('thumbnail_image') {{ $message }} @enderror</span>
                        </div>

                        @if(!empty($designCenterCms))
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                            <option value="on" @if($designCenterCms->status == 'on') selected @endif>ON</option>
                            <option value="off" @if($designCenterCms->status == 'off') selected @endif>OFF</option>
                            </select>
                            <span class="text-danger">@error('status') {{ $message }} @enderror</span>
                        </div>
                        @endif
                        <div class="mb-3"></div>

                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                       <a class="btn btn-secondary btn-sm" href="/admin/design-center-cms">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
