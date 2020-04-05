@extends('backend.layouts.app')


@section('breadcrumbs')
    {{ Breadcrumbs::render('backend.product.index') }}
@endsection

@section('content')
    @include('backend.partials._product_attributes_index')
@endsection
