<!DOCTYPE>
<html>
<head>
	<title>Listado Bienhechores</title>
</head>
<body>
<div class="row">
	<h3 class="text-center">Listado de Bienhechores</h3>
</div>
<div class="row">
	<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse;border-color:#ddd;">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Correo</th>
				<th>Dirección</th>
				<th>Teléfono</th>
			</tr>
		</thead>
		<tbody>
		@foreach($bienhechor as $em)
			<tr>
				<td>{{$em->nombre.' '.$em->apellido}}</td>
				<td>{{$em->correo}}</td>
		        <td>{{$em->direccion}}</td>
		        <td>{{$em->telefono}}</td>
	        </tr>
	    @endforeach
	   	</tbody>
	</table>
</div>
</body>
</html>