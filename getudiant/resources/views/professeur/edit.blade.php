@extends('welcome')

@section('title', 'Modifier un Professeur')

@section('content')
<div class="form-container professeur-form-container">
    <h2 class="form-title">
        <i class="fas fa-edit"></i> Modifier le professeur
    </h2>
    
    <form action="{{ route('professeur.update', $professeur->id) }}" method="POST" class="professeur-form">
        @csrf
        @method('PUT')
        
        <div class="form-row">
            <div class="form-group">
                <label for="prenom"><i class="fas fa-user"></i> Prénom *</label>
                <input type="text" id="prenom" name="prenom" class="form-control" required 
                       value="{{ old('prenom', $professeur->prenom) }}"
                       placeholder="Ex: Jean, Marie, etc.">
                @error('prenom')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="nom"><i class="fas fa-user"></i> Nom *</label>
                <input type="text" id="nom" name="nom" class="form-control" required 
                       value="{{ old('nom', $professeur->nom) }}"
                       placeholder="Ex: Dupont, Martin, etc.">
                @error('nom')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email *</label>
                <input type="email" id="email" name="email" class="form-control" required 
                       value="{{ old('email', $professeur->email) }}"
                       placeholder="Ex: ousmane.diop@supinfo.sn">
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="telephone"><i class="fas fa-phone"></i> Téléphone</label>
                <input type="tel" id="telephone" name="telephone" class="form-control" 
                       value="{{ old('telephone', $professeur->telephone) }}"
                       placeholder="Ex: 0612345678">
                @error('telephone')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="form-group">
            <label for="specialite"><i class="fas fa-graduation-cap"></i> Spécialité *</label>
            <select id="specialite" name="specialite" class="form-control" required>
                <option value="">Sélectionnez une spécialité</option>
                <option value="Mathématiques" {{ old('specialite', $professeur->specialite) == 'Mathématiques' ? 'selected' : '' }}>Mathématiques</option>
                <option value="Physique-Chimie" {{ old('specialite', $professeur->specialite) == 'Physique-Chimie' ? 'selected' : '' }}>Physique-Chimie</option>
                <option value="Sciences de la Vie" {{ old('specialite', $professeur->specialite) == 'Sciences de la Vie' ? 'selected' : '' }}>Sciences de la Vie</option>
                <option value="Histoire-Géographie" {{ old('specialite', $professeur->specialite) == 'Histoire-Géographie' ? 'selected' : '' }}>Histoire-Géographie</option>
                <option value="Français" {{ old('specialite', $professeur->specialite) == 'Français' ? 'selected' : '' }}>Français</option>
                <option value="Anglais" {{ old('specialite', $professeur->specialite) == 'Anglais' ? 'selected' : '' }}>Anglais</option>
                <option value="Espagnol" {{ old('specialite', $professeur->specialite) == 'Espagnol' ? 'selected' : '' }}>Espagnol</option>
                <option value="Philosophie" {{ old('specialite', $professeur->specialite) == 'Philosophie' ? 'selected' : '' }}>Philosophie</option>
                <option value="Éducation Physique" {{ old('specialite', $professeur->specialite) == 'Éducation Physique' ? 'selected' : '' }}>Éducation Physique</option>
                <option value="Informatique" {{ old('specialite', $professeur->specialite) == 'Informatique' ? 'selected' : '' }}>Informatique</option>
                <option value="Autre" {{ old('specialite', $professeur->specialite) == 'Autre' ? 'selected' : '' }}>Autre</option>
            </select>
            @error('specialite')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="date_naissance"><i class="fas fa-birthday-cake"></i> Date de naissance</label>
                <input type="date" id="date_naissance" name="date_naissance" class="form-control"
                       value="{{ old('date_naissance', $professeur->date_naissance ? $professeur->date_naissance->format('Y-m-d') : '') }}">
                @error('date_naissance')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="date_embauche"><i class="fas fa-calendar-alt"></i> Date d'embauche *</label>
                <input type="date" id="date_embauche" name="date_embauche" class="form-control" required 
                       value="{{ old('date_embauche', $professeur->date_embauche->format('Y-m-d')) }}">
                @error('date_embauche')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="form-group">
            <label for="adresse"><i class="fas fa-home"></i> Adresse</label>
            <textarea id="adresse" name="adresse" class="form-control" rows="2"
                      placeholder="Ex: 123 Rue de l'École, 75000 Paris">{{ old('adresse', $professeur->adresse) }}</textarea>
            @error('adresse')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="statut"><i class="fas fa-user-check"></i> Statut *</label>
            <select id="statut" name="statut" class="form-control" required>
                <option value="">Sélectionnez un statut</option>
                <option value="actif" {{ old('statut', $professeur->statut) == 'actif' ? 'selected' : '' }}>Actif</option>
                <option value="inactif" {{ old('statut', $professeur->statut) == 'inactif' ? 'selected' : '' }}>Inactif</option>
                <option value="congé" {{ old('statut', $professeur->statut) == 'congé' ? 'selected' : '' }}>Congé</option>
            </select>
            @error('statut')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="info-box">
            <h4><i class="fas fa-info-circle"></i> Informations</h4>
            <p>• Date de création : {{ $professeur->created_at->format('d/m/Y H:i') }}</p>
            <p>• Dernière modification : {{ $professeur->updated_at->format('d/m/Y H:i') }}</p>
            @if($professeur->classes()->count() > 0)
                <p>• Classes assignées : {{ $professeur->classes()->count() }} classe(s)</p>
            @endif
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Mettre à jour
            </button>
            <a href="{{ route('professeur.liste') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Annuler
            </a>
            <button type="button" onclick="supprimerProfesseur('{{ $professeur->nom_complet }}', '{{ $professeur->id }}')" 
                    class="btn btn-danger" style="margin-left: auto;">
                <i class="fas fa-trash"></i> Supprimer
            </button>
        </div>
    </form>
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
                window.location.href = '{{ route("professeur.liste") }}';
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

.form-row {
    display: flex;
    gap: 15px;
    margin-bottom: 15px;
}

.form-row .form-group {
    flex: 1;
}

.professeur-form-container {
    max-width: 800px;
    margin: 0 auto;
}

textarea.form-control {
    resize: vertical;
    min-height: 80px;
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

.info-box {
    background-color: #f8f9fa;
    padding: 15px;
    border-radius: 4px;
    border: 1px solid #dee2e6;
    margin-bottom: 20px;
}

.info-box h4 {
    margin-top: 0;
    color: #495057;
    border-bottom: 1px solid #dee2e6;
    padding-bottom: 5px;
}

.info-box p {
    margin: 5px 0;
    color: #6c757d;
    font-size: 0.9rem;
}
</style>
@endsection
