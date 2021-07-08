<div class="table-container nomargin">
    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Aangemaakt</th>
                <th class="text-right"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($houses as $house)
                <tr>
                    <td>
                        <a href="{{ route('admin.houses.edit', [$house]) }}">
                           {{ $house->id }}
                        </a>
                    </td>
                    
                    <td>
                        <a href="{{ route('admin.houses.edit', [$house]) }}">         
                            {{ $house->name }}
                        </a>
                    </td>

                    <td>
                        {{ $house->created_at->format('d-m-Y H:i') }}
                    </td>
                    <td class="text-right">

                        <a href="{{ route('admin.houses.edit', [$house]) }}" title="Bewerken" data-toggle="tooltip">
                            <i class="fas fa-pencil"></i>
                        </a>

                        <a href="{{ route('admin.houses.delete', [$house]) }}" title="Verwijderen" class="prompt-link" data-toggle="tooltip">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
