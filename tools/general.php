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
$html = "<nav>";
$result = $this->check_role();
if ($result){
	$html .= "<p><a href='admin/'>Administraci&oacute;n</a></p>
		    	<p><a href='editor/'>Editor</a></p>";    	    	
}
		
$html .= "<p><a href='stats/'>Ejercicios</a></p>
   		  <p><a href='stats/'>Estad&iacute;sticas</a></p>
			</nav>";
echo $html;

return $result;
}

public function stat_redirect(){
$html = "<nav>";
if ($this->check_role()){
		header('Location: ./admin.php');
}
		header('Location: ./user.php');

return $result;
}

}
?>