<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sistem Kasir</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #e0f7fa 0%, #b2ebf2 100%);
            padding: 20px;
        }

        .register-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 123, 135, 0.2);
            padding: 40px;
            max-width: 500px;
            width: 100%;
            border-top: 5px solid #008b8b;
            animation: slideUp 0.5s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .register-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .logo {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, #008b8b 0%, #20b2aa 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 10px 30px rgba(0, 139, 139, 0.3);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        .logo i {
            font-size: 2.5rem;
            color: white;
        }

        .register-header h2 {
            font-size: 2rem;
            font-weight: 700;
            color: #004d4d;
            margin-bottom: 8px;
        }

        .register-header p {
            color: #5f7d82;
            font-size: 0.95rem;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 0.9rem;
            animation: slideIn 0.3s ease;
            border-left: 4px solid;
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
            padding: 14px 16px;
            border: 2px solid #b0d9d9;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8fdff;
        }

        .form-control:focus {
            outline: none;
            border-color: #008b8b;
            box-shadow: 0 0 0 4px rgba(0, 139, 139, 0.15);
            background: #fff;
        }

        .form-control::placeholder {
            color: #8fa3a6;
        }

        /* Role Selection Styles */
        .role-selection {
            margin-bottom: 20px;
        }

        .role-label {
            display: block;
            font-weight: 600;
            color: #006666;
            margin-bottom: 12px;
            font-size: 0.95rem;
        }

        .role-label i {
            margin-right: 8px;
            color: #008b8b;
        }

        .role-options {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .role-option {
            position: relative;
        }

        .role-option input[type="radio"] {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .role-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 15px;
            border: 2px solid #b0d9d9;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #f8fdff;
            text-align: center;
        }

        .role-card i {
            font-size: 2rem;
            color: #008b8b;
            margin-bottom: 8px;
            transition: all 0.3s ease;
        }

        .role-card span {
            font-weight: 600;
            color: #006666;
            font-size: 0.95rem;
        }

        .role-option input[type="radio"]:checked + .role-card {
            border-color: #008b8b;
            background: linear-gradient(135deg, #e0f7fa 0%, #b2ebf2 100%);
            box-shadow: 0 4px 12px rgba(0, 139, 139, 0.2);
            transform: translateY(-2px);
        }

        .role-option input[type="radio"]:checked + .role-card i {
            color: #004d4d;
            transform: scale(1.1);
        }

        .role-option input[type="radio"]:checked + .role-card span {
            color: #004d4d;
        }

        .role-card:hover {
            border-color: #008b8b;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 139, 139, 0.15);
        }

        .role-description {
            font-size: 0.75rem;
            color: #5f7d82;
            margin-top: 4px;
            font-weight: 400;
        }

        .password-strength {
            margin-top: 8px;
            font-size: 0.85rem;
            color: #5f7d82;
        }

        .password-strength.weak {
            color: #ef5350;
        }

        .password-strength.medium {
            color: #ffb74d;
        }

        .password-strength.strong {
            color: #66bb6a;
        }

        .btn-register {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #008b8b 0%, #20b2aa 100%);
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: 700;
            font-size: 1.05rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 139, 139, 0.3);
            margin-top: 10px;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 139, 139, 0.4);
            background: linear-gradient(135deg, #007373 0%, #1a9991 100%);
        }

        .btn-register:active {
            transform: translateY(0);
        }

        .btn-register i {
            margin-right: 8px;
        }

        .divider {
            text-align: center;
            margin: 25px 0;
            color: #8fa3a6;
            font-size: 0.9rem;
            position: relative;
        }

        .divider::before,
        .divider::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 35%;
            height: 1px;
            background: #b0d9d9;
        }

        .divider::before {
            left: 0;
        }

        .divider::after {
            right: 0;
        }

        .login-link {
            text-align: center;
            color: #5f7d82;
            font-size: 0.95rem;
            margin-top: 15px;
        }

        .login-link a {
            color: #008b8b;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.2s;
        }

        .login-link a:hover {
            color: #006666;
            text-decoration: underline;
        }

        .terms {
            font-size: 0.85rem;
            color: #5f7d82;
            text-align: center;
            margin-top: 15px;
            line-height: 1.5;
        }

        .terms a {
            color: #008b8b;
            text-decoration: none;
        }

        .terms a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .register-container {
                padding: 30px 20px;
            }

            .register-header h2 {
                font-size: 1.75rem;
            }

            .role-options {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <div class="logo">
                <i class="fas fa-user-plus"></i>
            </div>
            <h2>Register Siswa</h2>
            <p>Buat akun baru untuk memulai</p>
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

        <form method="POST" action="/register" id="registerForm">
            @csrf
            
            <div class="form-group">
                <label for="name" class="form-label">
                    <i class="fas fa-user"></i>Nama Lengkap
                </label>
                <input type="text" 
                       class="form-control" 
                       id="name" 
                       name="name" 
                       placeholder="Masukkan nama lengkap" 
                       value="{{ old('name') }}"
                       required 
                       autofocus>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">
                    <i class="fas fa-envelope"></i>Email
                </label>
                <input type="email" 
                       class="form-control" 
                       id="email" 
                       name="email" 
                       placeholder="nama@email.com" 
                       value="{{ old('email') }}"
                       required>
            </div>

            <!-- Role Selection -->
            <div class="role-selection">
                <label class="role-label">
                    <i class="fas fa-user-tag"></i>Pilih Role
                </label>
                <div class="role-options">
                    <label class="role-option">
                        <input type="radio" name="role" value="siswa" checked>
                        <div class="role-card">
                            <i class="fas fa-user-graduate"></i>
                            <span>Siswa</span>
                            <small class="role-description">Akun siswa</small>
                        </div>
                    </label>
                    <label class="role-option">
                        <input type="radio" name="role" value="admin">
                        <div class="role-card">
                            <i class="fas fa-user-shield"></i>
                            <span>Admin</span>
                            <small class="role-description">Administrator</small>
                        </div>
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">
                    <i class="fas fa-lock"></i>Password
                </label>
                <input type="password" 
                       class="form-control" 
                       id="password" 
                       name="password" 
                       placeholder="Minimal 8 karakter" 
                       required
                       onkeyup="checkPasswordStrength(this.value)">
                <div class="password-strength" id="passwordStrength"></div>
            </div>

            <button type="submit" class="btn-register">
                <i class="fas fa-user-plus"></i>Register
            </button>
        </form>

        <div class="terms">
            Dengan mendaftar, Anda menyetujui <a href="#">Syarat & Ketentuan</a> kami
        </div>

        <div class="divider">atau</div>

        <div class="login-link">
            Sudah punya akun? <a href="/login">Login di sini</a>
        </div>
    </div>

    <script>
        // Password strength checker
        function checkPasswordStrength(password) {
            const strengthText = document.getElementById('passwordStrength');
            let strength = 0;
            
            if (password.length >= 8) strength++;
            if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
            if (password.match(/[0-9]/)) strength++;
            if (password.match(/[^a-zA-Z0-9]/)) strength++;
            
            if (strength === 0) {
                strengthText.textContent = '';
                strengthText.className = 'password-strength';
            } else if (strength <= 1) {
                strengthText.textContent = 'Kekuatan: Lemah';
                strengthText.className = 'password-strength weak';
            } else if (strength <= 2) {
                strengthText.textContent = 'Kekuatan: Sedang';
                strengthText.className = 'password-strength medium';
            } else {
                strengthText.textContent = 'Kekuatan: Kuat';
                strengthText.className = 'password-strength strong';
            }
        }

        // Auto-hide alerts setelah 5 detik
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);

        // Form validation
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const role = document.querySelector('input[name="role"]:checked').value;
            
            if (password.length < 8) {
                e.preventDefault();
                alert('Password harus minimal 8 karakter!');
                return false;
            }

            // Konfirmasi jika memilih role admin
            if (role === 'admin') {
                if (!confirm('Anda akan mendaftar sebagai Admin. Lanjutkan?')) {
                    e.preventDefault();
                    return false;
                }
            }
        });
    </script>
</body>
</html>