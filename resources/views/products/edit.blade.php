@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Edit product') }}
                    </div>
                    <div class="card-body">
                        @livewire('products-create', ['product' => $product])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
