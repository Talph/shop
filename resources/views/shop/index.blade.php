@extends('layouts.app')

@section('content')
<section class="my-1">
    <div class="container">
        <h1>Shop</h1>
        <div class="row">
            
            @include('partials.alert')
            @if(count($products) < 1) <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                {{$err_message ?? ''}}
                <h2 class="text-dark">There are no products at the moment please check again later.</h2>
        </div>
        @else
        <div class="col-md-3">
        <h3>Categories</h3>
        <ul class="list-unstyled">
        @foreach ($categories as $category)
        <li>
            <a href="/category/{{$category->id}}/{{$category->slug}}">{{$category->category_name}} ({{count($category->products)}})</a>
        </li>
        @endforeach
        </ul>
        </div>
        @foreach ( $products as $product )
        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
            <div class="card  mt-4">
                <div class="card-header">
                    <img src="{{asset('img/png/isometric-icons-data-collection-blob-min-uai-828x828.png')}}" width="258"
                        height="258" alt="">
                </div>
                <div class="card-body">
                    <h3><a href="{{url('shop/product')}}/{{$product->id}}/{{$product->slug}}">{{$product->name}}</a></h3>
                    {{$product->meta_description}}
                </div>
                <div class="card-footer">
                    @foreach ($product->categories as $cat)
                    <a href="/category/{{$cat->id}}/{{$cat->slug}}">{{$cat->category_name}}@if(!$loop->last),@endif </a>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
    </div>
</section>

@endsection