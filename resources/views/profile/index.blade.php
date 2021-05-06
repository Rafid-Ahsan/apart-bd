@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 10em; margin-bottom: 5em;">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="text-center mb-5 font-weight-bold">{{ $user->first_name }}'s Profile Information</h1>

        @hasanyrole('writer|admin')
            <div class="row">
                <div class="col-md-4">
                    @include('profile.layouts.information')
                </div>
                <div class="col-md-8">
                    @include('profile.layouts.update-form')
                </div>
            </div>
        @else
            @if (Auth::check() == true)
                <div class="row">
                    <div class="col-md-4">
                        @include('profile.layouts.information')
                    </div>
                    <div class="col-md-8">
                        @include('profile.layouts.update-form')
                    </div>
                </div>
            @else
                @include('profile.layouts.information')
            @endif
        @endhasanyrole
    </div>
@endsection
