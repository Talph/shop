@extends('layouts.dashboard')

@section('content')

<div class="container-fluid">
    <div class="animated fadeIn">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit variant for product: {{$product->name}} </h1>
        <div class="createProduct my-4">
            <a class="btn btn-primary" href="/product/{{$product->id}}/variants">{{__('Create new variant')}}</a>
            <a class="btn btn-secondary ml-5" href="/product/{{$product->id}}/variants">{{__('Back to variants')}}</a>
        </div>


        <form method="POST" action="/product/{{$product->id}}/variants/{{$variant->id}}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            {{ __('Edit') }} : {{ $variant->name }}
                        </div>
                        <div class="card-body">

                            <div class="form-group row">
                                <div class="col">
                                    <label>Variant Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" id="V_name"
                                        type="text" name="name" value="{{$variant->name}}" required autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col">
                                    <label>value</label>
                                    <input class="form-control @error('value') is-invalid @enderror" type="text"
                                        placeholder="{{ __('$variant->value') }}" name="value"
                                        value="{{ $variant->value }}" required autofocus>
                                    @error('value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col">
                                    <label>Description (5kg/Case of 24)</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                        name="description" rows="4" placeholder="{{ __('Description...') }}" required>
                                    {{ $variant->description }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <button class="btn btn-block btn-success" type="submit">{{ __('Update variant') }}</button>

                        </div>
                    </div>

        </form>
    </div>
</div>
</div>
</div>

@endsection