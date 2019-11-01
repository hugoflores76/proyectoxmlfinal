<?php
/* $fp = fopen("Clientes.xml","w+");
 fwrite($fp, '<?xml version="1.0" encoding="UTF-8" ?>' . PHP_EOL);*/
// fwrite($fp, '<personas>'. PHP_EOL);
// fwrite($fp, '</personas>'. PHP_EOL);
// fclose($fp);
if (isset($_POST['nombre'])){
	$nombre= $_POST['nombre'];
	$ape= $_POST['apellido'];
	$codigo= $_POST['codigo'];
	$personas = simplexml_load_file("Clientes.xml");
    $persona =$personas->addchild("persona","");
    $persona->addAttribute("id", $codigo);
	$persona->addChild("apellido", $ape);
	$persona->addChild("nombre", $nombre);   
	echo "agregado, codigo: ".$codigo;
	$personas->asXML("Clientes.xml");
}

?>