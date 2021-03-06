@extends('layouts.master')

@section('title', $page->title)

@section('content')
    <div class="nk-gap-4"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="nk-box-3 bg-dark-1">
                    <h2 class="nk-title h3 text-center">{{ $page->title }}</h2>
                    <div class="nk-gap-2"></div>
                    {!! $page->body !!}
                </div>
            </div>
        </div>
    </div>
    <div class="nk-gap-4"></div>
@endsection