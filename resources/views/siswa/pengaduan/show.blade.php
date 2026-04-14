<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan - Siswa</title>
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
            max-width: 900px;
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

        .tanggapan-box {
            background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
            padding: 20px;
            border-radius: 12px;
            border-left: 5px solid #66bb6a;
            margin-top: 20px;
        }

        .tanggapan-box h4 {
            color: #2e7d32;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .tanggapan-box p {
            color: #1b5e20;
            line-height: 1.6;
        }

        .no-tanggapan {
            background: #fff3cd;
            padding: 15px 20px;
            border-radius: 10px;
            border-left: 4px solid #ffc107;
            color: #856404;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h2><i class="fas fa-eye"></i> Detail Pengaduan</h2>
            <a href="/siswa/pengaduan" class="back-link">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <!-- Informasi Pengaduan -->
        <div class="card">
            <h3 class="section-title">
                <i class="fas fa-info-circle"></i> Informasi Pengaduan
            </h3>
            
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-heading"></i> Judul
                    </div>
                    <div class="info-value">{{ $pengaduan->judul }}</div>
                </div>

                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-calendar"></i> Tanggal Dibuat
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

            <!-- Tanggapan Admin -->
            <div class="section-title">
                <i class="fas fa-comment-dots"></i> Tanggapan Admin
            </div>
            @if($pengaduan->tanggapan)
                <div class="tanggapan-box">
                    <h4><i class="fas fa-user-tie"></i> Admin</h4>
                    <p>{{ $pengaduan->tanggapan }}</p>
                </div>
            @else
                <div class="no-tanggapan">
                    <i class="fas fa-info-circle"></i> Belum ada tanggapan dari admin
                </div>
            @endif
        </div>
    </div>
</body>
</html>