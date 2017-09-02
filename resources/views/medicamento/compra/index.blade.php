@extends ('layouts.index')

@section('estilos')
    @parent
        <link href="{{asset('assets/plugins/select2/select2.css')}}" rel="stylesheet" /> 
    @endsection

@section ('contenido')

<div class="tabs-container">
    <ul class="nav nav-tabs">
        <li class="active" data-toggle="tab" aria-expanded="false">
            <a data-toggle="tab" aria-expanded="false" onclick="cargar_formulario(4);">
                <span class="visible-xs"><i class="md md-perm-contact-cal"></i></span>
                <span class="hidden-xs">Compra</span>
            </a>
        </li>
    </ul>

    <div id="capa_modal" class="div_modal" style="display: none;"></div>
    <div id="capa_formularios" class="div_contenido" style="display: none;"></div>
    
</div>


@endsection

@section('fin')
    @parent
        <script src="{{asset('assets/js/listado.js')}}"></script>
    <script>cargar_formulario(4);</script>
@endsection