
<div class="panel panel-default">
	<div class="panel-heading">
		Listado de Animales
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped " border="1">
				<thead>
					<tr>
                                            <th rowspan="2">Nombre</th>
						<th rowspan="2">codigo</th>
						<th rowspan="2">Sexo</th>
						<th rowspan="2">Fecha Ingreso</th>
						<th  rowspan="2">Raza</th>
						<th rowspan="2">color</th>
						<th rowspan="2">caracteristicas</th>
                                                <th colspan="2">Proveedor</th>
                                                <th rowspan="2">Costo compra</th>
                                                 <th rowspan="2">Costo Mantencion</th>
                                                 <th rowspan="2">Total</th>
						
					</tr>
                                        <tr>
                                            <th>Razon social</th>
						<th>ruc</th>
						
                                        </tr>
				</thead>
				<tbody>
					@foreach($animals as $animal)
					<tr>
						<td>{{ $animal->nombre_ganado }}</td>
						<td>{{ $animal->codigo_ganado }}</td>
						<td>{{ $animal->sexo }}</td>
						<td>{{ $animal->fecha_ingreso }}</td>
						<td>{{ $animal->descripcion }}</td>
						<td>{{ $animal->color }}</td>
						<td>{{ $animal->caracteristicas }}</td>
						<td>{{ $animal->razon_social }}</td>
						<td>{{ $animal->ruc }}</td>
                                                <td>{{ $animal->costo }}</td>
                                                <td>{{ $animal->costo_potrero }}</td>
                                                <td>{{$animal->costo + $animal->costo_potrero }}</td>
						
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>