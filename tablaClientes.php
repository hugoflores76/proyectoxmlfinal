<?php
$clientes=simplexml_load_file("Clientes.xml");
echo "<table class='table table-striped table-bordered table-hover'>
        <thead>
            <tr>
             <th>numeroID</th>
             <th>nombre</th>
             <th>apellido</th>
			</tr>
        </thead>
        <tbody>";
        foreach ($clientes as $key => $value) {
            echo   "<tr><th>". $value['id']." </th>";
            echo   "<th>". $value->nombre." </th>";
            echo   "<th>". $value->apellido." </th>";
            echo "<tr>";                
        }
        echo "</tbody></table>";
        
?>