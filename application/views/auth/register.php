<form action="<?=site_url('auth/register_user');?> "method="POST">
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="password" required>
    <button type="submit">register</button>
    
</form>