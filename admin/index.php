<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Prodan Administracion</title>
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
        
          
      <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
       <link href="css/flat-ui.css" rel="stylesheet">
       <link href="css/demo.css" rel="stylesheet">
       <link href="css/dashboard.css" rel="stylesheet">
  
   
   
		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript" src="functions.ajax.js"></script>
	</head>
	<body>
              
  
 <?php
if ( isset($_SESSION['username']) && isset($_SESSION['userid']) && $_SESSION['username'] != '' && $_SESSION['userid'] != '0' ){

 ?>
 <ul class="menu1">
 
    <li><a href="adopciones.php">Adopciones</a></li>
    <li><a href="quieroadoptar.php">Quiero Adoptar</a></li>
    <li><a href="usuarios.php">Usuarios</a></li>    
    
   <?php echo '<div class="nombre"> 
     Bienvenido:  <strong style="color:#3498db">'.$_SESSION['usuario'].'</strong> 
	 <div class="session_on">   
		<a href="javascript:void(0);" id="sessionKiller">Cerrar Sesión</a></p>
	 </div>
	 </div>
	 '; ?>
     
 </ul
	
	
<?php	}else{
		
		echo '<form method="post" action="">
		
		<div class="login">
        <div class="login-screen">
          	<div class="login-icon">
            	<img src="images/login/icon.png" alt="Welcome to Mail App" />          
          	</div>

          <div id="alertBoxes"></div>
		           			
	
            <form method="post" action="">
          		<div class="login-form">
            		<div class="form-group">
              			<input type="text" class="form-control login-field" value="" placeholder="Usuario" name="login_username" id="login_username" />
              			<label class="login-field-icon fui-user" for="login_username"></label>
            		</div>

            		<div class="form-group">
              			<input type="password" class="form-control login-field" value="" placeholder="Contraseña" name="login_userpass" id="login_userpass" />
              			<label class="login-field-icon fui-lock" for="login_userpass"></label>
            		</div>

            		<a class="btn btn-primary btn-lg btn-block" href="#" id="login_userbttn">Entrar</a>
          			          		</div>
              </form>  
                
                <span class="timer" id="timer"></span>
             
       
          	
            </span></span>
          
             
        </div>
        
        
      </div>
		
		
		
	</form>';
}
			?>
  
 

  
     



</div>


</body>
</html>