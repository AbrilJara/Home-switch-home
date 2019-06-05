<?php 
use Illuminate\Support\Facades\DB;

?>


@extends('layouts.baseapp')
@section('content')

<div class="containes col-md-12" style="margin-bottom: 50px">
         <h1 class="col-md-12 text-center bg-info" style=" margin-bottom: 30px;border-radius: 25px;border-style: double;"> Hospedajes
         </h1>         
           
            @include('inc.mensajeExito')

            @if(count($hospedajes) == 0)
                Mensaje de no hay ningun hospedaje
            @endif   
        
            @foreach($hospedajes as $hospedaje)
                <div class="col-md-4" style="margin-bottom: 30px;">
                    <div class="card  text-white bg-dark" style="border-radius: 25px;">
                        
                            <img src="/images/{{ $hospedaje->imagen }}" style="border-radius: 25px;margin: 15px" width="350" height="270"  ></li>  
                        <hr/>
                        <div class="card-body" style="margin: 10px">
                            
                            <h4 class="card-title">
                        	    
                                    {{ $hospedaje->titulo }}
                                
                            </h4>
                        
                                <p class="card-text">
                                    Tipo: {{ $hospedaje->tipo_hospedaje }}
                                </p>
                            
                        	
                                <p class="card-text">
                                    Capacidad maxima: {{ $hospedaje->cantidad_maxima_personas }}
                                </p>
                                	
                        <hr/>
                            <a class="btn btn-info float-right" href="{{ url('/cargardetallehospedaje/'.$hospedaje->id) }}"> 
                                    <span class="glyphicon glyphicon-share-alt"></span> Ver detalles Hospedaje
                            </a>
                        </div>
                    </div>
            	</div>

            @endforeach	
        </ul>
    </div>
</div>
@endsection