<?php
include ("../session.inc");
	check_login($mysqli);
	$obj = new general($mysqli);
	$obj->theory_redirect();
?>