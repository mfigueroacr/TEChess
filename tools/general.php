<?php
class general{
	public $_link ;
	
	public function __construct (mysqli $link) {
		#$this->$link = $link ;
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
	$html .= '<li><a href="admin/" class="parent"><span>Administraci&oacute;n</span></a></li>
        <li><a href="editor/" class="parent"><span>Editor</span></a></li>';    	    	
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
        <li><a href="#" class="parent"><span>Inicio</span></a></li>
        <li><a href="signin.php" class="parent"><span>Entrenamiento</span></a></li>
        <li><a href="#"><span>Ayuda</span></a></li>
        <li class="last"><a href="#"><span>Contacto</span></a></li>
    </ul>
</div>';
	
	return $html;
}

public function stat_redirect(){
if ($this->check_role()){
		header('Location: ./admin.php');
}
		header('Location: ./user.php');
}



}
?>