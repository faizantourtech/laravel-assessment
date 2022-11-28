@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  
                    <hr />

                    @foreach ($products as $product)
                        <div class="row">
                            <div class="col-md-2">
                                @if ($product->photo1 != '')
                                <img src="/{{ $product->photo1 }}" width="100" />
                                @endif
                            </div>
                            <div class="col-md-8">
                                <a href="{{ route('admin.products.show', $product->id) }}">{{ $product->name }}</a>
                                <br />
                                {{ $product->description }}
                            </div>
                          
                        </div>
                        <hr />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
