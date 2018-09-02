<?php
include('php/login/Usuarios.php');
session_start();
Usuarios::LogOff();
header('Location: login.php');
 ?>
