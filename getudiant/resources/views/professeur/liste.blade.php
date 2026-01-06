@extends('welcome')

@section('title', 'Liste des Professeurs')

@section('content')
<div class="liste-container">
    <div class="liste-header">
        <h2><i class="fas fa-chalkboard-teacher"></i> Liste des professeurs</h2>
        <a href="{{ route('professeur.create') }}" class="btn-ajouter">
            <i class="fas fa-plus"></i> Ajouter un professeur
        </a>
    </div>

    @if($professeurs->isEmpty())
        <div class="liste-vide">
            <i class="fas fa-user-graduate"></i>
            <p>Aucun professeur enregistré</p>
            <a href="{{ route('professeur.create') }}" class="btn-ajouter">
                <i class="fas fa-plus"></i> Ajouter le premier professeur
            </a>
        </div>
    @else
        <div class="table-container">
            <table class="table-etudiants">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom & Prénom</th>
                        <th>Spécialité</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($professeurs as $index => $professeur)
                    <tr>
                        <td class="numero">{{ $index + 1 }}</td>
                        <td class="nom-complet">
                            <strong>{{ $professeur->prenom }} {{ $professeur->nom }}</strong><br>
                            <small>Embauché le: {{ $professeur->date_embauche->format('d/m/Y') }}</small>
                        </td>
                        <td class="specialite">{{ $professeur->specialite }}</td>
                        <td class="email">{{ $professeur->email }}</td>
                        <td class="telephone">{{ $professeur->telephone ?? 'N/A' }}</td>
                        <td class="statut">
                            @if($professeur->statut == 'actif')
                                <span class="badge badge-success">Actif</span>
                            @elseif($professeur->statut == 'inactif')
                                <span class="badge badge-secondary">Inactif</span>
                            @else
                                <span class="badge badge-warning">Congé</span>
                            @endif
                        </td>
                        <td class="actions">
                            <a href="{{ route('professeur.edit', $professeur->id) }}" class="btn-modifier">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            <button onclick="supprimerProfesseur('{{ $professeur->nom_complet }}', '{{ $professeur->id }}')" 
                                    class="btn-supprimer">
                                <i class="fas fa-trash"></i> Supprimer
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="table-footer">
                <p><i class="fas fa-info-circle"></i> Total : {{ $professeurs->count() }} professeur(s) • 
                   Actifs : {{ $professeurs->where('statut', 'actif')->count() }} • 
                   Inactifs : {{ $professeurs->where('statut', 'inactif')->count() }} • 
                   Congé : {{ $professeurs->where('statut', 'congé')->count() }}</p>
            </div>
        </div>
    @endif
</div>

<script>
function supprimerProfesseur(nomComplet, id) {
    if (confirm('Voulez-vous vraiment supprimer le professeur "' + nomComplet + '" ?\n\nAttention : Cette action est irréversible.')) {
        fetch('/professeur/delete/' + id, {
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
                alert(data.message || 'Erreur lors de la suppression');
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

<style>
.badge {
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: bold;
}

.badge-success {
    background-color: #28a745;
    color: white;
}

.badge-secondary {
    background-color: #6c757d;
    color: white;
}

.badge-warning {
    background-color: #ffc107;
    color: #212529;
}

.nom-complet small {
    color: #6c757d;
    font-size: 0.85rem;
}
</style>
@endsection