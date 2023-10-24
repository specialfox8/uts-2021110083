@extends('layouts.template')

@section('title', 'About')

@section('content')
    <h1>Writers</h1>
    <div class="row my-4">
        @for ($i = 1; $i < 7; $i++)
            <div class="col-lg-2 col-md-4 col-sm-12">
                <div class="card my-2">
                    <img src="https://i.pravatar.cc/500?img={{ $i }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Person {{ $i }}</h5>
                        <p class="card-text">Writer {{ $i }}</p>
                    </div>
                </div>
            </div>
        @endfor
    </div>
@endsection
