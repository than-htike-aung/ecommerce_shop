
@extends('admin.layouts.master')

@section('page', 'Edit Product')

@section('content')
    <div class="row">
        <div class="col-lg-10 col-md-10">

            <div class="card">
                <div class="header">
                    <h4 class="title">Edit Product</h4>
                </div>
                <div class="content">
                    {!! Form::open(['url' => ['admin/products', $product->id], 'files'=>true, 'method' => 'PUT']) !!}
                    <div class="row">
                        <div class="col-md-12">
                            @include('admin.products._fields')
                        </div>

                    </div>
                    <div class="">
                        {{Form::submit('Update Product', ['class'=>'btn btn-info btn-fill btn-wd'])}}

                    </div>
                    <div class="clearfix"></div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

