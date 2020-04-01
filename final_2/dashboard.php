<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Proyecto final Programación IV</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- Estilos -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
</head>
<body>
<!--Cuadro principal  -->
<div class="container-fluid">
	<h3 class="text-uppercase text-center mt-2">Proyecto final Programación IV</h3>
	<!-- Botón abrir modal -->
	<div class="form-group">
		<button id="btn_insertar" class="btn btn-default" title="Insertar nuevo usuario" data-toggle="modal" data-target="#ventanaModal"><i class="fa fa-user"></i></button>
		<button id="btn_insertar_deposito" class="btn btn-default" title="Insertar Deposito" data-toggle="modal" data-target="#ventanaDepositos"><i class="fa fa-house"></i>Depositos</button>
		<button id="btn_insertar_marcas" class="btn btn-default" title="Insertar Marca" data-toggle="modal" data-target="#ventanaMarcas"><i class="fa fa-house"></i>Marcas</button>
		<button id="btn_insertar_grupos" class="btn btn-default" title="Insertar Grupos" data-toggle="modal" data-target="#ventanaGrupos"><i class="fa fa-house"></i>Grupos</button>
		<button id="btn_insertar_grupos" class="btn btn-default" title="Insertar Subgrupos" data-toggle="modal" data-target="#ventanaSubgrupos"><i class="fa fa-house"></i>SubGrupos</button>

	</div>
	
	<!-- Input campo de búsqueda -->
	<div class="form-group">
		<input type="text" id="txt_busqueda" class="form-control" placeholder="Escriba aquí su término de búsqueda">
	</div>

	<!-- Tabla -->
	<div id="div_tabla">

	</div>
	<!-- Fin Tabla -->

	<!-- Paginación -->
	<div class="d-flex justify-content-center paginas" >
		<nav aria-label="Page navigation example" class="">
		  <ul class="pagination" id="pagination">

		  </ul>
		</nav>
	</div>
	<!-- Fin Paginación -->
	<h1 class="text-center">Tabla Movimientos depositos</h1>
	
			
			
	
	<!-- Tabla -->
	<div id="div_tabla_depositos">
		
	</div>
	<!-- Fin Tabla -->

	<!-- Paginación -->
	<div class="d-flex justify-content-center paginas" >
		<nav aria-label="Page navigation example" class="">
		  <ul class="pagination" id="pagination">

		  </ul>
		</nav>
	</div>
	<!-- Fin Paginación -->
</div>
<!--Fin cuadro principal   -->

<!-- Modal-->
<div class="modal fade" id="ventanaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    	<!-- div para mostrar la alerta -->
  	<div id="alerta"></div>

	<!-- Cabecera modal -->
    	<div class="modal-header">
       	 	<h5 class="modal-title h4 text-center text-uppercase">Insertar un nuevo Concepto</h5>
        	 	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	 		 <span aria-hidden="true">&times;</span>
       		 </button>
     	</div>
     	<!-- Fin cabecera modal -->

	<!-- Cuerpo  modal -->
      	<div class="modal-body">
		<!-- Gif "Cargando" -->
		<div class="form-group d-none" id="gif">
			<label><img src="images/ajax-loader.gif"> Procesando...</label>
		</div>
		<!-- Campos ocultos -->
		<div class="form-group">
			<input type="hidden" id="opcion">
			<input type="hidden" id="concepto_id">
		</div>
		<!-- Campo Sku -->
		<div class="form-group">
			<label for="">Sku: </label>
			<input type="text" id="txt_sku" class="form-control" placeholder="Ingrese el sku">
		</div>
		<!-- Campo Nombre -->
		<div class="form-group">
			<label for="">Nombre: </label>
			<input type="text" id="txt_nombre" class="form-control" placeholder="Ingrese el nombre">
		</div>
		<!-- Campo Codigo -->
		<div class="form-group">
			<label for="">codigo: </label>
			<input type="text" id="txt_codigo" class="form-control" placeholder="Ingrese el codigo">
		</div>
     	
		 <!-- Campo Referencia -->
		<div class="form-group">
			<label for="">Referencia: </label>
			<input type="text" id="txt_referencia" class="form-control" placeholder="Ingrese la referencia">
		</div>
     	
		 <!-- Campo Descripcion -->
		<div class="form-group">
			<label for="">Descripcion: </label>
			<input type="text" id="txt_descripcion" class="form-control" placeholder="Ingrese la descripcion ">
		</div>
     	
		 <!-- Campo precio -->
		<div class="form-group">
			<label for="">Precio: </label>
			<input type="text" id="txt_precio" class="form-control" placeholder="Ingrese el precio">
		</div>
     	
		 <!-- Campo costo -->
		<div class="form-group">
			<label for="">Costo: </label>
			<input type="text" id="txt_costo" class="form-control" placeholder="Ingrese el costo">
		</div>
     
		 <!-- Campo Ultimo Costo -->
		<div class="form-group">
			<label for="">Ultimo costo: </label>
			<input type="text" id="txt_ultimocosto" class="form-control" placeholder="Ingrese el ultimo costo">
		</div>
     	
		 <!-- Campo utilidad -->
		<div class="form-group">
			<label for="">Utilidad: </label>
			<input type="text" id="txt_utilidad" class="form-control" placeholder="Ingrese su utilidad">
		</div>
     	
		 <!-- Campo Grupp -->
		<div class="form-group">
			<label for="">Grupo: </label>
			<input type="text" id="txt_grupo" class="form-control" placeholder="Ingrese el grupo">
		</div>
     	
		 <!-- Campo Subgrupo -->
		<div class="form-group">
			<label for="">Subgrupo: </label>
			<input type="text" id="txt_subgrupo" class="form-control" placeholder="Ingrese el subgrupo">
		</div>
     	
		 <!-- Campo Marca -->
		<div class="form-group">
			<label for="">Marca: </label>
			<input type="text" id="txt_marca" class="form-control" placeholder="Ingrese la marca">
		</div>
     	
		 <!-- Campo Codigo -->
		<div class="form-group">
			<label for="">Unidad: </label>
			<input type="text" id="txt_unidad" class="form-control" placeholder="Ingrese la utilidad">
		</div>
     	</div>
     	 <!-- Fin cuerpo modal -->

	<!-- Pie del modal -->
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		<button type="button" class="btn btn-primary" id="btn_guardar_cambios">Guardar cambios</button>
	</div>
	<!-- Fin pie modal -->
</div>
</div>
</div>
<!-- Fin modal -->

<!-- Modal-->
<div class="modal fade" id="ventanaDepositos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    	<!-- div para mostrar la alerta -->
  	<div id="alerta"></div>

	<!-- Cabecera modal -->
    	<div class="modal-header">
       	 	<h5 class="modal-title h4 text-center text-uppercase">Insertar un nuevo Deposito</h5>
        	 	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	 		 <span aria-hidden="true">&times;</span>
       		 </button>
     	</div>
     	<!-- Fin cabecera modal -->

	<!-- Cuerpo  modal -->
      	<div class="modal-body">
		<!-- Gif "Cargando" -->
		<div class="form-group d-none" id="gif">
			<label><img src="images/ajax-loader.gif"> Procesando...</label>
		</div>
		<!-- Campos ocultos -->
		<div class="form-group">
			<input type="hidden" id="opcion">
			<input type="hidden" id="deposito_id">
		</div>
		<!-- Campo Nombre -->
		<div class="form-group">
			<label for="">Nombre: </label>
			<input type="text" id="txt_deposito_nombre" class="form-control" placeholder="Ingrese el nombre">
		</div>
		
     	</div>
     	 <!-- Fin cuerpo modal -->

	<!-- Pie del modal -->
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		<button type="button" class="btn btn-primary" id="btn_guardar_deposito">Guardar Deposito</button>
	</div>
	<!-- Fin pie modal -->
</div>
</div>
</div>
<!-- Fin modal -->



<!-- Modal-->
<div class="modal fade" id="ventanaMarcas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    	<!-- div para mostrar la alerta -->
  	<div id="alerta"></div>

	<!-- Cabecera modal -->
    	<div class="modal-header">
       	 	<h5 class="modal-title h4 text-center text-uppercase">Insertar una nueva Marca</h5>
        	 	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	 		 <span aria-hidden="true">&times;</span>
       		 </button>
     	</div>
     	<!-- Fin cabecera modal -->

	<!-- Cuerpo  modal -->
      	<div class="modal-body">
		<!-- Gif "Cargando" -->
		<div class="form-group d-none" id="gif">
			<label><img src="images/ajax-loader.gif"> Procesando...</label>
		</div>
		<!-- Campos ocultos -->
		<div class="form-group">
			<input type="hidden" id="opcion">
			<input type="hidden" id="marca_id">
		</div>
		<!-- Campo Nombre -->
		<div class="form-group">
			<label for="">Nombre: </label>
			<input type="text" id="txt_nombre_marca" class="form-control" placeholder="Ingrese el nombre">
		</div>
		
     	</div>
     	 <!-- Fin cuerpo modal -->

	<!-- Pie del modal -->
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		<button type="button" class="btn btn-primary" id="btn_guardar_marca">Guardar marca</button>
	</div>
	<!-- Fin pie modal -->
</div>
</div>
</div>
<!-- Fin modal -->


<!-- Modal-->
<div class="modal fade" id="ventanaGrupos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    	<!-- div para mostrar la alerta -->
  	<div id="alerta"></div>

	<!-- Cabecera modal -->
    	<div class="modal-header">
       	 	<h5 class="modal-title h4 text-center text-uppercase">Insertar un nuevo Grupo</h5>
        	 	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	 		 <span aria-hidden="true">&times;</span>
       		 </button>
     	</div>
     	<!-- Fin cabecera modal -->

	<!-- Cuerpo  modal -->
      	<div class="modal-body">
		<!-- Gif "Cargando" -->
		<div class="form-group d-none" id="gif">
			<label><img src="images/ajax-loader.gif"> Procesando...</label>
		</div>
		<!-- Campos ocultos -->
		<div class="form-group">
			<input type="hidden" id="opcion">
			<input type="hidden" id="grupo_id">
		</div>
		<!-- Campo Nombre -->
		<div class="form-group">
			<label for="">Nombre: </label>
			<input type="text" id="txt_grupo_text" class="form-control" placeholder="Ingrese el nombre">
		</div>
		
     	</div>
     	 <!-- Fin cuerpo modal -->

	<!-- Pie del modal -->
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		<button type="button" class="btn btn-primary" id="grupo">Guardar Grupo</button>
	</div>
	<!-- Fin pie modal -->
</div>
</div>
</div>
<!-- Fin modal -->


<!-- Modal-->
<div class="modal fade" id="ventanaSubgrupos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    	<!-- div para mostrar la alerta -->
  	<div id="alerta"></div>

	<!-- Cabecera modal -->
    	<div class="modal-header">
       	 	<h5 class="modal-title h4 text-center text-uppercase">Insertar un nuevo SubGrupo</h5>
        	 	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	 		 <span aria-hidden="true">&times;</span>
       		 </button>
     	</div>
     	<!-- Fin cabecera modal -->

	<!-- Cuerpo  modal -->
      	<div class="modal-body">
		<!-- Gif "Cargando" -->
		<div class="form-group d-none" id="gif">
			<label><img src="images/ajax-loader.gif"> Procesando...</label>
		</div>
		<!-- Campos ocultos -->
		<div class="form-group">
			<input type="hidden" id="opcion">
			<input type="hidden" id="subgrupo_id">
		</div>
		<!-- Campo Nombre -->
		<div class="form-group">
			<label for="">Nombre: </label>
			<input type="text" id="txt_subgrupo_nombre" class="form-control" placeholder="Ingrese el nombre">
		</div>
		<!-- Campo Nombre -->
		<div class="form-group">
			<label for="">Grupo: </label>
			<input type="text" id="txt_grupo_id" class="form-control" placeholder="Ingrese el nombre">
		</div>
		
     	</div>
     	 <!-- Fin cuerpo modal -->

	<!-- Pie del modal -->
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		<button type="button" class="btn btn-primary" id="subgrupo">Guardar Grupo</button>
	</div>
	<!-- Fin pie modal -->
</div>
</div>
</div>
<!-- Fin modal -->






<!-- Javascript -->
<script src="js/jquery.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
