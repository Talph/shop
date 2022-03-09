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
        <form method="POST" enctype="multipart/form-data" action="/ad/products/{{ $product->id }}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
                    <div class="card card-collapsable">
                        <a class="card-header" href="#collapseCardExample" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="collapseCardExample">
                            {{ __('Edit') }} : {{ $product->name }}
                        </a>
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card-body">

                                <div class="form-group row">
                                    <div class="col">
                                        <label>Name</label>
                                        <input class="form-control" type="text" placeholder="{{ __('name') }}"
                                            name="name" value="{{ $product->name }}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                                                <div class="col">
                                                                    <label>Slug</label>
                                                                    <input class="form-control" id="J_slug" type="text" placeholder="{{ __('$product->slug') }}" name="slug"
                                                                        value="{{ $product->slug }}" required autofocus>
                                                                </div>
                                                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4 card-collapsable">
                        <a class="card-header" href="#collapseCardMeta" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="collapseCardMeta">
                            {{ __('Meta description') }}
                        </a>
                        <div class="collapse show" id="collapseCardMeta">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label>Meta description</label>
                                    <textarea class="form-control" id="textarea-meta_desc" name="meta_desc" rows="4"
                                        placeholder="{{ __('description..') }}" required>{{$product->meta_description}}</textarea>
                                    <small>A maximum of 160 characters are recommended</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4 card-collapsable">
                        <a class="card-header" href="#collapseCardKeyword" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="collapseCardKeyword">
                            {{ __('Keywords') }}
                        </a>
                        <div class="collapse show" id="collapseCardKeyword">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label>Target keywords</label>
                                    <input type="text" class="form-control" name="meta_keywords" rows="4"
                                        placeholder="{{ __('keywords...') }}" required
                                        value="{{$product->meta_keywords}}" />
                                    <small>Separate keywords with a comma eg 'Best shop, Shoes'</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                    <div class="card card-collapsable">
                        <a class="card-header" href="#collapseCardPublish" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="collapseCardPublish">
                            {{ __('Publish') }}
                        </a>
                        <div class="collapse show" id="collapseCardPublish">

                            <div class="card-body">
                                <div class="form-group">
                                    <label>product status</label>
                                    <select class="form-control" name="is_published">
                                        <option value="0">Draft</option>
                                        <option selected value="1">Publish</option>
                                    </select>
                                </div>

                                <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                                <a href="{{ route('products.index') }}"
                                    class="btn btn-block btn-primary">{{ __('Return') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4 card-collapsable">
                        <a class="card-header" href="#collapseCardCategory" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="collapseCardCategory">
                            {{ __('Category') }}
                        </a>
                        <div class="collapse show" id="collapseCardCategory">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="col">
                                        <label>Category</label>
                                        <br />

                                        @foreach($categories as $category)
                                        <input data-role-id="{{$category->id}}" data-role-slug="{{$category->slug}}"
                                            value="{{$category->id}}" @foreach ($product->categories as $cat)
                                        {{ $product->categories->isEmpty() || $category->category_name != $cat->category_name ? "" : "checked"}}@endforeach
                                        type="checkbox" name="category_id[]">
                                        <label>{{ $category->category_name }}</label>
                                        <br />
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

<div class="card mt-4 card-collapsable">
                    <a class="card-header" href="#collapseCardImage" data-toggle="collapse" role="button" aria-expanded="true"
                        aria-controls="collapseCardImage">
                        {{ __('Product Variants') }}
                    </a>
                    <div class="collapse show" id="collapseCardImage">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="col">
                                    <br />
                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
        </form>
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