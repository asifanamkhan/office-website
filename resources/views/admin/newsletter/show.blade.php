@extends('layout.admin.master')
@section('title', 'Newsletter')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-gleam text-success"></i>
                </div>
                <div>
                    Newsletter - {{$newsletter['data']->email}}
                </div>
            </div>
            <div class="page-title-actions">
                <a class="btn-shadow mr-3 btn btn-shadow btn-outline-success" href="{{route('admin.newsletters.index')}}"> All newsletters</a>
                <a class="btn-shadow mr-3 btn btn-shadow btn-outline-primary" href="{{route('admin.newsletters.edit',$newsletter['data']->id)}}"> Edit</a>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            @include('admin.flash_message')
            <table style="width: 100%;" id="dataTable" class="table table-hover table-striped table-bordered">
                <tbody>
                @if($newsletter['status']==='success')
                    <tr>
                        <th width="20%">Name</th>
                        <td>{{ $newsletter['data']->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $newsletter['data']->email }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $newsletter['data']->phone }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{!! $newsletter['data']->address !!} </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <div class="badge {{$newsletter['data']->is_active == 1 ? 'badge-success' : 'badge-danger'}} ">
                                {{ $newsletter['data']->is_active == 1 ? 'Active' : 'Deactivated' }}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Promotion</th>
                        <td>
                            <div class="badge {{$newsletter['data']->is_promotion == 1 ? 'badge-success' : 'badge-warning'}} ">
                                {{ $newsletter['data']->is_promotion == 1 ? 'Yes' : 'No' }}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Discount</th>
                        <td>
                            <div class="badge {{$newsletter['data']->is_discount == 1 ? 'badge-success' : 'badge-warning'}} ">
                                {{ $newsletter['data']->is_discount == 1 ? 'Yes' : 'No' }}
                            </div>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
