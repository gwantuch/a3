<?php include('elements/header.php');?>
<?php 
if( isset($post) && is_array($post) ) {
	extract($post);?>

<div class="container">
	<div class="page-header">

<h1><?php echo $title;?></h1>
<h5><?php echo strval($last_name.', '.$first_name).' -- '. date('F d, Y',strtotime($date));?></h5>
  </div>

<?php echo $content;?>

</div>
<?php } ?>

<?php if( isset($posts) && is_array($posts) ) {?>

<div class="container">
<div class="page-header">

<h1><?php echo $title;?></h1>
  </div>

	<?php foreach($posts as $p){?>
    <h3><a href="<?php echo BASE_URL?>blog/view/<?php echo $p['pID'];?>" title="<?php echo $p['title'];?>"><?php echo $p['title'];?></a></h3>	
	<h5><?php echo strval($p['last_name'].', '.$p['first_name']).' -- '. date('F d, Y',strtotime($p['date']));?></h5>
	<p><?php echo $p['content'];?></p>
<?php }?>
</div>

<?php }?>


<?php include('elements/footer.php');?>