@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="animated fadeIn">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Create Product </h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the official DataTables documentation.</p>
        <div class="createProduct my-4">
            <a class="btn btn-primary" href={{route('products.index')}}>{{__('View products')}}</a>
        </div>
        <form action="{{route('products.store')}}" enctype="multipart/form-data" method="POST">
            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
                    <div class="card card-collapsable">
                        <a class="card-header" href="#collapseCardExample" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="collapseCardExample">
                            {{ __('Create product') }}
                        </a>
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card-body">
                                @include('partials.alert')
                                @csrf
                                <div class="form-group row">
                                    <label>Name</label>
                                    <input class="form-control" type="text" id="J_name" placeholder="{{ __('Name') }}"
                                        value="{{old('name')}}" name="name" required autofocus>
                                </div>
                                <div class="form-group row">
                                    <label>Slug</label>
                                    <input class="form-control" id="J_slug" type="text" name="slug" value="{{old('slug')}}" required
                                        autofocus>

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
                                    <input class="form-control" name="meta_title" type="text"
                                        placeholder="{{ __('Meta title..') }}" value="{{old('meta_title')}}" required>
                                </div>

                                <div class="form-group row">
                                    <textarea class="form-control" id="textarea-meta_desc" name="meta_description"
                                        rows="4" placeholder="{{ __('Meta description..') }}"
                                        required>{{old('meta_description')}}</textarea>
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
                                    <input type="text" class="form-control" name="meta_keywords" rows="4"
                                        placeholder="{{ __('Target keywords...') }}" required
                                        value="{{old('meta_keywords')}}" />
                                    <small>Separate keywords with a comma eg 'Best online store foe pet food,
                                        Cats'</small>
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
                                        <option selected value="0">Draft</option>
                                        <option value="1">Publish</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Publish date</label>
                                    <input type="date" class="form-control" name="posted_at" />
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
                                @if (count($categories) > 0)
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <br />
                                    @foreach($categories as $category)
                                    <input type="checkbox" name="category_id[]" value="{{ $category->id }}">
                                    <label>{{ $category->category_name }}</label><br />
                                    @endforeach
                                </div>
                                @else
                                <label for="category">No categories</label><br />
                                @endif
                                <div class="form-group">
                                                                    <a href="btn" data-toggle="modal" data-target="#createModal">Create category</a>
                                                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card mt-4 card-collapsable">
                        <a class="card-header" href="#collapseCardImage" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="collapseCardImage">
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
</div>

@include('partials.category-modal')

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