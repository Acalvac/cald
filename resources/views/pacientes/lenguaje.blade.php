<link href="{{asset('assets/css/plugins/select2/select2.min.css')}}" rel="stylesheet" />

<select id="idiomafam" class="chosen-select form-control"  multiple data-placeholder="Seleccione ...">
    @if (isset($idioma))
        @foreach($idioma as $idis)
            <option value="{{$idis->ididioma}}">{{$idis->nombreid}},&nbsp;&nbsp;</option>
        @endforeach
    @endif
</select>

<script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>

<script type="text/javascript">
	$('.chosen-select').chosen({width: "100%"});
</script>