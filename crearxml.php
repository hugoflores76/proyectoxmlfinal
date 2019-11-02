<?php

$can=$_POST["cantidad"];

$stri="";

for ($i=0; $i < $can ; $i++) { 
    $stri.=$_POST['tags'][$i].",";
}
$stri=substr($stri,0,-1);
 $fp = fopen($_POST['nombreaArchivo'].".xml","w+");//crea el archivo
 fwrite($fp, '<?xml version="1.0" encoding="UTF-8" ?>' . PHP_EOL);//etiqueta xml
 // ------ aqui va el dtd-------

 
 fwrite($fp, '<!DOCTYPE '.$_POST['root'].' [' . PHP_EOL);// <!DOCTYPE facturas [
fwrite($fp, '<!ELEMENT '.$_POST['root'].' ('.$_POST['tagPrincipal'].')*>' . PHP_EOL);
    // <!ELEMENT facturas (cliente,producto,valor)*>

fwrite($fp, '<!ELEMENT '.$_POST['tagPrincipal'].' ('.$stri.')*>' . PHP_EOL);
fwrite($fp, '<!ATTLIST '.$_POST['tagPrincipal'].' id ID #REQUIRED>' . PHP_EOL);
// <!ATTLIST persona id ID #REQUIRED>
//--------- <!ELEMENT cliente (#PCDATA)>
     for ($i=0; $i < $can; $i++) { 
        fwrite($fp, '<!ELEMENT '.$_POST['tags'][$i].' (#PCDATA)>'. PHP_EOL); 
        if ($_POST['att'][$i]) {
            fwrite($fp, '<!ATTLIST '.$_POST['tags'][$i].' '.$_POST['att'][$i].' CDATA #REQUIRED>' . PHP_EOL);
            
        }
     }
 fwrite($fp,']>'.PHP_EOL);

 //----- inicia xml----------
 //------ root y principal -------------
 fwrite($fp, '<'.$_POST['root'].'>'. PHP_EOL);
  fwrite($fp, '<' .$_POST['tagPrincipal'].' id="'.$_POST['id'].'">'. PHP_EOL);
//-------hijos------------
for ($i=0; $i < $can; $i++) { 
    if ($_POST['att'][$i]) {
        fwrite($fp, '<'.$_POST['tags'][$i].' '.$_POST['att'][$i].'="'.$_POST['vl'][$i].'">'. PHP_EOL);
      fwrite($fp, '</'.$_POST['tags'][$i].'>'. PHP_EOL);
    }else{
     fwrite($fp, '<'.$_POST['tags'][$i].'>'. PHP_EOL);
      fwrite($fp, '</'.$_POST['tags'][$i].'>'. PHP_EOL);
    }
} 


//------fin hijos------
//------fin root------
 fwrite($fp, '</' .$_POST['tagPrincipal'].'>'. PHP_EOL);
 fwrite($fp, '</' .$_POST['root'].'>'. PHP_EOL);
 fclose($fp);


echo "<h1> has creado archivo xml</h1>";
echo "<a target='_blank' href='".$_POST['nombreaArchivo'].".xml'>mirar el xml</a> <br>";
echo "<a  href='formulario.php'>egresar</a>";

?>