<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
                    <!-- <div>
                    	<div class="form-group">
                            <label>Nit Empresa</label>
                            <select class="form-control" name="nitEM" required >
                            <option value="" disabled selected>Seleccione...</option>
                            <?php                                 
                               $clientes=simplexml_load_file("Clientes.xml");
                                   
                                    foreach ($clientes as $key => $value) {
                                            echo "<option value='' >".$value['id']." </option>";
                                    };      
                               
                                 ?>
                            </select>
                        </div>
                    </div> -->
                    <input type="button" name="nombre" id="ingresar" class="btn btn-primary" value="Ingresar">           
                
                </form> 
                <h2 id="visor">aqui</h2>       
</body>
</html>
<script src="jquery-3.4.1.min.js" type="text/javascript"></script>  
<script>
$(document).ready(function(){ 
 

   $("#ingresar").click(function () {
      $.ajax({
        type:"POST",
        dataType: 'html',
        url: "llenarfactura.php",
        data: $("#factura").serialize(),
        success: function(resp){

           $("#visor").text(resp);
            $("#formulario")[0].reset();  
        alert(resp)
        }
        
    });
    
   });
   
});

// function act_estado(){
//     $.ajax({
//         type:"POST",
//         dataType: 'html',
//         url: "llenarfactura.php",
//         data: $("#formulario").serialize(),
//         success: function(resp){

//               $("#visor").text(resp);
//              //$("#formulario")[0].reset();  
        
//         }
        
//     });
// }
</script>