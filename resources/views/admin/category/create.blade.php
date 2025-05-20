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
                    <h1>Create Category</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <form action="" method="POST" id="categoryform" name="categoryform">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cat_name">Name</label>
                                    <input type="text" name="cat_name" id="cat_name" class="form-control"
                                        placeholder="Category Name">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cat_slug">Slug</label>
                                    <input type="text" readonly name="cat_slug" id="cat_slug" class="form-control"
                                        placeholder="Category Slug">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cat_description">Description</label>
                                    <input type="text" name="cat_description" id="cat_description" class="form-control"
                                        placeholder="Category Desp.">
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
                                    <label for="cat_status">Status</label>
                                    <select name="cat_status" id="cat_status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Block</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cat_orderby">Status</label>
                                    <select name="cat_orderby" id="cat_orderby" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="is_selected">Is Selected (for Home NavBar)</label>
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
                                        placeholder="Category Title">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="meta_desc">meta Description</label>
                                    <input type="text" name="meta_desc" id="meta_desc" class="form-control"
                                        placeholder="Category Description">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="meta_keyword">Meta Keyword</label>
                                    <input type="text" name="meta_keyword" id="meta_keyword" class="form-control"
                                        placeholder="Meta Keyword">
                                    <p></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </section>
@endsection

@section('customjs')
    <script>
        $("#categoryform").submit(function(event) {
            event.preventDefault();
            var element = $(this);

            // Disable the submit button to prevent multiple submissions
            $("button[type=submit]").prop('disabled', true);

            $.ajax({
                url: '{{ route('categories.store') }}',
                type: 'post',
                data: element.serializeArray(),
                dataType: 'json',
                success: function(response) {
                    // Enable the submit button
                    $("button[type=submit]").prop('disabled', false);

                    if (response["status"] === true) {
                        // Show success alert and redirect after dismissal
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Category has been added',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            window.location.href = "{{ route('categories.index') }}";
                        });

                        // Clear validation errors
                        $('#cat_name').removeClass('is-invalid').siblings('p').removeClass(
                            'invalid-feedback').html("");
                        $('#cat_slug').removeClass('is-invalid').siblings('p').removeClass(
                            'invalid-feedback').html("");
                    } else {
                        // Handle validation errors
                        var errors = response['errors'];
                        if (errors['cat_name']) {
                            $('#cat_name').addClass('is-invalid').siblings('p').addClass(
                                'invalid-feedback').html(errors['cat_name']);
                        } else {
                            $('#cat_name').removeClass('is-invalid').siblings('p').removeClass(
                                'invalid-feedback').html("");
                        }
                        if (errors['cat_slug']) {
                            $('#cat_slug').addClass('is-invalid').siblings('p').addClass(
                                'invalid-feedback').html(errors['cat_slug']);
                        } else {
                            $('#cat_slug').removeClass('is-invalid').siblings('p').removeClass(
                                'invalid-feedback').html("");
                        }
                    }
                },
                error: function(jqXHR, exception) {
                    // Enable the submit button in case of error
                    $("button[type=submit]").prop('disabled', false);

                    // Show error alert
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong! Please try again.',
                    });
                }
            });
        });


        $("#cat_name").change(function() {
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
                        $("#cat_slug").val(response["slug"]);
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
        Dropzone.autoDiscover = false;
        const dropzone = $("#image").dropzone({
            init: function() {
                this.on('addedfile', function(file) {
                    if (this.files.length > 1) {
                        this.removeFile(this.files[0]);
                    }
                });

                this.on('success', function(file, response) {
                    $("#image_id").val(response.image_id);

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Image uploaded successfully',
                        showConfirmButton: false,
                        timer: 1500
                    });
                });

                this.on('error', function(file, response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Upload failed',
                        text: response.message ||
                            'There was an error uploading the image. Please try again.'
                    });
                });

                this.on('removedfile', function(file) {
                    // Optionally handle file removal
                    console.log("File removed");
                });
            },
            url: "{{ route('temp-images.create') }}",
            maxFiles: 1,
            paramName: 'image',
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });
    </script>
@endsection
