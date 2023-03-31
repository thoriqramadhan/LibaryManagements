@extends('layout.app')
@section('main')
{{-- https://bit.ly/mastering-task-form --}}
<div class="mt-5 mx-auto" style="width: 380px">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ url('/list') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">User</label>
                    <input name="user" type="text" class="form-control" value="{{ old('user') }}">
                    @error('user')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Books</label>
                    <textarea name="books" type="text"class="form-control" id="" rows="3" placeholder="Input books that user borrow.">{{ old('books') }}</textarea>
                    @error('books')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- <div class="mb-3">
                    <label for="" class="form-label">Date</label>
                    <input type="date" class="form-control">
                </div> --}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection