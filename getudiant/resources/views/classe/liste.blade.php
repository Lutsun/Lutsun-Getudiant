@extends('welcome')

@section('title', 'Liste des Classes')

@section('content')
<div class="liste-container">
    <div class="liste-header">
        <h2><i class="fas fa-chalkboard-teacher"></i> Liste des classes</h2>
        <a href="/classe/create" class="btn-ajouter">
            <i class="fas fa-plus"></i> Ajouter une classe
        </a>
    </div>

    @if(empty($classes))
        <div class="liste-vide">
            <i class="fas fa-chalkboard"></i>
            <p>Aucune classe enregistrée</p>
            <a href="/classe/create" class="btn-ajouter">
                <i class="fas fa-plus"></i> Ajouter la première classe
            </a>
        </div>
    @else
        <div class="table-container">
            <table class="table-etudiants">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Code</th>
                        <th>Niveau</th>
                        <th>Effectif</th>
                        <th>Enseignant</th>
                        <th>Salle</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($classes as $index => $classe)
                    <tr>
                        <td class="numero">{{ $index + 1 }}</td>
                        <td class="prenom">{{ $classe['nom'] ?? '' }}</td>
                        <td class="nom">{{ $classe['code'] ?? '' }}</td>
                        <td class="telephone">{{ $classe['niveau'] ?? '' }}</td>
                        <td class="classe">
                            <span class="badge-effectif">{{ $classe['effectif'] ?? 0 }} étudiant(s)</span>
                        </td>
                        <td class="classe">
                            {{ $classe['enseignant'] ?? 'Non assigné' }}
                        </td>
                        <td class="classe">
                            {{ $classe['salle'] ?? 'Non défini' }}
                        </td>
                        <td class="actions">
                            <a href="/classe/edit/{{ $classe['id'] ?? $index }}" class="btn-modifier">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="table-footer">
                <p><i class="fas fa-info-circle"></i> Total : {{ count($classes) }} classe(s)</p>
            </div>
        </div>
    @endif
</div>

<script>
function supprimerClasse(nom, id) {
    if (confirm('Voulez-vous vraiment supprimer la classe ' + nom + ' ?')) {
        fetch('/classe/delete/' + id, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            if(response.ok) {
                location.reload();
            } else {
                alert('Erreur lors de la suppression');
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            alert('Erreur lors de la suppression');
        });
    }
    return false;
}
</script>
@endsection
