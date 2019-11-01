<?php
$facturas=simplexml_load_file("factura.xml");
echo "<table class='table table-striped table-bordered table-hover'>
        <thead>
            <tr>
             <th>numeroCliente</th>
             <th>codigoVenta</th>
             <th>fecha</th>
             <th>valor</th>
			</tr>
        </thead>
        <tbody>";
        foreach ($facturas as $key => $value) {
            echo   "<tr><th>". $value->cliente['num']." </th>";
            echo   "<th>". $value->venta['codigo']." </th>";
            echo   "<th>". $value->fecha." </th>";
            echo   "<th>". $value->valor." </th>";
            echo "<tr>";                
        }
        echo "</tbody></table>";
        
?>