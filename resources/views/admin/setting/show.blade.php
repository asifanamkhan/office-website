@extends('layout.admin.master')
@section('title', 'Setting')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-gleam text-success"></i>
                </div>
                <div>
                    Setting - {{ $setting['data']->name }}
                </div>
            </div>
            <div class="page-title-actions">
                <a class="btn-shadow mr-3 btn btn-shadow btn-outline-success" href="{{route('admin.settings.index')}}"> All settings</a>
                <a class="btn-shadow mr-3 btn btn-shadow btn-outline-primary" href="{{route('admin.settings.edit',$setting['data']->id)}}"> Edit</a>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            @include('admin.flash_message')
            <div class="form-row">
                <div class="col-md-3 text-center">
                    <div class="form-group">
                        <p><b>Company logo</b></p>
                        <img src="{{asset('images/settings/'.$setting['data']->logo)}}" alt="logo" class="img-thumbnail" style="height: 280px; width: 340px">
                    </div>
                    <div class="form-group">
                        <p><b>Company favicon</b></p>
                        <img src="{{asset('images/settings/'.$setting['data']->favicon)}}" alt="logo" class="img-thumbnail" style="height: 180px; width: 240px">
                    </div>
                </div>
                <div class="col-md-9">
                    <table style="width: 100%;" id="dataTable" class="table table-hover table-striped table-bordered">
                        <tbody>
                        @if($setting['status']==='success')
                            <tr>
                                <th width="25%">Name</th>
                                <td>{{ $setting['data']->name }}</td>
                            </tr>
                            <tr>
                                <th>Email 1</th>
                                <td>{{ $setting['data']->email_1 }}</td>
                            </tr>
                            <tr>
                                <th>Email 2</th>
                                <td>{{ $setting['data']->email_2 }}</td>
                            </tr>
                            <tr>
                                <th>Phone 1</th>
                                <td>{{ $setting['data']->phone_1 }}</td>
                            </tr>
                            <tr>
                                <th>Phone 2</th>
                                <td>{{ $setting['data']->phone_2 }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{!! $setting['data']->address !!} </td>
                            </tr>
                            <tr>
                                <th>Facebook link</th>
                                <td>{{ $setting['data']->facebook_link }}</td>
                            </tr>
                            <tr>
                                <th>Youtube link</th>
                                <td>{{ $setting['data']->youtube_link }}</td>
                            </tr>
                            <tr>
                                <th>LinkedIn link</th>
                                <td>{{ $setting['data']->linkedin_link }}</td>
                            </tr>
                            <tr>
                                <th>Instagram link</th>
                                <td>{{ $setting['data']->instagram_link }}</td>
                            </tr>
                            <tr>
                                <th>Twitter link</th>
                                <td>{{ $setting['data']->twitter_link }}</td>
                            </tr>
                            <tr>
                                <th>Skype link</th>
                                <td>{{ $setting['data']->skype_link }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{!! $setting['data']->description !!} </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <div class="badge {{$setting['data']->is_active == 1 ? 'badge-success' : 'badge-danger'}} ">
                                        {{ $setting['data']->is_active == 1 ? 'Active' : 'Deactivated' }}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Google map Location</th>
                                <td class="">
                                    <iframe style="width: 100%; border: 0" src="{{$setting['data']->google_location}}" frameborder="0" allowfullscreen></iframe>
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
