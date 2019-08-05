@extends('errors::illustrated-layout')

@section('code', '404 😭')

@section('title', __('Page Not Found'))

@section('image')

<div style="background-image: url('/images/404.png'); background-size: cover;" class="absolute pin bg-no-repeat md:bg-left lg:bg-center">
</div>

@endsection

@section('message', __('Lo sentimos, La página que está buscando no fue encontrada.'))