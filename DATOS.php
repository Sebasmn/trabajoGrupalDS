
<?php 
        require 'conexion.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" >
    <title>Cargar Datos</title>
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.8.2/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.8.2/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="../demo.css">
    <script type="text/javascript" src="jquery-easyui-1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-easyui-1.8.2/jquery.easyui.min.js"></script>
</head>
<body>
    <br>
    <center>
    <br>
    <form  method="post" class = "form_search">
        <input type="text" name="busqueda" id="busqueda" placeholder="Buscar"   >
        <input type="submit" value="Buscar" class="btn_search">
    </form>

    <br>

    <table id="dg" title="My Users" class="easyui-datagrid" style="width:700px;height:250px"
            
             pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="cedula" width="50">Cedula</th>
                <th field="nombre" width="50">Nombre</th>
                <th field="apellido" width="50">Apellido</th>
                <th field="correo" width="50">Correo</th>
                <th field="clave" width="50">Contraseña</th>
            </tr>
            
        </thead>
        
        <?php 
            $records = $conn->prepare("SELECT * FROM usuarios 
            WHERE   CEDULA = :cedula "   );

            $f= $_POST['busqueda'];
            $records->bindParam(':cedula', $_POST['busqueda']);
            $records->execute();
            $results = $records->fetch(PDO::FETCH_ASSOC);
            $cd = $results['ID'];
//

//
       
            foreach ( 
                $results as //$fila => $r
                $valor
             ) {
           // $mostrar = mysqli_fetch_array($result)
           echo  $valor . "<br/>";
                # code...
               
        ?>
        
        <tr>
            <td> <?php echo $results['ID']?></td>
            <td> <?php echo $results['NOMBRE']?></td>
            <td> <?php echo $results['APELLIDO']?></td>
            <td> <?php echo $results['CEDULA']?></td>
            <td> <?php echo $results['email']?></td>
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
</body>
</html>