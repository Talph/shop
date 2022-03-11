@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="animated fadeIn">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Variants for product: {{$product->name}}</h1></h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the official DataTables documentation.</p>

        <div class="row">

            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                
                <form method="POST" action="/product/{{$product->id}}/variants">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            {{ __('Create variant') }}
                        </div>
                        <div class="card-body">
                            @include('partials.alert')

                            <div class="form-group row">
                                <label>Variant Name</label>
                                <input class="form-control" type="text" id="J_name"
                                    placeholder="{{ __('Name') }}" value="{{old('name')}}"
                                    name="name" required autofocus>
                                <small>The name is how it appears on your site.</small>
                            </div>
    
                            <div class="form-group row">
                                                        <label>Value</label>
                                                        <input class="form-control" type="text" id="J_name" placeholder="{{ __('R59') }}" value="{{old('value')}}"
                                                            name="value" required autofocus>
                                                    </div>

                            <div class="form-group row">
                                <label>Description</label>
                                <textarea class="form-control"  name="description" rows="4">
                                {{old('description')}}</textarea>
                                <small>The description is not prominent by default; however, some themes may show
                                    it.</small>
                            </div>

                            <button class="btn btn-block btn-success" type="submit">{{ __('Save variant') }}</button>
                        </div>
                    </div>


                </form>

            </div>

            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Variants') }}
                    </div>
                    <div class="card-body">
                        <br>
                        <table class="table table-responsive-sm table-bordered table-hover" id="dataTable" width="100%"
                            cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Variant Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                                               
                                @foreach($variants as $variant)
                                <tr>
                                    <td>{{ $variant->name }}</td>
                                    <td>
                                        {{ $variant->description }}
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
                                                <a href="{{ url('/variants/' . $variant->id) }}"
                                                    class="btn dropdown-item">View</a>
                                                <a href="{{ url('/variants/' . $variant->id . '/edit') }}"
                                                    class="btn dropdown-item">Edit</a>
                                                <div class="dropdown-divider"></div>
                                                <form action="/product/$variant->products->id/variants/$variant->id/delete"
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
                        {{ $variants->links() }}
                    </div>
                </div>
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