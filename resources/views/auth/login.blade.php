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
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" value="{{ old('email') }}">
                    @error('email')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" value="{{ old('password') }}">
                    @error('password')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="{{ route('password.request') }}" class="btn btn-link">Forgot Your Password</a>
            </form>
        </div>
    </div>
</div>
@endsection