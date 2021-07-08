@extends('admin.layouts.app')

@section('content')

<!-- @TODO: include breadcrumbs -->

<div class="dashboard__blocks">
    <div class="block">
        <div class="block__header">
            <div class="block__header-content">
                <div class="section-title">
                    <h1 class="title title--striped">Gebruikers</h1>
                </div><!-- /.section-title -->
            </div>
            <div class="block__header-controls">
                <a href="{{ route('admin.users.create') }}" class="btn btn-med btn-smaller-padding btn-primary" title="Gebruiker toevoegen">
                    <i class="icon-left far fa-plus"></i>Gebruiker toevoegen
                </a>
            </div>
        </div>
        <div class="block__header">
            <div class="block__header-content">
                <form method="get">
                    <div class="input-wrapper" style="width: 300px; display: inline-block">
                        <input type="text" name="s" value="{{ $search }}" placeholder="Type je zoekopdracht"/> 
                    </div>

                    <?php /*
                    <div class="input-wrapper input-wrapper--has-icon-right" style="width: 300px; display: inline-block">
                        <div class="icon icon--right">
                            <i class="fa fa-caret-down"></i>
                        </div>
                        <select name="company_id">
                            <option value="">Alle Familieleden</option>
                            <!-- @TODO: include family members -->
                        </select>
                    </div>
                    */ ?>

                    <button type="submit" class="btn btn-med btn-primary">Zoeken</button>

                </form>
            </div>
            <div class="block__header-controls">
               
            </div>
        </div>
        <div class="block__inner nopadding">
            @include('admin.users.table')
        </div>
    </div><!-- /.block -->
</div>     
@endsection