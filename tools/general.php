<?php
class general{
	public $_link ;
	
	public function __construct (mysqli $link) {
		$this->_link = $link;
	}
public function list_profiles(){
$result = c_mysqli_call($this->_link, 'List_Profiles', "");
		if($result) {
		    foreach($result as $_row) {
    	    echo "<option>" . $_row['name'] . "</option>";
			}
		}
return $result;
}

public function check_permission($user, $root){
	$result = c_mysqli_call($this->_link, 'Check_Permission', "'$user', '$root'");
	if ($result == false){
		header('Location: ../');
	} 
return $result;
}

public function check_role(){
	$admin = false;
	$username = $_SESSION['user'];
	$result = c_mysqli_call($this->_link, 'Get_Profile', "'$username'");
	if ($result){
		foreach($result as $_row) {
    	    if ($_row['name'] == "Administrador"){
				$admin = true;    	    	
    	    }
		}
	}
	return $admin;
}

public function menu(){
$html = 
	'<div id="menu">
    <ul class="menu">';
$result = $this->check_role();
if ($result){
	$html .= '<li><a href="admin/" class="parent"><span>Administraci&oacute;n</span></a>
	           <div><ul>
               <li><a href="#" class="parent"><span>Usuario</span></a>
                    <div><ul>
                        <li><a href="admin/users/new.php"><span>Nuevo</span></a></li>
                        <li><a href="admin/users/modify.php"><span>Editar</span></a></li>
                        <li><a href="admin/users/admin/users/delete.php"><span>Eliminar</span></a></li>
                    </ul></div>
                </li>
                <li><a href="#" class="parent"><span>Categoria</span></a>
                    <div><ul>
                        <li><a href="admin/categories/new.php"><span>Nueva</span></a></li>
                        <li><a href="admin/categories/modify.php"><span>Editar</span></a></li>
                    </ul></div>
                </li>   
               </ul></div>
        </li>	
        <li><a href="editor/" class="parent"><span>Editor</span></a>
	           <div><ul>
               <li><a href="#" class="parent"><span>Ejercicio</span></a>
                    <div><ul>
                        <li><a href="#"><span>Nuevo</span></a></li>
                        <li><a href="#"><span>Editar</span></a></li>
                        <li><a href="#"><span>Eliminar</span></a></li>
                    </ul></div>
                </li>
                <li><a href="#" class="parent"><span>Soluci&oacute;n</span></a>
                    <div><ul>
                        <li><a href="#"><span>Nueva</span></a></li>
                        <li><a href="#"><span>Editar</span></a></li>
                        <li><a href="#"><span>Eliminar</span></a></li>
                    </ul></div>
                </li>   
               </ul></div>
        </li>';    	    	
}
		
$html .= ' <li><a href="training/"><span>Entrenamiento</span></a></li>
        <li class="last"><a href="stats/"><span>Estad&iacute;sticas</span></a></li>
    	</ul>
		</div>';
echo $html;

return $result;
}
public function header(){
	$html = 
	'<div id="menu">
    <ul class="menu">
        <li><a href="index.php" class="parent"><span>Inicio</span></a></li>
        <li><a href="signin.php" class="parent"><span>Entrenamiento</span></a></li>
        <li><a href="help.php"><span>Ayuda</span></a></li>
        <li class="last"><a href="contact.php"><span>Contacto</span></a></li>
    </ul>
</div>';
	
	return $html;
}

public function footer(){
	$html = 
	'<div id="copyright">
		<center>Copyright &copy; 2012 <a href="about.php">Techess</a>
		</center>
		<a href="http://apycom.com/"></a>
	</div>';
	
	return $html;
}

public function close_header(){
	$html = 
	'	<div id="ingreso">
		<a class="" href="logout.php">Logout </a></span>
	</div>';
	return $html;
}

public function stat_redirect(){
	$admin = $this->check_role();
if ($admin){
		header('Location: ./admin.php');
}
else{
		header('Location: ./user.php');
	}
}



}
?>