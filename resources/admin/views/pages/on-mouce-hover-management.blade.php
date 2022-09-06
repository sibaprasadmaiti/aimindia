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
        <a href="/admin/add-mouce-hover-cms" class="btn btn-primary btn-sm">Add</a>
    </div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Mouce Hover CMS List
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Image1</th>
                    <th>Image2</th>
                    <th>Image3</th>
                    <th>Image4</th>
                    <th>Image5</th>
                    <th>Image6</th>
                    <th>Status</th>
                    <th>Page</th>
                    <th>Created Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Image1</th>
                    <th>Image2</th>
                    <th>Image3</th>
                    <th>Image4</th>
                    <th>Image5</th>
                    <th>Image6</th>
                    <th>Status</th>
                    <th>Page</th>
                    <th>Created Date</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @if (!$pageMouces->isEmpty())
                @foreach ($pageMouces as $pageMouce)
                <tr>
                    <td>{{ $pageMouce->title }}</td>
                    <td>{{ $pageMouce->slug }}</td>
                    <td><img src="/uploads/images/{{ $pageMouce->image1 }}" width="50px" alt="image1" onerror="this.onerror=null;this.src='/uploads/images/no-image.png'">
                        @if($pageMouce->image1)<i class="fa fa-remove img-remove" title="Remove" onclick="removeImage('page_on_mouce_hovers', {{ $pageMouce->id }}, 'image1')"></i>@endif
                    </td>
                    <td><img src="/uploads/images/{{ $pageMouce->image2 }}" width="50px" alt="image2" onerror="this.onerror=null;this.src='/uploads/images/no-image.png'">
                        @if($pageMouce->image2)<i class="fa fa-remove img-remove" title="Remove" onclick="removeImage('page_on_mouce_hovers', {{ $pageMouce->id }}, 'image2')"></i>@endif
                    </td>
                    <td><img src="/uploads/images/{{ $pageMouce->image3 }}" width="50px" alt="image3" onerror="this.onerror=null;this.src='/uploads/images/no-image.png'">
                        @if($pageMouce->image3)<i class="fa fa-remove img-remove" title="Remove" onclick="removeImage('page_on_mouce_hovers', {{ $pageMouce->id }}, 'image3')"></i>@endif
                    </td>
                    <td><img src="/uploads/images/{{ $pageMouce->image4 }}" width="50px" alt="image4" onerror="this.onerror=null;this.src='/uploads/images/no-image.png'"> @if($pageMouce->image4)<i class="fa fa-remove img-remove" title="Remove" onclick="removeImage('page_on_mouce_hovers', {{ $pageMouce->id }}, 'image4')"></i>@endif</td>
                    <td><img src="/uploads/images/{{ $pageMouce->image5 }}" width="50px" alt="image5" onerror="this.onerror=null;this.src='/uploads/images/no-image.png'"> @if($pageMouce->image5)<i class="fa fa-remove img-remove" title="Remove" onclick="removeImage('page_on_mouce_hovers', {{ $pageMouce->id }}, 'image5')"></i>@endif</td>
                    <td><img src="/uploads/images/{{ $pageMouce->image6 }}" width="50px" alt="image6" onerror="this.onerror=null;this.src='/uploads/images/no-image.png'"> @if($pageMouce->image6)<i class="fa fa-remove img-remove" title="Remove" onclick="removeImage('page_on_mouce_hovers', {{ $pageMouce->id }}, 'image6')"></i>@endif</td>
                    <td>{{ $pageMouce->status }}</td>
                    <td>{{ $pageMouce->type }}</td>
                    <td>{{ $pageMouce->created_at }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" title="Edit" href="/admin/edit-mouce-hover/{{ $pageMouce->id }}">Edit</a>
                        <a class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure to delete this record?')" href="/admin/delete-mouce-hover/{{ $pageMouce->id }}">Delete</a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="12">Records Not Found</td>
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
