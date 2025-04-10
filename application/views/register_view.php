<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Library Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .register-container {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
        }
        .register-container h1 {
            color: #2c3e50;
            font-size: 2rem;
            margin-bottom: 2rem;
            text-align: center;
            font-weight: 600;
        }
        .form-floating {
            margin-bottom: 1.5rem;
        }
        .form-control {
            border-radius: 8px;
            padding: 1rem;
            border: 2px solid #e9ecef;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        .btn-register {
            background: #007bff;
            color: white;
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            width: 100%;
            margin-top: 1rem;
            transition: all 0.3s ease;
        }
        .btn-register:hover {
            background: #0056b3;
            transform: translateY(-2px);
        }
        .login-link {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
            margin-top: 1rem;
            display: inline-block;
            text-align: center;
            width: 100%;
        }
        .login-link:hover {
            color: #0056b3;
            text-decoration: underline;
        }
        .error {
            color: #dc3545;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 0.5rem;
            border-radius: 5px;
            margin-bottom: 1rem;
            text-align: center;
        }
        .icon {
            margin-right: 0.5rem;
        }
        .form-label {
            font-weight: 500;
            color: #495057;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1><i class="fas fa-user-plus icon"></i>Create Account</h1>

        <?php if($this->session->flashdata("error")): ?>
            <div class="error">
                <i class="fas fa-exclamation-circle"></i> <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('Auth/process_register') ?>" method="post">
            <div class="form-floating">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                <label for="name"><i class="fas fa-user icon"></i>Full Name</label>
            </div>

            <div class="form-floating">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                <label for="email"><i class="fas fa-envelope icon"></i>Email Address</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <label for="password"><i class="fas fa-lock icon"></i>Password</label>
            </div>

            <button type="submit" class="btn btn-register">
                <i class="fas fa-user-plus icon"></i>Register
            </button>

            <a href="<?= site_url('Auth/login') ?>" class="login-link">
                <i class="fas fa-sign-in-alt icon"></i>Already have an account? Login here
            </a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>