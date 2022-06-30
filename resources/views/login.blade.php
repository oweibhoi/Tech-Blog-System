@extends('main')
@section('content')
<div class="m-5 py-5 d-flex justify-content-center">
    <div class="card w-25">
        <div class="card-body">
            <form action="/login" method="post">
                <h1 class="text-center mb-3">Login</h1>
                <hr class="mb-2">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                    @error('password')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary float-right text-black">Login</button>
            </form>
            <p class="mt-5">No account yet? <a href="/register">Register here!</a></p>
        </div>
    </div>

</div>
@endsection