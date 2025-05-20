@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Product FAQs</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('product-faqs.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <form action="" method="POST" id="productFaqform" name="productFaqform">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="product_id">Product Name</label>
                                    {{-- <select name="product_id" id="product_id" class="form-control">
                                        @if ($products->isNotEmpty())
                                            @foreach ($products as $item)
                                                <option {{ $product_id == $item->id ? 'selected' : '' }}
                                                    value="{{ $item->id }}">{{ $item->product_name }}</option>
                                            @endforeach
                                        @endif
                                    </select> --}}
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="question">Question</label>
                                    <textarea name="question" id="question" cols="30" rows="10" class="summernote"
                                        placeholder="question">{{ $productfaq->question }}</textarea>
                                        <p></p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="answer">Answer</label>
                                    <textarea name="answer" id="answer" cols="30" rows="10" class="summernote"
                                        placeholder="answer">{{ $productfaq->answer }}</textarea>
                                        <p></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('product-faqs.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </section>
@endsection

@section('customjs')
    <script>
        $("#productFaqform").submit(function(event) {
            event.preventDefault();
            var element = $(this);

            $("button[type=submit]").prop('disable', true);

            $.ajax({
                url: '{{ route('product-faqs.update',$productfaq->id) }}',
                type: 'put',
                data: element.serializeArray(),
                dataType: 'json',
                success: function(response) {

                    $("button[type=submit]").prop('disable', false);

                    if (response["status"] == true) {

                        window.location.href = "{{ route('product-faqs.index') }}";
                        $('#question').removeClass('is-invalid').siblings('p').removeClass(
                            'invalid-feedback').html("");
                        $('#answer').removeClass('is-invalid').siblings('p').removeClass(
                            'invalid-feedback').html("");


                    } else {

                        if(response['notFound'] == true) {
                            window.location.href = "{{ route('product-faqs.index') }}";

                        }

                        var errors = response['errors'];
                        if (errors['question']) {
                            $('#question').addClass('is-invalid').siblings('p').addClass('invalid-feedback')
                                .html(errors['question']);
                        } else {
                            $('#question').removeClass('is-invalid').siblings('p').removeClass(
                                'invalid-feedback').html("");
                        }
                        if (errors['answer']) {
                            $('#answer').addClass('is-invalid').siblings('p').addClass('invalid-feedback')
                                .html(errors['answer']);
                        } else {
                            $('#answer').removeClass('is-invalid').siblings('p').removeClass(
                                'invalid-feedback').html("");
                        }
                    }
                },
                error: function(jqXHR, exception) {
                    console.log("Something Went Wrong");
                }
            });
        });


    
    </script>
@endsection
