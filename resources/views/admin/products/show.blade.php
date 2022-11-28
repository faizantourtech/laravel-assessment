@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.products.title')</h3>

    <div class="panel-body table-responsive">
        <div class="row">
            <div class="col-md-10">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>@lang('global.products.fields.name')</th>
                        <td field-key='name'>{{ $product->name }}</td>
                    </tr>
                    <tr>
                        <th>@lang('global.products.fields.description')</th>
                        <td field-key='description'>{!! $product->description !!}</td>
                    </tr>
                    <tr>
                        <th>@lang('global.products.fields.price')</th>
                        <td field-key='description'>{!! $product->price !!}</td>
                    </tr>
                  
                   
                    <tr>
                        <th>@lang('global.products.fields.photo1')</th>
                        <td field-key='photo1'>@if($product->photo1)<a href="{{ asset(env('UPLOAD_PATH').'/' . $product->photo1) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $product->photo1) }}"/></a>@endif</td>
                    </tr>
                   
                </table>
            </div>
        </div>

        <a href="{{ route('admin.home') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
    </div>

    <hr />

   

@stop


