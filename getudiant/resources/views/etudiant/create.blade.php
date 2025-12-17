@extends('welcome')

@section('title', 'Ajouter un Étudiant')

@section('content')
<div class="form-container">
    <h2 style="color: var(--primary-dark); margin-bottom: 30px; text-align: center;">
        <i class="fas fa-user-plus"></i> Ajouter un nouvel étudiant
    </h2>
    
    <form action="/save" method="POST">
        @csrf
        @method ('POST')
        <div class="form-group">
            <label for="prenom"><i class="fas fa-user"></i> Prénom *</label>
            <input type="text" id="prenom" name="prenom" class="form-control" required 
                   placeholder="Entrez le prénom de l'étudiant">
        </div>
        
        <div class="form-group">
            <label for="nom"><i class="fas fa-user-tag"></i> Nom *</label>
            <input type="text" id="nom" name="nom" class="form-control" required
                   placeholder="Entrez le nom de famille">
        </div>
        
        <div class="form-group">
            <label for="adresse"><i class="fas fa-map-marker-alt"></i> Adresse</label>
            <input type="text" id="adresse" name="adresse" class="form-control" 
                   placeholder="123 Rue Exemple, Ville, Pays">
        </div>
        
        <div class="form-group">
            <label for="date_naissance"><i class="fas fa-birthday-cake"></i> Date de naissance</label>
            <input type="date" id="date_naissance" name="date_naissance" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="telephone"><i class="fas fa-phone"></i> Téléphone</label>
            <input type="tel" id="telephone" name="telephone" class="form-control" 
                   placeholder="+221 XX XXX XX XX">
        </div>
        
        <div class="form-group">
            <label for="matricule"><i class="fas fa-id-card"></i> Matricule</label>
            <input type="text" id="matricule" name="matricule" class="form-control" 
                   placeholder="Laisser vide pour générer automatiquement">
        </div>
        
        <div class="form-group">
            <label for="classe_id"><i class="fas fa-chalkboard"></i> Classe</label>
            <select id="classe_id" name="classe_id" class="form-control">
                <option value="">Sélectionnez une classe</option>
                @foreach($classes as $classe)
                <option value="{{ $classe->id }}">
                    {{ $classe->nom }} - {{ $classe->niveau }}
                </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn" style="flex: 1;">
                <i class="fas fa-save"></i> Enregistrer l'étudiant
            </button>
            <a href="/etudiant/liste" class="btn btn-secondary" style="flex: 1; text-align: center;">
                <i class="fas fa-times"></i> Annuler
            </a>
        </div>
    </form>
</div>
@endsection
