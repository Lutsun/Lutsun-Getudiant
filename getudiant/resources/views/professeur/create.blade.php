@extends('welcome')

@section('title', 'Ajouter un Professeur')

@section('content')
<div class="form-container professeur-form-container">
    <h2 class="form-title">
        <i class="fas fa-user-tie"></i> Ajouter un nouveau professeur
    </h2>
    
    <form action="{{ route('professeur.store') }}" method="POST" class="professeur-form">
        @csrf
        
        <div class="form-row">
            <div class="form-group">
                <label for="prenom"><i class="fas fa-user"></i> Prénom *</label>
                <input type="text" id="prenom" name="prenom" class="form-control" required 
                       placeholder="Ex: Jean, Astou, etc.">
                @error('prenom')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="nom"><i class="fas fa-user"></i> Nom *</label>
                <input type="text" id="nom" name="nom" class="form-control" required 
                       placeholder="Ex: Ndiaye, Ahmed, etc.">
                @error('nom')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email *</label>
                <input type="email" id="email" name="email" class="form-control" required 
                       placeholder="Ex: Mouhamed.diop@ecole.sn">
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="telephone"><i class="fas fa-phone"></i> Téléphone</label>
                <input type="tel" id="telephone" name="telephone" class="form-control" 
                       placeholder="Ex: 773213456">
                @error('telephone')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="form-group">
            <label for="specialite"><i class="fas fa-graduation-cap"></i> Spécialité *</label>
            <select id="specialite" name="specialite" class="form-control" required>
                <option value="">Sélectionnez une spécialité</option>
                <option value="Algorithme">Algorithme</option>
                <option value="Javascript">Javascript</option>
                <option value="Français">TEF</option>
                <option value="Anglais">Anglais</option>
                <option value="Reseaux">Reseaux</option>
                <option value="Python">Python</option>
                <option value="Php">Php</option>
                <option value="Analyse">Analyse</option>
                <option value="Autre">Autre</option>
            </select>
            @error('specialite')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="date_naissance"><i class="fas fa-birthday-cake"></i> Date de naissance</label>
                <input type="date" id="date_naissance" name="date_naissance" class="form-control">
                @error('date_naissance')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="date_embauche"><i class="fas fa-calendar-alt"></i> Date d'embauche *</label>
                <input type="date" id="date_embauche" name="date_embauche" class="form-control" required 
                       value="{{ date('Y-m-d') }}">
                @error('date_embauche')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="form-group">
            <label for="adresse"><i class="fas fa-home"></i> Adresse</label>
            <textarea id="adresse" name="adresse" class="form-control" rows="2" 
                      placeholder="Ex: 123 Dieupeul, Dakar"></textarea>
            @error('adresse')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="statut"><i class="fas fa-user-check"></i> Statut *</label>
            <select id="statut" name="statut" class="form-control" required>
                <option value="">Sélectionnez un statut</option>
                <option value="actif" selected>Actif</option>
                <option value="inactif">Inactif</option>
                <option value="congé">Congé</option>
            </select>
            @error('statut')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Enregistrer le professeur
            </button>
            <a href="{{ route('professeur.liste') }}" class="btn btn-secondary">
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
</style>
@endsection
