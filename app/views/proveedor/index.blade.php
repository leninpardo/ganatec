
<div class="panel panel-default">
	<div class="panel-heading">
		Lista de Proveedores
		<a href="#modal-form" role="button" data-toggle="modal" onclick="nuevo()" class="btn btn-default pull-right btn-add">
			<i class="fa fa-plus"></i>
			Agregar
		</a>
	</div>
	<div class="panel-body">
		<div class="table-responsive"></div>
	</div>
</div>

<!-- Modal -->
<div id="modal-form" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
		<div class="modal-content">
		    <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 id="myModalLabel" class="blue bigger"></h4>
		    </div>
		    <div class="modal-body text-justify overflow-visible">
				<div id="bodymodal">
				    <form class="form-horizontal" id='formulario'>
						
						<div class="form-group has-info">
				    		<label for="nombre" class="col-xs-12 col-sm-3 control-label no-padding-right">
				    			Nombre
				    		</label>
				    		<div class="col-xs-12 col-sm-8">         
                                                    <input type="hidden" id="id_main" name="id" />
                                                    <input type="text" name="nombre" id="nombre"/>
							</div>
						</div>
                                        <div class="form-group has-info">
				    		<label for="nombre" class="col-xs-12 col-sm-3 control-label no-padding-right">
				    			Razon social
				    		</label>
				    		<div class="col-xs-12 col-sm-8">                              
                                                    <input type="text" name="razon_social" id="razon_social"/>
							</div>
						</div>
                                        <div class="form-group has-info">
				    		<label for="nombre" class="col-xs-12 col-sm-3 control-label no-padding-right">
				    			Ruc
				    		</label>
				    		<div class="col-xs-12 col-sm-8">                              
                                                    <input type="text" name="ruc" id="ruc"/>
							</div>
						</div>
                                        <div class="form-group has-info">
				    		<label for="nombre" class="col-xs-12 col-sm-3 control-label no-padding-right">
				    			direccion
				    		</label>
				    		<div class="col-xs-12 col-sm-8">                              
                                                    <input type="text" name="direccion" id="direccion"/>
							</div>
						</div>
					
				    </form>
				</div>
		    </div>
		    <div class="modal-footer">
				<div class="btn-footer">
				    <button class="btn btn-primary" onclick="validar('proveedor')" id="btn-save">
				    	<i class='icon-ok'></i>
				    	Guardar
				    </button>
				    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">
				    	<i class='icon-undo'></i>
				    	Cancelar
				    </button>
				</div>
				<div class="load-footer">
				    <img src="./assets/img/loading.gif" />
				    Guardando...
				</div>
		    </div>
		</div>
	</div>
</div>
<script type="text/javascript">

	$('.load-footer, .lote, .animal').hide();
    var url = 'proveedor';
    var grid_table = $(".table-responsive");
    var col_names = ['Item', 'razon social', 'ruc', 'direccion', ''];
     var accion = ['edit','delete'];
    loadTable('GET', url+'/getProveedor', url, grid_table, col_names, accion);
    
 

    var validar = function(url)
    {
    	bval = true;   
        bval = bval && $("#nombre").required();
        bval = bval && $("#razon_social").required();    
        if (bval) 
        {
    		guardar(url);
        }
        return false;
    }

    var llenar_datos = function(data)
    {
    	$("#id_main").val(data[0].id);
    	$("#razon_social").val(data[0].razon_social);
        $("#nombre").val(data[0].nombre);
        $("#ruc").val(data[0].ruc);
        $("#direccion").val(data[0].direccion);
    }

	var limpiar = function()
	{
	    $('#id_main, #nombre, #razon_social, #ruc, #direccion').val('');
	}
</script>