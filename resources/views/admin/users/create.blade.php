@extends('admin.layouts.app')

@section('content')

<div class="dashboard__blocks">
    <div class="block">
        <div class="block__header">
            <div class="block__header-content">
                <div class="section-title">
                    <h1 class="title title--striped">Gebruiker toevoegen</h1>
                </div><!-- /.section-title -->
            </div>
            
        </div>
        <div class="block__inner">

            <form action="{{ route('admin.users.store') }}" method="POST" autocomplete="off">
                @csrf
                @include('admin.users.fields')
            </form>
        </div>
    </div><!-- /.block -->
</div>     
@endsection