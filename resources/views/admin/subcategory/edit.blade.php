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
                    <h1>Edit Sub Category</h1>
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
                                    <select name="category_id" id="category_id" class="form-control">
                                        @if ($categories->isNotEmpty())
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $item)
                                                <option {{ $subcategory->category_id == $item->id ? 'selected' : '' }}
                                                    value="{{ $item->id }}">{{ $item->cat_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cat_sub_name">Name</label>
                                    <input type="text" name="cat_sub_name" id="cat_sub_name" class="form-control"
                                        placeholder="Category Name" value="{{ $subcategory->cat_sub_name }}">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cat_sub_slug">Slug</label>
                                    <input type="text" readonly name="cat_sub_slug" id="cat_sub_slug"
                                        class="form-control" placeholder="Category Slug"
                                        value="{{ $subcategory->cat_sub_slug }}">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cat_sub_description">Description</label>
                                    <input type="text" name="cat_sub_description" id="cat_sub_description"
                                        class="form-control" placeholder="Category Desp."
                                        value="{{ $subcategory->cat_sub_description }}">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" name="meta_title" id="meta_title" class="form-control"
                                        placeholder="Category Title" value="{{ $subcategory->meta_title}}">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="meta_desc">meta Description</label>
                                    <input type="text" name="meta_desc" id="meta_desc" class="form-control"
                                        placeholder="Category Description" value="{{ $subcategory->meta_desc }}">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="meta_keyword">Meta Keyword</label>
                                    <input type="text" name="meta_keyword" id="meta_keyword" class="form-control"
                                        placeholder="Meta Keyword" value="{{ $subcategory->meta_keyword }}">
                                    <p></p>
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
                                        <option {{ $subcategory->cat_sub_status == 'active' ? 'selected' : '' }}
                                            value="active">Active</option>
                                        <option {{ $subcategory->cat_sub_status == 'inactive' ? 'selected' : '' }}
                                            value="inactive">Block</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cat_sub_orderby">Status</label>
                                    <select name="cat_sub_orderby" id="cat_sub_orderby" class="form-control">
                                        <option {{ $subcategory->cat_sub_orderby == '1' ? 'selected' : '' }}
                                            value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="is_selected">Is Seleteced</label>
                                    <select name="is_selected" id="is_selected" class="form-control">
                                        <option {{ $subcategory->is_selected == '1' ? 'selected' : '' }} value="1">
                                            Yes</option>
                                        <option value="0">No</option>
                                    </select>
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
                                @if (!empty($subcategory->cat_sub_image))
                                    <div>
                                        <img width="200"
                                            src="{{ asset('uploads/subcategory/' . $subcategory->cat_sub_image) }}"
                                            alt="">
                                    </div>
                                @endif

                            </div>

                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
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

            $("button[type=submit]").prop('disabled', true); // Corrected 'disable' to 'disabled'

            $.ajax({
                url: '{{ route('sub-categories.update', $subcategory->id) }}',
                type: 'put',
                data: element.serializeArray(),
                dataType: 'json',
                success: function(response) {
                    $("button[type=submit]").prop('disabled', false); // Corrected 'disable' to 'disabled'

                    if (response.status == true) { // 'response["status"]' changed to 'response.status'
                        // Show success toast notification
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'Sub-category updated successfully.',
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true
                        }).then(() => {
                            window.location.href = "{{ route('sub-categories.index') }}";
                        });

                        // Clear validation errors
                        $('#cat_sub_name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        $('#cat_sub_slug').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");

                    } else {
                        if (response.notFound == true) { // 'response['notFound']' changed to 'response.notFound'
                            window.location.href = "{{ route('sub-categories.index') }}";
                        }

                        var errors = response.errors;
                        if (errors.cat_sub_name) { // 'errors['cat_sub_name']' changed to 'errors.cat_sub_name'
                            $('#cat_sub_name').addClass('is-invalid').siblings('p').addClass('invalid-feedback')
                                .html(errors.cat_sub_name); // 'errors['cat_sub_name']' changed to 'errors.cat_sub_name'
                        } else {
                            $('#cat_sub_name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        }
                        if (errors.cat_sub_slug) { // 'errors['cat_sub_slug']' changed to 'errors.cat_sub_slug'
                            $('#cat_sub_slug').addClass('is-invalid').siblings('p').addClass('invalid-feedback')
                                .html(errors.cat_sub_slug); // 'errors['cat_sub_slug']' changed to 'errors.cat_sub_slug'
                        } else {
                            $('#cat_sub_slug').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        }

                        // Show error toast notification
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: 'Please check the form for validation errors.',
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true
                        });
                    }
                },
                error: function(jqXHR, exception) {
                    $("button[type=submit]").prop('disabled', false); // Re-enable the submit button

                    // Show general error toast notification
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: 'Something went wrong. Please try again later.',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true
                    });
                }
            });
        });
    </script>

    <script>
        // $("#subcategoryform").submit(function(event) {
        //     event.preventDefault();
        //     var element = $(this);

        //     $("button[type=submit]").prop('disabled', true); // Corrected 'disable' to 'disabled'

        //     $.ajax({
        //         url: '{{ route('sub-categories.update',$subcategory->id) }}',
        //         type: 'put',
        //         data: element.serializeArray(),
        //         dataType: 'json',
        //         success: function(response) {

        //             $("button[type=submit]").prop('disabled',
        //             false); // Corrected 'disable' to 'disabled'

        //             if (response.status == true) { // 'response["status"]' changed to 'response.status'

        //                 window.location.href = "{{ route('sub-categories.index') }}";
        //                 $('#cat_sub_name').removeClass('is-invalid').siblings('p').removeClass(
        //                     'invalid-feedback').html("");
        //                 $('#cat_sub_slug').removeClass('is-invalid').siblings('p').removeClass(
        //                     'invalid-feedback').html("");

        //             } else {

        //                 if (response.notFound ==
        //                     true) { // 'response['notFound']' changed to 'response.notFound'
        //                     window.location.href = "{{ route('categories.index') }}";
        //                 }

        //                 var errors = response.errors;
        //                 if (errors
        //                     .cat_sub_name) { // 'errors['cat_sub_name']' changed to 'errors.cat_sub_name'
        //                     $('#cat_sub_name').addClass('is-invalid').siblings('p').addClass(
        //                             'invalid-feedback')
        //                         .html(errors
        //                         .cat_sub_name); // 'errors['cat_sub_name']' changed to 'errors.cat_sub_name'
        //                 } else {
        //                     $('#cat_sub_name').removeClass('is-invalid').siblings('p').removeClass(
        //                         'invalid-feedback').html("");
        //                 }
        //                 if (errors
        //                     .cat_sub_slug) { // 'errors['cat_sub_slug']' changed to 'errors.cat_sub_slug'
        //                     $('#cat_sub_slug').addClass('is-invalid').siblings('p').addClass(
        //                             'invalid-feedback')
        //                         .html(errors
        //                         .cat_sub_slug); // 'errors['cat_sub_slug']' changed to 'errors.cat_sub_slug'
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
