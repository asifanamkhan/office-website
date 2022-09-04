@extends('layout.admin.master')
@section('title', 'Slides')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-gleam text-success"></i>
                </div>
                <div>
                    All Slides
                </div>
            </div>
            <div class="page-title-actions">
                <a class="btn-shadow mr-3 btn btn-shadow btn-outline-primary" href="{{route('admin.slides.create')}}"> Add slide</a>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            @include('admin.flash_message')
            <table style="width: 100%;" id="dataTable" class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th>Sl#</th>
                    <th width="">Title</th>
                    <th width="">Description</th>
                    <th width="">Image</th>
                    <th width="">Status</th>
                    <th width="">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if($slides['status']=='success' && sizeof($slides['data']) )
                    @foreach ($slides['data'] as $slide)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $slide->title }}</td>
                            <td>{!! $slide->description !!}  </td>
                            <td>
                                <div >
                                    <img src="{{ asset('images/slides/' . $slide->image) }}" alt="image" class="img-thumbnail" style="height: 100px; width: 150px">
                                </div>
                            </td>
                            <td>
                                <div class="badge {{$slide->is_active == 1 ? 'badge-success' : 'badge-danger'}} ">
                                    {{ $slide->is_active == 1 ? 'Active' : 'Deactivated' }}
                                </div>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.slides.edit', $slide->id) }}" title="Edit">
                                        <button class=" mr-2 btn-icon btn-icon-only btn btn-shadow btn-outline-primary">
                                            <i class="pe-7s-tools btn-icon-wrapper"></i>
                                        </button>
                                    </a>
                                    <form action="{{ route('admin.slides.destroy', $slide->id) }}" method="POST" class="delete_form">
                                        @csrf
                                        @method('DELETE')
                                        <button class=" mr-2 btn-icon btn-icon-only btn btn-shadow btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
