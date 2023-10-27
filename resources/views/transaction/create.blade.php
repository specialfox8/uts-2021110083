@extends('layouts.template')

@section('title', 'Add New transaction')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>Add New Transaction</h1>
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
            <form action="{{ route('transaction.store') }}" method="POST">
                @csrf
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="amount" class="form-label">amount</label>
                    <input type="float" class="form-control" id="amount" name="amount" value="{{ old('amount') }}">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="type">Type</label>
                    <p>
                        <input type="radio" id="income" name="type" value="income"
                            {{ old('type') == 'income' ? 'checked' : '' }}>
                        <label for="income">Income</label><br>
                        <input type="radio" id="expense" name="type" value="expense"
                            {{ old('type') == 'expense' ? 'checked' : '' }}>
                        <label for="expense">Expense</label><br>
                    </p>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-select">
                        <option value="uncategorized" {{ old('category') == 'uncategorized' ? 'selected' : '' }}>
                            Uncategorized</option>
                        <option value="wage" {{ old('category') == 'wage' ? 'selected' : '' }}>Wage</option>
                        <option value="bonus" {{ old('category') == 'bonus' ? 'selected' : '' }}>Bonus</option>
                        <option value="gift" {{ old('category') == 'gift' ? 'selected' : '' }}>Gift</option>
                        <option value="food & drinks" {{ old('category') == 'food & drinks' ? 'selected' : '' }}>Food &
                            Drinks</option>
                        <option value="shopping" {{ old('category') == 'shopping' ? 'selected' : '' }}>Shopping</option>
                        <option value="charity" {{ old('category') == 'charity' ? 'selected' : '' }}>Charity</option>
                        <option value="housing" {{ old('category') == 'housing' ? 'selected' : '' }}>Housing</option>
                        <option value="insurance" {{ old('category') == 'insurance' ? 'selected' : '' }}>Insurance</option>
                        <option value="taxes" {{ old('category') == 'taxes' ? 'selected' : '' }}>Taxes</option>
                        <option value="transportation" {{ old('category') == 'transportation' ? 'selected' : '' }}>
                            Transportation</option>
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
