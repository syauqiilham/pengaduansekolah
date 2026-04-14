<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan - Admin</title>
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
            max-width: 1000px;
            margin: 0 auto;
        }

        .header {
            background: white;
            border-radius: 15px;
            padding: 25px 30px;
            margin-bottom: 25px;
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

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: #f0fdff;
            color: #008b8b;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
            border: 2px solid #b0d9d9;
        }

        .back-link:hover {
            background: #008b8b;
            color: white;
            transform: translateX(-5px);
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 123, 135, 0.15);
            margin-bottom: 25px;
        }

        .section-title {
            color: #004d4d;
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 3px solid #e0f2f1;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: #008b8b;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .info-item {
            background: #f8fdff;
            padding: 15px 20px;
            border-radius: 10px;
            border-left: 4px solid #008b8b;
        }

        .info-label {
            font-size: 0.85rem;
            color: #5f7d82;
            font-weight: 600;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info-label i {
            color: #008b8b;
            font-size: 1rem;
        }

        .info-value {
            font-size: 1.05rem;
            color: #004d4d;
            font-weight: 600;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 700;
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

        .content-box {
            background: #f8fdff;
            padding: 20px;
            border-radius: 10px;
            border: 2px solid #e0f2f1;
            margin-bottom: 25px;
            line-height: 1.8;
            color: #475569;
            min-height: 100px;
        }

        .photo-container {
            margin-bottom: 25px;
        }

        .photo-wrapper {
            display: inline-block;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 123, 135, 0.2);
            border: 3px solid #e0f2f1;
        }

        .photo-wrapper img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        .no-photo {
            width: 100%;
            max-width: 400px;
            height: 300px;
            background: #e0f2f1;
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #8fa3a6;
            font-size: 4rem;
        }

        .no-photo span {
            font-size: 1rem;
            margin-top: 10px;
            color: #5f7d82;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #006666;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .form-label i {
            margin-right: 8px;
            color: #008b8b;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #b0d9d9;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s;
            font-family: inherit;
        }

        .form-control:focus {
            outline: none;
            border-color: #008b8b;
            box-shadow: 0 0 0 4px rgba(0, 139, 139, 0.1);
        }

        select.form-control {
            cursor: pointer;
            background: white;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .btn-group {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 25px;
        }

        .btn {
            padding: 12px 28px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #008b8b 0%, #20b2aa 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(0, 139, 139, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 139, 139, 0.4);
        }

        .btn-secondary {
            background: #f0fdff;
            color: #008b8b;
            border: 2px solid #b0d9d9;
        }

        .btn-secondary:hover {
            background: #008b8b;
            color: white;
        }

        .alert {
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            border-left: 4px solid;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .alert-success {
            background: #e8f5e9;
            color: #2e7d32;
            border-left-color: #66bb6a;
        }

        .alert-danger {
            background: #ffebee;
            color: #c62828;
            border-left-color: #ef5350;
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .header h2 {
                font-size: 1.4rem;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .btn-group {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h2><i class="fas fa-eye"></i> Detail Pengaduan</h2>
            <a href="/admin/pengaduan" class="back-link">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            </div>
        @endif

        <!-- Informasi Pengaduan -->
        <div class="card">
            <h3 class="section-title">
                <i class="fas fa-info-circle"></i> Informasi Pengaduan
            </h3>
            
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-user"></i> Nama Siswa
                    </div>
                    <div class="info-value">{{ $pengaduan->user->name ?? 'Akun Dihapus' }}</div>
                </div>

                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-heading"></i> Judul
                    </div>
                    <div class="info-value">{{ $pengaduan->judul }}</div>
                </div>

                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-calendar"></i> Tanggal
                    </div>
                    <div class="info-value">{{ $pengaduan->created_at->format('d F Y, H:i') }}</div>
                </div>

                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-flag"></i> Status
                    </div>
                    <div class="info-value">
                        @if($pengaduan->status == '0')
                            <span class="status-badge status-menunggu">Menunggu</span>
                        @elseif($pengaduan->status == 'proses')
                            <span class="status-badge status-proses">Proses</span>
                        @elseif($pengaduan->status == 'selesai')
                            <span class="status-badge status-selesai">Selesai</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="section-title">
                <i class="fas fa-align-left"></i> Isi Pengaduan
            </div>
            <div class="content-box">
                {{ $pengaduan->isi ?? 'Tidak ada isi pengaduan' }}
            </div>

            @if($pengaduan->foto)
                <div class="section-title">
                    <i class="fas fa-image"></i> Foto Bukti
                </div>
                <div class="photo-container">
                    <div class="photo-wrapper">
                        <img src="{{ asset('uploads/'.$pengaduan->foto) }}" alt="Foto Pengaduan">
                    </div>
                </div>
            @endif
        </div>

        <!-- Form Update Status -->
        <div class="card">
            <h3 class="section-title">
                <i class="fas fa-edit"></i> Update Status & Tanggapan
            </h3>

            <form action="/admin/pengaduan/{{ $pengaduan->id }}/update-status" method="POST">
                @csrf
                <!-- @method('PUT') DIHAPUS -->
                
                <div class="form-group">
                    <!-- ... -->
                    <label class="form-label" for="status">
                        <i class="fas fa-flag"></i> Status Pengaduan
                    </label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="0" {{ $pengaduan->status == '0' ? 'selected' : '' }}>Menunggu</option>
                        <option value="proses" {{ $pengaduan->status == 'proses' ? 'selected' : '' }}>Proses</option>
                        <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="tanggapan">
                        <i class="fas fa-comment"></i> Tanggapan Admin
                    </label>
                    <textarea name="tanggapan" id="tanggapan" class="form-control" placeholder="Masukkan tanggapan atau catatan untuk pengaduan ini...">{{ $pengaduan->tanggapan ?? '' }}</textarea>
                </div>

                <div class="btn-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                    <a href="/admin/pengaduan" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Auto-hide alerts setelah 5 detik
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);
    </script>
</body>
</html>