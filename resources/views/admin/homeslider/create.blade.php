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
                    <h1>Create Home Slider</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('home-slider.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <form action="" method="POST" id="homeSliderform" name="homeSliderform">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="title">Name</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        placeholder="Home Slider Name">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-12">
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

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="10" class="summernote"
                                        placeholder="description"></textarea>
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="homesliders_status">Status</label>
                                    <select name="homesliders_status" id="homesliders_status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Block</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('home-slider.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </section>
@endsection

@section('customjs')
    <script>
        $("#homeSliderform").submit(function(event) {
            event.preventDefault();
            var element = $(this);

            $("button[type=submit]").prop('disabled', true);

            $.ajax({
                url: '{{ route('home-slider.store') }}',
                type: 'post',
                data: element.serializeArray(),
                dataType: 'json',
                success: function(response) {
                    $("button[type=submit]").prop('disabled', false);

                    if (response.status == true) {
                        // Success: Show success alert and redirect
                        Swal.fire({
                            title: 'Success!',
                            text: 'The home slider has been created successfully.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.href = "{{ route('home-slider.index') }}";
                        });
                    } else {
                        // Error: Show validation errors
                        var errors = response.errors;

                        if (errors.title) {
                            $('#title').addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback')
                                .html(errors.title);
                        } else {
                            $('#title').removeClass('is-invalid').siblings('p').removeClass(
                                'invalid-feedback').html("");
                        }

                        if (errors.description) {
                            $('#description').addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback')
                                .html(errors.description);
                        } else {
                            $('#description').removeClass('is-invalid').siblings('p').removeClass(
                                'invalid-feedback').html("");
                        }

                        // Show error alert if there are validation errors
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
        // $("#homeSliderform").submit(function(event) {
        //     event.preventDefault();
        //     var element = $(this);

        //     $("button[type=submit]").prop('disable', true);

        //     $.ajax({
        //         url: '{{ route('home-slider.store') }}',
        //         type: 'post',
        //         data: element.serializeArray(),
        //         dataType: 'json',
        //         success: function(response) {

        //             $("button[type=submit]").prop('disable', false);

        //             if (response["status"] == true) {

        //                 window.location.href = "{{ route('home-slider.index') }}";
        //                 $('#title').removeClass('is-invalid').siblings('p').removeClass(
        //                     'invalid-feedback').html("");
        //                 $('#description').removeClass('is-invalid').siblings('p').removeClass(
        //                     'invalid-feedback').html("");

        //             } else {
        //                 var errors = response['errors'];
        //                 if (errors['title']) {
        //                     $('#title').addClass('is-invalid').siblings('p').addClass('invalid-feedback')
        //                         .html(errors['title']);
        //                 } else {
        //                     $('#title').removeClass('is-invalid').siblings('p').removeClass(
        //                         'invalid-feedback').html("");
        //                 }
        //                 if (errors['description']) {
        //                     $('#description').addClass('is-invalid').siblings('p').addClass('invalid-feedback')
        //                         .html(errors['description']);
        //                 } else {
        //                     $('#description').removeClass('is-invalid').siblings('p').removeClass(
        //                         'invalid-feedback').html("");
        //                 }
        //             }
        //         },
        //         error: function(jqXHR, exception) {
        //             console.log("Something Went Wrong");
        //         }
        //     });
        // });


        Dropzone.autoDiscover = false;
        const dropzone = $("#image").dropzone({
            init: function() {
                this.on('addedfile', function(file) {
                    if (this.files.length > 1) {
                        this.removeFile(this.files[0]);
                    }
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
            success: function(file, response) {
                $("#image_id").val(response.image_id);
                //console.log(response)
            }
        });
    </script>
@endsection
