<select id="idmarca" class="chosen-select" data-live-search="true">
    @if (isset($marcas))
    	@foreach($marcas as $mar)
   			@if($marca->idmarca == $mar->idmarca)
    			<option value="{{$mar->idmarca}}" selected="true">{{$mar->marca}}</option>
    		@else
    			<option value="{{$mar->idmarca}}">{{$mar->marca}}</option>
    		@endif
    	@endforeach
    @endif
</select>


<script type="text/javascript">
    $('.chosen-select').chosen({width: "100%"});
</script>
