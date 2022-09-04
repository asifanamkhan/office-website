@extends('layout.admin.master')
@section('title', 'Portfolio')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-gleam text-success"></i>
                </div>
                <div>
                    Portfolio - {{$portfolio['data']->title}}
                </div>
            </div>
            <div class="page-title-actions">
                <a class="btn-shadow mr-3 btn btn-shadow btn-outline-success" href="{{route('admin.portfolios.index')}}"> All portfolios</a>
                <a class="btn-shadow mr-3 btn btn-shadow btn-outline-primary" href="{{route('admin.portfolios.edit',$portfolio['data']->id)}}"> Edit</a>
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
                        <img src="{{ asset('images/portfolios/'.$portfolio['data']->image)  }}" alt="image" class="img-thumbnail" style="height: 280px; width: 340px">
                    </div>
                </div>
                <div class="col-md-9">
                    <table style="width: 100%;" id="dataTable" class="table table-hover table-striped table-bordered">
                        <tbody>
                        @if($portfolio['status']==='success')
                            <tr>
                                <th width="20%">Name</th>
                                <td>{{ $portfolio['data']->title }}</td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>{{ $portfolio['data']->category ? $portfolio['data']->category->name: '--' }}</td>
                            </tr>
                            <tr>
                                <th>Tags</th>
                                <td>
                                    @if($portfolio['data']['tags']->count() > 0)
                                        @foreach($portfolio['data']['tags'] as $tag)
                                            <div class="badge badge-warning">{{ $tag->name }}</div>
                                        @endforeach
                                    @else
                                        No tag attached
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Link</th>
                                <td>{{$portfolio['data']->link}}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{!! $portfolio['data']->description !!} </td>
                            </tr>

                            <tr>
                                <th>Status</th>
                                <td>
                                    <div class="badge {{$portfolio['data']->is_active == 1 ? 'badge-success' : 'badge-danger'}} ">
                                        {{ $portfolio['data']->is_active == 1 ? 'Active' : 'Deactivated' }}
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
