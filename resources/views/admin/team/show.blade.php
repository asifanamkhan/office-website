@extends('layout.admin.master')
@section('title', 'Team')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-gleam text-success"></i>
                </div>
                <div>
                    Team - {{ $team['data']->name }}
                </div>
            </div>
            <div class="page-title-actions">
                <a class="btn-shadow mr-3 btn btn-shadow btn-outline-success" href="{{route('admin.teams.index')}}"> All teams</a>
                <a class="btn-shadow mr-3 btn btn-shadow btn-outline-primary" href="{{route('admin.teams.edit',$team['data']->id)}}"> Edit</a>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            @include('admin.flash_message')
            <div class="form-row">
                <div class="col-md-3 text-center">
                    <p><b>Image</b></p>
                    <div class="form-group">
                        <img src="{{ asset('images/teams/'.$team['data']->image)  }}" alt="image" class="img-thumbnail" style="height: 280px; width: 340px">
                    </div>
                </div>
                <div class="col-md-9">
                    <table style="width: 100%;" id="dataTable" class="table table-hover table-striped table-bordered">
                        <tbody>
                        @if($team['status']==='success')
                            <tr>
                                <th width="20%">Name</th>
                                <td>{{ $team['data']->name }}</td>
                            </tr>
                            <tr>
                                <th>Designation</th>
                                <td>{{ $team['data']->designation }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $team['data']->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $team['data']->phone }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{!! $team['data']->address !!} </td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{!! $team['data']->description !!} </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td><div class="badge {{$team['data']->is_active == 1 ? 'badge-success' : 'badge-danger'}} ">
                                        {{ $team['data']->is_active == 1 ? 'Active' : 'Deactivated' }}
                                    </div>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
