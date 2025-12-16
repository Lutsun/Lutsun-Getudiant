@extends('welcome')

@section('title', 'Liste des Étudiants')

@section('content')
<div class="liste-container">
    <div class="liste-header">
        <h2><i class="fas fa-users"></i> Liste des étudiants</h2>
        <a href="/ajouter" class="btn-ajouter">
            <i class="fas fa-plus"></i> Ajouter un étudiant
        </a>
    </div>

    @if(empty($personnes))
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
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Téléphone</th>
                        <th>Classe</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($personnes as $index => $etudiant)
                    <tr>
                        <td class="numero">{{ $index + 1 }}</td>
                        <td class="prenom">{{ $etudiant['prenom'] ?? '' }}</td>
                        <td class="nom">{{ $etudiant['nom'] ?? '' }}</td>
                        <td class="telephone">{{ $etudiant['telephone'] ?? '' }}</td>
                        <td class="classe">
                            @if(isset($etudiant['classe']))
                                @switch($etudiant['classe'])
                                    @case('1') Maths @break
                                    @case('2') Physique @break
                                    @case('3') Chimie @break
                                    @case('4') Info @break
                                    @default Non assigné
                                @endswitch
                            @else
                                Non assigné
                            @endif
                        </td>
                        <td class="actions">
                            <a href="/edit/{{ $etudiant['prenom'] ?? '' }}" class="btn-modifier">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                        
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="table-footer">
                <p><i class="fas fa-info-circle"></i> Total : {{ count($personnes) }} étudiant(s)</p>
            </div>
        </div>
    @endif
</div>

<script>
function supprimerEtudiant(prenom) {
    if (confirm('Voulez-vous vraiment supprimer l\'étudiant ' + prenom + ' ?')) {
        // À implémenter : appel AJAX pour supprimer
        alert('Suppression de ' + prenom + ' (fonction à implémenter)');
    }
    return false;
}
</script>
@endsection