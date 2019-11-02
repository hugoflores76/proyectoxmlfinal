<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../jquery-3.4.1.min.js" type="text/javascript"></script> 
   
    <title>formulario crear xml</title>
</head>
<body>
    <div>
        <h1>crear xml</h1>
    </div>
    <div>
         <form  action="formulario.php" method="post" >
                      
                       <div class="form-group">
                        <label >numero de campos</label>
                        <input type="number" name="cantidad" min="1" max="5" value="1">
                    </div>
                      <input type="submit" name="crearTabla" id="crear" class="btn btn-primary" value="CrearTabla">
        </form>      
    
    </div>
    <div id="formulario">
        <form action="crearxml.php" method="post">
        <?php
        if (isset($_POST["cantidad"])) {
            $cantidad=$_POST["cantidad"];
            echo "<div class='form-group '>
                         <input type='hidden' name='cantidad' value='".$cantidad."'>
                       
                    </div>";
           echo "<div class='form-group '>
                        <label >id</label>
                        <input type='text' class='form-control' name='id'   placeholder='id'>
                    </div>";
            echo "<div class='form-group '>
                        <label >nombre de archivo</label>
                        <input type='text' class='form-control' name='nombreaArchivo'   placeholder='nomArchivo'>
                    </div>";
             echo "<div class='form-group '>
                        <label >root</label>
                        <input type='text' class='form-control' name='root'   placeholder='root'>
                    </div>";
             echo "<div class='form-group '>
                        <label >tagPrincipal</label>
                        <input type='text' class='form-control' name='tagPrincipal'   placeholder='tagPrincipal'>
                    </div>";
            for ($i=0; $i < $cantidad; $i++) { 
               echo "<div class='form-group '>
                        <label >tag".$i."</label>
                        <input type='text' class='form-control' name='tags[]'   placeholder='Nombrecampo".$i."'>
                        <input type='text' class='form-control' name='att[]'    placeholder='ATT".$i."'>
                        <input type='text' class='form-control' name='vl[]'    placeholder='valor".$i."'>
                    </div>";
            }
            echo '<input type="submit" name="enviar" id="ingresar" class="btn btn-primary" value="Ingresar"> ';
        }
        ?>          
                    
                   
         </form>
    </div>
    
    
  
</body>
</html>

<script>
  

     $(document).ready(function () {
       if ('#cbx0').attr('checked') {
           alert('puto')
       }
     });
</script>
