@extends('layouts.app')

@section('customcss')
    <style>
        .btn.btnchange {
            background-color: #543B8C !important;
            color: #fff;
        }

        .btn.btnchange.active {
            background-color: #ED5D2B !important;
            /* Change the background color when active */
            color: #fff;
            /* Change the text color when active */
        }

        .btn.btnchange {
            margin-right: 10px;
            /* Adjust the margin-right value to set the desired gap between buttons */
        }

        .row .price-fields {
            align-items: baseline;
            margin-top: 15px;
        }

        #rigidMediaContainer {
            display: none;
        }
    </style>
@endsection

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ isset($data) ? 'Update' : 'Create' }} Pages</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('pages.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            @if(isset($data))
                <form action="{{ route('pages.update', $data->id) }}" method="POST" id="productform" name="productform" enctype="multipart/form-data">
                @method('PUT')
            @else
                <form action="{{ route('pages.store') }}" method="POST" id="productform" name="productform" enctype="multipart/form-data">
            @endif
                @csrf
        
                <div class="row">
                    <div class="col-md-12">
                        <!-- Product Details -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Product Name -->
                                    <div class="col-md-6 mb-3">
                                        <label for="page_name">Page Name</label>
                                        <input type="text" name="page_name" id="page_name" class="form-control" placeholder="Page Name" value="{{ old('page_name', $data->page_name ?? '') }}">
                                    </div>
        
                                    <!-- Product Title -->
                                    <div class="col-md-6 mb-3">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{ old('title', $data->title ?? '') }}">
                                    </div>
        
                                   
                                    <!-- Description -->
                                    <div class="col-md-12 mb-3">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="summernote" placeholder="Description">{{ old('description', $data->description ?? '') }}</textarea>
                                    </div>
        
                                    <!-- Image -->
                                    <div class="col-md-6 mb-3">
                                        <label for="image">Image</label>
                                        <input class="form-control" type="file" name="image" id="image"  placeholder="Key Feature" value="{{ old('image', $data->image ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="image">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        @if(isset($data) && $data->image)
                                        <label for="image">Image Preview</label>
                                            <img src="{{$data->image}}" alt="Product Image" class="img-fluid mt-2" style="max-width: 200px;">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                <!-- Submit Buttons -->
                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">{{ isset($data) ? 'Update' : 'Create' }}</button>
                    <a href="{{ route('pages.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
        
        <!-- /.card -->
    </section>
    <!-- /.content -->
    <!-- /.content-wrapper -->

@endsection

@section('customjs')
    
@endsection
