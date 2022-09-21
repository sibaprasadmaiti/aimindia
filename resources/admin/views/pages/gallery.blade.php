@extends('layouts.app_admin')
@section('content')
<div class="container-fluid px-4">
    @if(Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    @if(Session::has('fail'))
    <div class="alert alert-danger">{{Session::get('fail')}}</div>
    @endif
    <div class="text-right mb-2 mt-4 add-btn" >
        <a href="/admin/add-gallery" class="btn btn-primary btn-sm">Add</a>
    </div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Gallery Management List
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Sequence</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Sequence</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @if (!$galleries->isEmpty())
                @foreach ($galleries as $gallery)
                <tr>
                    <td>{{ $gallery->gallery_title }} </td>
                    <td><img src="/uploads/images/{{ $gallery->gallery_image }}" width="50px" alt="image1" onerror="this.onerror=null;this.src='/uploads/images/no-image.png'">@if($gallery->gallery_image)<i class="fa fa-remove img-remove" title="Remove" onclick="removeImage('Galleries', {{ $gallery->id }}, 'gallery_image')"></i>@endif</td>
                    <td>{{ $gallery->sequence }}</td>
                    <td>{{ $gallery->status }}</td>
                    <td>{{ $gallery->created_at }}</td>
                    <td>{{ $gallery->updated_at }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" title="Edit" href="/admin/edit-gallery/{{ $gallery->id }}">Edit</a>
                        <a class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure to delete this record?')" href="/admin/delete-gallery/{{ $gallery->id }}">Delete</a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="7">Records Not Found</td>
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
