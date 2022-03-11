@extends('layouts.dashboard')

@section('content')

<div class="container-fluid">
    <div class="animated fadeIn">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Category: {{ $category->category_name }}</h1>
<div class="createProduct my-4">
            <a class="btn btn-primary" href={{route('categories.index')}}>{{__('Create New Category')}}</a>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        Category: {{ $category->category_name }}</div>
                    <div class="card-body">
                        <br>
                        <h4>Name:</h4>
                        <p> {{ $category->category_name }}</p>
                        <h4>Description:</h4>
                        <p>{{ $category->category_description }}</p>
                        <a href="{{ route('categories.index') }}"
                            class="btn btn-block btn-primary">{{ __('Return') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('javascript')

@endsection