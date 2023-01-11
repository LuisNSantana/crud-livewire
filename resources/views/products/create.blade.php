@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{__('Add new product')}}
                </div>
                <div class="card-body">
                    @livewire('products-create')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
