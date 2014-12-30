
<div class="panel panel-default">
	<div class="panel-heading">
		Producciones
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
                                            <th>Item</th>
						<th>Fecha salida</th>
						<th>Codigo Ganado</th>
						<th>peso salida</th>
						<th>peso venta</th>
						<th>precio venta</th>
						<th>tipo salida</th>
                                                
					</tr>
				</thead>
				<tbody>
					@foreach($prods as $prod)
					<tr>
						<td>{{ $prod->id }}</td>
						<td>{{ $prod->fecha_salida }}</td>
						<td>{{ $prod->codigo_ganado }}</td>
						<td>{{ $prod->peso_salida }}</td>
						<td>{{ $prod->precio_venta }}</td>
                                                <td>{{ $prod->tipo_salida }}</td>
                                               
                                                
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>