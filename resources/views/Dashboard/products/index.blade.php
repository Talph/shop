@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="animated fadeIn">
    <div class="row rounded shadow bg-gradient-white p-4 my-4">
        <div class="col-md-6">
            <h1 class="h3 mb-2 text-gray-800">Hello {{ucfirst(Auth()->user()->fname)}}!!</h1>
<div class="createProduct border-2 my-4">
                <a class="btn btn-primary" href={{route('products.create')}}>{{__('Create New product')}}</a>
            </div>

        </div>
        <div class="col-md-6">
            <img class="float-right" src="{{asset('img/png/isometric-icons-web-development-min-uai-828x828.png')}}"
                alt="" width="200">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Products') }}
                </div>
                <div class="card-body">
                    @include('partials.alert')
                    <table id="dataTable" class="table table-striped table-bordered" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Slug</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr class="odd">
                                <td>{{ $product->name }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($product->meta_description, 160) }}</td>
                                <td>

                                    @if($product->is_published == 0)
                                    <span class="draft">
                                        Draft
                                    </span>
                                    @elseif($product->is_published == 1)
                                    <span class="published">
                                        Enabled
                                    </span>
                                    @else
                                    <span class="published">
                                        Awaiting published
                                    </span>
                                    @endif

                                </td>
                                <td>{{ $product->slug }}</td>
                                <td>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLinkproducts"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            aria-label="products action button">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLinkproducts">
                                            <div class="dropdown-header">Actions:</div>
                                            <a href="{{ url('/products/' . $product->id) }}"
                                                class="btn dropdown-item">View</a>

                                            
                                            <a href="{{ url('/products/' . $product->id . '/edit') }}"
                                                class="btn dropdown-item">Edit</a>
                                          
<a href="{{ url('/product/' . $product->id . '/variants') }}" class="btn dropdown-item">Manage variants</a>
                                            
                                            <div class="dropdown-divider"></div>
                                            <form action="{{ route('products.destroy', $product->id ) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn dropdown-item text-danger">Delete</button>
                                            </form>
                                          


                                        </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Slug</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
@section('scripts')

@endsection