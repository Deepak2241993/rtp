@extends('layouts.app')

@section('content')

    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Orders</h1>
                </div>
                {{-- <div class="col-sm-6 text-right">
                    <a href="{{ route('categories.create') }}" class="btn btn-primary">New Category</a>
                </div> --}}
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            @include('admin.message')
            <div class="card">
                <form action="" method="get">
                    <div class="card-header">
                        <div class="card-title">
                            <button type="button" onclick="window.location.href='{{ route('orders.index') }}'"
                                class="btn btn-default btn-sm">Reset</button>
                        </div>
                        <div class="card-tools">
                            <div class="input-group input-group" style="width: 250px;">
                                <input type="text" value="{{ Request::get('keyword') }}" name="keyword"
                                    class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th width="60">ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th width="100">Date Purchased</th>
                                {{-- <th width="100">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @if ($orders->isNotEmpty())
                                @foreach ($orders as $item)
                                    <tr>
                                        <td><a href="{{ route('orders.detail',[$item->id]) }}">{{ $item->id }}</a></td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>${{ $item->grand_total,2}}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('d M, Y') }}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">Recodes Not Found</td>
                                </tr>
                            @endif


                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
@endsection

@section('customjs')
@endsection
