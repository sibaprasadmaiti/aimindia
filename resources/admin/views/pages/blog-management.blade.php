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
        <a href="/admin/add-page-content-view" class="btn btn-primary btn-sm">Add</a>
    </div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Page Content Management List
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Page</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Page</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @if (!$blogManagements->isEmpty())
                @foreach ($blogManagements as $blogManagement)
                <tr>
                    <td>{{ $blogManagement->title }}</td>
                    <td>{{ $blogManagement->description }}</td>
                    <td>
                        <img src="/uploads/images/{{ $blogManagement->image }}" width="50px" alt="image1" onerror="this.onerror=null;this.src='/uploads/images/no-image.png'">
                        @if($blogManagement->image)<i class="fa fa-remove img-remove" title="Remove" onclick="removeImage('blog_management', {{ $blogManagement->id }}, 'image')"></i>@endif
                    </td>
                    <td>{{ $blogManagement->type }}</td>
                    <td>{{ $blogManagement->status }}</td>
                    <td>{{ $blogManagement->created_at }}</td>
                    <td>{{ $blogManagement->updated_at }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" title="Edit" href="/admin/edit-page-content-view/{{ $blogManagement->id }}">Edit</a>
                        <a class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure to delete this record?')" href="/admin/delete-page-content/{{ $blogManagement->id }}">Delete</a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="8">Records Not Found</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
</div>
<script>
function removeImage(table, id, columnName) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
        },
        url: "/admin/remove-image",
        type: "POST",
        data: {
            table: table,
            id: id,
            columnName: columnName
        },
        success: function(response) {
            if (response) {
                alert("Image Remove Successfully.");
                location.reload();
            }else{
               alert("Image Remove Failed.");
            }
        }
    });
}
</script>
@endsection
