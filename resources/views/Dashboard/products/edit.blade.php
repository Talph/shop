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
        <form method="POST" enctype="multipart/form-data" action="/ad/products/{{ $product->id }}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
                    <div class="card card-collapsable">
                        <a class="card-header" href="#collapseCardExample" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="collapseCardExample">
                            {{ __('Edit') }} : {{ $product->title }}
                        </a>
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card-body">

                                <div class="form-group row">
                                    <div class="col">
                                        <label>Title</label>
                                        <input class="form-control" type="text" placeholder="{{ __('Title') }}"
                                            name="title" value="{{ $product->title }}" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col">
                                        <label>Subtitle</label>
                                        <input class="form-control" type="text" placeholder="{{ __('Subtitle') }}"
                                            name="subtitle" value="{{ $product->subtitle }}" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col">
                                        <label>Content</label>
                                        <textarea class="form-control" id="summernote" name="product_body" rows="9"
                                            placeholder="{{ __('Content..') }}" required>
                                        {{ $product->product_body }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4 card-collapsable">
                        <a class="card-header" href="#collapseCardExcerpt" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="collapseCardExcerpt">
                            {{ __('Excerpt') }}
                        </a>
                        <div class="collapse show" id="collapseCardExcerpt">
                            <div class="card-body">
                                <div class="form-group row">
                                    <textarea class="form-control" id="textarea-excerpt" name="short_description"
                                        rows="4" placeholder="{{ __('Summary..') }}"
                                        required>{{ $product->short_description}}</textarea>
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
                                        placeholder="{{ __('description..') }}" required>{{$product->meta_desc}}</textarea>
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
                                    <input type="text" class="form-control" name="seo_keywords" rows="4"
                                        placeholder="{{ __('keywords...') }}" required
                                        value="{{$product->seo_keywords}}" />
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
                        <a class="card-header" href="#collapseCardDate" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="collapseCardDate">
                            {{ __('Date') }}
                        </a>
                        <div class="collapse show" id="collapseCardDate">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Publish date</label>
                                    <input type="date" class="form-control" name="posted_at" />
                                </div>
                                Posted on: {{$product->created_at}}
                                Edited on: {{$product->updated_at}}
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
                        <a class="card-header" href="#collapseCardImage" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="collapseCardImage">
                            {{ __('Featured image') }}
                        </a>
                        <div class="collapse show" id="collapseCardImage">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="col">
                                        {{-- <label>Featured Image</label> --}}
                                        <br />

                                        <input type="file" class="custom-form-input" name="img_name">

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