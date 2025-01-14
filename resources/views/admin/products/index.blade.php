@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">
        @lang('global.products.title')</h3>
    @can('product_create')
        <p>
            <a href="{{ route('admin.products.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>

        </p>
    @endcan



    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table
                class="table table-bordered table-striped {{ count($products) > 0 ? '' : '' }} @can('product_delete') dt-select @endcan">
                <thead>
                    <tr>
                    

                        <th>@lang('global.products.fields.name')</th>
                        <th>@lang('global.products.fields.description')</th>
                        <th>@lang('global.products.fields.price')</th>
                       
                        <th>@lang('global.products.fields.photo1')</th>
                        
                        <th>&nbsp;</th>

                    </tr>
                </thead>

                <tbody>
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                            <tr data-entry-id="{{ $product->id }}">
                               

                                <td field-key='name'>{{ $product->name }}</td>
                                <td field-key='description'>{!! $product->description !!}</td>
                                <td field-key='price'>{{ $product->price }}</td>
                               
                                <td field-key='photo1'>
                                    @if ($product->photo1)
                                        <a href="{{ asset(env('UPLOAD_PATH') . '/' . $product->photo1) }}"
                                            target="_blank"><img
                                                src="{{ asset(env('UPLOAD_PATH') . '/thumb/' . $product->photo1) }}" /></a>
                                    @endif
                                </td>
                                
                                <td>
                                    @can('product_view')
                                        <a href="{{ route('admin.products.show', [$product->id]) }}"
                                            class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('product_edit')
                                        <a href="{{ route('admin.products.edit', [$product->id]) }}"
                                            class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('product_delete')
                                        {!! Form::open([
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('" . trans('global.app_are_you_sure') . "');",
                                            'route' => ['admin.products.destroy', $product->id],
                                        ]) !!}
                                        {!! Form::submit(trans('global.app_delete'), ['class' => 'btn btn-xs btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="13">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        @can('product_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.products.mass_destroy') }}';
        @endcan
    </script>
@endsection
