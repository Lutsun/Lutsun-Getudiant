@extends('welcome')

@section('title', 'Ajouter un Étudiant')

@section('content')
<div class="form-container">
    <h2 style="color: var(--primary-dark); margin-bottom: 30px; text-align: center;">
        <i class="fas fa-user-plus"></i> Ajouter un nouvel étudiant
    </h2>
    
    <form action="/ajouter" method="POST">
        @csrf
        @method('POST')
        
        <div class="form-group">
            <label for="prenom"><i class="fas fa-user"></i> Prénom</label>
            <input type="text" id="prenom" name="prenom" class="form-control" required 
                   placeholder="Entrez le prénom de l'étudiant">
        </div>
        
        <div class="form-group">
            <label for="nom"><i class="fas fa-user-tag"></i> Nom</label>
            <input type="text" id="nom" name="nom" class="form-control" 
                   placeholder="Entrez le nom de famille">
        </div>
        
        <div class="form-group">
            <label for="adresse"> 
                <i class="fas fa-map-marker-alt"></i> Adresse</label>
            <input type="text" id="adresse" name="adresse" class="form-control" 
                   placeholder="123 Rue Exemple, Ville, Pays">
        </div>
        
        <div class="form-group">
            <label for="telephone"><i class="fas fa-phone"></i> Téléphone</label>
            <input type="tel" id="telephone" name="telephone" class="form-control" 
                   placeholder="+221 XX XXX XX XX">
        </div>
        
        <div class="form-group">
            <label for="classe"><i class="fas fa-chalkboard"></i> Classe</label>
            <select id="classe" name="classe" class="form-control">
                <option value="">Sélectionnez une classe</option>
                <option value="1">Classe A - Mathématiques</option>
                <option value="2">Classe B - Physique</option>
                <option value="3">Classe C - Chimie</option>
                <option value="4">Classe D - Informatique</option>
            </select>
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn" style="flex: 1;">
                <i class="fas fa-save"></i> Enregistrer l'étudiant
            </button>
            <a href="/etudiants" class="btn btn-secondary" style="flex: 1; text-align: center;">
                <i class="fas fa-times"></i> Annuler
            </a>
        </div>
    </form>
</div>
@endsection