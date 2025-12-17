@extends('welcome')

@section('title', 'Liste des Classes')

@section('content')
<div class="liste-container">
    <div class="liste-header">
        <h2><i class="fas fa-chalkboard-teacher"></i> Liste des classes</h2>
        <a href="{{ route('classe.create') }}" class="btn-ajouter">
            <i class="fas fa-plus"></i> Ajouter une classe
        </a>
    </div>

    @if($classes->isEmpty())
        <div class="liste-vide">
            <i class="fas fa-chalkboard"></i>
            <p>Aucune classe enregistrée</p>
            <a href="{{ route('classe.create') }}" class="btn-ajouter">
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
                        <th>Niveau</th>
                        <th>Effectif</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($classes as $index => $classe)
                    <tr>
                        <td class="numero">{{ $index + 1 }}</td>
                        <td class="prenom">{{ $classe->nom }}</td>
                        <td class="nom">{{ $classe->niveau }}</td>
                        <td class="telephone">
                            <span class="badge-effectif">{{ $classe->effectif }} étudiant(s)</span>
                        </td>
                        <td class="actions">
                            <a href="{{ route('classe.edit', $classe->id) }}" class="btn-modifier">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            <button onclick="supprimerClasse('{{ $classe->nom }}', '{{ $classe->id }}')" 
                                    class="btn-supprimer">
                                <i class="fas fa-trash"></i> Supprimer
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="table-footer">
                <p><i class="fas fa-info-circle"></i> Total : {{ $classes->count() }} classe(s) • 
                   Total étudiants : {{ $classes->sum('effectif') }}</p>
            </div>
        </div>
    @endif
</div>

<script>
function supprimerClasse(nom, id) {
    if (confirm('Voulez-vous vraiment supprimer la classe "' + nom + '" ?\n\nAttention : Cette action est irréversible.')) {
        fetch('/classe/delete/' + id, {
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
.badge-effectif {
    background-color: #007bff;
    color: white;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: bold;
}
</style>
@endsection