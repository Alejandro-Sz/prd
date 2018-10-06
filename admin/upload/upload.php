<?php
   // Edit upload location here
 //  $destination_path = getcwd().DIRECTORY_SEPARATOR;
   mysql_connect("localhost","prodan_prodan","danpro");
   mysql_select_db("prodan_prodan");
   
   $llave = $_POST['id'];

 
   $destination_path = '../../../fotos_adop/';

   $result = 0;
   $result1 = 0;
   $result2 = 0;  
   
   
   $target_path = $destination_path . basename( $_FILES['myfile']['name']);
   
   $target_path1 = $destination_path . basename( $_FILES['myfile1']['name']);
   
   $target_path2 = $destination_path . basename( $_FILES['myfile2']['name']);
   

   if(@move_uploaded_file($_FILES['myfile']['tmp_name'], $target_path)) {
      
	  
	  $nombre = $_FILES['myfile']['name'];
	  
	  $sql=mysql_query("UPDATE adopciones2 SET foto1='$nombre' WHERE llave='$llave'");
	  
	  $result = 1;
	  	
   
   }
   
   
   if(@move_uploaded_file($_FILES['myfile1']['tmp_name'], $target_path1)) {
      
	  
	  $nombre1 = $_FILES['myfile1']['name'];
	  
	  $sql=mysql_query("UPDATE adopciones2 SET foto2='$nombre1' WHERE llave='$llave'");
	  
	  $result1 = 1;
	  	
   
   }
   
   
     if(@move_uploaded_file($_FILES['myfile2']['tmp_name'], $target_path2)) {
      
	  
	  $nombre2 = $_FILES['myfile2']['name'];
	  
	  $sql=mysql_query("UPDATE adopciones2 SET foto3='$nombre2' WHERE llave='$llave'");
	  
	  $result2 = 1;
	  	
   
   }
   
 
   sleep(1);   
    
   
?>

<script language="javascript" type="text/javascript">window.top.window.stopUpload(<?php echo $result . "," .$result1 . "," .$result2; ?>);</script>   
