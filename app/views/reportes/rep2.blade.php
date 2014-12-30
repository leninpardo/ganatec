
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
						<th>Fecha Actividad</th>
						<th>sub actividad</th>
						<th>descripcion</th>
						<th>cantidad</th>
						<th>precio</th>
						<th>total</th>
                                                <th>Tipo</th>
					</tr>
				</thead>
				<tbody>
					@foreach($prods as $prod)
					<tr>
						<td>{{ $prod->id }}</td>
						<td>{{ $prod->fecha_actividad }}</td>
						<td>{{ $prod->sub_actividad }}</td>
						<td>{{ $prod->descripcion }}</td>
						<td>{{ $prod->cantidad }}</td>
						<td>{{ $prod->precio }}</td>
                                                <td>{{ $prod->total }}</td>
                                                <td>{{ $prod->tipo }}</td>
                                                
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>