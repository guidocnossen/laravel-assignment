<div class="table-container nomargin">
    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>E-mailadres</th>
                <th>Naam</th>
                <th>Aangemeld op</th>
                <th class="text-right"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>
                        <a href="{{ route('admin.users.edit', [$user]) }}">
                            {{ $user->id }}
                        </a>
                    </td>
                    
                    <td>
                        <a href="{{ route('admin.users.edit', [$user]) }}">
                            {{ $user->email }}
                        </a>
                    </td>

                    <td>
                        {{ $user->full_name() }} {{ $user->role == 0 ? '(Admin)' : '(Gebruiker)' }}
                    </td>
                    
                    
                    <td>
                        {{ $user->created_at->format('d-m-Y H:i') }}
                    </td>
                    <td class="text-right">

                        <a href="{{ route('admin.users.edit', [$user]) }}" title="Bewerken" data-toggle="tooltip">
                            <i class="fas fa-pencil"></i>
                        </a>

                        <a href="{{ route('admin.users.delete', [$user]) }}" title="Verwijderen" class="prompt-link" data-toggle="tooltip">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
