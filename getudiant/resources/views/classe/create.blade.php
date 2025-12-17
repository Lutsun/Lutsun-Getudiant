@extends('welcome')

@section('title', 'Ajouter une Classe')

@section('content')
<div class="form-container classe-form-container">
    <h2 class="form-title">
        <i class="fas fa-chalkboard-teacher"></i> Ajouter une nouvelle classe
    </h2>
    
    <form action="{{ route('classe.store') }}" method="POST" class="classe-form">
        @csrf
        
        <div class="form-group">
            <label for="nom"><i class="fas fa-chalkboard"></i> Nom de la classe *</label>
            <input type="text" id="nom" name="nom" class="form-control" required 
                   placeholder="Ex: Terminale S1, Première L, etc.">
            @error('nom')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="niveau"><i class="fas fa-layer-group"></i> Niveau *</label>
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
            @error('niveau')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Enregistrer la classe
            </button>
            <a href="{{ route('classe.liste') }}" class="btn btn-secondary">
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