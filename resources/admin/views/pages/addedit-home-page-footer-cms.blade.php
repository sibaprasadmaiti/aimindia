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
                    <form action="/admin/add-home-page-footer-cms" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name="title" class="form-control @error('title') is-invalid @enderror" value="@if(!empty($homePageFooter)) {{ $homePageFooter->title }} @endif">
                            <span class="text-danger">@error('title') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="content1">Content-1</label>
                            <input type="hidden" name="id" @if(!empty($homePageFooter)) value="{{ $homePageFooter->id }}" @endif>
                            <textarea name="content1" class="form-control @error('content1') is-invalid @enderror">@if(!empty($homePageFooter)) {{ $homePageFooter->content1 }} @endif</textarea>
                            <span class="text-danger">@error('content1') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="content2">Content-2</label>
                            <textarea name="content2" class="form-control @error('content2') is-invalid @enderror">@if(!empty($homePageFooter)) {{ $homePageFooter->content2 }} @endif</textarea>
                            <span class="text-danger">@error('content2') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="content3">Content-3</label>
                            <textarea name="content3" class="form-control @error('content3') is-invalid @enderror">@if(!empty($homePageFooter)) {{ $homePageFooter->content3 }} @endif</textarea>
                            <span class="text-danger">@error('content3') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="content4">Content-4</label>
                            <textarea name="content4" class="form-control @error('content4') is-invalid @enderror">@if(!empty($homePageFooter)) {{ $homePageFooter->content4 }} @endif</textarea>
                            <span class="text-danger">@error('content4') {{ $message }} @enderror</span>
                        </div>

                        @if(!empty($homePageFooter))
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                            <option value="on" @if($homePageFooter->status == 'on') selected @endif>ON</option>
                            <option value="off" @if($homePageFooter->status == 'off') selected @endif>OFF</option>
                            </select>
                            <span class="text-danger">@error('status') {{ $message }} @enderror</span>
                        </div>
                        @endif
                        <div class="mb-3"></div>

                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                       <a class="btn btn-secondary btn-sm" href="/admin/home-page-footer-cms">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
