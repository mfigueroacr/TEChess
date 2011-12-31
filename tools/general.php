<?php
class general{
	public $_link ;
	
	public function __construct (mysqli $link) {
		#$this->$link = $link ;
		$this->_link = $link;
	}
public function list_profiles(){
	$html = "";
$result = c_mysqli_call($this->_link, 'List_Profiles', "");
		if($result) {
		    foreach($result as $_row) {
    	    echo "<option>" . $_row['name'] . "</option>\n";
			}
		}
return $result;
}

public function menu(){
$html = "<nav>";
$result = c_mysqli_call($this->_link, 'Get_Profile', "");
if ($result = "administrador"){
$html .= "<p><a href='admin/'>Administracion</a></p>
	      <p><a href='editor/'>Editor</a></p>";
}
$html .= "<p><a href='stats/'>Ejercicios</a></p>
   		  <p><a href='stats/'>Estadisticas</a></p>
			</nav>";

	/*	if($result) {
		    foreach($result as $_row) {
    	    echo "<option>" . $_row['name'] . "</option>\n";
			}
		}
	 */
echo $html;

return $result;
}

}
?>