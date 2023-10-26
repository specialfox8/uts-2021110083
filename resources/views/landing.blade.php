@extends('layouts.template')

@section('title', 'Landing Page')

@section('content')


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


    </div>
@endsection
