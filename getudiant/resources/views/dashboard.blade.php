@extends('welcome')

@section('title', 'Tableau de bord')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@section('content')
<div class="dashboard">
    <!-- Statistiques -->
    <div class="dashboard-stats">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-value">{{ $totalEtudiants }}</div>
            <div class="stat-label">Étudiants inscrits</div>
        </div>
        
        <div class="stat-card success">
            <div class="stat-icon">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div class="stat-value">{{ $totalClasses }}</div>
            <div class="stat-label">Classes actives</div>
        </div>
        
        <div class="stat-card warning">
            <div class="stat-icon">
                <i class="fas fa-file-signature"></i>
            </div>
            <div class="stat-value">{{ $totalInscriptions }}</div>
            <div class="stat-label">Inscriptions totales</div>
        </div>

        <div class="stat-card info">
            <div class="stat-icon">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div class="stat-value">{{ $totalProfesseurs }}</div>
            <div class="stat-label">Professeurs</div>
        </div>

    </div>
    
    <!-- Actions rapides -->
    <div class="chart-container">
        <div class="chart-header">
            <h3>Actions rapides</h3>
        </div>
        <div class="quick-actions">
            <a href="/etudiant/create" class="btn">
                <i class="fas fa-user-plus"></i>
                Ajouter un étudiant
            </a>
            <a href="/classe/create" class="btn btn-success">
                <i class="fas fa-plus-circle"></i>
                Créer une classe
            </a>
            <a href="{{ route('inscription.create') }}" class="btn btn-secondary">
                <i class="fas fa-file-medical"></i>
                Nouvelle inscription
            </a>
            <a href="/professeur/create" class="btn btn-info">
                <i class="fas fa-user-tie"></i>
                Ajouter un professeur
            </a>
            <a href="/etudiant/liste" class="btn btn-info">
                <i class="fas fa-list"></i>
                Voir tous les étudiants
            </a>
        </div>
    </div>
</div>
@endsection