@extends('layouts.dashboard')

@section('content')

<div class="container-fluid">
    <div class="animated fadeIn">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Written Categories </h1>
<div class="createProduct my-4">
            <a class="btn btn-primary" href={{route('categories.index')}}>{{__('Create new category')}}</a>
        </div>
        <form method="POST" action="/ad/categories/{{ $category->id }}">
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
                                    <textarea class="form-control" id="summernote" name="category_description"
                                        rows="9" placeholder="{{ __('Description...') }}" required>
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
<!-- Page level plugin CSS-->
<link href="{{ asset('vendor/summernote/summernote.min.css')}}" rel="stylesheet">
<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/summernote/summernote.min.js')}}"></script>
<script>
    $(document).ready(function() {
            $('#summernote').summernote({
                tabsize: 2,
                height: 200
            });      
          });
</script>
@endsection