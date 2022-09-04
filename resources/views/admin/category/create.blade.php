@extends('layout.admin.master')
@section('title', 'Category')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="metismenu-icon pe-7s-photo text-success"></i>
                </div>
                <div>
                    Create New Category
                    <div class="page-title-subheading">
                        Fields marked with asterisk must be filled.
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <a class="btn-shadow mr-3 btn btn-shadow btn-outline-primary" href="{{route('admin.categories.create')}}"> Refresh</a>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            @include('admin.flash_message')
            <form class="myForm needs-validation" method="POST" action="{{ route('admin.categories.store') }}" novalidate enctype="multipart/form-data">
                @csrf
                @include('admin.category.form')
                <div class="form-group">

                    <button class="btn btn-shadow btn-outline-danger active">Create</button>

                </div>
            </form>
        </div>
    </div>
    @endsection

@section('script')
    <script>

        //text editor
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });

    </script>

@endsection