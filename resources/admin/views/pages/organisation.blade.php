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
        <a href="/admin/add-organisation" class="btn btn-primary btn-sm">Add</a>
    </div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Organisation Management List
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>About Section Title</th>
                    <th>About Section Image1</th>
                    <th>About Section Image2</th>
                    <th>Fact Counter Image</th>
                    <th>Legal Section Image</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>About Section Title</th>
                    <th>About Section Image1</th>
                    <th>About Section Image2</th>
                    <th>Fact Counter Image</th>
                    <th>Legal Section Image</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @if (!$organisations->isEmpty())
                @foreach ($organisations as $organisation)
                <tr>
                    <td>{{ $organisation->about_section_title }} </td>
                    <td><img src="/uploads/images/{{ $organisation->about_section_image1 }}" width="50px" alt="image1" onerror="this.onerror=null;this.src='/uploads/images/no-image.png'">@if($organisation->about_section_image1)<i class="fa fa-remove img-remove" title="Remove" onclick="removeImage('Organisation', {{ $organisation->id }}, 'about_section_image1')"></i>@endif</td>
                    <td><img src="/uploads/images/{{ $organisation->about_section_image2 }}" width="50px" alt="image1" onerror="this.onerror=null;this.src='/uploads/images/no-image.png'">@if($organisation->about_section_image2)<i class="fa fa-remove img-remove" title="Remove" onclick="removeImage('Organisation', {{ $organisation->id }}, 'about_section_image2')"></i>@endif</td>
                    <td><img src="/uploads/images/{{ $organisation->fact_counter_image }}" width="50px" alt="image1" onerror="this.onerror=null;this.src='/uploads/images/no-image.png'">@if($organisation->fact_counter_image)<i class="fa fa-remove img-remove" title="Remove" onclick="removeImage('Organisation', {{ $organisation->id }}, 'fact_counter_image')"></i>@endif</td>
                    <td><img src="/uploads/images/{{ $organisation->legal_section_image }}" width="50px" alt="image1" onerror="this.onerror=null;this.src='/uploads/images/no-image.png'">@if($organisation->legal_section_image)<i class="fa fa-remove img-remove" title="Remove" onclick="removeImage('Organisation', {{ $organisation->id }}, 'legal_section_image')"></i>@endif</td>
                    <td>{{ $organisation->created_at }}</td>
                    <td>{{ $organisation->updated_at }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" title="Edit" href="/admin/edit-organisation/{{ $organisation->id }}">Edit</a>
                        <a class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure to delete this record?')" href="/admin/delete-organisation/{{ $organisation->id }}">Delete</a>
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
