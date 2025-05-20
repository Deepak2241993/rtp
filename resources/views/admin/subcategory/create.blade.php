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
                    <h1>Create Sub Category</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('sub-categories.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <form action="" method="POST" id="subcategoryform" name="subcategoryform">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="category_id">Category Name</label>
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        <option value="" disabled selected>Select Category</option> <!-- Placeholder option -->
                                        @if($category->isNotEmpty())
                                            @foreach($category as $item)
                                                <option value="{{ $item->id }}">{{ $item->cat_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <p class="invalid-feedback" id="category_id_error"></p> <!-- Placeholder for error message -->
                                </div>
                            </div>                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cat_sub_name">Name</label>
                                    <input type="text" name="cat_sub_name" id="cat_sub_name" class="form-control"
                                        placeholder="Sub Category Name">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cat_sub_slug">Slug</label>
                                    <input type="text" readonly  name="cat_sub_slug" id="cat_sub_slug" class="form-control"
                                        placeholder="Sub Category Slug">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cat_sub_description">Description</label>
                                    <input type="text"  name="cat_sub_description" id="cat_sub_description" class="form-control"
                                        placeholder="Sub Category Desp.">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="hidden" id="image_id" name="image_id" value="">
                                    <label for="image">Image</label>
                                    <div id="image" class="dropzone dz-clickable">
                                        <div class="dz-message needsclick">
                                            <br>Drop files here or click to upload.<br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cat_status">Status</label>
                                    <input type="file" name="cat_image" class="form-control" placeholder="" value="">
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cat_sub_status">Status</label>
                                    <select name="cat_sub_status" id="cat_sub_status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Block</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cat_sub_orderby">Status</label>
                                    <select name="cat_sub_orderby" id="cat_sub_orderby" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="is_selected">Is Seleteced</label>
                                    <select name="is_selected" id="is_selected" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" name="meta_title" id="meta_title" class="form-control"
                                        placeholder="Sub Category Title">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="meta_desc">meta Description</label>
                                    <input type="text" name="meta_desc" id="meta_desc" class="form-control"
                                        placeholder="Sub Category Description">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="meta_keyword">Meta Keyword</label>
                                    <input type="text" name="meta_keyword" id="meta_keyword" class="form-control"
                                        placeholder="Sub Meta Keyword">
                                    <p></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('sub-categories.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </section>
@endsection

@section('customjs')
    <script>
        $("#subcategoryform").submit(function(event) {
            event.preventDefault();
            var element = $(this);

            // Disable the submit button to prevent multiple submissions
            $("button[type=submit]").prop('disabled', true);

            // Clear previous error styles and messages
            $('#cat_sub_name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
            $('#cat_sub_slug').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");

            $.ajax({
                url: '{{ route('sub-categories.store') }}',
                type: 'post',
                data: element.serializeArray(),
                dataType: 'json',
                success: function(response) {
                    $("button[type=submit]").prop('disabled', false);

                    if (response["status"] == true) {
                        // Success: Show success alert and redirect
                        Swal.fire({
                            title: 'Success!',
                            text: 'The sub-category has been created successfully.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.href = "{{ route('sub-categories.index') }}";
                        });
                    } else {
                        // Handle validation errors
                        var errors = response['errors'];
                        if (errors['cat_sub_name']) {
                            $('#cat_sub_name').addClass('is-invalid').siblings('p').addClass('invalid-feedback')
                                .html(errors['cat_sub_name']);
                        }
                        if (errors['cat_sub_slug']) {
                            $('#cat_sub_slug').addClass('is-invalid').siblings('p').addClass('invalid-feedback')
                                .html(errors['cat_sub_slug']);
                        }

                        // Show SweetAlert if there are validation errors
                        Swal.fire({
                            title: 'Error!',
                            text: 'Please check the form for validation errors.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function(jqXHR, exception) {
                    $("button[type=submit]").prop('disabled', false);

                    // General error handling
                    Swal.fire({
                        title: 'Error!',
                        text: 'Something went wrong. Please try again later.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    </script>


    <script>
        // $("#subcategoryform").submit(function(event) {
        //     event.preventDefault();
        //     var element = $(this);

        //     $("button[type=submit]").prop('disable', true);

        //     $.ajax({
        //         url: '{{ route('sub-categories.store') }}',
        //         type: 'post',
        //         data: element.serializeArray(),
        //         dataType: 'json',
        //         success: function(response) {

        //             $("button[type=submit]").prop('disable', false);

        //             if (response["status"] == true) {

        //                 window.location.href = "{{ route('sub-categories.index') }}";
        //                 $('#cat_sub_name').removeClass('is-invalid').siblings('p').removeClass(
        //                     'invalid-feedback').html("");
        //                 $('#cat_sub_slug').removeClass('is-invalid').siblings('p').removeClass(
        //                     'invalid-feedback').html("");

        //             } else {
        //                 var errors = response['errors'];
        //                 if (errors['cat_sub_name']) {
        //                     $('#cat_sub_name').addClass('is-invalid').siblings('p').addClass('invalid-feedback')
        //                         .html(errors['cat_sub_name']);
        //                 } else {
        //                     $('#cat_sub_name').removeClass('is-invalid').siblings('p').removeClass(
        //                         'invalid-feedback').html("");
        //                 }
        //                 if (errors['cat_sub_slug']) {
        //                     $('#cat_sub_slug').addClass('is-invalid').siblings('p').addClass('invalid-feedback')
        //                         .html(errors['cat_sub_slug']);
        //                 } else {
        //                     $('#cat_sub_slug').removeClass('is-invalid').siblings('p').removeClass(
        //                         'invalid-feedback').html("");
        //                 }
        //             }
        //         },
        //         error: function(jqXHR, exception) {
        //             console.log("Something Went Wrong");
        //         }
        //     });
        // });

        $("#cat_sub_name").change(function() {
            var element = $(this);
            $("button[type=submit]").prop('disable', true);
            $.ajax({
                url: '{{ route('getslug') }}',
                type: 'get',
                data: {
                    title: element.val()
                },
                dataType: 'json',
                success: function(response) {
                    $("button[type=submit]").prop('disable', false);
                    if (response["status"] == true) {
                        $("#cat_sub_slug").val(response["slug"]);
                    }
                },
                error: function(jqXHR, exception) {
                    console.log("Something Went Wrong");
                }
            });
        });

        // Dropzone.autoDiscover = false;
        // const dropzone = $("#image").dropzone({
        //     init: function() {
        //         this.on('addedfile', function(file) {
        //             if (this.files.length > 1) {
        //                 this.removeFile(this.files[0]);
        //             }
        //         });
        //     },
        //     url: "{{ route('temp-images.create') }}",
        //     maxFiles: 1,
        //     paramName: 'image',
        //     addRemoveLinks: true,
        //     acceptedFiles: "image/jpeg,image/png,image/gif",
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     },
        //     success: function(file, response) {
        //         $("#image_id").val(response.image_id);
        //         //console.log(response)
        //     }
        // });
    </script>
    <script>
        Dropzone.autoDiscover = false;
    
        const dropzone = $("#image").dropzone({
            init: function() {
                this.on('addedfile', function(file) {
                    if (this.files.length > 1) {
                        this.removeFile(this.files[0]);
                    }
                });
    
                // Add a success event handler
                this.on('success', function(file, response) {
                    // Show success alert when file is uploaded successfully
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Image uploaded successfully.',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true                                          
                    });
    
                    // Set the image ID in a hidden input field
                    $("#image_id").val(response.image_id);
                });
    
                // Add an error event handler
                this.on('error', function(file, response) {
                    // Show error alert when there is an upload error
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: 'Failed to upload image. Please try again.',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true
                    });
    
                    // Optionally, you can also remove the file if you want
                    this.removeFile(file);
                });
            },
            url: "{{ route('temp-images.create') }}",
            maxFiles: 1,
            paramName: 'image',
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    
@endsection
