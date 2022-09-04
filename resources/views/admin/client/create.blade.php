@extends('layout.admin.master')
@section('title', 'Create client')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="metismenu-icon pe-7s-photo text-success"></i>
                </div>
                <div>
                    Create New client
                    <div class="page-title-subheading">
                        Fields marked with asterisk must be filled.
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <a class="btn-shadow mr-3 btn btn-shadow btn-outline-primary" href="{{route('admin.clients.create')}}"> Refresh</a>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            @include('admin.flash_message')
            <form class="myForm needs-validation" method="POST" action="{{ route('admin.clients.store') }}" novalidate enctype="multipart/form-data">
                @csrf
                @include('admin.client.form')
                <div class="form-group">

                    <button class="btn btn-shadow btn-outline-danger active">Create</button>

                </div>
            </form>
        </div>
    </div>
    @endsection

@section('script')
    <script>
        $('#upload').hide();

        //image preview
        function loadPreview(input, id) {
            $('#upload').show();
            id = id || '#upload';
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $(id).attr('src', e.target.result)
                        .width(550)
                        .height(350);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        //text editor
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });

    </script>

@endsection