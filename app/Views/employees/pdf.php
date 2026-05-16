<!DOCTYPE html>
<html>
<head>

<style>

body{
    font-family:Arial;
}

table{
    width:100%;
    border-collapse:collapse;
}

table,th,td{
    border:1px solid #000;
}

th,td{
    padding:10px;
    text-align:left;
}

h2{
    text-align:center;
}

</style>

</head>
<body>

<h2>Employees List</h2>

<table>

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Department</th>
    <th>Salary</th>
</tr>

<?php foreach($employees as $employee): ?>

<tr>

<td><?= $employee['id'] ?></td>
<td><?= $employee['name'] ?></td>
<td><?= $employee['email'] ?></td>
<td><?= $employee['phone'] ?></td>
<td><?= $employee['department'] ?></td>
<td><?= $employee['salary'] ?></td>

</tr>

<?php endforeach; ?>

</table>

</body>
</html>