@extends('layouts.template')

@section('id', 'Transaction List')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>All Articles</h1>
        {{-- Add button --}}
        <a href="{{ route('transaction.create') }}" class="btn btn-primary btn-sm">Add New Category</a>
    </div>

    <div class="container mt-5">
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">id</th>
                    <th scope="col">amout</th>
                    <th scope="col">type</th>
                    <th scope="col">category</th>
                    <th scope="col">notes</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                </tr>
            </thead>
            <tbody>

                {{-- @foreach ($transactions as $transaction)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $transaction->description }}</td>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ $transaction->type }}</td>
                        <td>{{ $transaction->created_at }}</td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="6">No articles found.</td>
                        </tr>
                    @endforeach --}}


                @forelse ($transactions as $transaction)
                    <tr>
                        <th scope="row"><a href="{{ route('transaction.show', $transaction) }}">{{ $transaction->id }}
                        </th>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ $transaction->type }}</td>
                        <td>{{ $transaction->category }}</td>
                        <td>{{ $transaction->notes }}</td>
                        <td>{{ $transaction->created_at }}</td>
                        <td>
                            <a href="{{ route('transaction.edit', $transaction) }}" class="btn btn-primary btn-sm">
                                Edit
                            </a>
                            <form action="{{ route('transaction.destroy', $transaction) }}" method="POST"
                                class="d-inline-block">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No articles found.</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $transactions->links() !!}
        </div>
    </div>
@endsection
