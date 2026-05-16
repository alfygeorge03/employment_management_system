<div class="sidebar">

<div class="logo">
<span>EMS</span>
</div>
<div class="profile">

<img src="https://i.pravatar.cc/100" alt="">

<h5><?= session()->get('name') ?></h5>

<p>Online</p>

</div>

<ul>
	<li>
	<a href="<?php echo base_url('dashboard');?>">
	<i class="fa fa-home"></i>
	 Dashboard
	</a>
	</li>
	<li>
	<a href="<?php echo base_url('employee/view');?>">
	<i class="fa fa-users"></i>
	 Employees
	</a>
	</li>
	<li>
	<a href="#">
	<i class="fa fa-lock"></i>
	 Change Password
	</a>
	</li>

	<li>
	<a href="<?php echo base_url('logout');?>">
	<i class="fa fa-sign-out-alt"></i>
	 Logout
	</a>
	</li></ul>

</div>