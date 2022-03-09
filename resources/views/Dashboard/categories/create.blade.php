@extends('layouts.dashboard')

@section('content')

<div class="container-fluid">
    <div class="animated fadeIn">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Written Posts </h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the official DataTables documentation.</p>
        <div class="createProduct my-4">
            <a class="btn btn-primary" href={{route('category.index')}}>{{__('View categories')}}</a>
        </div>
        <form method="POST" action="{{ route('categories.store') }}">
            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-10 col-xl-10">
                    <div class="card">
                        <div class="card-header">
                            {{ __('Create Post') }}
                        </div>
                        <div class="card-body">
                            @include('partials.alert')
                            @csrf
                            <div class="form-group row">
                                <label>Title</label>
                                <input class="form-control" type="text" placeholder="{{ __('Title') }}"
                                    value="{{old('title')}}" name="title" required autofocus>
                            </div>
                            <div class="form-group row">
                                <label>Subtitle</label>
                                <input class="form-control" type="text" placeholder="{{ __('Subtitle') }}"
                                    name="subtitle" value="{{old('subtitle')}}" required autofocus>
                            </div>

                            <div class="form-group row">
                                <label>Content</label>
                                <textarea class="form-control" id="summernote" name="post_body" rows="9" required>
                                {{old('post_body')}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            {{ __('Excerpt') }}
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <textarea class="form-control" id="textarea-excerpt" name="short_description" rows="4"
                                    placeholder="{{ __('Summary..') }}" required>{{old('post_body')}}</textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2">
                    <div class="card">
                        <div class="card-header">
                            <h4>Publish</h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label>Post status</label>
                                <select class="form-control" name="is_published">
                                    <option selected value="0">Draft</option>
                                    <option value="1">Publish</option>
                                </select>
                            </div>

                            <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                            <a href="{{ route('categories.index') }}"
                                class="btn btn-block btn-primary">{{ __('Return') }}</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Publish date</label>
                                <input type="date" class="form-control" name="posted_at" />
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Category</label>
                                <br />
                                @foreach($categories as $category)
                                <input type="checkbox" name="Category_name" value="{{ $category->category_name }}">
                                <label>{{ $category->category_name }}</label><br />
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
        </form>
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