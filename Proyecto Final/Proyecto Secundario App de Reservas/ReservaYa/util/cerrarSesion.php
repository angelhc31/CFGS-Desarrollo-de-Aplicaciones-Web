<?php
	session_start();
	setcookie(session_name(), '', time() - 1, '/');
	session_destroy();
    header('Location: ../index.php');
?>