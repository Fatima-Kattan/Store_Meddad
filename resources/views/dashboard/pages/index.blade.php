@extends('layout.dashboard')

@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $stats['products_count'] }}</h3>
                        <p>Products</p>
                    </div>
                    <div class="icon">
                        <i class="icon icon-bag"></i>
                    </div>
                    <a href="{{ route('dashboard.products.index') }}" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $stats['categories_count'] }}</h3>
                        <p>Categories</p>
                    </div>
                    <div class="icon">
                        <i class="icon icon-list"></i>
                    </div>
                    <a href="{{ route('dashboard.categories.index') }}" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
                </div>

                <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $stats['stores_count'] }}</h3>
                        <p>Stores</p>
                    </div>
                    <div class="icon">
                        <i class="icon icon-store"></i>
                    </div>
                    <a href="{{ route('dashboard.stores.index') }}" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
        </div>
    </div>

    
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $stats['users_count'] }}</h3>
                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="icon icon-users"></i>
                    </div>
                    <a href="{{ route('dashboard.users.index') }}" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        </div>
@endsection
