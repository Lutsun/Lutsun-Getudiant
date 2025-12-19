@extends('welcome')

@section('title', 'Liste des Inscriptions')

@section('content')
<div class="liste-container">
    <div class="liste-header">
        <h2><i class="fas fa-file-signature"></i> Liste des inscriptions</h2>
        <a href="{{ route('inscription.create') }}" class="btn-ajouter">
            <i class="fas fa-plus"></i> Ajouter une inscription
        </a>
    </div>

    @if($inscriptions->isEmpty())
        <div class="liste-vide">
            <i class="fas fa-file-excel"></i>
            <p>Aucune inscription enregistrée</p>
            <a href="{{ route('inscription.create') }}" class="btn-ajouter">
                <i class="fas fa-plus"></i> Ajouter la première inscription
            </a>
        </div>
    @else
        <div class="table-container">
            <table class="table-etudiants">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Étudiant</th>
                        <th>Classe</th>
                        <th>Date</th>
                        <th>Frais (FCFA)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inscriptions as $index => $inscription)
                    <tr>
                        <td class="numero">{{ $index + 1 }}</td>
                        <td class="etudiant">
                            @if($inscription->etudiant)
                                {{ $inscription->etudiant->prenom }} {{ $inscription->etudiant->nom }}
                                @if($inscription->etudiant->matricule)
                                    <br><small>{{ $inscription->etudiant->matricule }}</small>
                                @endif
                            @else
                                <span style="color: #999;">Étudiant supprimé</span>
                            @endif
                        </td>
                        <td class="classe">
                            @if($inscription->classe)
                                {{ $inscription->classe->nom }} ({{ $inscription->classe->niveau }})
                            @else
                                <span style="color: #999;">Classe supprimée</span>
                            @endif
                        </td>
                        <td class="date">{{ $inscription->date->format('d/m/Y') }}</td>
                        <td class="frais">{{ number_format($inscription->frais, 2, ',', ' ') }}</td>
                        <td class="actions">
                            <a href="{{ route('inscription.edit', $inscription->id) }}" class="btn-modifier">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            @php
                                $nomInscription = $inscription->etudiant ? $inscription->etudiant->prenom : 'Inscription';
                            @endphp

                            <button onclick="supprimerInscription('{{ $inscription->id }}', '{{ $nomInscription }}')" 
                                    class="btn-supprimer">
                                <i class="fas fa-trash"></i> Supprimer
                            </button>
                                <i class="fas fa-trash"></i> Supprimer
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="table-footer">
                <p><i class="fas fa-info-circle"></i> Total : {{ $inscriptions->count() }} inscription(s)</p>
                @if($inscriptions->sum('frais') > 0)
                <p><i class="fas fa-money-bill-wave"></i> Total frais : 
                    {{ number_format($inscriptions->sum('frais'), 2, ',', ' ') }} FCFA</p>
                @endif
            </div>
        </div>
    @endif
</div>

<script>
function supprimerInscription(id, prenom) {
    if (confirm('Voulez-vous vraiment supprimer l\'inscription de ' + prenom + ' ?')) {
        fetch('/inscription/delete/' + id, {
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