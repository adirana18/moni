<?php
session_start();
	if(empty($_SESSION['user_email']) AND empty($_SESSION['user_password'])){
		echo"<script>window.location='./';</script>";
	} 
?>