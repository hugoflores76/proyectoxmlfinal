<?php
/* $fp = fopen("Clientes.xml","w+");
 fwrite($fp, '<?xml version="1.0" encoding="UTF-8" ?>' . PHP_EOL);*/
// fwrite($fp, '<personas>'. PHP_EOL);
// fwrite($fp, '</personas>'. PHP_EOL);
// fclose($fp);
if (isset($_POST['codcli'])){
	$codcli= $_POST['codcli'];

	$fecha= $_POST['fecha'];
	$valor= $_POST['valor'];
	$out= $codcli." ".$fecha." ".$valor;
	 $facturas = simplexml_load_file("factura.xml");

	 $factura =$facturas->addchild("factura","");
		$cliente=$factura->addchild("cliente","");

		 $cliente->addAttribute("num",$codcli);
	 $venta =$factura->addchild("venta","");
		  $venta->addAttribute("codigo",$codcli);
	$fet=$factura->addChild("fecha",$fecha);
	$val=$factura->addChild("valor",$valor);
		
	
	 $facturas->asXML("factura.xml");
	 echo "agregado,".$out;
}

?>
