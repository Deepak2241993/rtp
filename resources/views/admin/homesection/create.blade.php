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
                    <h1>Create Home Section</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('home-section.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <form action="" method="POST" id="homeSectionform" name="homeSectionform">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="heading">Heading</label>
                                    <input type="text" name="heading" id="heading" class="form-control"
                                        placeholder="Home Section Heading">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="sub_heading">Sub Heading</label>
                                    <input type="text" name="sub_heading" id="sub_heading" class="form-control"
                                        placeholder="Home Section Sub heading">
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
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('home-section.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </section>
@endsection

@section('customjs')
    <script>
        // $("#homeSectionform").submit(function(event) {
        //     event.preventDefault();
        //     var element = $(this);

        //     $("button[type=submit]").prop('disable', true);

        //     $.ajax({
        //         url: '{{ route('home-section.store') }}',
        //         type: 'post',
        //         data: element.serializeArray(),
        //         dataType: 'json',
        //         success: function(response) {

        //             $("button[type=submit]").prop('disable', false);

        //             if (response["status"] == true) {

        //                 window.location.href = "{{ route('home-slider.index') }}";
        //                 $('#heading').removeClass('is-invalid').siblings('p').removeClass(
        //                     'invalid-feedback').html("");
        //                 $('#description').removeClass('is-invalid').siblings('p').removeClass(
        //                     'invalid-feedback').html("");

        //             } else {
        //                 var errors = response['errors'];
        //                 if (errors['heading']) {
        //                     $('#heading').addClass('is-invalid').siblings('p').addClass('invalid-feedback')
        //                         .html(errors['heading']);
        //                 } else {
        //                     $('#heading').removeClass('is-invalid').siblings('p').removeClass(
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

        $(document).ready(function() {
            $("#homeSectionform").submit(function(event) {
                event.preventDefault();
                var element = $(this);

                $("button[type=submit]").prop('disabled', true);

                $.ajax({
                    url: '{{ route('home-section.store') }}',
                    type: 'post',
                    data: element.serializeArray(),
                    dataType: 'json',
                    success: function(response) {
                        $("button[type=submit]").prop('disabled', false);

                        if (response["status"] == true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Data has been saved successfully!',
                                showConfirmButton: false,
                                timer: 1500,
                                position: 'top-end'
                            }).then(() => {
                                window.location.href = "{{ route('home-slider.index') }}";
                            });

                            $('#heading').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                            $('#description').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");

                        } else {
                            var errors = response['errors'];
                            if (errors['heading']) {
                                $('#heading').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['heading']);
                            } else {
                                $('#heading').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                            }
                            if (errors['description']) {
                                $('#description').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['description']);
                            } else {
                                $('#description').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                            }
                        }
                    },
                    error: function(jqXHR, exception) {
                        $("button[type=submit]").prop('disabled', false);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Something went wrong. Please try again later.',
                            position: 'top-end'
                        });
                    }
                });
            });
        });

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
