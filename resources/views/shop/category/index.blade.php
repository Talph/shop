{{-- Category Index --}}
@extends('layouts.app')

@section('content')
<section class="my-1 py-5">

    <div class="container">

        @if(count($category->products) < 1) <div class="container">
            <div class="breadcrumb">
                <a class="link" href="{{url('/')}}">
                    Shop
                </a>
            </div>
    </div>
    <hr />
    <h2 class="text-center">
        {{$category->category_name}}
    </h2>
    <hr />
    <div class="row">
        <div class="col-md-2">
            <h5>Categories</h5>
            <ul class="list-unstyled">
                @foreach($categories as $cat)
                <li>
                    <a href="/category/{{$cat->id}}/{{$cat->slug}}">{{$cat->category_name}}
                        ({{count($cat->products)}})</a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
            <h5 class="text-dark">
                There are no products in this category at the moment please check again later.
            </h5>
        </div>
    </div>
    @else
    <div class="container">
        <div class="breadcrumb">
            <a class="link" href="{{url('/')}}">
                Shop
            </a>
            &nbsp; / {{$category->category_name}}
        </div>
    </div>
    <h2 class="text-center">
        {{$category->category_name}}
    </h2>

    <div class="row">
        <div class="col-md-2">
            <h5>Categories</h5>
            <ul class="list-unstyled">
                @foreach($categories as $cat)
                <li>
                    <a href="/category/{{$cat->id}}/{{$cat->slug}}">{{$cat->category_name}}
                        ({{count($cat->products)}})</a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-10">
            <div class="row">
                @foreach ( $category->products as $product )
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="card  mt-4">
                        <div class="card-header">
                            <img src="{{asset('img/png/isometric-icons-data-collection-blob-min-uai-828x828.png')}}"
                                width="100%" height="100%" alt="">
                        </div>
                        <div class="card-body">
                            <h3>
                                <a href="{{url('shop/product')}}/{{$product->id}}/{{$product->slug}}">
                                    {{$product->name}}
                                </a>
                            </h3>
                            {{$product->meta_description}}
                        </div>
                        <div class="card-footer">
                            @foreach ($product->categories as $cat)
                            <a href="/category/{{$cat->id}}/{{$cat->slug}}">
                                {{$cat->category_name}}
                                @if(!$loop->last),
                                @endif
                            </a>
                            @endforeach
                            <a class="btn btn-success float-right"
                                href="{{url('shop/product')}}/{{$product->id}}/{{$product->slug}}">
                                View
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    </div>
</section>

@endsection