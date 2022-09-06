@extends('layouts.app_admin')
@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Change Password</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('change-password')}}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control @error('oldPassword') is-invalid @enderror" type="password" name="oldPassword" placeholder="Old Password" value="{{old('oldPassword')}}"/>
                                <label for="oldPassword">Old Password</label>
                                <span class="text-danger">@error('oldPassword') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control @error('newPassword') is-invalid @enderror" type="password" name="newPassword" placeholder="New Password" value="{{old('newPassword')}}"/>
                                <label for="newPassword">New Password</label>
                                <span class="text-danger">@error('newPassword') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control @error('newPassword') is-invalid @enderror" type="password" name="confirmPassword" placeholder="Confirm Password" value="{{old('confirmPassword')}}"/>
                                <label for="confirmPassword">Confirm Password</label>
                                <span class="text-danger">@error('confirmPassword') {{ $message }} @enderror</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <button class="btn btn-primary" type="submit">Submit</button>
                                <a class="btn btn-secondary" href="/admin/dashboard">Cancel</a>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="card-footer text-center py-3">
                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Footer Setting</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('footer-setting')}}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control @error('content') is-invalid @enderror" type="text" name="content" placeholder="Content" value="{{$user->content}}"/>
                                <label for="content">Content</label>
                                <span class="text-danger">@error('content') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" placeholder="Phone" value="{{$user->phone}}"/>
                                <label for="phone">Phone</label>
                                <span class="text-danger">@error('phone') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{$user->email}}"/>
                                <label for="email">Email</label>
                                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control @error('fb_link') is-invalid @enderror" type="url" name="fb_link" placeholder="Facebook Link" value="{{$user->fb_link}}"/>
                                <label for="fb_link">Facebook Link</label>
                                <span class="text-danger">@error('fb_link') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control @error('twitter_link') is-invalid @enderror" type="url" name="twitter_link" placeholder="Twitter Link" value="{{$user->twitter_link}}"/>
                                <label for="twitter_link">Twitter Link</label>
                                <span class="text-danger">@error('twitter_link') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control @error('linkedin_link') is-invalid @enderror" type="url" name="linkedin_link" placeholder="Linkedin Link" value="{{$user->linkedin_link}}"/>
                                <label for="linkedin_link">Linkedin Link</label>
                                <span class="text-danger">@error('linkedin_link') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control @error('insta_link') is-invalid @enderror" type="url" name="insta_link" placeholder="Instagram Link" value="{{$user->insta_link}}"/>
                                <label for="insta_link">Instagram Link</label>
                                <span class="text-danger">@error('insta_link') {{ $message }} @enderror</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <button class="btn btn-primary" type="submit">Submit</button>
                                <a class="btn btn-secondary" href="/admin/dashboard">Cancel</a>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="card-footer text-center py-3">
                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
