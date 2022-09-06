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
        {{-- <a href="/admin/add-form" class="btn btn-primary btn-sm">Add</a> --}}
    </div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Form Management List
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Job Title</th>
                    <th>Country</th>
                    <th>Help Content</th>
                    <th>Type</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Job Title</th>
                    <th>Country</th>
                    <th>Help Content</th>
                    <th>Type</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @if (!$forms->isEmpty())
                @foreach ($forms as $form)
                <tr>
                    <td>{{ $form->first_name }} {{ $form->last_name }}</td>
                    <td>{{ $form->company }}</td>
                    <td>{{ $form->business_email }}</td>
                    <td>{{ $form->business_phone }}</td>
                    <td>{{ $form->jobtitle }}</td>
                    <td>{{ $form->country }}</td>
                    <td>{{ $form->how_we_can_help }}</td>
                    <td>{{ $form->type }}</td>
                    <td>{{ $form->created_at }}</td>
                    <td>{{ $form->updated_at }}</td>
                    <td>
                        {{-- <a class="btn btn-primary btn-sm" title="Edit" href="/admin/edit-form/{{ $form->id }}">Edit</a> --}}
                        <a class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure to delete this record?')" href="/admin/delete-form/{{ $form->id }}">Delete</a>
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
