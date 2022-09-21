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
                        <form action="/admin/save-activities" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id"
                                @if ($activities) value="{{ $activities->id }}" @endif>

                            <div class="form-group">
                                <label for="activities_heading">Heading</label>
                                <textarea name="activities_heading" id="activities_heading" class="form-control cleditor @error('activities_heading') is-invalid @enderror">
                                    @if ($activities) {{ $activities->activities_heading }} @endif
                                    </textarea>
                                <span class="text-danger">
                                    @error('activities_heading')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="activities_image">Image<span style="color: red">*</span></label>
                                <input type="file" name="activities_image"
                                    class="form-control @error('activities_image') is-invalid @enderror">
                                <span class="text-danger">
                                    @error('activities_image')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="activities_title">Title<span style="color: red">*</span></label>
                                <textarea name="activities_title" id="activities_title"
                                    class="form-control cleditor @error('activities_title') is-invalid @enderror">
                                    @if ($activities) {{ $activities->activities_title }} @endif
                                    </textarea>
                                <span class="text-danger">
                                    @error('activities_title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="activities_content">Content<span style="color: red">*</span></label>
                                <textarea name="activities_content" id="activities_content" class="form-control cleditor @error('activities_content') is-invalid @enderror">
                                    @if ($activities) {{ $activities->activities_content }} @endif
                                    </textarea>
                                <span class="text-danger">
                                    @error('activities_content')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="activities_date">Date</label>
                                <input type="date" name="activities_date"
                                    class="form-control @error('activities_date') is-invalid @enderror" min="1">
                                <span class="text-danger">
                                    @error('activities_date')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="sequence">Sequence</label>
                                <input type="number" min="1" name="sequence"
                                    @if ($activities) value="{{ $activities->sequence }}" @endif
                                    class="form-control @error('sequence') is-invalid @enderror">
                                <span class="text-danger">
                                    @error('sequence')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            @if (!empty($activities))
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" name="status">
                                        <option value="ACTIVE" @if ($activities->status == 'ACTIVE') selected @endif>ACTIVE
                                        </option>
                                        <option value="INACTIVE" @if ($activities->status == 'INACTIVE') selected @endif>
                                            INACTIVE</option>
                                    </select>
                                    <span class="text-danger">
                                        @error('status')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            @endif
                            <div class="mb-3"></div>

                            <button type="submit" class="btn btn-success btn-sm">Submit</button>
                            <a class="btn btn-secondary btn-sm" href="/admin/activities">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".cleditor").cleditor();
        });
    </script>
    <script>
        $("document").ready(function() {
            fetchTitle('activities_heading');
        });

        function fetchTitle(id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "/admin/fetch-activities-heading",
                type: "POST",
                data: {},
                success: function(response) {
                    console.log(response);
                    if (response) {
                        $("#" + id).val(response.activities_heading).blur();
                    } else {
                        $("#" + id).val('').blur();
                    }
                }
            });
        }
    </script>
@endsection
