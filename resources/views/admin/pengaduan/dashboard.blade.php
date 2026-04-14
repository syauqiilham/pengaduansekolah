<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Pengaduan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #e0f7fa 0%, #b2ebf2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Header */
        .header {
            background: white;
            border-radius: 15px;
            padding: 25px 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 123, 135, 0.15);
            border-top: 5px solid #008b8b;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .header h2 {
            color: #004d4d;
            font-size: 1.8rem;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .header h2 i {
            color: #008b8b;
        }

        .user-info {
            color: #5f7d82;
            font-size: 0.95rem;
        }

        .user-info b {
            color: #006666;
        }

        /* Logout Button */
        .btn-logout {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            background: linear-gradient(135deg, #ef5350 0%, #e53935 100%);
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(239, 83, 80, 0.3);
        }

        .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(239, 83, 80, 0.4);
            background: linear-gradient(135deg, #e53935 0%, #d32f2f 100%);
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0, 123, 135, 0.15);
            display: flex;
            align-items: center;
            gap: 20px;
            transition: all 0.3s ease;
            border-left: 5px solid;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 123, 135, 0.25);
        }

        .stat-card.total {
            border-left-color: #008b8b;
        }

        .stat-card.siswa {
            border-left-color: #9c27b0;
        }

        .stat-card.menunggu {
            border-left-color: #ffc107;
        }

        .stat-card.proses {
            border-left-color: #2196f3;
        }

        .stat-card.selesai {
            border-left-color: #4caf50;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: white;
        }

        .stat-card.total .stat-icon {
            background: linear-gradient(135deg, #008b8b 0%, #20b2aa 100%);
        }

        .stat-card.siswa .stat-icon {
            background: linear-gradient(135deg, #9c27b0 0%, #ba68c8 100%);
        }

        .stat-card.menunggu .stat-icon {
            background: linear-gradient(135deg, #ffc107 0%, #ffca28 100%);
        }

        .stat-card.proses .stat-icon {
            background: linear-gradient(135deg, #2196f3 0%, #42a5f5 100%);
        }

        .stat-card.selesai .stat-icon {
            background: linear-gradient(135deg, #4caf50 0%, #66bb6a 100%);
        }

        .stat-info h3 {
            font-size: 2rem;
            color: #004d4d;
            margin-bottom: 5px;
        }

        .stat-info p {
            color: #5f7d82;
            font-size: 0.95rem;
            font-weight: 600;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 28px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background: linear-gradient(135deg, #008b8b 0%, #20b2aa 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 139, 139, 0.4);
        }

        .btn-secondary {
            background: white;
            color: #008b8b;
            border: 2px solid #008b8b;
        }

        .btn-secondary:hover {
            background: #008b8b;
            color: white;
            transform: translateY(-3px);
        }

        /* Card */
        .card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 123, 135, 0.15);
        }

        .card-title {
            color: #004d4d;
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 3px solid #e0f2f1;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-title i {
            color: #008b8b;
        }

        /* Pengaduan List */
        .pengaduan-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .pengaduan-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: #f8fdff;
            border-radius: 12px;
            border-left: 4px solid #008b8b;
            transition: all 0.3s ease;
        }

        .pengaduan-item:hover {
            background: #e0f7fa;
            transform: translateX(5px);
        }

        .pengaduan-info h4 {
            color: #004d4d;
            font-size: 1.1rem;
            margin-bottom: 8px;
        }

        .pengaduan-meta {
            display: flex;
            gap: 20px;
            align-items: center;
            flex-wrap: wrap;
        }

        .pengaduan-meta span {
            color: #5f7d82;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .status-badge {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
        }

        .status-menunggu {
            background: #fff3cd;
            color: #856404;
        }

        .status-proses {
            background: #cce5ff;
            color: #004085;
        }

        .status-selesai {
            background: #d4edda;
            color: #155724;
        }

        .btn-detail {
            padding: 8px 20px;
            background: #008b8b;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s;
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-detail:hover {
            background: #007373;
            transform: translateY(-2px);
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #8fa3a6;
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #b0d9d9;
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn-action {
                width: 100%;
                justify-content: center;
            }

            .pengaduan-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div>
                <h2><i class="fas fa-tachometer-alt"></i> Dashboard Admin</h2>
                <p class="user-info">Login sebagai: <b>{{ session('user_name') }}</b></p>
            </div>
            <a href="/logout" class="btn-logout">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card total">
                <div class="stat-icon">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $total_pengaduan }}</h3>
                    <p>Total Pengaduan</p>
                </div>
            </div>

            <div class="stat-card siswa">
                <div class="stat-icon">
                    <i class="fas fa-user-friends"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $total_siswa }}</h3>
                    <p>Total Siswa Aktif</p>
                </div>
            </div>

            <div class="stat-card menunggu">
                <div class="stat-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $menunggu }}</h3>
                    <p>Menunggu Respon</p>
                </div>
            </div>

            <div class="stat-card proses">
                <div class="stat-icon">
                    <i class="fas fa-spinner"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $proses }}</h3>
                    <p>Sedang Diproses</p>
                </div>
            </div>

            <div class="stat-card selesai">
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $selesai }}</h3>
                    <p>Selesai</p>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="/admin/pengaduan/list" class="btn-action btn-primary">
                <i class="fas fa-list"></i> Lihat Semua Pengaduan
            </a>
        </div>

        <!-- Recent Pengaduan -->
        <div class="card">
            <h3 class="card-title">
                <i class="fas fa-history"></i> Pengaduan Terbaru
            </h3>

            @if($pengaduan_terbaru->count() > 0)
                <div class="pengaduan-list">
                    @foreach($pengaduan_terbaru as $item)
                    <div class="pengaduan-item">
                        <div class="pengaduan-info">
                            <h4>{{ $item->judul }}</h4>
                            <div class="pengaduan-meta">
                                <span><i class="fas fa-user"></i> {{ $item->user->name ?? 'Akun Dihapus' }}</span>
                                <span><i class="fas fa-calendar"></i> {{ $item->created_at->format('d M Y') }}</span>
                                <span class="status-badge status-{{ $item->status == '0' ? 'menunggu' : ($item->status == 'proses' ? 'proses' : 'selesai') }}">
                                    {{ $item->status == '0' ? 'Menunggu' : ($item->status == 'proses' ? 'Proses' : 'Selesai') }}
                                </span>
                            </div>
                        </div>
                        <a href="/admin/pengaduan/{{ $item->id }}" class="btn-detail">
                            <i class="fas fa-eye"></i> Detail
                        </a>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <i class="fas fa-inbox"></i>
                    <h3>Belum Ada Pengaduan</h3>
                    <p>Belum ada pengaduan dari siswa.</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>