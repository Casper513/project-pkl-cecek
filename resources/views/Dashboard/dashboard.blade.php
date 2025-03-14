@extends('Layouts.presensi')
@section('content')
    <!-- User Profile Section -->
    <div class="section" id="user-section">
        <div id="user-detail" class="dropdown position-relative">
            <div class="d-flex align-items-center" onclick="toggleDropdown()">
                <div class="avatar me-3">
                    <img src="assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="imaged w64 rounded-circle shadow-sm">
                </div>
                <div id="user-info">
                    <h2 id="user-name" class="fs-6 fw-bold mb-0">{{ Auth::user()->name }}</h2>
                    <span id="user-role" class="text-bg-info fs-7">{{ Auth::user()->email }}</span>
                </div>
                <div class="ms-auto">
                    <ion-icon name="chevron-down-outline" class="text-muted"></ion-icon>
                </div>
            </div>
            <div id="user-dropdown" class="dropdown-menu shadow-lg rounded-3 fade" style="display: none;">
                <a href="{{ route('profile.edit') }}" class="dropdown-item py-2">
                    <ion-icon name="person-outline" class="me-2 text-primary"></ion-icon> Profil
                </a>
                <a href="#" class="dropdown-item py-2">
                    <ion-icon name="settings-outline" class="me-2 text-primary"></ion-icon> Pengaturan
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#" onclick="event.preventDefault(); this.closest('form').submit();"
                        class="dropdown-item py-2 text-danger">
                        <ion-icon name="log-out-outline" class="me-2"></ion-icon> Logout
                    </a>
                </form>
            </div>
        </div>
    </div>

    <!-- Menu Cards Section -->
    <div class="section mt-3" id="menu-section">
        <div class="card rounded-4 border-0 shadow-sm">
            <div class="card-body p-3">
                <div class="row g-3">
                    <div class="col-3">
                        <a href="#" class="text-decoration-none">
                            <div class="menu-icon-wrapper text-center">
                                <div class="menu-icon rounded-circle bg-light-success mb-2 mx-auto">
                                    <ion-icon name="person-outline" class="text-success"></ion-icon>
                                </div>
                                <span class="menu-name small">Profil</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="#" class="text-decoration-none">
                            <div class="menu-icon-wrapper text-center">
                                <div class="menu-icon rounded-circle bg-light-danger mb-2 mx-auto">
                                    <ion-icon name="calendar-number-outline" class="text-danger"></ion-icon>
                                </div>
                                <span class="menu-name small">Cuti</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="#" class="text-decoration-none">
                            <div class="menu-icon-wrapper text-center">
                                <div class="menu-icon rounded-circle bg-light-warning mb-2 mx-auto">
                                    <ion-icon name="document-text-outline" class="text-warning"></ion-icon>
                                </div>
                                <span class="menu-name small">Histori</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="#" class="text-decoration-none">
                            <div class="menu-icon-wrapper text-center">
                                <div class="menu-icon rounded-circle bg-light-primary mb-2 mx-auto">
                                    <ion-icon name="location-outline" class="text-primary"></ion-icon>
                                </div>
                                <span class="menu-name small">Lokasi</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Today Presence Section -->
    <div class="section mt-4" id="presence-section">
        <h2 class="section-title mb-3 fs-6 fw-bold">Absensi Hari Ini</h2>
        <div class="todaypresence">
            <div class="row g-3">
                <div class="col-6">
                    <div class="card bg-gradient-success border-0 shadow-sm rounded-4">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="presence-icon rounded-circle bg-white bg-opacity-25 p-2 me-3">
                                    <ion-icon name="camera" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
                                </div>
                                <div class="presence-detail text-white">
                                    <h4 class="fs-6 mb-0 fw-bold">Masuk</h4>
                                    <span class="fs-5 fw-light">{{ $settings->jam_masuk ?? '08:00' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card bg-gradient-danger border-0 shadow-sm rounded-4">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="presence-icon rounded-circle bg-white bg-opacity-25 p-2 me-3">
                                    <ion-icon name="camera" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
                                </div>
                                <div class="presence-detail text-white">
                                    <h4 class="fs-6 mb-0 fw-bold">Pulang</h4>
                                    <span class="fs-5 fw-light">{{ $settings->jam_pulang ?? '17:00' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Attendance Summary Section -->
        <h2 class="section-title mt-4 mb-3 fs-6 fw-bold text-secondary">Rekap Absensi</h2>
        <div class="rekappresence">
            <div class="row g-3">
                <div class="col-6">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="presence-icon rounded-circle bg-light-primary p-2 me-3">
                                    <ion-icon name="log-in-outline" class="text-primary" style="font-size: 1.2rem;"></ion-icon>
                                </div>
                                <div class="presence-detail">
                                    <h4 class="fs-7 mb-0 text-muted">Hadir</h4>
                                    <span class="fs-6 fw-bold">{{ $summary->hadir ?? 0 }} Hari</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="presence-icon rounded-circle bg-light-success p-2 me-3">
                                    <ion-icon name="document-text-outline" class="text-success" style="font-size: 1.2rem;"></ion-icon>
                                </div>
                                <div class="presence-detail">
                                    <h4 class="fs-7 mb-0 text-muted">Izin</h4>
                                    <span class="fs-6 fw-bold">{{ $summary->izin ?? 0 }} Hari</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 mt-1">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="presence-icon rounded-circle bg-light-warning p-2 me-3">
                                    <ion-icon name="sad-outline" class="text-warning" style="font-size: 1.2rem;"></ion-icon>
                                </div>
                                <div class="presence-detail">
                                    <h4 class="fs-7 mb-0 text-muted">Sakit</h4>
                                    <span class="fs-6 fw-bold">{{ $summary->sakit ?? 0 }} Hari</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 mt-1">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="presence-icon rounded-circle bg-light-danger p-2 me-3">
                                    <ion-icon name="alarm-outline" class="text-danger" style="font-size: 1.2rem;"></ion-icon>
                                </div>
                                <div class="presence-detail">
                                    <h4 class="fs-7 mb-0 text-muted">Terlambat</h4>
                                    <span class="fs-6 fw-bold">{{ $summary->terlambat ?? 0 }} Hari</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs Section -->
        <div class="presencetab mt-4">
            <ul class="nav nav-tabs nav-fill bg-light rounded-pill mb-3" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active rounded-pill w-100" id="bulanIni-tab" data-bs-toggle="tab" data-bs-target="#bulanIni" type="button" role="tab" aria-controls="bulanIni" aria-selected="true">
                        Bulan Ini
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-pill w-100" id="leaderboard-tab" data-bs-toggle="tab" data-bs-target="#leaderboard" type="button" role="tab" aria-controls="leaderboard" aria-selected="false">
                        Leaderboard
                    </button>
                </li>
            </ul>
            
            <div class="tab-content mt-3" style="margin-bottom:100px;">
                <!-- Tab Bulan Ini -->
                <div class="tab-pane fade show active" id="bulanIni" role="tabpanel" aria-labelledby="bulanIni-tab">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush">
                                @forelse ($absensis as $absen)
                                    <li class="list-group-item border-0 py-3">
                                        <div class="d-flex align-items-center">
                                            <div class="presence-icon rounded-circle bg-light-primary p-2 me-3">
                                                <ion-icon name="calendar-outline" class="text-primary"></ion-icon>
                                            </div>
                                            <div class="presence-detail">
                                                <div class="d-flex align-items-center mb-1">
                                                    <h4 class="fs-6 mb-0 fw-medium">{{ \Carbon\Carbon::parse($absen->tgl_absen)->format('d M Y') }}</h4>
                                                    <span class="badge bg-{{ $absen->status == 'hadir' ? 'success' : ($absen->status == 'izin' ? 'primary' : ($absen->status == 'sakit' ? 'warning' : 'danger')) }} ms-2 rounded-pill">
                                                        {{ ucfirst($absen->status) }}
                                                    </span>
                                                </div>
                                                <p class="text-muted mb-0 small">
                                                    <ion-icon name="time-outline" class="align-middle me-1"></ion-icon>
                                                    {{ \Carbon\Carbon::parse($absen->jam_absen)->format('H:i') }}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <li class="list-group-item border-0 py-4 text-center">
                                        <div class="text-muted">
                                            <ion-icon name="calendar-outline" style="font-size: 3rem;" class="text-light mb-2"></ion-icon>
                                            <p>Belum ada data absensi bulan ini</p>
                                        </div>
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Tab Leaderboard -->
                <div class="tab-pane fade" id="leaderboard" role="tabpanel" aria-labelledby="leaderboard-tab">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush">
                                @forelse ($leaderboard as $index => $user)
                                    <li class="list-group-item border-0 py-3">
                                        <div class="d-flex align-items-center position-relative">
                                            <div class=" me-3">
                                                <div class="presence-icon rounded-circle bg-light-warning p-2">
                                                    <ion-icon name="trophy-outline" class="text-warning"></ion-icon>
                                                </div>
                                                <div class="position-absolute top-0 right-0 translate-middle badge rounded-pill bg-primary">
                                                    {{ $index + 1 }}
                                                </div>
                                            </div>
                                            <div class="presence-detail">
                                                <h4 class="fs-6 mb-1 fw-medium">{{ $user->name }}</h4>
                                                <div>
                                                    <span class="badge bg-success rounded-pill">
                                                        <ion-icon name="checkmark-circle-outline" class="align-middle me-1"></ion-icon>
                                                        {{ $user->total_hadir }} Hadir
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <li class="list-group-item border-0 py-4 text-center">
                                        <div class="text-muted">
                                            <ion-icon name="trophy-outline" style="font-size: 3rem;" class="text-light mb-2"></ion-icon>
                                            <p>Belum ada data leaderboard</p>
                                        </div>
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom CSS -->
    <style>
        .bg-gradient-success {
            background: linear-gradient(135deg, #28a745, #20c997);
        }
        
        .bg-gradient-danger {
            background: linear-gradient(135deg, #dc3545, #fd7e14);
        }
        
        .bg-light-primary {
            background-color: rgba(13, 110, 253, 0.1);
        }
        
        .bg-light-success {
            background-color: rgba(25, 135, 84, 0.1);
        }
        
        .bg-light-warning {
            background-color: rgba(255, 193, 7, 0.1);
        }
        
        .bg-light-danger {
            background-color: rgba(220, 53, 69, 0.1);
        }
        
        .menu-icon {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .menu-icon ion-icon {
            font-size: 1.5rem;
        }
        
        .presence-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 40px;
            min-height: 40px;
        }
        
        .fs-7 {
            font-size: 0.85rem;
        }
        
        .rounded-4 {
            border-radius: 0.75rem;
        }
        
        .dropdown-menu.fade {
            transition: all 0.2s ease;
            opacity: 0;
            transform: translateY(10px);
        }
        
        .dropdown-menu.fade.show {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Hover effect for nav tabs */
        .nav-tabs .nav-link {
            transition: all 0.3s ease;
        }
        
        .nav-tabs .nav-link:hover {
            background-color: rgba(13, 110, 253, 0.1);
        }
    </style>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Bootstrap tabs
            var tabElms = document.querySelectorAll('button[data-bs-toggle="tab"]');
            tabElms.forEach(function(tabElm) {
                tabElm.addEventListener('click', function(event) {
                    event.preventDefault();
                    
                    // Remove active class from all tabs and panes
                    document.querySelectorAll('.nav-link').forEach(function(el) {
                        el.classList.remove('active');
                        el.setAttribute('aria-selected', 'false');
                    });
                    
                    document.querySelectorAll('.tab-pane').forEach(function(el) {
                        el.classList.remove('show', 'active');
                    });
                    
                    // Add active class to clicked tab
                    this.classList.add('active');
                    this.setAttribute('aria-selected', 'true');
                    
                    // Get target pane and activate it
                    var target = document.querySelector(this.getAttribute('data-bs-target'));
                    if (target) {
                        target.classList.add('show', 'active');
                    }
                });
            });
        });
        
        function toggleDropdown() {
            var dropdown = document.getElementById('user-dropdown');
            if (dropdown.style.display === 'none') {
                dropdown.style.display = 'block';
                dropdown.classList.add('show');
            } else {
                dropdown.style.display = 'none';
                dropdown.classList.remove('show');
            }
        }

        // Close dropdown if user clicks outside
        window.addEventListener('click', function(e) {
            var userDetail = document.getElementById('user-detail');
            if (userDetail && !userDetail.contains(e.target)) {
                var dropdown = document.getElementById('user-dropdown');
                if (dropdown) {
                    dropdown.style.display = 'none';
                    dropdown.classList.remove('show');
                }
            }
        });
    </script>
@endsection()