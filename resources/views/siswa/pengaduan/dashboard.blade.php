<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Pengaduan Saya</title>
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

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
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

        .stat-card.total { border-left-color: #008b8b; }
        .stat-card.menunggu { border-left-color: #ffc107; }
        .stat-card.proses { border-left-color: #2196f3; }
        .stat-card.selesai { border-left-color: #4caf50; }

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

        .stat-card.total .stat-icon { background: linear-gradient(135deg, #008b8b 0%, #20b2aa 100%); }
        .stat-card.menunggu .stat-icon { background: linear-gradient(135deg, #ffc107 0%, #ffca28 100%); }
        .stat-card.proses .stat-icon { background: linear-gradient(135deg, #2196f3 0%, #42a5f5 100%); }
        .stat-card.selesai .stat-icon { background: linear-gradient(135deg, #4caf50 0%, #66bb6a 100%); }

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

        /* Action Buttons - Utama */
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .btn-main {
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

        .card-title i { color: #008b8b; }

        /* Status Badge */
        .status-badge {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
        }

        .status-menunggu { background: #fff3cd; color: #856404; }
        .status-proses { background: #cce5ff; color: #004085; }
        .status-selesai { background: #d4edda; color: #155724; }

        /* Empty State */
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

        .empty-state h3 {
            color: #006666;
            margin-bottom: 10px;
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

        /* ==================== TABLE STYLES ==================== */
        .table-container {
            overflow-x: auto;
            margin-top: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        thead {
            background: linear-gradient(135deg, #008b8b 0%, #20b2aa 100%);
            color: white;
        }

        th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #e0f2f1;
            color: #475569;
            vertical-align: middle;
        }

        tbody tr {
            transition: all 0.2s ease;
        }

        tbody tr:hover {
            background: #f0fdff;
        }

        .foto-preview {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid #b0d9d9;
        }

        .no-foto {
            width: 60px;
            height: 60px;
            background: #e0f2f1;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #8fa3a6;
        }

        /* Tombol Aksi di dalam Tabel - Class DIBEDAKAN */
        .action-cell {
            display: flex;
            gap: 8px;
            align-items: center;
            flex-wrap: wrap;
        }

        .btn-table {
            padding: 8px 12px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: 600;
            color: white;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s;
        }

        .btn-table-detail {
            background: #008b8b;
        }

        .btn-table-detail:hover {
            background: #007373;
            transform: translateY(-2px);
        }

        .btn-table-edit {
            background: #ff9800;
        }

        .btn-table-edit:hover {
            background: #f57c00;
            transform: translateY(-2px);
        }

        .btn-table-delete {
            background: #ef5350;
        }

        .btn-table-delete:hover {
            background: #e53935;
            transform: translateY(-2px);
        }

        .number-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 25px;
            height: 25px;
            background: #008b8b;
            color: white;
            border-radius: 50%;
            font-weight: bold;
            font-size: 0.8rem;
        }

        @media (max-width: 768px) {
            .stats-grid { grid-template-columns: 1fr; }
            .action-buttons { flex-direction: column; }
            .btn-main { width: 100%; justify-content: center; }
            
            .header { flex-direction: column; align-items: flex-start; }
            
            th, td { padding: 12px 8px; font-size: 0.85rem; }
            
            .action-cell { flex-direction: column; }
            .btn-table { width: 100%; justify-content: center; }
            
            .foto-preview, .no-foto { width: 50px; height: 50px; }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div>
                <h2><i class="fas fa-tachometer-alt"></i> Dashboard Siswa</h2>
                <p class="user-info">Login sebagai: <b>{{ session('user_name') }}</b></p>
            </div>
            <a href="/logout" class="btn-logout">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="/siswa/pengaduan/create" class="btn-main btn-primary">
                <i class="fas fa-plus-circle"></i> Buat Pengaduan Baru
            </a>
            <a href="/siswa/pengaduan/list" class="btn-main btn-secondary">
                <i class="fas fa-list"></i> Lihat Semua Pengaduan
            </a>
        </div>

        <!-- Recent Pengaduan (TABLE) -->
        <div class="card">
            <h3 class="card-title">
                <i class="fas fa-history"></i> Pengaduan Terbaru
            </h3>
        
            <div class="table-container">
                @if($pengaduan_terbaru->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengaduan_terbaru as $index => $item)
                        <tr>
                            <td>
                                <span class="number-badge">{{ $index + 1 }}</span>
                            </td>
                            <td><strong>{{ $item->judul }}</strong></td>
                            <td>{{ $item->created_at->format('d M Y') }}</td>
                            <td>
                                @if($item->status == '0')
                                    <span class="status-badge status-menunggu">Menunggu</span>
                                @elseif($item->status == 'proses')
                                    <span class="status-badge status-proses">Proses</span>
                                @elseif($item->status == 'selesai')
                                    <span class="status-badge status-selesai">Selesai</span>
                                @endif
                            </td>
                            <td>
                                @if($item->foto)
                                    <img src="{{ asset('uploads/'.$item->foto) }}" alt="Foto" class="foto-preview">
                                @else
                                    <div class="no-foto">
                                        <i class="fas fa-image"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="action-cell">
                                    {{-- ✅ URL SISWA, BUKAN ADMIN --}}
                                    <a href="/siswa/pengaduan/{{ $item->id }}" class="btn-table btn-table-detail">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                    <a href="/siswa/pengaduan/{{ $item->id }}/edit" class="btn-table btn-table-edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="/siswa/pengaduan/delete/{{ $item->id }}" 
                                       onclick="return confirm('Yakin ingin menghapus pengaduan ini?')" 
                                       class="btn-table btn-table-delete">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="empty-state">
                    <i class="fas fa-inbox"></i>
                    <h3>Belum Ada Pengaduan</h3>
                    <p>Anda belum membuat pengaduan apapun.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>