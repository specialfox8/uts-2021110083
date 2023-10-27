@extends('layouts.template')

@section('title', 'Update Transaction')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>Update Transaction</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row my-5">
        <div class="col-12 px-5">
            <form action="{{ route('transaction.update', $transaction) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="amount" class="form-label">amount</label>
                    <input type="float" class="form-control" id="amount" name="amount" value="{{ old('amount') }}">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">

                    <label for="type">type</label method="post">
                    <p>
                        <input type="radio" id="income" name="fav_language" value="income">
                        <label for="income">income</label><br>
                        <input type="radio" id="expense" name="fav_language" value="expense">
                        <label for="expense">expense</label><br>
                    </p>

                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="category">category</label method="post">
                    <select name="category" id="category">
                        <option value="uncategorized" selected>Uncategorized</option>
                        <option value="">Wage</option>
                        <option value="">bonus</option>
                        <option value="">gift</option>
                        <option value="">food & drinks</option>
                        <option value="">shopping</option>
                        <option value="">charity</option>
                        <option value="">housing</option>
                        <option value="">insurance</option>
                        <option value="">taxes</option>
                        <option value="">transportation</option>
                    </select>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="notes" class="form-label">notes</label>
                    <textarea class="form-control" rows="10" name="notes">{{ old('notes') }}</textarea>
                </div>



                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
        </div>
    </div>
@endsection
