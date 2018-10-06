<?php
	session_start();
	if ( !isset($_SESSION['username']) && !isset($_SESSION['userid']) ){
		if ( @$idcnx = @mysql_connect('localhost','prodan_prodan','danpro') ){
			
			if ( @mysql_select_db('prodan_prodan',$idcnx) ){
				
				$sql = 'SELECT * FROM qa_usuarios WHERE user="' . $_POST['login_username']. '" && passwd="' . $_POST['login_userpass'] . '" ';				
				
				
				if ( @$res = @mysql_query($sql) ){
					if ( @mysql_num_rows($res) == 1 ){
						
						$user = @mysql_fetch_array($res);
																		
						$_SESSION['username']	= $user['user'];
						$_SESSION['userid']	= $user['id'];
						$_SESSION['userpriv']	= $user['privilegio'];
						$_SESSION['usuario']	= $user['nombre'];
						
				        echo '1';		
					
					}
					else
						
						echo '0';
				}
				else
					
					echo '0';
				
				
			}
			
			mysql_close($idcnx);
		}
		else
			echo '0';
	}
	else{
		echo '0';
	}
?>