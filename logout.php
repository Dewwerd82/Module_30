<?php
	unset($_SESSION['login']);
	session_destroy();
	array_map('unlink', glob("uploadslogout/*"));
	header("location: / ");
?>