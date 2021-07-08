@extends('admin.layouts.app')

@section('content')

<div class="dashboard__blocks">
    <div class="block">
        <div class="block__header">
            <div class="block__header-content">
                <div class="section-title">
                    <h1 class="title title--striped">Gebruiker "{{ $user->full_name() }}" bewerken (ID: {{ $user->id }})</h1>
                </div><!-- /.section-title -->
            </div>
            <div class="block__header-controls">
            </div>
        </div>
        <div class="block__inner">

            <form action="{{ route('admin.users.update', ['user' => $user]) }}" method="POST" autocomplete="off">
                @csrf
                @method('PUT')
                @include('admin.users.fields')
            </form>
        </div>
    </div>

    <div class="block">
        <div class="block__header">
            <div class="block__header-content">
                <div class="section-title">
                    <h1 class="title title--striped">Familieleden</h1>
                </div><!-- /.section-title -->

            </div>
            <div class="block__header-controls">
                <a href="{{ route('admin.members.create') }}?user_id={{ $user->id }}" class="btn btn-med btn-smaller-padding btn-primary" title="Familielied toevoegen">
                    <i class="icon-left far fa-plus"></i>Familielid toevoegen
                </a>
            </div>

        </div>
        <div class="block__inner">
            @if($user->familyMembers()->count())
                @include('admin.family-members.table', ['members' => $user->familyMembers])
            @else
                <i>Nog geen familieleden</i>
            @endif
        </div>
    </div>
</div>     
@endsection