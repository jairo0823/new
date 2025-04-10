<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Library Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
         body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #fdf6e3 0%, #f5f5dc 100%);
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }
    .login-container {
        background: #fffaf0;
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        width: 100%;
        max-width: 400px;
        text-align: center;
    }
    .login-container h2 {
        color: #5e503f;
        margin-bottom: 2rem;
        font-weight: 600;
    }
    .form-floating {
        margin-bottom: 1rem;
    }
    .form-control {
        border-radius: 8px;
        padding: 1rem;
        border: 2px solid #e6dcc6;
        background-color: #fdfaf3;
        color: #5e503f;
    }
    .form-control:focus {
        border-color: #d8c3a5;
        box-shadow: 0 0 0 0.2rem rgba(216, 195, 165, 0.25);
    }
    .btn-login {
        background: #d8c3a5;
        color: #3e3e3e;
        padding: 0.8rem 2rem;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        width: 100%;
        margin-top: 1rem;
        transition: all 0.3s ease;
    }
    .btn-login:hover {
        background: #c4ad8f;
        transform: translateY(-2px);
    }
    .register-link {
        color: #8b7c62;
        text-decoration: none;
        font-weight: 500;
        margin-top: 1rem;
        display: inline-block;
    }
    .register-link:hover {
        color: #5e503f;
        text-decoration: underline;
    }
    .error {
        color: #856404;
        background-color: #fff3cd;
        border: 1px solid #ffeeba;
        padding: 0.5rem;
        border-radius: 5px;
        margin-bottom: 1rem;
    }
    .icon {
        margin-right: 0.5rem;
    }
    </style>
</head>
<body>
    <div class="login-container">
        <h2><i class="fas fa-book-reader icon"></i>Library Login</h2>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="error">
                <i class="fas fa-exclamation-circle"></i> <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('auth/process_login') ?>" method="POST">
            <div class="form-floating">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                <label for="email"><i class="fas fa-envelope icon"></i>Email</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <label for="password"><i class="fas fa-lock icon"></i>Password</label>
            </div>

            <button type="submit" class="btn btn-login">
                <i class="fas fa-sign-in-alt icon"></i>Login
            </button>
        </form>

        <a href="<?= site_url('auth/register') ?>" class="register-link">
            <i class="fas fa-user-plus icon"></i>Don't have an account? Register here
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>