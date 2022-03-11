@extends('layouts.dashboard')

@section('content')

<div class="container-fluid">
    <div class="animated fadeIn">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Written Posts </h1>
<div class="createProduct my-4">
            <a class="btn btn-primary" href={{route('categories.index')}}>{{__('Create New Category')}}</a>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        Post: {{ $category->category_name }}</div>
                    <div class="card-body">
                        <br>
                        <h4>Name:</h4>
                        <p> {{ $category->category_name }}</p>
                        <h4>Content:</h4>
                        <p>{{ $category->meta_description }}</p>
                        <h4>Date published:</h4>
                        <p>{{ $category->posted_at }}</p>
                        <h4> Status: </h4>
                        <p>
                            <span class="status">
                            </span>
                        </p>
                        <h4>Note type:</h4>
                        {{-- <p>{{ $category->note_type }}</p> --}}
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