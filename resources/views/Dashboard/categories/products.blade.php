@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="animated fadeIn">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Category: {{$category->category_name}} </h1>
        <div class="row">
           <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Products') }} <a href="{{URL::previous()}}" class="float-right text-primary btn btn-link">Go back</a>
                    </div>
                    <div class="card-body">
                        <br>
                        <table class="table table-responsive-sm table-bordered table-hover" id="dataTable" width="100%"
                            cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Slug</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category->products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{!! $product->meta_description !!}</td>
                                    <td>{{ $product->slug }}</td>
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
                                                <a href="{{ url('/products/' . $product->id) }}"
                                                    class="btn dropdown-item">View</a>
                                                <a href="{{ url('/products/' . $product->id . '/edit') }}"
                                                    class="btn dropdown-item">Edit</a>
                                                <div class="dropdown-divider"></div>
                                                <form action="{{ route('products.destroy', $product->id ) }}"
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')

@endsection