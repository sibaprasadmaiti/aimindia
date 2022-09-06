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
        <a href="/admin/add-banner" class="btn btn-primary btn-sm">Add</a>
    </div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Banner Management List
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Image1</th>
                    <th>Image2</th>
                    <th>Image3</th>
                    <th>Image4</th>
                    <th>Image5</th>
                    <th>Status</th>
                    <th>Page</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Image1</th>
                    <th>Image2</th>
                    <th>Image3</th>
                    <th>Image4</th>
                    <th>Image5</th>
                    <th>Status</th>
                    <th>Page</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @if (!$banners->isEmpty())
                @foreach ($banners as $banner)
                <tr>
                    <td><img src="/uploads/images/{{ $banner->image1 }}" width="50px" alt="image1" onerror="this.onerror=null;this.src='/uploads/images/no-image.png'">@if($banner->image1)<i class="fa fa-remove img-remove" title="Remove" onclick="removeImage('banners', {{ $banner->id }}, 'image1')"></i>@endif</td>
                    <td><img src="/uploads/images/{{ $banner->image2 }}" width="50px" alt="image2" onerror="this.onerror=null;this.src='/uploads/images/no-image.png'">@if($banner->image2)<i class="fa fa-remove img-remove" title="Remove" onclick="removeImage('banners', {{ $banner->id }}, 'image2')"></i>@endif</td>
                    <td><img src="/uploads/images/{{ $banner->image3 }}" width="50px" alt="image3" onerror="this.onerror=null;this.src='/uploads/images/no-image.png'">@if($banner->image3)<i class="fa fa-remove img-remove" title="Remove" onclick="removeImage('banners', {{ $banner->id }}, 'image3')"></i>@endif</td>
                    <td><img src="/uploads/images/{{ $banner->image4 }}" width="50px" alt="image4" onerror="this.onerror=null;this.src='/uploads/images/no-image.png'">@if($banner->image4)<i class="fa fa-remove img-remove" title="Remove" onclick="removeImage('banners', {{ $banner->id }}, 'image4')"></i>@endif</td>
                    <td><img src="/uploads/images/{{ $banner->image5 }}" width="50px" alt="image5" onerror="this.onerror=null;this.src='/uploads/images/no-image.png'">@if($banner->image5)<i class="fa fa-remove img-remove" title="Remove" onclick="removeImage('banners', {{ $banner->id }}, 'image5')"></i>@endif</td>
                    <td>{{ $banner->status }}</td>
                    <td>{{ $banner->type }}</td>
                    <td>{{ $banner->created_at }}</td>
                    <td>{{ $banner->updated_at }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" title="Edit" href="/admin/edit-banner/{{ $banner->id }}">Edit</a>
                        <a class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure to delete this record?')" href="/admin/delete-banner/{{ $banner->id }}">Delete</a>
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
