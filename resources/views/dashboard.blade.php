@extends('layouts.app')

@section('content')
<div class="container">

    <div class="dashboard__blocks" style="margin-top: 2em;">
        <div class="block">
            <div class="block__inner nopadding">
                <div class="table-container nomargin">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Afbeelding</th>
                                <th>Naam</th>
                                <th>Type</th>
                                <th>Oppervlakte</th>
                                <th>Aantal kamers</th>
                                <th>Prijs</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($houses as $house)
                                <tr>
                                    <td>
                                        @if (!empty($house->images()->get()->all()))
                                            <img src="/storage/houses/{{ $house->id . '/' . $house->images()->first()->location }}" alt="House image">
                                        @else 
                                            X
                                        @endif
                                    </td>
                                    
                                    <td>       
                                        {{ $house->name }}
                                    </td>

                                    <td>
                                        @if($house->status != 'verkocht')
                                            <strong>{{ $house->type }}<strong>
                                        @else 
                                            -
                                        @endif
                                    </td>

                                    <td>
                                         @if($house->status != 'verkocht')
                                            <strong>{{ $house->surface }}<strong>
                                        @else 
                                            -
                                        @endif
                                    </td>

                                    <td>
                                         @if($house->status != 'verkocht')
                                            <strong>{{ $house->rooms }}<strong>
                                        @else 
                                            -
                                        @endif
                                    </td>

                                    <td>
                                         @if($house->status != 'verkocht')
                                            <strong>{{ $house->price }}<strong>
                                        @else 
                                            -
                                        @endif
                                    </td>

                                    <td>
                                        <strong>{{ $house->status }}<strong>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-container -->
            </div>
        </div><!-- /.block -->
    </div>   
</div>

@endsection
