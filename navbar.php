	<?php
		if (isset($title))
		{
      include("modal/cambiar_password.php");
	?>
<nav class="navbar navbar-default ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand" href="#"><img src="img/Imagen1.jpg" style="width: 40px;height: 20px;"></a>
    <ul class="nav navbar-nav"> 
   
       





    <li class="<?php echo $active_clientes;?>"><a href="#" title='Cambiar contraseña' onclick="get_user_id('<?php echo $_SESSION['user_id'];?>');" data-toggle="modal" data-target="#myModal3"><i  class='glyphicon glyphicon-user'></i> Usuario  <b><?php echo $_SESSION['user_name'];?></b></a></li>
     <!--<li><a href="reportecierrecaja.php" target='_blank'><i class='glyphicon glyphicon-envelope'></i> Reporte</a></li>-->
       </ul>
 <ul class="nav navbar-nav"> 
  <?php if( $_SESSION['opcion_personal']==1){?>
      <li class="<?php echo $active_clientes;?>"><a href="usuarios.php" title='Control de Pedido'><i class='glyphicon glyphicon-edit'></i>  Usuarios</a></li>  
      <?php }  ?>
    
      <?php if( $_SESSION['opcion_pedido']==1){?>
             <li class="<?php echo $active_productos;?>"><a href="productos.php" title='Productos'><i class='glyphicon glyphicon-shopping-cart'></i> Productos</a></li>
      <?php }  ?>

       </ul>


      <ul class="nav navbar-nav navbar-right">      
     
		<li><a href="login.php?logout"><i class='glyphicon glyphicon-off'></i> Salir</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<?php
		}
	?>