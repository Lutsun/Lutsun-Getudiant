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
            <div class="stat-value">154</div>
            <div class="stat-label">Étudiants inscrits</div>
            <div class="stat-change positive">
                <i class="fas fa-arrow-up"></i>
                +12% ce mois
            </div>
        </div>
        
        <div class="stat-card success">
            <div class="stat-icon">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div class="stat-value">24</div>
            <div class="stat-label">Classes actives</div>
            <div class="stat-change positive">
                <i class="fas fa-arrow-up"></i>
                +2 nouvelles
            </div>
        </div>
        
        <div class="stat-card warning">
            <div class="stat-icon">
                <i class="fas fa-file-signature"></i>
            </div>
            <div class="stat-value">327</div>
            <div class="stat-label">Inscriptions totales</div>
            <div class="stat-change positive">
                <i class="fas fa-arrow-up"></i>
                +5.3% cette année
            </div>
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
            <a href="/classes/create" class="btn btn-success">
                <i class="fas fa-plus-circle"></i>
                Créer une classe
            </a>
            <a href="/inscriptions/create" class="btn btn-secondary">
                <i class="fas fa-file-medical"></i>
                Nouvelle inscription
            </a>
            <a href="/etudiant/liste" class="btn btn-info">
                <i class="fas fa-list"></i>
                Voir tous les étudiants
            </a>
        </div>
    </div>
    
       
    
<style>
.simple-chart {
    height: 200px;
    display: flex;
    align-items: flex-end;
    gap: 15px;
    padding: 20px 0;
}

.chart-bars {
    display: flex;
    align-items: flex-end;
    gap: 20px;
    width: 100%;
    height: 100%;
}

.chart-bar {
    flex: 1;
    background: linear-gradient(to top, var(--primary), var(--primary-light));
    border-radius: 4px 4px 0 0;
    min-height: 20px;
    position: relative;
    transition: var(--transition);
}

.chart-bar:hover {
    opacity: 0.8;
    transform: scale(1.05);
}

.chart-bar::after {
    content: attr(data-month);
    position: absolute;
    bottom: -25px;
    left: 50%;
    transform: translateX(-50%);
    font-size: 0.8rem;
    color: var(--gray-dark);
}

.chart-bar:nth-child(2n) {
    background: linear-gradient(to top, var(--success), #66BB6A);
}
</style>
@endsection