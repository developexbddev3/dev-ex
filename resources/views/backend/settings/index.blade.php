@extends('backend.layout.master')

@section('content')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Site Settings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- .card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Settings</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('admin.setting.update') }}" class="form-row" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="site_name">Site name</label>
                                <input type="text" class="form-control" name="site_name" id="site_name" value="{{ @$setting->site_name }}" placeholder="Site name">
                                @error('site_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="site_title">Site title</label>
                                <input type="text" class="form-control" name="site_title" id="site_title" value="{{ @$setting->site_title }}" placeholder="Site title">
                                @error('site_title')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="short_description">Short description</label>
                                <input type="text" class="form-control" name="short_description" id="short_description" value="{{ @$setting->short_description }}" placeholder="Short description">
                                @error('short_description')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" name="description" id="description" value="{{ @$setting->description }}" placeholder="Description">
                                @error('description')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="footer_description">Footer description</label>
                                <input type="text" class="form-control" name="footer_description" id="footer_description" value="{{ @$setting->footer_description }}" placeholder="Footer description">
                                @error('footer_description')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="mobile_number">Mobile number</label>
                                <input type="text" class="form-control" name="mobile_number" id="mobile_number" value="{{ @$setting->mobile_number }}" placeholder="Mobile number">
                                @error('mobile_number')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="imo_number">Imo number</label>
                                <input type="text" class="form-control" name="imo_number" id="imo_number" value="{{ @$setting->imo_number }}" placeholder="Imo number">
                                @error('imo_number')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="whatsapp_number">Whatsapp number</label>
                                <input type="text" class="form-control" name="whatsapp_number" id="whatsapp_number" value="{{ @$setting->whatsapp_number }}" placeholder="Whatsapp number">
                                @error('whatsapp_number')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ @$setting->email }}" placeholder="Email">
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="header_logo">Header logo</label>
                                <div class="d-flex">
                                    <input type="file" class="form-control flex-1" name="header_logo" id="header_logo">
                                    <img src="{{ asset(@$setting->header_logo) }}" width="30" alt="some">
                                </div>
                                @error('header_logo')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror 
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="footer_logo">Footer logo</label>
                                <div class="d-flex">
                                    <input type="file" class="form-control" name="footer_logo" id="footer_logo" placeholder="Footer logo">
                                    <img src="{{ asset(@$setting->footer_logo) }}" width="30" alt="some">
                                </div>
                                @error('footer_logo')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="favicon">Favicon</label>
                                <div class="d-fle">
                                    <input type="file" class="form-control" name="favicon" id="favicon" placeholder="Favicon">
                                    <img src="{{ asset(@$setting->favicon) }}" width="30" alt="some">
                                </div>
                                @error('favicon')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" id="address" value="{{ @$setting->address }}" placeholder="Address">
                                @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="keyword">Keyword</label>
                                <input type="text" class="form-control" name="keyword" id="keyword" value="{{ @$setting->keyword }}" placeholder="Keyword">
                                @error('keyword')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="app_link">App Link</label>
                                <input type="text" class="form-control" name="app_link" id="app_link" value="{{ @$setting->app_link }}" placeholder="App Link">
                                @error('app_link')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="facebook_link">Facebook link</label>
                                <input type="text" class="form-control" name="facebook_link" id="facebook_link" value="{{ @$setting->facebook_link }}" placeholder="Facebook link">
                                @error('facebook_link')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="twitter_link">Twitter Link</label>
                                <input type="text" class="form-control" name="twitter_link" id="twitter_link" value="{{ @$setting->twitter_link }}" placeholder="Twitter Link">
                                @error('twitter_link')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="skype_link">Skype Link</label>
                                <input type="text" class="form-control" name="skype_link" id="skype_link" value="{{ @$setting->skype_link }}" placeholder="Skype Link">
                                @error('skype_link')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="youtube_link">Youtube link</label>
                                <input type="text" class="form-control" name="youtube_link" id="youtube_link" value="{{ @$setting->youtube_link }}" placeholder="Youtube link">
                                @error('youtube_link')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="instagram_link">Instagram link</label>
                                <input type="text" class="form-control" name="instagram_link" id="instagram_link" value="{{ @$setting->instagram_link }}" placeholder="Instagram link">
                                @error('instagram_link')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="linkedin_link">Linkedin link</label>
                                <input type="text" class="form-control" name="linkedin_link" id="linkedin_link" value="{{ @$setting->linkedin_link }}" placeholder="Linkedin link">
                                @error('linkedin_link')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="google_map_location">Linkedin link</label>
                                <input type="text" class="form-control" name="google_map_location" id="google_map_location" value="{{ @$setting->google_map_location }}" placeholder="Google map location">
                                @error('google_map_location')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection