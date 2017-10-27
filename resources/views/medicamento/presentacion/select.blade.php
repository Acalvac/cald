<select id="idpresentacion" class="chosen-select" data-live-search="true">
    @if (isset($presentaciones))
    	@foreach($presentaciones as $pre)
   			@if($presentacion->idpresentacion == $pre->idpresentacion)
    			<option value="{{$pre->idpresentacion}}" selected="true">{{$pre->nombre}}</option>
    		@else
    			<option value="{{$pre->idpresentacion}}">{{$pre->nombre}}</option>
    		@endif
    	@endforeach
    @endif
</select>


<script type="text/javascript">
    $('.chosen-select').chosen({width: "100%"});
</script>
