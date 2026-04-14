<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengaduan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #e0f7fa 0%, #b2ebf2 100%);
            min-height: 100vh; padding: 20px;
        }
        .container { max-width: 800px; margin: 0 auto; }
        .card {
            background: white; border-radius: 15px; padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 123, 135, 0.15);
            border-top: 5px solid #008b8b;
        }
        .header { margin-bottom: 30px; display: flex; justify-content: space-between; align-items: center; }
        .header h2 { color: #004d4d; font-size: 1.8rem; display: flex; align-items: center; gap: 12px; }
        .header h2 i { color: #008b8b; }
        .back-link {
            color: #008b8b; text-decoration: none; font-weight: 600;
            display: inline-flex; align-items: center; gap: 8px;
        }
        .back-link:hover { color: #006666; }
        .form-group { margin-bottom: 20px; }
        .form-label { display: block; font-weight: 600; color: #006666; margin-bottom: 8px; }
        .form-control {
            width: 100%; padding: 12px 16px; border: 2px solid #b0d9d9;
            border-radius: 10px; font-size: 1rem; transition: all 0.3s;
        }
        .form-control:focus { outline: none; border-color: #008b8b; box-shadow: 0 0 0 4px rgba(0, 139, 139, 0.1); }
        textarea.form-control { min-height: 150px; resize: vertical; }
        
        .current-foto {
            margin-top: 10px; display: inline-block;
            width: 150px; height: 150px; object-fit: cover;
            border-radius: 10px; border: 2px solid #e0f2f1;
        }
        
        .btn-group { display: flex; gap: 12px; margin-top: 25px; }
        .btn {
            padding: 12px 24px; border-radius: 10px; font-weight: 600;
            cursor: pointer; transition: all 0.3s; border: none;
            display: inline-flex; align-items: center; gap: 8px; text-decoration: none;
        }
        .btn-primary {
            background: linear-gradient(135deg, #008b8b 0%, #20b2aa 100%);
            color: white;
        }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(0, 139, 139, 0.4); }
        .btn-secondary { background: #f0fdff; color: #008b8b; border: 2px solid #b0d9d9; }
        .btn-secondary:hover { background: #e0f7fa; }
        
        .alert-danger {
            padding: 15px; border-radius: 10px; background: #ffebee; color: #c62828;
            border-left: 4px solid #ef5350; margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <h2><i class="fas fa-edit"></i> Edit Pengaduan</h2>
                <a href="/siswa/pengaduan" class="back-link"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>

            @if(session('error'))
                <div class="alert-danger">
                    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                </div>
            @endif

            <!-- Form Action mengarah ke route update dengan method PUT -->
            <form action="/siswa/pengaduan/{{ $pengaduan->id }}/update" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- PENTING: Simulate PUT request -->
                
                <div class="form-group">
                    <label class="form-label" for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" 
                           value="{{ old('judul', $pengaduan->judul) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="isi">Isi Pengaduan</label>
                    <textarea class="form-control" id="isi" name="isi" required>{{ old('isi', $pengaduan->isi) }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label" for="foto">Foto Bukti (Opsional)</label>
                    
                    @if($pengaduan->foto)
                        <div style="margin-bottom: 10px;">
                            <small style="color: #5f7d82;">Foto Saat Ini:</small><br>
                            <img src="{{ asset('uploads/'.$pengaduan->foto) }}" class="current-foto">
                        </div>
                    @endif

                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                    <small style="color: #8fa3a6;">Upload foto baru untuk menggantikan foto lama.</small>
                </div>

                <div class="btn-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                    <a href="/siswa/pengaduan" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>