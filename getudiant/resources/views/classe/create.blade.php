@extends('welcome')

@section('title', 'Ajouter une Classe')

@section('content')
<div class="form-container classe-form-container">
    <h2 class="form-title">
        <i class="fas fa-chalkboard-teacher"></i> Ajouter une nouvelle classe
    </h2>
    
    <form action="/classe/store" method="POST" class="classe-form">
        @csrf
        @method('POST')
        
        <div class="form-group">
            <label for="nom"><i class="fas fa-chalkboard"></i> Nom de la classe</label>
            <input type="text" id="nom" name="nom" class="form-control" required 
                   placeholder="Ex: Terminale S1, Première L, etc.">
        </div>
        
        <div class="form-group">
            <label for="code"><i class="fas fa-code"></i> Code de la classe</label>
            <input type="text" id="code" name="code" class="form-control" required 
                   placeholder="Ex: TS1, 1L, BTS-SIO, etc.">
        </div>
        
        <div class="form-group">
            <label for="niveau"><i class="fas fa-layer-group"></i> Niveau</label>
            <select id="niveau" name="niveau" class="form-control" required>
                <option value="">Sélectionnez un niveau</option>
                <option value="Terminale">Terminale</option>
                <option value="Première">Première</option>
                <option value="Seconde">Seconde</option>
                <option value="BTS">BTS</option>
                <option value="Licence">Licence</option>
                <option value="Master">Master</option>
                <option value="Autre">Autre</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="salle"><i class="fas fa-door-open"></i> Salle</label>
            <input type="text" id="salle" name="salle" class="form-control" 
                   placeholder="Ex: Salle 101, Bâtiment A, etc.">
        </div>
        
        <div class="form-group">
            <label for="enseignant"><i class="fas fa-user-tie"></i> Enseignant principal</label>
            <input type="text" id="enseignant" name="enseignant" class="form-control" 
                   placeholder="Nom de l'enseignant principal">
        </div>
        
        <div class="form-group">
            <label for="description"><i class="fas fa-align-left"></i> Description</label>
            <textarea id="description" name="description" class="form-control" rows="3" 
                      placeholder="Description de la classe (optionnel)"></textarea>
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Enregistrer la classe
            </button>
            <a href="/classes" class="btn btn-secondary">
                <i class="fas fa-times"></i> Annuler
            </a>
        </div>
    </form>
</div>
@endsection