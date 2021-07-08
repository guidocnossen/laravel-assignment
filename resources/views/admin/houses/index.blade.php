@extends('admin.layouts.app')

@section('content')

<div class="dashboard__blocks">
    <div class="block">
        <div class="block__header">
            <div class="block__header-content">
                <div class="section-title">
                    <h1 class="title title--striped">Huis</h1>
                </div><!-- /.section-title -->
            </div>
            <div class="block__header-controls">
                <a href="{{ route('admin.houses.create') }}" class="btn btn-med btn-smaller-padding btn-primary" title="Huis toevoegen">
                    <i class="icon-left far fa-plus"></i>Huis toevoegen
                </a>
            </div>
        </div>
        <div class="block__header">
            <div class="block__header-content">
                <form method="get">
                    <div class="input-wrapper" style="width: 300px; display: inline-block">
                        <input type="text" name="s" value="" placeholder="Type je zoekopdracht"/> 
                    </div>

                    <button type="submit" class="btn btn-med btn-primary">Zoeken</button>

                </form>
            </div>
            <div class="block__header-controls">
               
            </div>
        </div>
        <div class="block__inner nopadding">
            @include('admin.houses.table')
            <!-- /.table-container -->
        </div>
    </div><!-- /.block -->
</div>     
@endsection