@extends('layout.admin.master')
@section('title', 'Tags ')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-gleam text-success"></i>
                </div>
                <div>
                    All Tags
                </div>
            </div>
            <div class="page-title-actions">
                <a class="btn-shadow mr-3 btn btn-shadow  btn-outline-primary" href="{{route('admin.tags.create')}}"> Add tag</a>
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
                    <th width="">Name</th>
                    <th width="">Description</th>
                    <th width="">Status</th>
                    <th width="">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if($tags['status']=='success' && sizeof($tags['data']) )
                    @foreach ($tags['data'] as $tag)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>{!! $tag->description !!}  </td>
                            <td>
                                <div class="badge {{$tag->is_active == 1 ? 'badge-success' : 'badge-danger'}} ">
                                    {{ $tag->is_active == 1 ? 'Active' : 'Deactivated' }}
                                </div>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.tags.edit', $tag->id) }}" title="Edit">
                                        <button class=" mr-2 btn-icon btn-icon-only btn btn-shadow  btn-outline-primary">
                                            <i class="pe-7s-tools btn-icon-wrapper"></i>
                                        </button>
                                    </a>
                                    <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST" class="delete_form">
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
