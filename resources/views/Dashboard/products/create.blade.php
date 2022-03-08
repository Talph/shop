@extends('backend.layouts.dashboard')

@section('content')

<div class="container">
    <div class="animated fadeIn">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Written products </h1>
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
                                    <label>Title</label>
                                    <input class="form-control" type="text" id="J_name" placeholder="{{ __('Title') }}"
                                        value="{{old('title')}}" name="title" required autofocus>
                                    <span class="small mt-1">Slug:</span> <input id="J_slug"
                                        class="border-0 form-control" placeholder="" />

                                </div>
                                <div class="form-group row">
                                    <label>Subtitle</label>
                                    <input class="form-control" type="text" placeholder="{{ __('Subtitle') }}"
                                        name="subtitle" value="{{old('subtitle')}}" required autofocus>
                                </div>

                                <div class="form-group row">
                                    <label>Content</label>
                                    <textarea class="form-control" id="summernote" name="product_body" rows="9" required>
                                    {{old('product_body')}}</textarea>
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
                                        required>{{old('product_body')}}</textarea>
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
                                    <textarea class="form-control" id="textarea-meta_desc" name="meta_desc" rows="4"
                                        placeholder="{{ __('Meta description..') }}"
                                        required>{{old('meta_desc')}}</textarea>
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
                                    <input type="text" class="form-control" name="seo_keywords" rows="4"
                                        placeholder="{{ __('Target keywords...') }}" required
                                        value="{{old('seo_keywords')}}" />
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
                                        <option selected value="0">Draft</option>
                                        @canany(['isAdmin', 'isManager'])
                                        <option value="1">Publish</option>
                                        @endcanany
                                        @can('isUser')
                                        <option value="2">Send for approval </option>
                                        @endcan

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
                            @if (count($categories) >= 1)
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
                            <a href="btn" data-toggle="modal" data-target="#createModal">Create category</a>
                            @endif
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
</div>

<!-- Create Category Modal-->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('categories.store')}}">
                    @method('POST')
                    @csrf

                    <label>Category Name</label>
                    <input class="form-control" type="text" id="J_name" placeholder="{{ __('Category Name') }}"
                        value="{{old('title')}}" name="category_name" required autofocus>
                    <small>The name is how it appears on your site.</small>
                    <br />
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Create</a>
                </form>
            </div>
            <div class="modal-footer">


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