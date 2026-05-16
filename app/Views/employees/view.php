<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Employee Data Table</title>
<?= view('layout/header.php') ?>
<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:Arial;
    background:#f4f6f9;
}

.wrapper{
    display:flex;
}

.sidebar{
    width:250px;
    min-height:100vh;
    background:#0b1c38;
    color:white;
    padding:20px;
}

.sidebar .logo{
    font-size:30px;
    font-weight:bold;
    margin-bottom:40px;
}

.sidebar .logo span{
    color:#4d7cff;
}

.sidebar ul{
    list-style:none;
}

.sidebar ul li{
    margin:15px 0;
}

.sidebar ul li a{
    color:white;
    text-decoration:none;
    display:block;
    padding:12px;
    border-radius:10px;
    transition:0.3s;
}

.sidebar ul li a:hover{
    background:#2d5cff;
}

.main{
    flex:1;
    padding:30px;
}

.topbar{
    background:white;
    padding:15px 20px;
    border-radius:15px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
    box-shadow:0 2px 10px rgba(0,0,0,0.05);
}

.table-container{
    background:white;
    padding:25px;
    border-radius:20px;
    box-shadow:0 2px 15px rgba(0,0,0,0.08);
}

.table-title{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.table-title h2{
    color:#0b1c38;
    font-weight:bold;
}

.btn-custom{
    border:none;
    padding:10px 18px;
    border-radius:10px;
    color:white;
    text-decoration:none;
    margin-left:8px;
}

.btn-add{
    background:#2d5cff;
}

.btn-excel{
    background:#28a745;
}

.btn-pdf{
    background:#dc3545;
}

.table img{
    width:45px;
    height:45px;
    border-radius:50%;
}

.badge-department{
    background:#dbe7ff;
    color:#2d5cff;
    padding:7px 12px;
    border-radius:20px;
    font-size:13px;
}

.action-btn{
    border:none;
    padding:7px 12px;
    border-radius:8px;
    color:white;
}

.btn-edit{
    background:#ffc107;
}

.btn-delete{
    background:#dc3545;
}

.dataTables_wrapper .dataTables_filter input{
    border-radius:10px;
    border:1px solid #ccc;
    padding:6px 10px;
}

@media(max-width:992px){

.wrapper{
    flex-direction:column;
}

.sidebar{
    width:100%;
    min-height:auto;
}

.table-title{
    flex-direction:column;
    gap:15px;
    align-items:flex-start;
}

}

</style>

</head>
<body>

<div class="wrapper">

<!-- Sidebar -->

<?= view('layout/sidebar') ?>


<!-- Main -->

<div class="main">

<div class="topbar">

<h4>Employee Management</h4>

<div>
Welcome,
<?= session()->get('name') ?>
</div>

</div>

<div class="table-container">

<div class="table-title">

<h2>
<i class="fa fa-users"></i>
 Employee List
</h2>

<div>

<a href="<?php echo base_url('/employee/excel');?>"
   class="btn-custom btn-excel">

<i class="fa fa-file-excel"></i>
 Excel

</a>

<a href="<?php echo base_url('/employee/pdf');?>"
   class="btn-custom btn-pdf">

<i class="fa fa-file-pdf"></i>
 PDF

</a>

<a href="<?php echo base_url('create');?>"
   class="btn-custom btn-add">

<i class="fa fa-plus"></i>
 Add Employee

</a>

</div>

</div>

<table id="employeeTable"
       class="table table-bordered table-hover align-middle">

<thead>

<tr>

<th>ID</th>
<th>Photo</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Department</th>
<th>Salary</th>
<th>Action</th>

</tr>

</thead>

<tbody>

<?php foreach($employees as $employee): ?>

<tr>

<td><?= $employee['id'] ?></td>

<td>
<!-- <img src="https://i.pravatar.cc/150?img=3"> -->
</td>

<td><?= $employee['name'] ?></td>

<td><?= $employee['email'] ?></td>

<td><?= $employee['phone'] ?></td>

<td>
<span class="badge-department">
<?= $employee['department'] ?>
</span>
</td>

<td>
₹<?= $employee['salary'] ?>
</td>

<td>


<a href="<?php echo base_url('edit');?>/<?= $employee['id'] ?>" class="btn btn-sm btn-warning">

<i class="fa fa-pen"></i>

</a>

<a href="<?= base_url('delete/' . $employee['id']); ?>" 
   class="btn btn-sm btn-danger" 
   onclick="return confirm('Are you sure you want to delete this employee?');">
    
<i class="fa fa-trash"></i>

</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

</div>

</div>

<!-- Scripts -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

<script>

$(document).ready(function () {

    $('#employeeTable').DataTable();

});

</script>

<?= view('layout/footer.php') ?>