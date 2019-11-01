<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <div>
<ul class="horizontal">
    <li><a href="http://uaotrabjos.hfcestudio.com/">Home</a></li>
</ul>
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="parlantes.jpg" alt="Los Angeles" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="proyector2.jpg" alt="Chicago" width="1100" height="500">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
</div>
<div>
     <input type="button" class="btn btn-primary" id="cl" value="clientes">
            <input type="button" class="btn btn-primary" id="fa" value="factura">
</div>
<div class="container d-none" id="seccliente" >
    <div class="row">
    <!-- botonera -->
        <div class="col-sm" id="derecha">
           
        </div>
    <!-- formulario clientes -->
        <div class="col-sm" id="centro" >
         <h2 class="text-center">Formulario para ingreso de Clientes</h2>
                <form method="post" id="formulario" >
                    <div class="form-group ">
                        <label for="ejemploNombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre"  aria-describedby="emailHelp" placeholder="Nombre">
                    </div>
                    <div class="form-group ">
                        <label for="ejemploNombre">Apellido</label>
                        <input type="text" class="form-control" name="apellido" placeholder="apellido">
                    </div>
                    <div class="form-group ">
                        <label for="ejemploNombre">Codigo</label>
                        <input type="text" class="form-control" name="codigo" placeholder="Codigo">
                    </div>
                    
                    <input type="button" name="ingresar" id="ingresar" class="btn btn-primary" value="Ingresar">           
                    <input type="button" name="mostrar" id="mostrar" class="btn btn-primary" value="Mostrar"> 
                </form> 
        </div>
        <!-- tablaclientes -->
        <div class="col-sm d-none" id="izquierda">
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

         </div>
    </div>

</div>

<!-- OTRO CONTAINER -->
<div class="container d-none " id="secfactura">
    <div class="row">
    <!-- botonera -->
        <div class="col-sm" id="derecha">
            
        </div>
    <!-- formulario FACTURAS -->

        <div class="col-sm" id="centro">
        <h2 class="text-center">Formulario para ingreso de facturas</h2>
                <form method="post" id="factura" >
                    <div class="form-group ">
                        <label >Codigo Cliente</label>
                         <select class="form-control" name="codcli" required >
                            <option value="" disabled selected>Seleccione...</option>
                            <?php                                 
                               $clientes=simplexml_load_file("Clientes.xml");
                                   
                                    foreach ($clientes as $key => $value) {
                                            echo "<option value='".$value['id']."' >".$value->nombre." ".$value->apellido." </option>";
                                    };      
                               
                                 ?>
                               
                            </select>
                      
                    </div>
                    
                    <div class="form-group ">
                        <label >fecha</label>
                         <input type="date" name="fecha">
                   
                    </div>
                    <div class="form-group ">
                        <label >valor</label>
                        <input type="text" class="form-control" name="valor" placeholder="valor">
                    </div>
                    
                    <input type="button" name="agregarf" id="agregarf" class="btn btn-primary" value="Ingresar">           
                    <input type="button" name="mostrarfac" id="mosTblFac" class="btn btn-primary" value="Mostrar">         
                    <input type="button" name="hide" id="hides" class="btn btn-primary d-none" value="ocultar">         
                
                </form>  
        </div>
        <!-- tablaclientes -->
        <div class="col-sm d-none" id="izquierda2">
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

         </div>
    </div>

</div>
</body>
</html>
<script src="jquery-3.4.1.min.js" type="text/javascript"></script>  
<script>    
$(document).ready(function(){

    $('#cl').click(function () {
         $('#secfactura').addClass("d-none");
        $('#seccliente').toggleClass("d-none");
     
       
    });
     $('#fa').click(function () {
       
         $('#seccliente').addClass("d-none");  
       
        $('#secfactura').toggleClass("d-none");
    });
     
//mostrar la tabla clientes
     $('#mostrar').click(function () {
            $("#izquierda").toggleClass("d-none");
          
           
     });
//mostrar la tabla factura
      $('#mosTblFac').click(function () {
           $("#izquierda2").toggleClass("d-none");
     });
// cerrar tabla factura

     $("#hides").click(function () {
          $("#izquierda2").toggle();
     });
//ingresar nuevo clienta
 
     $("#ingresar").click(function () {
        $.ajax({
        type:"POST",
        dataType: 'html',
       url: "llenarpersonas.php",
       data: $("#formulario").serialize(),
       success: function(resp){         
             $("#formulario")[0].reset();  
             window.location.reload(true);
            $("#izquierda").load("tablaClientes.php");
      }
         
     });
     
    });

//ingresar nueva facura

  $("#agregarf").click(function () {
      $.ajax({
        type:"POST",
        dataType: 'html',
        url: "llenarfactura.php",
        data: $("#factura").serialize(),
        success: function(resp){         
            $("#factura")[0].reset();  
         $("#izquierda2").load("tablafacturas.php");
        }
        
    });
    
   });
   
   
});


</script>
