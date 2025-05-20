@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order: #{{ $order->id }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('orders.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <!-- Default box -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header pt-3">
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    <h1 class="h5 mb-3">Shipping Address</h1>
                                    <address>
                                        Name : <strong>{{ $order->firstname . ' ' . $order->lastname }}</strong><br>
                                        Address : {{ $order->address }}
                                        <br>
                                        Phone: {{ $order->phone }}<br>
                                        Email: {{ $order->email }}
                                    </address>
                                </div>



                                <div class="col-sm-4 invoice-col">
                                    <b></b><br>
                                    {{-- <b>Invoice #{{ $order->address }}</b><br> --}}
                                    <br>
                                    <b>Order ID:</b> {{ $order->id }}<br>
                                    <b>Total : </b> ${{ $order->grand_total }}<br>
                                    <b>Status:</b> <span class="text-danger">{{ $order->status }}</span>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-3">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Size</th>
                                        <th>Color</th>
                                        <th>Printed Sides</th>
                                        <th>Pickup Option</th>
                                        <th width="">Price</th>
                                        <th width="">Qty</th>
                                        <th width="">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderItems as $item)
                                        <tr>
                                            <td>
                                                @php
                                                    // Retrieve the product associated with the current order item
                                                    $product = $products->firstWhere('id', $item->product_id);
                                                    // Retrieve the first product image, if available
                                                    $productImage = $product ? $product->product_images->first() : null;
                                                @endphp

                                                @if ($productImage)
                                                    <img src="{{ asset('/uploads/product/' . $productImage->image) }}"
                                                        alt="Product Image" width="70" />
                                                @else
                                                    <img src="{{ asset('admin-assets/img/default-150X150.png') }}"
                                                        alt="Default" width="50" />
                                                @endif
                                                <br>
                                                {{ $item->name }}
                                            </td>
                                            <td>{{ $item->size }}</td>
                                            <td>{{ $item->color }}</td>
                                            <td>{{ $item->print_side }}</td>
                                            <td>{{ $item->pickup_option }}</td>
                                            <td>${{ number_format($item->price, 2) }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>${{ number_format($item->total, 2) }}</td>
                                        </tr>
                                    @endforeach

                                    {{-- <tr>
                                        <th colspan="7" class="text-right">Subtotal:</th>
                                        <td>${{ number_format($order->subtotal, 2) }}</td>
                                    </tr>

                                    <tr>
                                        <th colspan="7" class="text-right">Shipping:</th>
                                        <td>$ 0</td>
                                    </tr> --}}
                                    <tr>
                                        <th colspan="7" class="text-right">Grand Total:</th>
                                        <td>${{ number_format($order->grand_total, 2) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                   
                    <div class="card">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Order Status</h2>
                            <form action="{{ route('order.updateStatus', $order->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <select name="status" id="status" class="form-control">
                                        <option value="">{{ ucfirst($order->status) }}</option>
                                        <option value="processed">processed</option>
                                        <option value="shipped">Shipped</option>
                                        <option value="delivered">Delivered</option>
                                        <option value="cancelled">Cancelled</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Download File</h2>
                            <div class="mb-3">
                                <a href="{{ asset('path_to_your_pdf_file.pdf') }}" class="btn btn-primary" download>Download PDF</a>
                            </div>
                        </div>
                        
                    </div>
                    {{-- <div class="card">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Send Inovice Email</h2>
                            <div class="mb-3">
                                <select name="status" id="status" class="form-control">
                                    <option value="">Customer</option>
                                    <option value="">Admin</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection
