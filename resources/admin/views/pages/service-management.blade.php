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
        <a href="/admin/add-service-view" class="btn btn-primary btn-sm">Add</a>
    </div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
       Service Management List
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Slug</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Slug</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @if (!$serviceManagements->isEmpty())
                @foreach ($serviceManagements as $serviceManagement)
                <tr>
                    <td>{{ $serviceManagement->slug }}</td>
                    <td>{{ $serviceManagement->created_at }}</td>
                    <td>{{ $serviceManagement->updated_at }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" title="Edit" href="/admin/edit-service-view/{{ $serviceManagement->id }}">Edit</a>
                        <a class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure to delete this record?')" href="/admin/delete-service/{{ $serviceManagement->id }}">Delete</a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4">Records Not Found</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection
