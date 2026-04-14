<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Kasir</title>
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

        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 123, 135, 0.2);
            padding: 40px;
            max-width: 450px;
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

        .login-header {
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

        .login-header h2 {
            font-size: 2rem;
            font-weight: 700;
            color: #004d4d;
            margin-bottom: 8px;
        }

        .login-header p {
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

        .form-group {
            margin-bottom: 25px;
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

        .btn-login {
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
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 139, 139, 0.4);
            background: linear-gradient(135deg, #007373 0%, #1a9991 100%);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .btn-login i {
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

        .register-link {
            text-align: center;
            color: #5f7d82;
            font-size: 0.95rem;
        }

        .register-link a {
            color: #008b8b;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.2s;
        }

        .register-link a:hover {
            color: #006666;
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 30px 20px;
            }

            .login-header h2 {
                font-size: 1.75rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="logo">
                <i class="fas fa-cash-register"></i>
            </div>
            <h2>Login</h2>
            <p>Silakan masuk ke akun Anda</p>
        </div>

        @if(session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="/login">
            @csrf
            
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
                       required 
                       autofocus>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">
                    <i class="fas fa-lock"></i>Password
                </label>
                <input type="password" 
                       class="form-control" 
                       id="password" 
                       name="password" 
                       placeholder="••••••••" 
                       required>
            </div>

            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt"></i>Login
            </button>
        </form>

        <div class="divider">atau</div>

        <div class="register-link">
            Belum punya akun? <a href="/register">Daftar Akun</a>
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