@extends('admin.layouts.app')

@section('content')
    <div class="dashboard__blocks">

        <div class="block">
            <div class="block__inner">
                <div class="section-title">
                    <h1 class="title">Dashboard</h1>
                    <p class="subtitle">Welkom terug, {{ Auth::user()->full_name() }}!</p>
                </div>
                
                <a class="btn btn-large btn-primary" href="{{ route('admin.clear-cache') }}">Cache legen</a>

            </div>
        </div>

    </div>
@endsection
