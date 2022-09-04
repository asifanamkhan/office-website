@extends('layout.admin.master')
@section('title', 'Newsletter ')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-gleam text-success"></i>
                </div>
                <div>
                    Newsletter
                </div>
            </div>
            <div class="page-title-actions">
                <a class="btn-shadow mr-3 btn btn-shadow btn-outline-primary" href="{{route('admin.newsletters.create')}}"> Add newsletter</a>
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
                    <th width="">Email</th>
                    <th width="">Phone</th>
                    <th width="">Status</th>
                    <th width="">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if($newsletters['status']==='success' && sizeof($newsletters['data']) )
                    @foreach ($newsletters['data'] as $newsletter)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $newsletter->name }}</td>
                            <td>{{ $newsletter->email }}</td>
                            <td>{{ $newsletter->phone }}</td>
                            <td>
                                <div class="badge {{$newsletter->is_active == 1 ? 'badge-success' : 'badge-danger'}} ">
                                    {{ $newsletter->is_active == 1 ? 'Active' : 'Deactivated' }}
                                </div>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.newsletters.show', $newsletter->id) }}" title="View">
                                        <button class=" mr-2 btn-icon btn-icon-only btn btn-shadow btn-outline-success">
                                            <i class="pe-7s-note2 btn-icon-wrapper"></i>
                                        </button>
                                    </a>
                                    <a href="{{ route('admin.newsletters.edit', $newsletter->id) }}" title="Edit">
                                        <button class=" mr-2 btn-icon btn-icon-only btn btn-shadow btn-outline-primary">
                                            <i class="pe-7s-tools btn-icon-wrapper"></i>
                                        </button>
                                    </a>
                                    <form action="{{ route('admin.newsletters.destroy', $newsletter->id) }}" method="POST" class="delete_form">
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



