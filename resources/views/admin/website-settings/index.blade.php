@extends('layouts.app')

@section('customcss')
    <style>
        .swal2-popup {
            font-size: 0.8rem;
            /* Adjust font size */
            padding: 0.5rem;
            /* Adjust padding */
            width: 300px;
            /* Adjust width */
        }

        .swal2-title {
            font-size: 1rem;
            /* Adjust title font size */
        }

        .swal2-content {
            font-size: 0.9rem;
            /* Adjust content font size */
        }
    </style>
@endsection


@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Website Settings</h1>
                </div>
                
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <form action="{{route('admin.settings.update')}}" method="POST" id="homeSliderform" name="homeSliderform" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input type="text" value="{{$websiteSettings->email}}" name="email" id="email" class="form-control" placeholder="Enter email">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone">Phone</label>
                                        <input type="text" value="{{$websiteSettings->phone}}" name="phone" id="phone" class="form-control" placeholder="Enter phone">
                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="address">Address</label>
                                        <textarea type="text"rows="4" name="address" id="address" class="form-control">{{$websiteSettings->address}}</textarea>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="logo">Logo<span class="text-danger"> W-270×H-50 pixels</span></label>
                                        <input type="file" value="{{$websiteSettings->logo}}" name="logo" id="logo" class="form-control">
                                        
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                <div class="mt-3">
                                    
                                    <img src="{{$websiteSettings->logo}}" alt="Logo" class="img-fluid" style="width: 270px; height: 50px;">
                                    
                                </div>
                            </div>
                                <div class="col-md-6">
                                    <div class="mt-3">
                                        <label for="favicon">Favicon<span class="text-danger"> 32×32 pixels</span></label>
                                        <input type="file" value="{{$websiteSettings->favicon}}" name="favicon" id="logo" class="form-control">
                                        
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        
                                        <img src="{{$websiteSettings->favicon}}" alt="favicon" class="img-fluid" style="width: 50px; height: 50px;">
                                        
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" value="{{$websiteSettings->facebook}}" name="facebook" id="facebook" class="form-control" placeholder="Enter Facebook link">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="twitter">Twitter</label>
                                        <input type="text" value="{{$websiteSettings->twitter}}" name="twitter" id="twitter" class="form-control" placeholder="Enter Twitter link">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="instagram">Instagram</label>
                                        <input type="text" value="{{$websiteSettings->instagram}}" name="instagram" id="instagram" class="form-control" placeholder="Enter Instagram link">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="linkedin">LinkedIn</label>
                                        <input type="text" value="{{$websiteSettings->linkedin}}" name="linkedin" id="linkedin" class="form-control" placeholder="Enter LinkedIn link">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="youtube">YouTube</label>
                                        <input type="text" value="{{$websiteSettings->youtube}}" name="youtube" id="youtube" class="form-control" placeholder="Enter YouTube link">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="whatsapp">WhatsApp</label>
                                        <input type="text" value="{{$websiteSettings->whatsapp}}" name="whatsapp" id="whatsapp" class="form-control" placeholder="Enter WhatsApp number">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="telegram">Telegram</label>
                                        <input type="text" value="{{$websiteSettings->telegram}}" name="telegram" id="telegram" class="form-control" placeholder="Enter Telegram link">
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </section>
@endsection

@section('customjs')
    

    
@endsection
