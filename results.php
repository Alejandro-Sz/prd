<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />



<title>Prodan A.C</title>

<link href="css/style1.css" rel="stylesheet" type="text/css">


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">

$("document").ready(function () {
	
	
/*		//Slider de imagenes
	$('.foto').click(function() {
		  clave = $(this).find('img').attr('data-title');
		
		  
		
		  
		  $.ajax({
						type:"GET",
						url:"detalles.php",
						data: "clave=" + clave,
						success: function(data){
							        $( ".pagin" ).remove();
									$('#todo').html(data);
						}
				});
    });
		
*/

	  $('.info').click(function(){
		 url = $(this).attr('href');
		 url1 = url + '.resultados';
		 
		 //alert(url1);
		 $( ".pagin" ).remove();
		 $( ".pagin1" ).remove();
		 $( "#numbers" ).remove();
		 $( "#numbers1" ).remove();
         $('#todo').load(url1);
		 	
			$('html, body').animate({
          		 scrollTop: '200%'
      		 },
       			1500);
       		return false;
  		});
  
  
	  

 

});


</script>


</head>

<body>


<div id="todo">

<div class="resultados">

	<?php
		$objConnect = mysql_connect("localhost","prodan_prodan","danpro") or die(mysql_error());
		$objDB = mysql_select_db("prodan_prodan");
		$strSQL = "SELECT * FROM adopciones";
		//echo $strSQL;
		$objQuery = mysql_query($strSQL);
		$Num_Rows = mysql_num_rows($objQuery);
		
		

		$Per_Page = 12;   // Per Page

		
		if(isset($_GET["Page"]))
		{
			$Page = $_GET["Page"];
		}else{
			$Page = 1;
		}

		$Prev_Page = $Page-1;
		$Next_Page = $Page+1;

		$Page_Start = (($Per_Page*$Page)-$Per_Page);
		if($Num_Rows<=$Per_Page)
		{
			$Num_Pages =1;
		}
		else if(($Num_Rows % $Per_Page)==0)
		{
			$Num_Pages =($Num_Rows/$Per_Page) ;
		}
		else
		{
			$Num_Pages =($Num_Rows/$Per_Page)+1;
			$Num_Pages = (int)$Num_Pages;
		}

		$strSQL .=" order  by llave ASC LIMIT $Page_Start , $Per_Page ";
		$objQuery  = mysql_query($strSQL);
		
			echo "<ul class='tags'>
				  <li><a>Todos</a></li>
				  
			  </ul>";
		
		if(empty($Num_Rows)){
			  echo "<div class='arrow_box'>
		          <h3>Amigo!, No hay registros!</h3>
		          <p>Por favor selecciona o busca con otros criterios, Gracias!!!.</p>
                </div>";
			}
			
		
	echo "<div id='numbers1' style='margin-top:1.7em; margin-left:0em; position:absolute'>Total: ".$Num_Rows ."  &nbsp|&nbsp P&aacute;gina :  </div>";	
			
		
		
		 	echo "<div class='pagin1'>";    
    	 echo "<ul id='pagin1'>";
		
		 echo "<li>";

		 if($Prev_Page)
		 {
			echo "<a class='info' href='$_SERVER[SCRIPT_NAME]?Page=1'> - Primero - </a>";
			echo "<a class='info' href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'>< Anterior </a>";
		 }
		
		
        $min = max($Page - 5, 1);
        $max = min($Page + 5, $Num_Pages);
		
		
	
		for($i=$min; $i<=$max; $i++){
			if($i != $Page)
			{
				echo "<a class='info' href='$_SERVER[SCRIPT_NAME]?Page=$i' data-name='$i'> {$i} </a>";
			}
			else
			{
				echo "<a class='current'><b> {$i} </b></a>";
			}
		}
	
		
		if($Page!=$Num_Pages)
		{
			echo "<a class='info' href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>Siguiente ></a>";
		}
		    echo "<a class='info' href='$_SERVER[SCRIPT_NAME]?Page=$Num_Pages'> - &Uacute;ltimo - </a>";
		echo "</li>";
        
		echo "</ul>";
		
	
        echo "</div>";		


	    echo "<table class='contenedor-tabla'>
		        <tr class='contenedor-fila'>";
		$intRows = 0;
		while($objResult = mysql_fetch_array($objQuery))
		{
			 
			 $intRows++;
			  echo "<td class='contenedor-columna'>";
		
			
		?>		
       		    
                     <div class='foto' onclick="window.open('detalles.php?clave=<?php echo $objResult['clave'] ?>');" style="cursor: hand; background-image:url('../fotos_adop/<?php echo $objResult['foto1'] ?>'); background-position:center; background-repeat:no-repeat; background-size:contain;">
                     
                     		
                            
                            <!--          		
                        	<img id='imagen' src="fotos_adop/<?php echo $objResult['foto1'] ?>"  class="tooltip_elemento center" data-title='<?php echo $objResult['clave'] ?>' data-icon='<?php echo $objResult['foto1'] ?>' style="width:680px; max-height:auto; width:inherit; ">
                    -->
                    
                      	 
                        <?php if($objResult['estatus']== "Adoptado"){ 
							echo "<div class='ribbon-wrapper-green'>
							        <div class='ribbon-green'>
									    Adoptado
								     </div>
								   </div>"; 
							
						}elseif($objResult['estatus']== "Comprometido"){
								  echo "<div class='ribbon-wrapper-red'>
							        <div class='ribbon-red'>
									    Comprometido
								     </div>
								   </div>"; 
								  
						 }?>
                          
                       
                      
                     </div>
               		 
                 
                   	<div class="sh" style="margin-left:0em; width:244px"> 
                   
                     <div class="nombre" >
                     	<div style="margin-left:0.2em; border:0px solid #009; 	letter-spacing: 0px; color:#FFF; word-wrap: break-word; ">
          					<center><?php echo ucwords($objResult['clave'] . " - " . $objResult['nombre']) ?></center>
                         </div>
                     </div>
                        
                       
                     
                           <div class="bubble">
                                <center><b>
                                <div style="color:#FFF;"><?php echo ucwords($objResult['sexo']) ?>
                                <br> 
                                <?php echo ucwords($objResult['edad']) ?> 
                                <br> 
                                <?php echo ucwords($objResult['raza']) ?> 
                                </b></div></center>
                             </div>
                             
                           
                             
                    </div>     
                     
             
             	
			
        <?php       
               
   			
			echo "</td>";
			
				if(($intRows)%4==0)
				{
					echo"</tr>";
				
				}
	  	}
		
		echo"</table>";
	   ?>

        
	</div>	
  </div>  
        
        
        
        
         <div id="numbers" style="margin-top:3.6em; margin-left:0em; position:absolute">Total: <?php echo $Num_Rows ?> | P&aacute;gina :  </div>
         <div class="pagin">    
    
    
		
        
		<?php
		
		echo "<ul id='pagin'>";
		
		echo "<li>";

		if($Prev_Page)
		{
			echo "<a class='info' href='$_SERVER[SCRIPT_NAME]?Page=1'> - Primero - </a>";
			echo "<a class='info' href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'>< Anterior </a>";		}
		
		
        $min = max($Page - 5, 1);
        $max = min($Page + 5, $Num_Pages);
		
		
	
		for($i=$min; $i<=$max; $i++){
			if($i != $Page)
			{
				echo "<a class='info' href='$_SERVER[SCRIPT_NAME]?Page=$i' data-name='$i'> {$i} </a>";
			}
			else
			{
				echo "<a class='current'><b> {$i} </b></a>";
			}
		}
	
		
		if($Page!=$Num_Pages)
		{
			echo "<a class='info' href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>Siguiente ></a>";
		}
			echo "<a class='info' href='$_SERVER[SCRIPT_NAME]?Page=$Num_Pages'> - &Uacute;ltimo - </a>";

		echo "</li>";
        
		echo "</ul>";
		
		mysql_close($objConnect);
		
		?>
        </div>
        

</div>



</body>
</html>

	