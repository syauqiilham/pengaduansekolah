<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Pengaduan</title>
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
            max-width: 800px;
            margin: 0 auto;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 123, 135, 0.15);
            border-top: 5px solid #008b8b;
        }

        .header {
            margin-bottom: 30px;
        }

        .header h2 {
            color: #004d4d;
            font-size: 2rem;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .header h2 i {
            color: #008b8b;
        }

        .back-link {
            color: #008b8b;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
            font-weight: 600;
            transition: all 0.2s;
        }

        .back-link:hover {
            color: #006666;
            transform: translateX(-5px);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #006666;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #b0d9d9;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: #008b8b;
            box-shadow: 0 0 0 4px rgba(0, 139, 139, 0.1);
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        .btn-submit {
            padding: 14px 32px;
            background: linear-gradient(135deg, #008b8b 0%, #20b2aa 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 139, 139, 0.4);
        }

        /* === ALERT STYLES (untuk error/success) === */
        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 0.95rem;
            border-left: 4px solid;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .alert-danger {
            background: #ffebee;
            color: #c62828;
            border-left-color: #ef5350;
        }

        .alert-success {
            background: #e8f5e9;
            color: #2e7d32;
            border-left-color: #66bb6a;
        }

        .alert ul {
            margin: 10px 0 0 20px;
            padding: 0;
        }

        .alert li {
            margin: 5px 0;
        }

        .alert i {
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <a href="/siswa/pengaduan" class="back-link">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <h2><i class="fas fa-plus-circle"></i> Buat Pengaduan</h2>
            </div>

            {{-- ✅ DEBUG: Tampilkan Error Validasi --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <strong><i class="fas fa-exclamation-triangle"></i> Ada kesalahan:</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- ✅ Tampilkan Error dari Session --}}
            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                </div>
            @endif

            {{-- ✅ Tampilkan Success Message --}}
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            <form action="/siswa/pengaduan/store" method="POST" enctype="multipart/form-data" id="pengaduanForm">
                @csrf
                
                <div class="form-group">
                    <label class="form-label" for="judul">Judul</label>
                    <input type="text" 
                           class="form-control" 
                           id="judul" 
                           name="judul" 
                           placeholder="Masukkan judul pengaduan" 
                           value="{{ old('judul') }}"
                           required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="isi">Isi Pengaduan</label>
                    <textarea class="form-control" 
                              id="isi" 
                              name="isi" 
                              placeholder="Tuliskan isi pengaduan Anda..." 
                              required>{{ old('isi') }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label" for="lokasi">Lokasi (Opsional)</label>
                    <input type="text" 
                           class="form-control" 
                           id="lokasi" 
                           name="lokasi" 
                           placeholder="Contoh: Gedung A, Lantai 2">
                </div>

                <div class="form-group">
                    <label class="form-label" for="foto">Foto (Opsional)</label>
                    <input type="file" 
                           class="form-control" 
                           id="foto" 
                           name="foto" 
                           accept="image/*">
                    <small style="color: #8fa3a6; font-size: 0.85rem;">Format: jpg, png, jpeg, gif | Maksimal: 2MB</small>
                </div>
                
                <button type="submit" class="btn-submit">
                    <i class="fas fa-paper-plane"></i> Kirim Pengaduan
                </button>
            </form>
        </div>
    </div>

    {{-- ✅ DEBUG SCRIPT: Lihat apa yang dikirim form --}}
    <script>
    document.getElementById('pengaduanForm').addEventListener('submit', function(e) {
        console.log('🔍 === FORM SUBMIT DEBUG ===');
        
        // Cek semua field yang akan dikirim
        const formData = new FormData(this);
        console.log('📦 Data yang akan dikirim:');
        for (let [key, value] of formData.entries()) {
            if (key === '_token') {
                console.log('  _token: [HIDDEN]');
            } else {
                console.log('  ' + key + ':', value);
            }
        }
        
        // Cek CSRF token
        const csrfToken = document.querySelector('input[name="_token"]');
        console.log('🔐 CSRF Token ada:', csrfToken ? '✅ YA' : '❌ TIDAK');
        
        // Cek validasi HTML5
        if (!this.checkValidity()) {
            console.error('❌ Form tidak valid menurut browser!');
        } else {
            console.log('✅ Form valid, akan dikirim ke server...');
        }
        
        console.log('🔍 =========================');
    });

    // Auto-hide alert setelah 5 detik
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