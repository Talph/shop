@extends('layouts.dashboard')

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
                        product: {{ $product->name }}</div>
                    <div class="card-body">
                        <h4>Product name:</h4>
                        <p> {{ $product->name }}</p>
                        <h4>Content:</h4>
                        <p>{{ $product->meta_description }}</p>

                        @if(count($variants) > 0)
                    
                        Product Variants*:
                        <br/>
                        @foreach ($variants as $variant)
                        <div class="col-md-12">    
                        <input type="radio" name="variant" id="{{$variant->id}}"> <label for="{{$variant->id}}">{{$variant->description}}</label>
                        </div>
                        @endforeach
                        @endif

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