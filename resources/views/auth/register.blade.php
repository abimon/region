@extends('layouts.auth', ['title' => 'Register'])

@section('content')
<div class="container">
    <div class="d-flex flex-column justify-content-center align-items-center vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <img src="/storage/images/Logo.png" style="width:10vw; height:10vW; object-fit:scale-down;" alt="">
                            <h2 class="mt-3">{{ __('Register') }}</h2>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                    <div class="col-md-8">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-8">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="phone"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                                    <div class="col-md-8">
                                        <input id="phone" type="text"
                                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                                            value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="dob"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Date Of Birth') }}</label>

                                    <div class="col-md-8">
                                        <input id="dob" type="date"
                                            class="form-control @error('dob') is-invalid @enderror" name="dob"
                                            value="{{ old('dob') }}" required autocomplete="dob" autofocus>

                                        @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="institution" class="col-md-4 col-form-label text-md-end">{{ __('Institution') }}</label>

                                    <div class="col-md-8">
                                        <select name="institution" id="" class="form-select @error('institution') is-invalid @enderror">
                                            <option value="" selected disabled>Select Institution</option>
                                            <?php $institutions = [
                                                'JKUSDA',
                                                'KUSDA',
                                                'MKUSDA',
                                                'TUKSDA',
                                                'UoNSDA',
                                                'ZUSDA',
                                            ]; ?>
                                            @foreach($institutions as $institution)
                                            <option value="{{$institution}}" {{ old('institution') ? 'selected' : '' }}>{{$institution}}</option>
                                            @endforeach
                                        </select>
                                        @error('institution')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                                    <div class="col-md-8">
                                        <select name="gender" id="" class="form-select @error('name') is-invalid @enderror">
                                            <option value="" selected disabled>Select Gender</option>
                                            <option value="Male" {{ old('Male') ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ old('Female') ? 'selected' : '' }}>Female</option>
                                        </select>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-8">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-8">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </form>
                            <div class="text-center">
                                <p class="mt-3">Already have an account? <a href="{{ route('login') }}">Login
                                        here</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>t
</div>
@endsection