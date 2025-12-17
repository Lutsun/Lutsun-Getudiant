@extends('welcome')

@section('title', 'Liste des Étudiants')

@section('content')
<div class="liste-container">
    <div class="liste-header">
        <h2><i class="fas fa-users"></i> Liste des étudiants</h2>
        <a href="/etudiant/create" class="btn-ajouter">
            <i class="fas fa-plus"></i> Ajouter un étudiant
        </a>
    </div>

    @if($etudiants->isEmpty())
        <div class="liste-vide">
            <i class="fas fa-users-slash"></i>
            <p>Aucun étudiant enregistré</p>
            <a href="/etudiant/create" class="btn-ajouter">
                <i class="fas fa-plus"></i> Ajouter le premier étudiant
            </a>
        </div>
    @else
        <div class="table-container">
            <table class="table-etudiants">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Matricule</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Téléphone</th>
                        <th>Classe</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($etudiants as $index => $etudiant)
                    <tr>
                        <td class="numero">{{ $index + 1 }}</td>
                        <td class="matricule">{{ $etudiant->matricule ?? 'Non défini' }}</td>
                        <td class="prenom">{{ $etudiant->prenom }}</td>
                        <td class="nom">{{ $etudiant->nom }}</td>
                        <td class="telephone">{{ $etudiant->telephone ?? 'Non défini' }}</td>
                        <td class="classe">
                            @if($etudiant->classe)
                                {{ $etudiant->classe->nom }} ({{ $etudiant->classe->niveau }})
                            @else
                                <span style="color: #999;">Non assigné</span>
                            @endif
                        </td>
                        <td class="actions">
                            <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn-modifier">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            <button onclick="supprimerEtudiant('{{ $etudiant->id }}', '{{ $etudiant->prenom }}')" 
                                    class="btn-supprimer">
                                <i class="fas fa-trash"></i> Supprimer
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="table-footer">
                <p><i class="fas fa-info-circle"></i> Total : {{ $etudiants->count() }} étudiant(s)</p>
            </div>
        </div>
    @endif
</div>

<script>
function supprimerEtudiant(id, prenom) {
    if (confirm('Voulez-vous vraiment supprimer l\'étudiant ' + prenom + ' ?')) {
        fetch('/etudiant/delete/' + id, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
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
