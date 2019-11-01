<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
                    
                    <input type="button" name="nombre" id="ingresar" class="btn btn-primary" value="Ingresar">           
                
                </form>        
</body>
</html>
<script src="jquery-3.4.1.min.js" type="text/javascript"></script>  
<script>
$(document).ready(function(){ 
 

   $("#ingresar").click(function () {
      act_estado();
    //  $("#visor").text("res");
   });
   
});

function act_estado(){
    $.ajax({
        type:"POST",
        dataType: 'html',
        url: "llenarpersonas.php",
        data: $("#formulario").serialize(),
        success: function(resp){

            $("#visor").text(resp);
             $("#formulario")[0].reset();  
        
        }
        
    });
}
</script>