@extends('layout.app')

@section('content')
    <div class="my-5">
        <div class="card col-sm-7 m-auto">
            <div class="card-header text-center">
                <h3>Register Page</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('registerakun') }}" method="POST">
                    @csrf
                    <label for="username" class="form-label">Username:</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username') }}">
                        @error('username')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <label for="email" class="form-label">Email:</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <label for="address" class="form-label">Address:</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address') }}">
                        @error('address')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
    
                    <label for="password" class="form-label">Password:</label>
                    <div class="input-group mb-1">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="{{ old('password') }}">
                        @error('password')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <label class="form-label">Password Confirmation</label>
                    <div class="input-group mb-1">
                        <input type="password" class="form-control" name="password_confirmation" id="password">
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" onclick="myFunction()" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Tampilkan Password
                        </label>
                    </div>
    
                    <button type="submit" class="btn btn-primary">Register</button>

                    <div class="mt-3">
                        <span>Sudah Punya Akun? <a href="{{ route('login') }}">Login Sekarang</a></span>
                    </div>
                    
    
                </form>
            </div>
        </div>
        <!-- END FORM -->
    </div>

@endsection

@push('js')
    <script>
        function myFunction() {
            var x = document.querySelectorAll("#password");
            for(var a=0; a < x.length ; a++){
                if (x[a].type === "password") {
                    x[a].type = "text";
                } else {
                    x[a].type = "password";
                }
            }
        }
    </script>
@endpush
