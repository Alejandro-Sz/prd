<?php
	
	    $id = $_POST['id'];	
		$estatusAdop = $_POST['estatusAdop'];
		
	
		
		mysql_connect("localhost","prodan_prodan","danpro");
        mysql_select_db("prodan_prodan");
		
        $sql=mysql_query("UPDATE quiero_adoptar SET estatusAdop='$estatusAdop' WHERE id='$id'");
		 
		 
	    echo $sql;

	?>
