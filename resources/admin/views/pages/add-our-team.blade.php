@extends('layouts.app_admin')
@section('content')
<div class="container">
    <div class="row mb-3 mt-4">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $title }}<h3>
                </div>
                <div class="card-body">
                    <form action="/admin/save-our-team" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" @if($ourTeam) value="{{ $ourTeam->id }}" @endif>
                        <div class="form-group">
                            <label for="team_section_title">Section_title</label>
                            <textarea name="team_section_title" id="team_section_title" class="form-control cleditor @error('team_section_title') is-invalid @enderror">@if($ourTeam) {{ $ourTeam->team_section_title }} @endif</textarea>
                            <span class="text-danger">@error('team_section_title') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="team_image">Image</label>
                            <input type="file" name="team_image" class="form-control @error('team_image') is-invalid @enderror">
                            <span class="text-danger">@error('team_image') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="team_name">Name</label>
                            <input type="text" name="team_name" @if($ourTeam) value="{{ $ourTeam->team_name }}" @endif class="form-control @error('team_name') is-invalid @enderror">
                            <span class="text-danger">@error('team_name') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="team_position">Position</label>
                            <input type="text" name="team_position" @if($ourTeam) value="{{ $ourTeam->team_position }}" @endif class="form-control @error('team_position') is-invalid @enderror">
                            <span class="text-danger">@error('team_position') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="team_email">Email</label>
                            <input type="email" name="team_email" @if($ourTeam) value="{{ $ourTeam->team_email }}" @endif class="form-control @error('team_email') is-invalid @enderror">
                            <span class="text-danger">@error('team_email') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="team_phone">Phone</label>
                            <input type="text" name="team_phone" @if($ourTeam) value="{{ $ourTeam->team_phone }}" @endif class="form-control @error('team_phone') is-invalid @enderror">
                            <span class="text-danger">@error('team_phone') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="team_pinterest_link">Pinterest Link</label>
                            <input type="text" name="team_pinterest_link" @if($ourTeam) value="{{ $ourTeam->team_pinterest_link }}" @endif class="form-control @error('team_pinterest_link') is-invalid @enderror">
                            <span class="text-danger">@error('team_pinterest_link') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="team_twitter_link">Twitter Link</label>
                            <input type="text" name="team_twitter_link" @if($ourTeam) value="{{ $ourTeam->team_twitter_link }}" @endif class="form-control @error('team_twitter_link') is-invalid @enderror">
                            <span class="text-danger">@error('team_twitter_link') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="team_facebook_link">Facebook Link</label>
                            <input type="text" name="team_facebook_link" @if($ourTeam) value="{{ $ourTeam->team_facebook_link }}" @endif class="form-control @error('team_facebook_link') is-invalid @enderror">
                            <span class="text-danger">@error('team_facebook_link') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="sequence">Sequence</label>
                            <input type="number" min="1" name="sequence" @if($ourTeam) value="{{ $ourTeam->sequence }}" @endif class="form-control @error('sequence') is-invalid @enderror">
                            <span class="text-danger">@error('sequence') {{ $message }} @enderror</span>
                        </div>

                        @if(!empty($ourTeam))
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status">
                            <option value="ACTIVE" @if($ourTeam->status == 'ACTIVE') selected @endif>ACTIVE</option>
                            <option value="INACTIVE" @if($ourTeam->status == 'INACTIVE') selected @endif>INACTIVE</option>
                            </select>
                            <span class="text-danger">@error('status') {{ $message }} @enderror</span>
                        </div>
                        @endif
                        <div class="mb-3"></div>

                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                       <a class="btn btn-secondary btn-sm" href="/admin/our-team">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(".cleditor").cleditor();
    });
</script>
<script>
    $("document").ready(function() {
        fetchTitle('team_section_title');
    });

    function fetchTitle(id) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
            },
            url: "/admin/fetch-team-section-title",
            type: "POST",
            data: {},
            success: function(response) {
                console.log(response);
                if (response) {
                    $("#"+id).val(response.team_section_title).blur();
                }else{
                    $("#"+id).val('').blur();
                }
            }
        });
    }
</script>
@endsection
