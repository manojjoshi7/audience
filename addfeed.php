<?php include_once('header.php'); 
?>
<?php 
   $message="";
  if($_POST)
  {
     if(empty(trim($_POST["url"])))
	 {
	 $message="<div class='alert alert-danger'>*Enter Url";
	 }
     if(empty(trim($_POST["feedname"])))
	 {
	 $message=($message==""?"<div class='alert alert-danger'>*Enter Feed Name":$message."<br/>*Enter Feed Name");
	 }
	 if(empty(trim($_POST["catalogname"])))
	 {
	 $message=($message==""?"<div class='alert alert-danger'>*Enter Catalog Name":$message."<br/>*Enter Catalog Name");
	 }
	 else if(empty($message))
	 {
	 include_once("catalog.php");
	 $catalog=new Catalog();
$message=$catalog->create_catalog(trim($_POST["catalogname"]),trim($_POST["businessid_id"]),trim($_POST["pixel_id"]),trim($_POST["url"]),trim($_POST["feedname"]));
	 }
	 $message=(empty($message)?$message:$message."</div>");
  }
?>
<div  class="container">
<div class="row">
<div class="col-sm-12">
<h1>Add Product Feed</h1>
<?php
 echo $message;
?>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<form method="post" name="add_product_form">
<div class="form-group">
  <label>
  Catalog Feed 
  </label>
   <input type="url" required class="form-control" name="url" placeholder="Enter URL"/>
</div>
<div class="form-group">
  <label>
  Feed Name
  </label>
  <input type="text" required class="form-control" name="feedname" placeholder="Enter Feed Name"/>
</div>
<div class="form-group">
  <label>
  Catalog Name
  </label>
  <input type="text" required class="form-control" name="catalogname" placeholder="Enter Catalog Name"/>
</div>
<div class="form-group">
<label>
Choose FB Account
</label>
<select class="form-control" name="businessid_id">
<option value="914767425211118">redretargetapp</option>
<option value="538432952992102">Deepesh Account</option>
</select>
</div>
<div class="form-group">
<label>
Choose FB Pixel
</label>
<select class="form-control" name="pixel_id">
<option value="237340816467636">Thomas Bartke's</option>
<option value="1604876259777969">Trackify</option>
</select>
</div>
<div class="form-group">
   <input type="submit" value="Save"/>
</div>
</form>
</div>

</div>

</div>



<?php include_once('footer.php'); ?>