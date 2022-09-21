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
                        <form action="/admin/save-contact" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id"
                                @if ($contact) value="{{ $contact->id }}" @endif>
                            <div class="form-group">
                                <label for="type">Type<span style="color: red">*</span></label>
                                <select class="form-control" name="type">
                                    <option value="">Chhose Option</option>
                                    <option value="CONTACT"
                                        @if ($contact) @if ($contact->type == "CONTACT") selected @endif
                                        @endif>CONTACT</option>
                                        <option value="SUBSCRIBE"
                                        @if ($contact) @if ($contact->type == "SUBSCRIBE") selected @endif
                                        @endif>SUBSCRIBE</option>
                                </select>
                                <span class="text-danger">
                                    @error('type')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="contact_name">Name<span style="color: red">*</span></label>
                                <input type="text" name="contact_name"
                                    @if ($contact) value="{{ $contact->contact_name }}" @endif
                                    class="form-control @error('contact_name') is-invalid @enderror">
                                <span class="text-danger">
                                    @error('contact_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="contact_email">Email<span style="color: red">*</span></label>
                                <input type="email" name="contact_email"
                                    @if ($contact) value="{{ $contact->contact_email }}" @endif
                                    class="form-control @error('contact_email') is-invalid @enderror">
                                <span class="text-danger">
                                    @error('contact_email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="contact_subject">Subject</label>
                                <textarea name="contact_subject" id="contact_subject" class="form-control cleditor @error('contact_subject') is-invalid @enderror">
                                    @if ($contact) {{ $contact->contact_subject }} @endif
                                    </textarea>
                                <span class="text-danger">
                                    @error('contact_subject')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="contact_message">Message</label>
                                <textarea name="contact_message" id="contact_message" class="form-control cleditor @error('contact_message') is-invalid @enderror">
                                    @if ($contact) {{ $contact->contact_message }} @endif
                                    </textarea>
                                <span class="text-danger">
                                    @error('contact_message')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mb-3"></div>

                            <button type="submit" class="btn btn-success btn-sm">Submit</button>
                            <a class="btn btn-secondary btn-sm" href="/admin/contact">Cancel</a>
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
        // $("document").ready(function() {
        //     fetchTitle('contact_heading');
        // });

        // function fetchTitle(id) {
        //     $.ajax({
        //         headers: {
        //             'X-CSRF-TOKEN': "{{ csrf_token() }}",
        //         },
        //         url: "/admin/fetch-contact-heading",
        //         type: "POST",
        //         data: {},
        //         success: function(response) {
        //             console.log(response);
        //             if (response) {
        //                 $("#" + id).val(response.contact_heading).blur();
        //             } else {
        //                 $("#" + id).val('').blur();
        //             }
        //         }
        //     });
        // }
    </script>
@endsection
