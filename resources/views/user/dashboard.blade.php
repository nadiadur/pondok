@extends('layouts.app')

@section('content')
<style>
    body {
        min-height: 100vh;
        margin: 0;
        background: linear-gradient(135deg, #f6f9fc 0%, #edf2f7 100%);
        font-family: 'Inter', sans-serif;
    }
    
    .sidebar {
        width: 280px;
        background: #fff;
        box-shadow: 0 0 20px rgba(0,0,0,0.05);
        padding: 25px;
        position: fixed;
        height: 100vh;
        transition: all 0.3s ease;
        border-right: 1px solid rgba(0,0,0,0.05);
    }
    
    .sidebar h5 {
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #edf2f7;
    }
    
    .nav-link {
        color: #4a5568;
        padding: 12px 16px;
        border-radius: 12px;
        transition: all 0.3s ease;
        margin: 8px 0;
        display: flex;
        align-items: center;
        font-weight: 500;
    }
    
    .nav-link i {
        margin-right: 12px;
        font-size: 1.1rem;
    }
    
    .nav-link:hover {
        background-color: #f7fafc;
        color: #4299e1;
        transform: translateX(5px);
    }
    
    .nav-link.active {
        background: linear-gradient(135deg, #4299e1, #2b6cb0);
        color: #fff;
        box-shadow: 0 4px 12px rgba(66, 153, 225, 0.2);
    }
    
    .main-content {
        margin-left: 280px;
        padding: 40px;
        transition: all 0.3s ease;
    }

    .page-header {
        margin-bottom: 30px;
        display: flex;
        align-items: center;
    }

    .page-header i {
        font-size: 1.8rem;
        color: #4299e1;
        margin-right: 15px;
    }

    .page-header h2 {
        color: #2d3748;
        font-weight: 600;
        margin: 0;
    }
    
    .dashboard-card {
        background: #fff;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.02), 0 1px 3px rgba(0,0,0,0.03);
        transition: all 0.3s ease;
        border: 1px solid rgba(0,0,0,0.05);
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    
    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.06);
    }
    
    .dashboard-card .icon {
        font-size: 2.8rem;
        margin-bottom: 20px;
        color: #4299e1;
        height: 70px;
        width: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #ebf8ff;
        border-radius: 50%;
        transition: all 0.3s ease;
    }
    
    .dashboard-card:hover .icon {
        background: #4299e1;
        color: #fff;
        transform: scale(1.1);
    }
    
    .dashboard-card .title {
        font-size: 1.25rem;
        color: #2d3748;
        font-weight: 600;
        margin: 0;
    }

    .status-card {
        position: relative;
        overflow: hidden;
    }

    .status-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, #4299e1, #2b6cb0);
    }

    .status-icon {
        font-size: 3rem;
        margin-bottom: 20px;
    }

    .status-icon i {
        filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1));
    }

    .status-text {
        margin-top: 15px;
    }

    .badge {
        padding: 8px 16px;
        font-size: 0.9rem;
        font-weight: 500;
        border-radius: 30px;
    }
    
    .btn-logout {
        background: linear-gradient(135deg, #f56565, #c53030);
        border: none;
        padding: 14px;
        color: white;
        border-radius: 12px;
        transition: all 0.3s ease;
        font-weight: 500;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .btn-logout:hover {
        background: linear-gradient(135deg, #e53e3e, #9b2c2c);
        box-shadow: 0 4px 12px rgba(229, 62, 62, 0.3);
        transform: translateY(-2px);
    }

    .footer-text {
        margin-top: 60px;
        padding-top: 20px;
        border-top: 1px solid #e2e8f0;
        color: #718096;
        font-size: 0.9rem;
    }

    .status-wrapper {
        width: 100%;
        text-align: center;
    }

    /* Custom status colors */
    .status-approved .status-icon i { color: #48bb78; }
    .status-pending .status-icon i { color: #ecc94b; }
    .status-rejected .status-icon i { color: #f56565; }
    .status-none .status-icon i { color: #a0aec0; }
</style>

<div class="d-flex">
    <div class="sidebar">
        <h5><i class="fas fa-school me-2"></i>Dashboard</h5>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('user.dashboard') }}">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.account') }}">
                    <i class="fas fa-user-cog"></i> Ganti Password
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.registrations.create') }}">
                    <i class="fas fa-user-edit"></i> Pendaftaran
                </a>
            </li>
            <li class="nav-item mt-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-logout">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <div class="page-header">
            <i class="fas fa-tachometer-alt"></i>
            <h2>Dashboard User</h2>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <a href="{{ route('user.account') }}" class="text-decoration-none">
                    <div class="dashboard-card">
                        <div class="icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <h3 class="title">Account</h3>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('user.registrations.create') }}" class="text-decoration-none">
                    <div class="dashboard-card">
                        <div class="icon">
                            <i class="fas fa-user-edit"></i>
                        </div>
                        <h3 class="title">Pendaftaran</h3>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card status-card {{ $registration ? 'status-'.$registration->status : 'status-none' }}">
                    <div class="status-wrapper">
                        <div class="status-icon">
                            @if($registration)
                                @if($registration->status == 'approved')
                                    <i class="fas fa-check-circle"></i>
                                @elseif($registration->status == 'pending')
                                    <i class="fas fa-hourglass-half"></i>
                                @else
                                    <i class="fas fa-times-circle"></i>
                                @endif
                            @else
                                <i class="fas fa-exclamation-circle"></i>
                            @endif
                        </div>
                        <h3 class="title">Status Pendaftaran</h3>
                        <div class="status-text">
                            @if($registration)
                                @if($registration->status == 'approved')
                                    <span class="badge bg-success">Disetujui</span>
                                @elseif($registration->status == 'pending')
                                   <span class="badge bg-warning text-dark text-wrap" style="white-space: normal;">Menunggu Persetujuan</span>

                                @else
                                    <span class="badge bg-danger">Ditolak</span>
                                @endif
                            @else
                                <span class="badge bg-secondary">Belum Mendaftar</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer-text text-center">
            <p>2025 @ Asrama Pergururan Islam</p>
        </footer>
    </div>
</div>
@endsection