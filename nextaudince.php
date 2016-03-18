<?php
include_once("database.php");
$db_object=new Dbconnect();
?>
<?php
$next;
$previous;
if($_POST)
{
   
   if(isset($_POST["nextlink"]))
   {
   
	 //  Initiate curl
      $ch = curl_init();
// Disable SSL verification
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
      curl_setopt($ch, CURLOPT_URL,$_POST["nextlink"]);
// Execute
      $result=curl_exec($ch);
// Closing
      curl_close($ch);

// Will dump a beauty json :3
     $getdata= json_decode($result, true);
$holdarrayid=array();
	 foreach($getdata as $data)
	 {
	    
		
		if(isset($data["next"]))
		{
		$next=$data["next"];
		}
		if(isset($data["previous"]))
		{
		$previous=$data["previous"];
		
		}
	     $i=0;
         foreach($data as $key=>$m)
	     {
		 
		 if(is_array($m) && count($m)!=0 && isset($m["name"]))
		 {
		 $i=$i+1;
	     $audience["audience_id"]=$m["id"];
	     $audience["account_id"]=$m["account_id"];
	     $audience["name"]=$m["name"];
	     $audience["subtype"]=$m["subtype"];
	     $audience["pixel_id"]=$m["pixel_id"];
	     $audience["size"]=$m["approximate_count"];
	     $audience["time_updated"]=$m["time_updated"];
	     $db_object->insert_data($audience);
         $holdarrayid[]=$m["id"];
	 //echo $i."====name==".$m["name"]."=id=".$m["id"]."==pixelid=".$m["pixel_id"]."=subtype=".$m["subtype"]."=time=".$m["time_updated"]."==account-id==".$m["account_id"]."==size=".$m["approximate_count"];  
	
		 }
		 
		 }
	   	 
	 }
	 $audinceid= implode(',',$holdarrayid);
   }
}
else
{
header('Location: https://app.redretarget.com/camodule/audience/');

}

?>

<?php include_once('header.php'); ?>
<script>
   function previous_action(){
	   document.getElementById("nextlink").value=document.getElementById("previouslink").value;
	   document.getElementById("audienceinfoform").submit();
   }
</script>


<form method="post" action="nextaudince.php" id="audienceinfoform">
   <div class="row">
      <div class="column_one">
         <?php 
            if(isset($previous) && !empty($previous)):
            ?>
         <input type="button" value="Previous" onClick="previous_action();" class="button_class"/>
         <input type="hidden" value="<?php echo $previous;?>" name="previouslink" id="previouslink">
         <?php
            endif;
            ?>
      </div>
      <div class="column_two">
         <?php
            $db_object->get_audince_info($audinceid);
            ?>
      </div>
      <div class="column_three">
         <?php
            if(isset($next) && !empty($next)):
            ?>
         <input type="hidden" value="<?php echo $next;?>" name="nextlink" id="nextlink">
         <input type="submit" value="Next" class="button_class">
         <?php
            endif;
            ?>
      </div>
   </div>
</form>

<?php include_once('footer.php'); ?>