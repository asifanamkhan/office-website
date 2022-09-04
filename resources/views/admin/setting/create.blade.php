@extends('layout.admin.master')
@section('title', 'Create setting')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="metismenu-icon pe-7s-photo text-success"></i>
                </div>
                <div>
                    Create new setting
                    <div class="page-title-subheading">
                        Fields marked with asterisk must be filled.
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <a class="btn-shadow mr-3 btn btn-shadow btn-outline-primary" href="{{route('admin.settings.create')}}"> Refresh</a>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            @include('admin.flash_message')
            <form class="myForm needs-validation" method="POST" action="{{ route('admin.settings.store') }}" novalidate enctype="multipart/form-data">
                @csrf
                @include('admin.setting.form')
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
        $('#favicon_upload').hide();

        //logo preview
        function loadPreview(input, id) {
            $('#upload').show();
            id = id || '#upload';
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $(id).attr('src', e.target.result)
                        .width(450)
                        .height(300);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        //logo preview
        function faviconPreview(input, id) {
            $('#favicon_upload').show();
            id = id || '#favicon_upload';
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $(id).attr('src', e.target.result)
                        .width(200)
                        .height(200);
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