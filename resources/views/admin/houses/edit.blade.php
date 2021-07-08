@extends('admin.layouts.app')

@section('content')

<div class="dashboard__blocks">
    <div class="block">
        <div class="block__header">
            <div class="block__header-content">
                <div class="section-title">
                    <h1 class="title title--striped">Huis bewerken (ID: {{ $house->id }})</h1>
                </div><!-- /.section-title -->
            </div>
            <div class="block__header-controls">
            </div>
        </div>
        <div class="block__inner">

            <form action="{{ route('admin.houses.update', ['house' => $house]) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.houses.fields')
            </form>
        </div>
    </div>
</div>     
@endsection