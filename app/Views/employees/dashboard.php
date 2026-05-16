<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>EMS Dashboard</title>

<?=view('layout/header.php')?>
<?= view('layout/sidebar.php') ?> 
<div class="main">

<div class="topbar">

<h3>Dashboard</h3>

<div>
<i class="fa fa-bell"></i>
</div>

</div>

<div class="cards">

<div class="card-box">

<i class="fa fa-users text-primary"></i>

<h2><?= $employee_count; ?></h2>

<p>Total Employees</p>

</div>

<div class="card-box">

<i class="fa fa-user-plus text-success"></i>

<h2><?=$new_count;?></h2>

<p>New Employees</p>

</div>

<div class="card-box">

<i class="fa fa-building text-warning"></i>

<h2><?=$departments_count;?></h2>

<p>Departments</p>

</div>

<div class="card-box">

<i class="fa fa-dollar-sign text-danger"></i>

<h2><?=$totalSalary;?></h2>

<p>Total Payroll</p>

</div>

</div>

<div class="chart-section">

<!-- <div class="chart-box">

<h4>Employees Overview</h4>

<br>

<div class="fake-chart"></div>

</div> -->

<div class="table-box">

<h4>Recent Employees</h4>

<br>

<table class="table">

<tr>
<th>Name</th>
<th>Department</th>
<th>Salary</th>
</tr>
<?php foreach($employee as $employees): ?>
<tr>
<td><?php echo $employees['name']; ?></td>
<td><?php echo $employees['department']; ?></td>
<td><?php echo $employees['salary']; ?></td>


</tr>
<?php endforeach; ?>


</table>

</div>

</div>

<div class="employee-section">

<div class="d-flex justify-content-between mb-3">

<h4>Employees</h4>
<?php if (session()->getFlashdata('success')): ?>
    <div style="color: darkgreen; background-color: lightgreen; border: 1px solid #f5c6cb; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div>

<a href="<?php echo base_url('/employee/excel');?>" class="btn btn-success">
   Excel
</a>

<a href="<?php echo base_url('/employee/pdf');?>" class="btn btn-danger">
    Pdf
</a>

<a href="<?php echo base_url('create');?>" class="btn btn-primary">
    Add Employee
</a>

</div>

</div>

<table class="table table-bordered table-hover">

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Department</th>
<th>Salary</th>
<th>Action</th>
</tr>
<?php foreach($employee_all as $employees_all): ?>
<tr>

<td><?php echo $employees_all['id'];?></td>

<td><?php echo $employees_all['name']; 
?></td>

<td><?php echo $employees_all['email'];?></td>

<td><?php echo $employees_all['department'];?></td>

<td>$<?php echo $employees_all['salary'];?></td>

<td>

<a href="<?php echo base_url('edit');?>/<?= $employees_all['id'] ?>" class="btn btn-sm btn-warning">
    Edit
</a>


<a href="<?= base_url('delete/' . $employees_all['id']); ?>" 
   class="btn btn-sm btn-danger" 
   onclick="return confirm('Are you sure you want to delete this employee?');">
    Delete
</a>

</td>

</tr>

<?php endforeach; ?>

</table>

</div>

</div>

<?= view('layout/footer.php') ?> 