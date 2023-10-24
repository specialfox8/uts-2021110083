@extends('layouts.template')

@section('title', 'Landing Page')

@section('content')
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
            <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and
                efficiently about what’s most interesting in this post’s contents.</p>
            <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
        </div>
    </div>

    {{-- Transactions Card --}}
    <div class="row mb-2">
        @forelse ($transactions as $transaction)
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">World</strong>
                        <h3 class="mb-0">{{ $transaction->id }}</h3>
                        <div class="mb-1 text-muted">{{ $transaction->updated_at }}</div>
                        <p class="card-text mb-auto">{{ Str::limit($transaction->notes, 10, ' ...') }}</p>
                        <a href="{{ route('articles.show', $article) }}" class="stretched-link">Continue reading</a>
                    </div>
                </div>
            </div>

        @empty
            <div class="col-md-12">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h2 class="card-text mb-auto">No Transactions found.</h2>
                    </div>
                </div>
            </div>
        @endforelse

        {{ $transaction->links() }}
    </div>
@endsection
