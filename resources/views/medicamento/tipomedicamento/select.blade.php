<select id="idtipo" class="chosen-select" data-live-search="true">
    @if (isset($tipos))
    	@foreach($tipos as $tip)
   			@if($tipo->idtipo == $tip->idtipo)
    			<option value="{{$tip->idtipo}}" selected="true">{{$tip->tipomedic}}</option>
    		@else
    			<option value="{{$tip->idtipo}}">{{$tip->tipomedic}}</option>
    		@endif
    	@endforeach
    @endif
</select>


<script type="text/javascript">
    $('.chosen-select').chosen({width: "100%"});
</script>
