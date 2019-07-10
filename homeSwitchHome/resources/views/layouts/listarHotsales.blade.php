@extends('layouts.baseapp')

@section('content')

@include('inc.mensajeError')
<div class="containes col-md-12" style="margin-top: 20px; margin-bottom: 50px">
         <h1 class="col-md-12 text-center bg-info" style=" margin-bottom: 30px;border-radius: 25px;border-style: double;"> Hotsales
         </h1>

@if((count($hotsales)) == 0)
	<div class="container text-center bg-warning" style="border-radius: 25px; margin-bottom: 60px"><br><p><b>No hay hotsales disponibles</p></b><br></div>
@else
		@foreach($hotsales as $hotsale)
		<?php

			//Podes listar todos los detalles que quieras porque no hay una historia que sea "ver detalles hotsale"
			//Es lo mismo que en el listar subasta basicamente los datos que podes sacar

			$hospedaje = DB::table('hospedajes')
				->select('titulo', 'imagen' )
				->where('id', $hotsale->id_hospedaje)
				->first();
				echo $hospedaje->titulo;
		?>
		<div class="col-md-4">
				<img src="/images/{{ $hospedaje->imagen }}" width="250" height="160" style="display:block; margin:auto">
			</div>
			<div class="col-md-8" style="padding-top: 20px; padding-left: 20px">
				<p><b>Fecha de ingreso:</b> {{ Carbon\Carbon::parse($hotsale->fecha_inicio)->format('d-m-Y') }} </p>
				<p><b>Fecha de egreso:</b> {{ Carbon\Carbon::parse($hotsale->fecha_fin)->format('d-m-Y') }}</p>

				<p><b>Precio:</b> {{ '$'.$hotsale->precio_base }}</p>

				@if( Session('nombreUsuario') != 'Andrea')
					<form class='form' method='post' action='/reservarhotsale'>
						{{ csrf_field() }}
						<div class="col-group col-md-12">
							<input type="hidden"   name="idSubasta" value="{{ $hotsale->id_subasta }}">
							<button class="col-md-4 col-group btn btn-success" type='submit'>
								Reservar
							</button>
						</div>
					</form>
				@endif
				<hr>
		</div>
		@endforeach
@endif
</div>
@endsection
