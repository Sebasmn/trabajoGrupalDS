
<?php 
    $conexion = mysqli_connect('bqejlphwelhmqmqkgixg-mysql.services.clever-cloud.com','uf1l6xcn5mhhk7sm','S3YIznA9DyhJzOcS6JIm','bqejlphwelhmqmqkgixg');
    session_start();
   
    if ($_SESSION['rol'] == 1):
?>
<!DOCTYPE html>
<html lang="es" >
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="Alexander C, Sebastian M., Javier Q., Genesis R." />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Administrar farmacia</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="jquery-easyui-1.8.2/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="jquery-easyui-1.8.2/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="../demo.css">
        <script type="text/javascript" src="jquery-easyui-1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="jquery-easyui-1.8.2/jquery.easyui.min.js"></script>
    </head>
    <body id="page-top" 
  >   
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Bienvenido</a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php">Inicio</a></li>                      
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="comprar.php">Comprar</a></li>
                        <li><a 
                        id="botonAdmin"
                        style = "visibility:    hidden"
                        class="btn btn-primary js-scroll-trigger"
                         style="margin:15px" href="admin.php">
						 Administrador
						 </a></li>
                        
                        <li
                    
                        ><a 
                        id="botonCerrarSesion"
                        style = "visibility: hidden;"
                        class="btn btn-primary js-scroll-trigger" 
                        style="margin:15px"
                         href="salir.php">Cerrar sesión
                        </a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--ff Masthead-->
        <header class="masthead">
            <div class="container d-flex h-100 align-items-center">
            <br>
    <center>
    <br>
    <form  method="post" class = "form_search">
        <input type="text" value="" name="busqueda" id="busqueda" placeholder="Buscar"   >
        <input type="submit" value="Buscar" class="btn_search">
    </form>

    <br>

    <table id="dg" title="My Users" class="easyui-datagrid" style="width:700px;height:250px"
            
             pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="idfactura" width="50">ID FACTURA</th>
                <th field="cedula" width="50">CEDULA</th>
                <th field="nombre" width="50">NOMBRE</th>
                <th field="total" width="50">TOTAL</th>
                <th field="fecha" width="50">FECHA</th>
            </tr>
            
        </thead>
        
        <?php 

            if(isset($_POST['busqueda'])){
               
                $busqueda= $_POST['busqueda'];
            }else{
                $busqueda="";
            }
            $sql = "SELECT * FROM vista_Factura  WHERE IDFACTURA LIKE '%$busqueda%' ";
            $result = mysqli_query($conexion,$sql);
            // Conteo de usuarios
            $sentencia = "SELECT COUNT(IDFACTURA) AS TOTAL FROM vista_Factura";
            $conteo = mysqli_query($conexion,$sentencia);
            $respuesta = mysqli_fetch_assoc($conteo);
            while ($mostrar = mysqli_fetch_array($result)) {
                # code...
                
        ?>
        
        <tr>
            <td> <?php echo $mostrar['IDFACTURA']?></td>
            <td> <?php echo $mostrar['CEDULA']?></td>
            <td> <?php echo $mostrar['NOMBRE']. "  " .$mostrar['APELLIDO'] ?></td>
           <td> <?php echo $mostrar['TOTAL']?></td>
           <td> <?php echo $mostrar['FECHA']?></td>
        </tr>
        
            <?php 
            }?>
    </table>


    <div >
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">New User</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Edit User</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Remove User</a>
    </div>
    

    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Save</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
    </div>
    <script type="text/javascript">
        var url;
        function newUser(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','New User');
            $('#fm').form('clear');
            url = 'save_user.php';
        }
        function editUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Edit User');
                $('#fm').form('load',row);
                url = 'update_user.php?id='+row.id;
            }
        }


    </script>
            
    <br>

    </center>
            </div>
        </header>
        
        </section>
        
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container">
            Copyright © Primer Parcial 2020</div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
<?php
    else: header('Location:  index.php');
    endif;
?>