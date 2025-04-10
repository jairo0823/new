<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1>Welcome to the Library Management System</h1>
    <?php if ($this->session->userdata('user_id')): ?>
        <a href="<?php echo site_url('library'); ?>" class="button">Go to Library</a>
        <a href="<?php echo site_url('Auth/logout'); ?>" class="button" style="background-color: red;">Logout</a>
    <?php else: ?>
        <a href="<?php echo site_url('Auth/login'); ?>" class="button">Login</a>
        <a href="<?php echo site_url('Auth/register'); ?>" class="button">Register</a>
    <?php endif; ?>
</div>

        
        
          
</body>
</html>