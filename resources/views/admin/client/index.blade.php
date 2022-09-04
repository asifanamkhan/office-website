@extends('layout.admin.master')
@section('title', 'Client')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-gleam text-success"></i>
                </div>
                <div>
                    Client
                </div>
            </div>
            <div class="page-title-actions">
                <a class="btn-shadow mr-3 btn btn-shadow btn-outline-primary" href="{{route('admin.clients.create')}}"> Add client</a>
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
                    <th width="">Company</th>
                    <th width="">Status</th>
                    <th width="">QR</th>
                    <th width="">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if($clients['status']==='success' && sizeof($clients['data']) )
                    @foreach ($clients['data'] as $client)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->phone }}</td>
                            <td>{{ $client->company }}</td>
                            <td>
                                <div class="badge {{$client->is_active == 1 ? 'badge-success' : 'badge-danger'}} ">
                                    {{ $client->is_active == 1 ? 'Active' : 'Deactivated' }}
                                </div>
                            </td>
                            <td>
                                {!! QrCode::size(50)->merge('https://www.nicesnippets.com/image/imgpsh_fullsize.png', 0.5, true)
                                ->generate($client->name);


                                !!}

                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.clients.show', $client->id) }}" title="View">
                                        <button class=" mr-2 btn-icon btn-icon-only btn btn-shadow btn-outline-success">
                                            <i class="pe-7s-note2 btn-icon-wrapper"></i>
                                        </button>
                                    </a>

                                    <a href="{{ route('admin.clients.edit', $client->id) }}" title="Edit">
                                        <button class=" mr-2 btn-icon btn-icon-only btn btn-shadow btn-outline-primary">
                                            <i class="pe-7s-tools btn-icon-wrapper"></i>
                                        </button>
                                    </a>
                                    <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" class="delete_form">
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
