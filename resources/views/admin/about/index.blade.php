@extends('layout.admin.master')
@section('title', 'About us')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-gleam text-success"></i>
                </div>
                <div>
                    About us
                </div>
            </div>
            <div class="page-title-actions">
                <a class="btn-shadow mr-3 btn btn-outline-primary" href="{{route('admin.abouts.create')}}"> Add about</a>
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
                    <th width="">Sub title</th>
                    <th width="">Description</th>
                    <th width="">Status</th>
                    <th width="">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if($abouts['status']=='success' && sizeof($abouts['data']) )
                    @foreach ($abouts['data'] as $about)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $about->title }}</td>
                            <td>{{ $about->sub_title }}</td>
                            <td>{!! $about->description !!}  </td>
                            <td>
                                <div class="badge {{$about->is_active == 1 ? 'badge-success' : 'badge-danger'}} ">
                                    {{ $about->is_active == 1 ? 'Active' : 'Deactivated' }}
                                </div>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.abouts.edit', $about->id) }}" title="Edit">
                                        <button class=" mr-2 btn-icon btn-icon-only btn btn-shadow btn-outline-primary">
                                            <i class="pe-7s-tools btn-icon-wrapper"></i>
                                        </button>
                                    </a>
                                    <form action="{{ route('admin.abouts.destroy', $about->id) }}" method="POST" class="delete_form">
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
