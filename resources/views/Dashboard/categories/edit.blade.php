@extends('layouts.dashboard')

@section('content')

<div class="container-fluid">
    <div class="animated fadeIn">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit category: {{$category->category_name}} </h1>
        <div class="row my-2">
            <div class="col-md-5">
                <a class="btn btn-primary" href={{route('categories.index')}}>{{__('Create new category')}}</a>
            </div>
            <div class="col-md-4">
                <form action="{{ route('categories.destroy', $category->id ) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
        <form method="POST" action="/categories/{{ $category->id }}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            {{ __('Edit') }} : {{ $category->category_name }}
                        </div>
                        <div class="card-body">

                            <div class="form-group row">
                                <div class="col">
                                    <label>Category Name</label>
                                    <input class="form-control" id="J_name" type="text" placeholder="{{ __('Title') }}"
                                        name="category_name" value="{{ $category->category_name }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col">
                                    <label>Slug</label>
                                    <input class="form-control" id="J_slug" type="text"
                                        placeholder="{{ __('category->slug') }}" name="slug"
                                        value="{{ $category->slug }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col">
                                    <label>Description</label>
                                    <textarea class="form-control" name="category_description" rows="4"
                                        placeholder="{{ __('Description...') }}" required>
                                    {{ $category->category_description }}</textarea>
                                </div>
                            </div>

                            <button class="btn btn-block btn-success" type="submit">{{ __('Update Category') }}</button>

                        </div>
                    </div>

        </form>
    </div>
</div>
</div>
</div>

@endsection

@section('scripts')

@endsection