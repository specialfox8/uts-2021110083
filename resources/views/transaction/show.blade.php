@extends('layouts.template')

@section('title', $transaction->title)

@section('content')
    <article class="blog-post my-4">
        <h1 class="display-5 fw-bold">{{ $transaction->title }}</h1>
        <p class="blog-post-meta">{{ $transaction->updated_at }}</p>

        <p>{{ $transaction->amount }}</p>
        <p>{{ $transaction->type }}</p>
        <p>{{ $transaction->category }}</p>
        <p>{{ $transaction->notes }}</p>

    </article>
@endsection
