@extends('layout.admin.master')
@section('title', 'Portfolios')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-gleam text-success"></i>
                </div>
                <div>
                    Portfolios
                </div>
            </div>
            <div class="page-title-actions">
                <a class="btn-shadow mr-3 btn btn-shadow btn-outline-primary" href="{{route('admin.portfolios.create')}}"> Add portfolio</a>
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
                    <th width="">Image</th>
                    <th width="">Link</th>
                    <th width="">Status</th>
                    <th width="">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if($portfolios['status']==='success' && sizeof($portfolios['data']))
                    @foreach ($portfolios['data'] as $portfolio)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $portfolio->title }}</td>
                            <td>
                                <div >
                                    <img src="{{ asset('images/portfolios/'.$portfolio->image)  }}" alt="image" class="img-thumbnail" style="height: 50px; width: 60px">
                                </div>
                            </td>
                            <td>{{$portfolio->link}} </td>
                            <td>
                                <div class="badge {{$portfolio->is_active == 1 ? 'badge-success' : 'badge-danger'}} ">
                                    {{ $portfolio->is_active == 1 ? 'Active' : 'Deactivated' }}
                                </div>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.portfolios.show', $portfolio->id) }}" title="View">
                                        <button class=" mr-2 btn-icon btn-icon-only btn btn-shadow btn-outline-success">
                                            <i class="pe-7s-note2 btn-icon-wrapper"></i>
                                        </button>
                                    </a>
                                    <a href="{{ route('admin.portfolios.edit', $portfolio->id) }}" title="Edit">
                                        <button class=" mr-2 btn-icon btn-icon-only btn btn-shadow btn-outline-primary">
                                            <i class="pe-7s-tools btn-icon-wrapper"></i>
                                        </button>
                                    </a>
                                    <form action="{{ route('admin.portfolios.destroy', $portfolio->id) }}" method="POST" class="delete_form">
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
