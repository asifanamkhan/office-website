@extends('layout.admin.master')
@section('title', 'Testimonial')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-gleam text-success"></i>
                </div>
                <div>
                    Testimonial - {{$testimonial['data']->name}}
                </div>
            </div>
            <div class="page-title-actions">
                <a class="btn-shadow mr-3 btn btn-shadow btn-outline-success" href="{{route('admin.testimonials.index')}}"> All testimonials</a>
                <a class="btn-shadow mr-3 btn btn-shadow btn-outline-primary" href="{{route('admin.testimonials.edit',$testimonial['data']->id)}}"> Edit</a>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            @include('admin.flash_message')
            <div class="form-row">
                <div class="col-md-3 text-center">
                    <p><b>Logo</b></p>
                    <div class="form-group">
                        <img src="{{ asset('images/testimonials/'.$testimonial['data']->logo)  }}" alt="image" class="img-thumbnail" style="height: 280px; width: 340px">
                    </div>
                </div>
                <div class="col-md-9">
                    <table style="width: 100%;" id="dataTable" class="table table-hover table-striped table-bordered">
                        <tbody>
                        @if($testimonial['status']==='success')
                            <tr>
                                <th width="20%">Name</th>
                                <td>{{ $testimonial['data']->name }}</td>
                            </tr>
                            <tr>
                                <th>Company</th>
                                <td>{{ $testimonial['data']->company }}</td>
                            </tr>
                            <tr>
                                <th>Rating</th>
                                <td>{{ $testimonial['data']->rating }}</td>
                            </tr>
                            <tr>
                                <th>Review</th>
                                <td>{!! $testimonial['data']->review !!} </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <div class="badge {{$testimonial['data']->is_active == 1 ? 'badge-success' : 'badge-danger'}} ">
                                        {{ $testimonial['data']->is_active == 1 ? 'Active' : 'Deactivated' }}
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
