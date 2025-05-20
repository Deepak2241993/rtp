@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">

            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="small-box card">
                    <div class="inner">
                        @if($productCount > 0 )
                        <h3>{{ $productCount }}</h3>
                        <p>Total Products</p>
                        @else
                        <h3>0</h3>
                        <p>No Products</p>
                        @endif
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('products.index') }}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="small-box card">
                    <div class="inner">
                        @if($clintCount > 0 )
                        <h3>{{ $clintCount }}</h3>
                        <p>Total Orders</p>
                        @else
                        <h3>0</h3>
                        <p>No Orders</p>
                        @endif
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('orders.index') }}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="small-box card">
                    <div class="inner">
                        @if($transactionCount > 0 )
                        <h3>{{ $transactionCount }}</h3>
                        <p>Total Transaction</p>
                        @else
                        <h3>0</h3>
                        <p>No Transaction</p>
                        @endif
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('transactions.index') }}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <div class="small-box card">
                    <div class="inner">
                        @if($usersCount > 0)
                            <h3>{{ $usersCount }}</h3>
                            <p>Total Customers</p>
                        @else
                            <h3>No Customers Available</h3>
                        @endif
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('transactions.customer') }}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            

            {{-- <div class="col-lg-4 col-6">
                <div class="small-box card">
                    <div class="inner">
                        <h3>$1000</h3>
                        <p>Total Sale</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="javascript:void(0);" class="small-box-footer">&nbsp;</a>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- /.card -->
</section>
@endsection

@section('customjs')
@endsection