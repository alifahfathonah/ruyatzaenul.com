@extends('layouts.front')
@section('title')
    <title>Ru'yat-Zaenul : Bogor Kahiji</title>
@endsection
@section('main')
    <section class="main slider-video">
    @include('include.main')
    </section> 
@endsection
@section('content')
    @include('pages.main.main')
@endsection
