@extends('admin.layouts.app')

@section('content')

<div class="dashboard__blocks">
    <div class="block">
        <div class="block__header">
            <div class="block__header-content">
                <div class="section-title">
                    <h1 class="title title--striped">Huis toevoegen</h1>
                </div><!-- /.section-title -->
            </div>
            <div class="block__header-controls">
            </div>
        </div>
        <div class="block__inner">

            <form action="{{ route('admin.houses.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                @include('admin.houses.fields')
            </form>
        </div>
    </div>
</div>     
@endsection