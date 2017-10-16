<select id="anomaliafam" class="chosen-select" style="width:350px;"  multiple data-placeholder="Seleccione ...">
                                                @if (isset($anomalia))
                                                    @foreach($anomalia as $ano)
                                                        <option value="{{$ano->idanomalia}}">{{$ano->anomalia}},&nbsp;&nbsp;</option>
                                                    @endforeach
                                                @endif
                                            </select>

<script type="text/javascript">
	$('.chosen-select').chosen({width: "100%"});
</script>