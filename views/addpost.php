<?php include('elements/admin_header.php');?>

<?php $edit = false; if(strpos("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",'edit') !== false) { $edit = true; } ?>
<div class="container">
	<div class="page-header">
   <?php if($edit) { echo '<h1>Edit Post</h1>'; } else { echo '<h1>Add Post</h1>'; } ?>
  </div>
  <?php if(isset($message) && $message){?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php echo $message?>
    </div>
  <?php }?>
  <div class="row">
      <div class="span8">
        <form action="<?php echo BASE_URL?><?php if($edit) { echo "addpost/"; } else { echo "addpost/"; } ?><?php if(isset($task)) echo $task; ?>" method="post" onsubmit="editor.post()">
          <label>Title</label>
          <input type="text" class="span6" name="post_title" value="<?php if(isset($title)) echo $title?>">
		  <?php if($edit) { echo '<label for="date">Date</label>'; } ?>
          <input type="<?php if($edit) { echo "text"; } else { echo "hidden"; }?>" name="date" value="<?php if($edit && isset($date)) { echo $date; } else { echo date("Y-m-d H:i:s"); } ?>"/>
		  <label>Category</label>
          <select class="span6" name="categoryID"><option disabled <?php if(!$edit) echo "selected"; ?> value>-- Select Category --</option>
			<?php
				$list = new Category();
				$i = 1;
				$categories = array();
				while($row = $list->getCategory($i)) {
					array_push($categories, $row);
					$i += 1;
				}
				for($i = 0; $i < count($categories); $i += 1) {
					$selected = '';
					if($categories[$i]["categoryID"] === $categoryID) { $selected = ' selected'; }
					echo '<option value="'.$categories[$i]["categoryID"].'"'.$selected.'>'.$categories[$i]["name"].'</option>';
				}
			?>
		  </select>
     			<label>Content</label>
          <textarea id="tinyeditor" name="post_content" style="width:556px;height: 200px"><?php if(isset($content)) echo $content?></textarea>
    			<br/>
          <input type="hidden" name="pID" value="<?php echo $pID; ?>"/>
		  <input type="hidden" name="uID" value="<?php if(isset($user)) { echo $user; } else { echo "1"; } ?>"/>
          <button id="submit" type="submit" class="btn btn-primary" >Submit</button>
        </form>        
      </div>
    </div>
</div>
<?php include('elements/admin_footer.php');?>

