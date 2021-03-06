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


	public function list_profiles2change($username){
$result = c_mysqli_call($this->_link, 'Profiles_toChange', "'$username'");
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

	public function admin_role(){
	$admin = false;
	if (isset ($_SESSION['user'])){
		$username = $_SESSION['user'];
		$result = c_mysqli_call($this->_link, 'Get_Profile', "'$username'");
		if ($result){
			foreach($result as $_row) {
	    	    if ($_row['name'] == "Administrador"){
					$admin = true;    	    	
	    	    }
			}
		}
	}
	return $admin;
}

	public function menu($indirection=""){
$html = 
	'<div id="menu">
    <ul class="menu">
    <li><a href="'.$indirection.'index.php" class="parent"><span>Inicio</span></a></li>';
$result = $this->admin_role();
if ($result){
	$html .= ' <li><a href="'.$indirection.'lessons/" class="parent"><span>Lecciones</span></a>
			   </li>
			   <li><a href="#" class="parent"><span>Administraci&oacute;n</span></a>
	           <div><ul>
               <li><a href="#" class="parent"><span>Usuario</span></a>
                    <div><ul>
                        <li><a href="'.$indirection.'admin/users/new.php"><span>Nuevo</span></a></li>
                        <li><a href="'.$indirection.'admin/users/search.php"><span>Editar</span></a></li>
                        <li><a href="'.$indirection.'admin/users/view.php"><span>Ver</span></a></li>
                        <li><a href="'.$indirection.'admin/users/delete.php"><span>Eliminar</span></a></li>
                    </ul></div>
                </li>
                <li><a href="#" class="parent"><span>Categoria</span></a>
                    <div><ul>
                        <li><a href="'. $indirection. 'admin/categories/new.php"><span>Nueva</span></a></li>
                        <li><a href="'.$indirection.'admin/categories/modify.php"><span>Editar</span></a></li>
                    </ul></div>
                </li>   
                <li><a href="#" class="parent"><span>Base de datos</span></a>
                    <div><ul>
                        <li><a href="'. $indirection. 'admin/database/backup.php"><span>Crear Respaldo</span></a></li>
                        <li><a href="'.$indirection.'admin/database/load.php"><span>Cargar Respaldo</span></a></li>
                    </ul></div>
                </li>
               </ul></div>
        </li>	
        <li><a href="#" class="parent"><span>Editor</span></a>
	           <div><ul>
               <li><a href="#" class="parent"><span>Ejercicio</span></a>
                    <div><ul>
                        <li><a href="'.$indirection.'editor/new.php"><span>Nuevo</span></a></li>' .
                        //<li><a href="'.$indirection.'editor/modify.php"><span>Editar</span></a></li>
                        '<li><a href="'.$indirection.'editor/delete.php"><span>Eliminar</span></a></li>
                    </ul></div>
                </li>'.
              /*  <li><a href="#" class="parent"><span>Soluci&oacute;n</span></a>
                    <div><ul>
                        <li><a href="'.$indirection.'editor/new_solution.php"><span>Nueva</span></a></li>
                        <li><a href="'.$indirection.'editor/delete_solution.php"><span>Eliminar</span></a></li>
                    </ul></div>
                </li>*/   
               '</ul></div>
        </li>';    	    	
}
if(isset($_SESSION['user'])){
$html .= ' <li><a href="'.$indirection.'training/"><span>Entrenamiento</span></a></li>
        <li class="last"><a href="'.$indirection.'stats/"><span>Estad&iacute;sticas</span></a></li>
        <li class="last"><a href="'.$indirection.'theory/"><span>Teor&iacute;a</span></a></li>';
        }
$html .='<li><a href="'.$indirection.'help.php"><span>Ayuda</span></a></li>
        <li class="last"><a href="'.$indirection.'contact.php"><span>Contacto</span></a></li>
        </ul>
		</div>';
echo $html;

return $result;
}
	
	public function header(){
	$html = 
	'<div id="menu">
    <ul class="menu">
        <li><a href="index.php" class="parent"><span>Inicio</span></a></li>' .
        // <li><a href="signin.php" class="parent"><span>Entrenamiento</span></a></li>
        '<li><a href="help.php"><span>Ayuda</span></a></li>
        <li class="last"><a href="contact.php"><span>Contacto</span></a></li>
    </ul>
</div>';
	
	return $html;
}

	public function footer($indirection=""){
	$html = 
	'<div id="copyright">
		<center>Copyright &copy; 2012 <a href="'.$indirection.'about.php"><img border=0 src="'.$indirection.'images/bandera.png" /></a>
		</center>
		<a href="http://apycom.com/"></a>
	</div>';
	return $html;
}
	
	public function stat_redirect(){
	$admin = $this->admin_role();
if ($admin){
		header('Location: ./admin.php');
}
else{
		header('Location: ./user.php');
	}
}


	public function theory_redirect(){
	$admin = $this->admin_role();
if ($admin){
		header('Location: ./admin.php');
}
else{
		header('Location: ./user.php');
	}
}

/* 
 *Hay que acomodar bien esto 
 */
public function login_header($indirection=""){
	$html = '<div id="menu" style="padding-left:830px; padding-top:10px;" > 
			<ul class="menu"><li>' ;
if (isset($_SESSION['user'])){
		$user = $_SESSION['user'];
		
		$html .=  '<a href="#" class="parent">[ '.$user.' ]</a>
	            <div><ul>
	            	<li><a href="'.$indirection.'change_password.php" ><span>Contraseña</span></a></li>
					<li><a class="" href="'.$indirection.'logout.php"><span>Salir</span></a></li>
				</ul></div> ';
	}
else {
	$html .= '<a class="parent" href="signin.php"><span>Ingresar</span></a>';
}
	$html .= '</li></ul> </div>';
	return $html;
}

}
?>