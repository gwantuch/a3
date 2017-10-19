<?php include('elements/header.php');?>
<?php 
if( isset($user) && is_array($user) ) {
	extract($user);?>

<div class="container">
	<div class="page-header">

<h1><?php echo 'Member '.$uID;?></h1>
  </div>
<?php echo strval($first_name.' '.$last_name)?><br>
<?php echo '<a href="mailto:'.$email.'">'.$email.'</a>';?>

</div>
<?php } ?>

<?php if( isset($users) && is_array($users) ) {?>

<div class="container">
<div class="page-header">

<h1>Members</h1>
  </div>

	<?php foreach($users as $u){?>
		<a href="<?php echo BASE_URL.'members/view/'.$u['uID']; ?>"><h3><?php echo $u['email'];?></h3></a>
		<?php echo strval($u['first_name'].' '.$u['last_name'])?><br>
		<?php echo '<a href="mailto:'.$u['email'].'">'.$u['email'].'</a>';?>
<?php }?>
</div>

<?php }?>


<?php include('elements/footer.php');?>