@extends('welcome')

@section('title', 'Modifier une Inscription')

@section('content')
<div class="form-container">
    <h2 style="color: var(--primary-dark); margin-bottom: 30px; text-align: center;">
        <i class="fas fa-file-signature"></i> Modifier l'inscription
    </h2>
    
    <form action="{{ route('inscription.update', $inscription->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="etudiant_id"><i class="fas fa-user-graduate"></i> Étudiant *</label>
            <select id="etudiant_id" name="etudiant_id" class="form-control" required>
                <option value="">Sélectionnez un étudiant</option>
                @foreach($etudiants as $etudiant)
                <option value="{{ $etudiant->id }}" 
                    {{ old('etudiant_id', $inscription->etudiant_id) == $etudiant->id ? 'selected' : '' }}>
                    {{ $etudiant->prenom }} {{ $etudiant->nom }} 
                    @if($etudiant->matricule) - {{ $etudiant->matricule }} @endif
                </option>
                @endforeach
            </select>
            @error('etudiant_id')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="classe_id"><i class="fas fa-chalkboard"></i> Classe *</label>
            <select id="classe_id" name="classe_id" class="form-control" required>
                <option value="">Sélectionnez une classe</option>
                @foreach($classes as $classe)
                <option value="{{ $classe->id }}" 
                    {{ old('classe_id', $inscription->classe_id) == $classe->id ? 'selected' : '' }}>
                    {{ $classe->nom }} - {{ $classe->niveau }}
                </option>
                @endforeach
            </select>
            @error('classe_id')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="date"><i class="fas fa-calendar-alt"></i> Date d'inscription *</label>
            <input type="date" id="date" name="date" class="form-control" required 
                   value="{{ old('date', $inscription->date->format('Y-m-d')) }}">
            @error('date')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="frais"><i class="fas fa-money-bill-wave"></i> Frais d'inscription *</label>
            <div class="input-group">
                <input type="number" id="frais" name="frais" class="form-control" required 
                       step="0.01" min="0" placeholder="0.00"
                       value="{{ old('frais', $inscription->frais) }}">
                <div class="input-group-append">
                    <span class="input-group-text">FCFA</span>
                </div>
            </div>
            @error('frais')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn" style="flex: 1;">
                <i class="fas fa-save"></i> Mettre à jour
            </button>
            <a href="{{ route('inscription.liste') }}" class="btn btn-secondary" style="flex: 1; text-align: center;">
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

.input-group {
    display: flex;
}

.input-group .form-control {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}

.input-group-append {
    display: flex;
}

.input-group-text {
    background-color: #f8f9fa;
    border: 1px solid #ced4da;
    border-left: 0;
    padding: 0.375rem 0.75rem;
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
    color: #495057;
}
</style>
@endsection