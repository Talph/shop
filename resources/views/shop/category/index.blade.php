{{-- Category Index --}}
@extends('layouts.app')

@section('content')
<section class="my-1 py-5">
    <div class="container">

        @if(count($category->products) < 0)

        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <h2>
                        Category: {{$category->category_name}}
                    </h2>
            <h5 class="text-dark">
                There are no products in this category at the moment please check again later.
            </h5>
        </div>
        @else
        <h2>
            {{$category->category_name}}
        </h2>
        <div class="row">
<div class="col-md-3">
    <h5>Categories</h5>
    <ul class="list-unstyled">
        @foreach($categories as $cat)
        <li>
            <a href="/category/{{$cat->id}}/{{$cat->slug}}">{{$cat->category_name}} ({{count($cat->products)}})</a>
        </li>
        @endforeach
    </ul>
</div>
            @foreach ( $category->products as $product )
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="card  mt-4">
                    <div class="card-header">
                        <img src="{{asset('img/png/isometric-icons-data-collection-blob-min-uai-828x828.png')}}"
                            width="258" height="258" alt="">
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
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        @endif
    </div>
</section>

@endsection