<x-app-layout>
    <div class="container mx-auto">
        <table id="users-table" class="cell-border stripe">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Rol</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>
                            @foreach ($user->roles as $role)
                                {{ $role->name }}
                            @endforeach
                        </td>
                        <td>
                            <form action="/users/{{ $user->id }}" method="POST" class="flex items-center">
                                @csrf
                                @method('DELETE')
                                <a href="/users/{{ $user->id }}/edit" class="btn-edit text-blue-500 px-2">Bewerken</a>
                                <button type="submit" class="btn-delete text-red-500">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-8">
            <a href="{{ route('users.create') }}"
                class="btn-create bg-green-500 font-bold rounded-lg py-2 px-3">Creëren</a>
        </div>
      
    </div>

    @push('scripts')
        {{-- <script>
            // Wacht tot het document volledig is geladen
            $(document).ready(function() {
                // Initialiseer DataTable met specifieke instellingen
                $('#users-table').DataTable({
                    responsive: true, // Maak de tabel responsief voor verschillende schermformaten
                    language: {
                        // Aanpassen van de taal en tekst van DataTable-controls
                        // lengthMenu: "MENU per pagina", // Tekst voor het lengtekeuzemenu
                        // info: "Toont START tot END van TOTAL invoer", // Tekst voor informatie over records
                        infoEmpty: "Toont 0 tot 0 van 0 invoer", // Tekst wanneer geen records worden weergegeven
                        infoFiltered: "(gefilterd van MAX totale invoer)", // Tekst voor gefilterde records
                        search: "Zoeken:", // Label voor zoekvak
                        zeroRecords: "Geen passende records gevonden", // Tekst wanneer geen overeenkomende records worden gevonden
                        // paginate: {
                        //     first: "Eerste", // Label voor de knop 'Eerste'
                        //     last: "Laatste", // Label voor de knop 'Laatste'
                        //     next: "Volgende", // Label voor de knop 'Volgende'
                        //     previous: "Vorige" // Label voor de knop 'Vorige'
                        // },
                    }
                });


            });
        </script> --}}


        <script>
        // Wacht tot het document volledig is geladen
        $(document).ready(function() {
            // Initialiseer DataTable met specifieke instellingen
            $('#users-table').DataTable({
                // Definieer kolominstellingen
                columnDefs: [{
                    "orderable": false, // Kolommen niet sorteervaar maken
                    "targets": [2] // Indexen van de niet-sorteerbare kolommen
                }],
                responsive: true, // Maak de tabel responsief voor verschillende schermformaten
                order: [
                    [0, "desc"] // Standaard sorteervolgorde: eerste kolom aflopend
                ],
                layout: {
                    // Layout van DataTable-controls instellen
                    bottom: 'paging', // Pagineringselementen onderaan de tabel weergeven
                    bottomEnd: null // Geen andere controls onderaan de tabel
                },
                language: {
                    // Aanpassen van de taal en tekst van DataTable-controls
                    lengthMenu: "_MENU_ per pagina", // Tekst voor het lengtekeuzemenu
                    info: "Toont _START_ tot _END_ van _TOTAL_", // Tekst voor informatie over records
                    infoEmpty: "Toont 0 tot 0 van 0 invoer", // Tekst wanneer geen records worden weergegeven
                    infoFiltered: "(gefilterd van MAX totale invoer)", // Tekst voor gefilterde records
                    search: "Zoeken:", // Label voor zoekvak
                    zeroRecords: "Geen medewerker gevonden", // Tekst wanneer geen overeenkomende records worden gevonden
                    paginate: {
                        first: "Eerste", // Label voor de knop 'Eerste'
                        last: "Laatste", // Label voor de knop 'Laatste'
                        next: "Volgende", // Label voor de knop 'Volgende'
                        previous: "Vorige" // Label voor de knop 'Vorige'
                    },
                }
            });
        });
    </script>
    @endpush
</x-app-layout>
