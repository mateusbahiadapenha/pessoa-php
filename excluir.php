<?php
require_once "Usuario.php";
$excluir = $_REQUEST['ex'];
$ex = new Usuario;
$ex->delete($excluir);
header("Location: form.php");
?>




