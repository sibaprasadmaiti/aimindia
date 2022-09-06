@extends('layouts.app_admin')
@section('content')
<div class="container-fluid px-4">
    @if(Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    @if(Session::has('fail'))
    <div class="alert alert-danger">{{Session::get('fail')}}</div>
    @endif
    <div class="text-right mb-2 mt-4">
        <a href="/admin/add-home-page-footer-cms" class="btn btn-primary btn-sm">Add</a>
    </div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Home CMS List
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content-1</th>
                    <th>Content-2</th>
                    <th>Content-3</th>
                    <th>Content-4</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Title</th>
                    <th>Content-1</th>
                    <th>Content-2</th>
                    <th>Content-3</th>
                    <th>Content-4</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @if (!$homePageCms->isEmpty())
                @foreach ($homePageCms as $homepagecms)
                <tr>
                    <td>{{ $homepagecms->title }}</td>
                    <td>{{ $homepagecms->content1 }}</td>
                    <td>{{ $homepagecms->content2 }}</td>
                    <td>{{ $homepagecms->content3 }}</td>
                    <td>{{ $homepagecms->content4 }}</td>
                    <td>{{ $homepagecms->status }}</td>
                    <td>{{ $homepagecms->created_at }}</td>
                    <td>{{ $homepagecms->updated_at }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" title="Edit" href="/admin/edit-home-page-footer-cms/{{ $homepagecms->id }}">Edit</a>
                        <a class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure to delete this record?')" href="/admin/delete-home-page-footer-cms/{{ $homepagecms->id }}">Delete</a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6">Records Not Found</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection
