@extends('welcome')

@section('title', 'Modifier un Étudiant')

@section('content')
<div class="form-container">
    <h2 style="color: var(--primary-dark); margin-bottom: 30px; text-align: center;">
        <i class="fas fa-user-edit"></i> Modifier l'étudiant
    </h2>
    
    <form action="{{ route('etudiant.update', $etudiant->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="prenom"><i class="fas fa-user"></i> Prénom *</label>
            <input type="text" id="prenom" name="prenom" class="form-control" required 
                   value="{{ old('prenom', $etudiant->prenom) }}"
                   placeholder="Entrez le prénom de l'étudiant">
            @error('prenom')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="nom"><i class="fas fa-user-tag"></i> Nom *</label>
            <input type="text" id="nom" name="nom" class="form-control" required
                   value="{{ old('nom', $etudiant->nom) }}"
                   placeholder="Entrez le nom de famille">
            @error('nom')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="adresse"><i class="fas fa-map-marker-alt"></i> Adresse</label>
            <input type="text" id="adresse" name="adresse" class="form-control" 
                   value="{{ old('adresse', $etudiant->adresse) }}"
                   placeholder="123 Rue Exemple, Ville, Pays">
        </div>
        
        <div class="form-group">
            <label for="date_naissance"><i class="fas fa-birthday-cake"></i> Date de naissance</label>
            <input type="date" id="date_naissance" name="date_naissance" class="form-control"
                   value="{{ old('date_naissance', $etudiant->date_naissance) }}">
        </div>
        
        <div class="form-group">
            <label for="telephone"><i class="fas fa-phone"></i> Téléphone</label>
            <input type="tel" id="telephone" name="telephone" class="form-control" 
                   value="{{ old('telephone', $etudiant->telephone) }}"
                   placeholder="+221 XX XXX XX XX">
        </div>
        
        <div class="form-group">
            <label for="matricule"><i class="fas fa-id-card"></i> Matricule</label>
            <input type="text" id="matricule" name="matricule" class="form-control" 
                   value="{{ old('matricule', $etudiant->matricule) }}"
                   placeholder="Laisser vide pour générer automatiquement">
            @error('matricule')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="classe_id"><i class="fas fa-chalkboard"></i> Classe</label>
            <select id="classe_id" name="classe_id" class="form-control">
                <option value="">Sélectionnez une classe</option>
                @foreach($classes as $classe)
                <option value="{{ $classe->id }}" 
                    {{ old('classe_id', $etudiant->classe_id) == $classe->id ? 'selected' : '' }}>
                    {{ $classe->nom }} - {{ $classe->niveau }}
                </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn" style="flex: 1;">
                <i class="fas fa-save"></i> Mettre à jour
            </button>
            <a href="{{ route('etudiant.liste') }}" class="btn btn-secondary" style="flex: 1; text-align: center;">
                <i class="fas fa-times"></i> Annuler
            </a>
        </div>
    </form>
</div>

<style>
.error-message {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 5px;
    display: block;
}
</style>
@endsection