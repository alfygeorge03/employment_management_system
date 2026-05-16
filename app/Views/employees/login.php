<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>EMS Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:Arial;
    height:100vh;
    background:linear-gradient(135deg,#0b1c38,#1e3c72);
    display:flex;
    justify-content:center;
    align-items:center;
}

.login-container{
    width:950px;
    background:white;
    border-radius:20px;
    overflow:hidden;
    display:flex;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
}

.left-side{
    width:50%;
    background:linear-gradient(135deg,#0b1c38,#2d5cff);
    color:white;
    padding:60px 40px;
    display:flex;
    flex-direction:column;
    justify-content:center;
}

.left-side h1{
    font-size:42px;
    margin-bottom:20px;
}

.left-side p{
    font-size:18px;
    line-height:1.8;
}

.left-side i{
    font-size:70px;
    margin-bottom:25px;
}

.right-side{
    width:50%;
    padding:60px 50px;
}

.login-title{
    text-align:center;
    margin-bottom:35px;
}

.login-title h2{
    font-size:35px;
    color:#0b1c38;
    margin-bottom:10px;
}

.login-title p{
    color:gray;
}

.form-group{
    margin-bottom:20px;
}

.form-group label{
    margin-bottom:8px;
    font-weight:600;
}

.input-box{
    position:relative;
}

.input-box i{
    position:absolute;
    top:15px;
    left:15px;
    color:gray;
}

.input-box input{
    width:100%;
    padding:12px 12px 12px 45px;
    border:1px solid #ccc;
    border-radius:10px;
    outline:none;
    transition:0.3s;
}

.input-box input:focus{
    border-color:#2d5cff;
    box-shadow:0 0 8px rgba(45,92,255,0.2);
}

.login-btn{
    width:100%;
    padding:12px;
    border:none;
    border-radius:10px;
    background:#2d5cff;
    color:white;
    font-size:17px;
    transition:0.3s;
}

.login-btn:hover{
    background:#1b45d9;
}

.extra-links{
    display:flex;
    justify-content:space-between;
    margin-top:15px;
}

.extra-links a{
    text-decoration:none;
    color:#2d5cff;
    font-size:14px;
}

.social-login{
    text-align:center;
    margin-top:30px;
}

.social-login p{
    margin-bottom:15px;
    color:gray;
}

.social-icons a{
    width:45px;
    height:45px;
    background:#f1f1f1;
    display:inline-flex;
    justify-content:center;
    align-items:center;
    border-radius:50%;
    margin:0 8px;
    color:#0b1c38;
    font-size:18px;
    transition:0.3s;
}

.social-icons a:hover{
    background:#2d5cff;
    color:white;
}

@media(max-width:900px){

.login-container{
    width:95%;
    flex-direction:column;
}

.left-side,
.right-side{
    width:100%;
}

.left-side{
    text-align:center;
    padding:40px 20px;
}

.right-side{
    padding:40px 25px;
}

}

</style>
</head>
<body>

<div class="login-container">

<div class="left-side">

<i class="fa fa-users"></i>

<h1>EMS</h1>

<p>
Employment Management System with secure login,
dashboard management, employee CRUD,
Excel/PDF export and responsive admin panel.
</p>

</div>

<div class="right-side">

<div class="login-title">

<h2>Welcome</h2>

<p>Login to continue</p>

<?php if (session()->getFlashdata('error')): ?>
    <div style="color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

</div>

<form method="post" action="<?php echo base_url('/login');?>">

<div class="form-group">

<label>Email</label>

<div class="input-box">

<i class="fa fa-user"></i>

<input type="text"
       name="emailid"
       placeholder="Enter Email Id" required>

</div>

</div>

<div class="form-group">

<label>Password</label>

<div class="input-box">

<i class="fa fa-lock"></i>

<input type="password"
       name="password"
       placeholder="Enter password" required>

</div>

</div>

<button type="submit" class="login-btn">
Login
</button>

<div class="extra-links">

<a href="#">
Forgot Password?
</a>



</div>

</form>



</div>

</div>

</div>

</body>
</html>