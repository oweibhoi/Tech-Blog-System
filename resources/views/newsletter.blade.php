@extends('main')
@section('content')
<div class="m-5 py-5 d-flex justify-content-center">
    <div class="card w-25">
        <div class="card-body">
            <form action="/subscribe" method="post">
                <h1 class="text-center">Subcribe Now!</h1><br>
                <p class="text-center">You will receive notification for new posts.</p><br><br>
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Your Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') }}" autocomplete="off" required>
                    @error('email')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary float-right text-black">Subcribe</button>
            </form>
        </div>
    </div>

</div>
@endsection