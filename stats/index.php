<?php
include ("../session.inc");
	check_login($mysqli);
	$obj = new general($mysqli);
	$obj->stat_redirect();
?>