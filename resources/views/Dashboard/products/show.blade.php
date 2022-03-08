@extends('backend.layouts.dashboard')

@section('content')

<div class="container">
    <div class="animated fadeIn">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Written products </h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the official DataTables documentation.</p>
        <div class="createProduct my-4">
            <a class="btn btn-primary" href={{route('products.create')}}>{{__('Create New product')}}</a>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        product: {{ $product->title }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('logout') }}"> @csrf<button
                                class="btn btn-primary">{{ __('Logout') }}</button></form>
                        <br>
                        <h4>Author:</h4>
                        <p> {{ $product->user->name }}</p>
                        <h4>Title:</h4>
                        <p> {{ $product->title }}</p>
                        <h4>Content:</h4>
                        <p>{{ $product->short_description }}</p>
                        <h4>Date published:</h4>
                        <p>{{ $product->posted_at }}</p>
                        <h4> Status: </h4>
                        <p>
                            <span class="status">
                            </span>
                        </p>
                        <h4>Note type:</h4>
                        <a href="{{ route('products.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('javascript')

@endsection