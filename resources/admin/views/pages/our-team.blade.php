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
        <a href="/admin/add-our-team" class="btn btn-primary btn-sm">Add</a>
    </div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        {{$title}}
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    {{-- <th>Section Title</th> --}}
                    <th>Image</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Sequence</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    {{-- <th>Section Title</th> --}}
                    <th>Image</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Sequence</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @if (!$ourTeams->isEmpty())
                @foreach ($ourTeams as $ourTeam)
                <tr>
                    {{-- <td>{{ $ourTeam->team_section_title }} </td> --}}
                    <td><img src="/uploads/images/{{ $ourTeam->team_image }}" width="50px" alt="image1" onerror="this.onerror=null;this.src='/uploads/images/no-image.png'">@if($ourTeam->team_image)<i class="fa fa-remove img-remove" title="Remove" onclick="removeImage('OurTeam', {{ $ourTeam->id }}, 'team_image')"></i>@endif</td>
                    <td>{{ $ourTeam->team_name }}</td>
                    <td>{{ $ourTeam->team_position }}</td>
                    <td>{{ $ourTeam->team_email }}</td>
                    <td>{{ $ourTeam->team_phone }}</td>
                    <td>{{ $ourTeam->sequence }}</td>
                    <td>{{ $ourTeam->status }}</td>
                    <td>{{ $ourTeam->created_at }}</td>
                    <td>{{ $ourTeam->updated_at }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" title="Edit" href="/admin/edit-our-team/{{ $ourTeam->id }}">Edit</a>
                        <a class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure to delete this record?')" href="/admin/delete-our-team/{{ $ourTeam->id }}">Delete</a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="11">Records Not Found</td>
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
