@extends('welcome')

@section('title', 'Modifier une Classe')

@section('content')
<div class="form-container classe-form-container">
    <h2 class="form-title">
        <i class="fas fa-edit"></i> Modifier la classe
    </h2>
    
    <form action="{{ route('classe.update', $classe->id) }}" method="POST" class="classe-form">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="nom"><i class="fas fa-chalkboard"></i> Nom de la classe *</label>
            <input type="text" id="nom" name="nom" class="form-control" required 
                   value="{{ old('nom', $classe->nom) }}"
                   placeholder="Ex: Terminale S1, Première L, etc.">
            @error('nom')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="niveau"><i class="fas fa-layer-group"></i> Niveau *</label>
            <select id="niveau" name="niveau" class="form-control" required>
                <option value="">Sélectionnez un niveau</option>
                <option value="Terminale" {{ old('niveau', $classe->niveau) == 'Terminale' ? 'selected' : '' }}>Terminale</option>
                <option value="Première" {{ old('niveau', $classe->niveau) == 'Première' ? 'selected' : '' }}>Première</option>
                <option value="Seconde" {{ old('niveau', $classe->niveau) == 'Seconde' ? 'selected' : '' }}>Seconde</option>
                <option value="BTS" {{ old('niveau', $classe->niveau) == 'BTS' ? 'selected' : '' }}>BTS</option>
                <option value="Licence" {{ old('niveau', $classe->niveau) == 'Licence' ? 'selected' : '' }}>Licence</option>
                <option value="Master" {{ old('niveau', $classe->niveau) == 'Master' ? 'selected' : '' }}>Master</option>
                <option value="Autre" {{ old('niveau', $classe->niveau) == 'Autre' ? 'selected' : '' }}>Autre</option>
            </select>
            @error('niveau')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label><i class="fas fa-users"></i> Effectif actuel</label>
            <div class="effectif-display">
                <span class="badge-effectif">{{ $classe->effectif }} étudiant(s)</span>
                <small class="effectif-note">(Cet effectif est automatiquement mis à jour)</small>
            </div>
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Mettre à jour
            </button>
            <a href="{{ route('classe.liste') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Annuler
            </a>
            <button type="button" onclick="supprimerClasse('{{ $classe->nom }}', '{{ $classe->id }}')" 
                    class="btn btn-danger" style="margin-left: auto;">
                <i class="fas fa-trash"></i> Supprimer
            </button>
        </div>
    </form>
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
                window.location.href = '{{ route("classe.liste") }}';
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
.error-message {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 5px;
    display: block;
}

.btn-danger {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
}

.btn-danger:hover {
    background-color: #c82333;
}

.effectif-display {
    background-color: #f8f9fa;
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #dee2e6;
}

.badge-effectif {
    background-color: #007bff;
    color: white;
    padding: 5px 10px;
    border-radius: 20px;
    font-weight: bold;
}

.effectif-note {
    display: block;
    color: #6c757d;
    font-size: 0.8rem;
    margin-top: 5px;
}
</style>
@endsection