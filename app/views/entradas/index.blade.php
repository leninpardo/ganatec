
<div class="panel panel-default">
	<div class="panel-heading">
		Lista de ganados
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
		    <div class="modal-body text-justify overflow-visible" style="max-height: 400px; overflow-y: auto">
				<div id="bodymodal">
				    <form class="form-horizontal" id='formulario'>
						<div class="form-group has-info">
				    		<label for="nombre" class="col-xs-12 col-sm-4 control-label no-padding-right">
				    			Nombre
				    		</label>
				    		<div class="col-xs-12 col-sm-7">
								<span class="block input-icon input-icon-right">
									<input type="hidden" id="id_main" name="id" />
									<input type="text" id="nombre" name="nombre" class="form-control"  />
								</span>
							</div>
						</div>
						<div class="form-group has-info">
				    		<label for="codigo" class="col-xs-12 col-sm-4 control-label no-padding-right">
				    			Codigo
				    		</label>
				    		<div class="col-xs-12 col-sm-7">
								<span class="block input-icon input-icon-right">
									<input type="text" id="codigo_ganado" name="codigo_ganado" class="form-control"  />
								</span>
							</div>
						</div>
						<div class="form-group has-info">
				    		<label for="sexo" class="col-xs-12 col-sm-4 control-label no-padding-right">
				    			Sexo
				    		</label>
				    		<div class="col-xs-12 col-sm-7">
								<span class="block input-icon input-icon-right">
                                                                    <select name="sexo" id="sexo">
                                                                        <option>::Seleccione::</option>
                                                                        <option>Hembra</option>
                                                                        <option>Macho</option>
                                                                    </select>
								</span>
							</div>
						</div>
						<div class="form-group has-info">
				    		<label for="fecha_ingreso" class="col-xs-12 col-sm-4 control-label no-padding-right">
				    			Fecha Ingreso
				    		</label>
				    		<div class="col-xs-12 col-sm-7">
								<span class="block input-icon input-icon-right">
									<input type="date" id="fecha_ingreso" name="fecha_ingreso" class="form-control"  />
								</span>
							</div>
						</div>
                                        <div class="form-group has-info">
				    		<label for="fecha_nac" class="col-xs-12 col-sm-4 control-label no-padding-right">
				    			Procedencia
				    		</label>
				    		<div class="col-xs-12 col-sm-7">
								<span class="block input-icon input-icon-right">
									<input type="text" id="procedencia" name="procedencia" class="form-control"  />
								</span>
							</div>
						</div>
                                        
						<div class="form-group has-info">
				    		<label for="proveedor" class="col-xs-12 col-sm-4 control-label no-padding-right">
				    			Proveedor
				    		</label>
				    		<div class="col-xs-12 col-sm-7">
								<select id="idproveedor" name="idproveedor" class="form-control"></select>
							</div>
						</div>
                                        
						<div class="form-group has-info">
				    		<label for="raza" class="col-xs-12 col-sm-4 control-label no-padding-right">
				    			Raza
				    		</label>
				    		<div class="col-xs-12 col-sm-7">
								<select id="idraza" name="idraza" class="form-control"></select>
							</div>
						</div>
						<div class="form-group has-info">
				    		<label for="color" class="col-xs-12 col-sm-4 control-label no-padding-right">
				    			Color
				    		</label>
				    		<div class="col-xs-12 col-sm-7">
                                                    <input type="text" name="color" id="color"/>
							</div>
						</div>
						<div class="form-group has-info">
				    		<label for="caracteristicas" class="col-xs-12 col-sm-4 control-label no-padding-right">
				    			Caracteristicas
				    		</label>
				    		<div class="col-xs-12 col-sm-7">
								<textarea id="caracteristicas" name="caracteristicas" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group has-info">
				    		<label for="observaciones" class="col-xs-12 col-sm-4 control-label no-padding-right">
				    			Observaciones
				    		</label>
				    		<div class="col-xs-12 col-sm-7">
								<textarea id="observaciones" name="observaciones" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group has-info">
				    		<label for="edad" class="col-xs-12 col-sm-4 control-label no-padding-right">
				    			Edad
				    		</label>
				    		<div class="col-xs-12 col-sm-7">
                                                    <input type="text" name="edad" id="edad"/>
							</div>
						</div>
                                        <div class="form-group has-info">
				    		<label for="peso_ingreso" class="col-xs-12 col-sm-4 control-label no-padding-right">
				    			peso ingreso
				    		</label>
				    		<div class="col-xs-12 col-sm-7">
                                                    <input type="text" name="peso_ingreso" id="peso_ingreso"/>
							</div>
						</div>
						<div class="form-group has-info">
				    		<label for="precio_compra" class="col-xs-12 col-sm-4 control-label no-padding-right">
				    			precio compra
				    		</label>
				    		<div class="col-xs-12 col-sm-7">
                                                    <input type="text" name="precio_compra" id="precio_compra"/>
							</div>
						</div>
                                        <div class="form-group has-info">
                                            <label for="costo_transporte" class="col-xs-12 col-sm-4 control-label no-padding-right">
                                                Costo transporte
                                            </label>
                                            <div class="col-xs-12 col-sm-7">
                                                <input type="text" name="costo_transporte" id="costo_transporte"/>
                                            </div>
                                        </div>
                                          <div class="form-group has-info">
                                            <label for="costo_transporte" class="col-xs-12 col-sm-4 control-label no-padding-right">
                                                Costo Vaquero
                                            </label>
                                            <div class="col-xs-12 col-sm-7">
                                                <input type="text" name="costo_vaquero" id="costo_vaquero"/>
                                            </div>
                                        </div>
                                        
				    </form>
				</div>
		    </div>
		    <div class="modal-footer">
				<div class="btn-footer">
				    <button class="btn btn-primary" onclick="validar('entradas')" id="btn-save">
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

	$('.load-footer').hide();
    var url = 'entradas';
    var grid_table = $(".table-responsive");
    var col_names = ['Item', 'Nombre', 'codigo', 'fecha ingreso','color','precio compra', ''];
    var accion = ['edit','delete'];
    loadTable('GET', url+'/getEntradas', url, grid_table, col_names, accion);
    $("#fecha_ingreso").datepicker();
    var proveedor = $("#idproveedor");
    $.ajax({
        type: 'GET',
        url: url+'/getProveedor',
        beforeSend: function() {
            proveedor.html(cargando);
        },
        success: function(data) {
            var cadena = '<option value="">Seleccione...</option>';
            for(var i=0; i<data.length; i++)
                cadena += '<option value="' + data[i].id + '">' + data[i].razon_social + '</option>';
            proveedor.empty().html(cadena);
        }
    });
 var raza = $("#idraza");
    $.ajax({
        type: 'GET',
        url: url+'/getRaza',
        beforeSend: function() {
            raza.html(cargando);
        },
        success: function(data) {
            var cadena = '<option value="">Seleccione...</option>';
            for(var i=0; i<data.length; i++)
                cadena += '<option value="' + data[i].id + '">' + data[i].descripcion + '</option>';
            raza.empty().html(cadena);
        }
    });
    
    var validar = function(url)
    {
    	bval = true;   
        bval = bval && $("#nombre").required();
        bval = bval && $("#codigo_ganado").required();
        bval = bval && $("#sexo").required();
        bval = bval && $("#fecha_ingreso").required();
        
        if (bval) 
        {
    		guardar(url);
        }
        return false;
    }

    var llenar_datos = function(data)
    {
    	$("#id_main").val(data[0].id);
    	$("#nombre").val(data[0].nombre_ganado);
    	$("#codigo_ganado").val(data[0].codigo_ganado);
    	$("#sexo").val(data[0].sexo);
    	$("#fecha_ingreso").val(data[0].fecha_ingreso);
    	$("#procedencia").val(data[0].procedencia);
    	$("#idproveedor").val(data[0].idproveedor);
    	$("#idraza").val(data[0].idraza);
    	$("#caracteristicas").val(data[0].caracteristicas);
    	$("#observaciones").val(data[0].observaciones);
    	$("#color").val(data[0].color);
    	$("#edad").val(data[0].edad);
    	$("#peso_ingreso").val(data[0].peso_ingreso);
        $("#precio_compra").val(data[0].precio_compra);
    	$("#costo_transporte").val(data[0].costo_transporte);
    	$("#costo_vaquero").val(data[0].costo_vaquero);
    }

	var limpiar = function()
	{
	    $('#id_main, #nombre, #codigo_ganado, #sexo, #fecha_ingreso, #idproveedor, #idraza, #color, #caracteristicas, #edad, #peso_ingreso, #precio_compra, #costo_transporte, #costo_vaquero').val('');
	}
</script>