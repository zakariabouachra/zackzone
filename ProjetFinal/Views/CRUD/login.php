<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="/CoursCM_2/ProjetFinal/Views/CRUD/assets/styles/bootstrap.min.css">
    <link rel="stylesheet" href="/CoursCM_2/ProjetFinal/Views/CRUD/assets/styles/login.css">
</head>
<body>


<div class="container">
 
<form action="/CoursCM_2/ProjetFinal/Controllers/adminController.php?action=login" class="form-login" method="post">
    
<h2 class="form-login-heading">Admin Login</h2>

<input type="email" class="form-control" name="admin_email" placeholder="Email Address" required>
       
<input type="password" class="form-control" name="admin_pass" placeholder="Password" required>

<button type="submit" class="btn btn-lg btn-primary btn-block" name="admin_login">Log In</button>
        
</form>   
    
</div>
    
</body>
</html>

















