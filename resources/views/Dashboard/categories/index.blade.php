@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="animated fadeIn">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Categories </h1>
        <div class="row">

            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <form method="POST" action="{{ route('categories.store') }}">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            {{ __('Create category') }}
                        </div>
                        <div class="card-body">
                            @include('partials.alert')

                            <div class="form-group row">
                                <label>Category Name</label>
                                <input class="form-control @error('category_name') is-invalid @enderror" type="text"
                                    id="J_name" placeholder="{{ __('Category Name') }}" value="{{old('category_name')}}"
                                    name="category_name" required autofocus>
                                <small>The name is how it appears on your site.</small>
                                @error('category_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label>Slug</label>
                                <input class="form-control @error('slug') is-invalid @enderror" id="J_slug" type="text"
                                    placeholder="{{ __('category-name') }}" disabled name="slug" value="{{old('slug')}}"
                                    required autofocus>
                                <small>The “slug” is the URL-friendly version of the name. It is usually all lowercase
                                    and contains only
                                    letters, numbers, and hyphens.</small>
                                @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label>Description</label>
                                <textarea class="form-control @error('category_description') is-invalid @enderror"
                                    name="category_description" rows="4"> {{old('category_description')}}</textarea>
                                <small>The description is not prominent by default; however, some themes may show
                                    it.</small>
                                @error('category_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <button class="btn btn-block btn-success" type="submit">{{ __('Save Category') }}</button>
                        </div>
                    </div>


                </form>

            </div>

            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Categories') }}
                    </div>
                    <div class="card-body">
                        <br>
                        <table class="table table-responsive-sm table-bordered table-hover" id="dataTable" width="100%"
                            cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Description</th>
                                    <th>Slug</th>
                                    <th>Product Count</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{!! $category->category_description !!}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        @if ($category->products)
                                        <a href="products/category/{{$category->id}}"> {{ count($category->products) }}
                                        </a>
                                        @endif

                                    </td>
                                    <td>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button"
                                                id="dropdownMenuLinkRevenue" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" aria-label="Revenue action button">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLinkRevenue">
                                                <div class="dropdown-header">Actions:</div>
                                                <a href="{{ url('/categories/' . $category->id) }}"
                                                    class="btn dropdown-item">View</a>
                                                <a href="{{ url('/categories/' . $category->id . '/edit') }}"
                                                    class="btn dropdown-item">Edit</a>
                                                <a href="products/category/{{$category->id}}"
                                                    class="btn dropdown-item">View Products in category</a>
                                                <div class="dropdown-divider"></div>
                                                <form action="{{ route('categories.destroy', $category->id ) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn dropdown-item text-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>

                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')

@endsection