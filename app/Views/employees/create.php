<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Add Employee</title>

<?=view('layout/header.php')?>

</head>
<body>

<div class="wrapper">

<!-- Sidebar -->


<?= view('layout/sidebar') ?> 


<!-- Main -->

<div class="main">

<div class="topbar">

<h4>
Add Employee
</h4>

<div>
Welcome,
<?= session()->get('name') ?>
</div>

</div>

<div class="form-container">

<div class="form-title">

<h2>
<i class="fa fa-user-pen form-icon"></i>
Add Employee Details
</h2>

</div>
<?php if (session()->getFlashdata('success')): ?>
    <div style="color: darkgreen; background-color: lightgreen; border: 1px solid #f5c6cb; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>


<form method="post"
      action="<?php echo base_url('store');?>">

<div class="row">

<div class="col-md-6 mb-4">

<label class="mb-2">
Full Name
</label>

<input type="text"
       name="name"
       class="form-control"
       required>

</div>

<div class="col-md-6 mb-4">

<label class="mb-2">
Email Address
</label>

<input type="email"
       name="email"
       class="form-control"
       required>

</div>

<div class="col-md-6 mb-4">

<label class="mb-2">
Phone Number
</label>

<input type="text"
       name="phone"
       class="form-control"
       required>

</div>

<!-- <div class="col-md-6 mb-4">

<label class="mb-2">
Department
</label>

<select name="department"
        class="form-control">

<option value="IT">IT</option>
<option value="HR">HR</option>
<option value="Finance">Finance</option>
<option value="Marketing">Marketing</option>

</select>
 -->
<!-- </div> -->

<div class="col-md-6 mb-4">

<label class="mb-2">
Department
</label>

<input type="text"
       name="department"
       class="form-control"
       value="" required>

</div>

<div class="col-md-6 mb-4">

<label class="mb-2">
Salary
</label>

<input type="number"
       name="salary"
       class="form-control"
       required>

</div>

<!-- <div class="col-12 mb-4">

<label class="mb-2">
Address
</label>

<textarea name="address"
          class="form-control">Kozhikode</textarea>

</div> -->

</div>

<div class="d-flex gap-3">

<button type="submit"
        class="btn-update">

<i class="fa fa-save"></i>
 Add Employee

</button>

<a href="<?php echo base_url('/dashboard');?>"
   class="btn-back">

<i class="fa fa-arrow-left"></i>
 Back

</a>

</div>

</form>

</div>

</div>

</div>

<?= view('layout/footer.php') ?>