
@extends('layouts.navbar_admin')


@section('content')

{!!Html::style('css/reg_ubicacion.css')!!}
@include('administrador.modaladmin')
@include('administrador.modaladmineditar')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                
                    <div class="myform-top">
                          <h3> Sugerencias pendientes</h3>
                    </div>
                    <div id="message-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
                        <strong>Se agregó la sugerencia correctamente.</strong>
                    </div>
                    <div id="message-eliminar" class="alert alert-success alert-dismissible" role="alert" style="display:none">
                        <strong>Se eliminó la sugerencia correctamente.</strong>
                    </div>
                    <div id="message-editar" class="alert alert-success alert-dismissible" role="alert" style="display:none">
                        <strong>Se editó la sugerencia correctamente.</strong>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <h4>Corrige los siguientes errores:</h4>
                        <ul>
                            @foreach ($errors->all() as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                     @endif
                    
                <br>
                <div id="tipoempresa">
                    <button type="button" class="btn btn-dark" id="combo" value="combo">COMBO</button>
                    <button type="button" class="btn btn-dark" id="unidad" value="unidad">UNIDAD</button>
                </div>
                    
                <div class="panel-body" id="tablasugerencia">
                    <div id="lista-sugerencia">

                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#tablasugerencia').hide();
    });
</script>
<script>
    var id_global;
    var tipoproducto;
    var listaproductos=function(){
        $.ajax({
            type:'get',
            url:"{{ url('sugerencias') }}/"+tipoproducto,
            success: function(data){
                $('#lista-sugerencia').empty().html(data);
            }
        });
    }
    $(document).on("click",".pagination li a",function(e){
        e.preventDefault();
        var url=$(this).attr("href");
         $.ajax({
            type:'get',
            url:url,
            success: function(data){
                $('#lista-sugerencia').empty().html(data);
            }
        });

    });
    function Mostrar(id){
        id_global=id;
    }
    $('#modaleditar').on('shown.bs.modal', function () {
        $('#nombre').focus();
    });
    function Editar(id){
        var identi=id;
        route="{{ url('admin') }}/"+identi+"/edit";
        $.get(route,function(data){
            $("#nombre").val(data.nomproducto);
            $("#descripcion").val(data.descripcion);
            $("#id").val(data.id);
        });
    }
    function Eliminar(id){
        
        var identi=id;
        var token=$("#token").val();
         $.ajax({
            url:"{{ url('admin') }}/"+identi,
            headers: {'X-CSRF-TOKEN': token},
            type: 'DELETE',
            dataType: 'json',
            success: function(data){
                listaproductos();
                if(data.success=='true'){
                    $("#message-eliminar").fadeIn();
                }
                
            }
        });
    }
    $("#modalactualizar").click(function(){
       var id=$("#id").val();
       var nombre=$("#nombre").val();
       var descripcion=$("#descripcion").val();
       var route ="{{ url('admin') }}/"+id;
      
       var token=$("#token").val(); 
       $.ajax({
           url:route,
           headers:{'X-CSRF-TOKEN':token},
           type:'PUT',
           dataType:'json',
           data:{
               nombre:nombre,
               id:id,
               descripcion:descripcion,
           },
           success:function(data) {
                if(data.success=='true'){
                    listaproductos();
                    $("#modaladmineditar").modal('toggle');
                    $("#message-editar").fadeIn();
                }else if(data.success=='false'){
                    $("#message-success2").fadeIn();
                
                }
                else if(data.errors) {
                    if(data.errors.nombre){
                        $('#nombre-error').html(data.errors.nombre[0] );
                    }
                    if(data.errors.descripcion){
                        $('#descripcion-error').html(data.errors.descripcion[0] );
                    }
                }
            },
       });
    })
  
    $('#modanadmin').on('shown.bs.modal', function () {
        $('#etiqueta').focus();
    });
    $('body').on('click', '#modalaceptar', function(){
       
       var identi=id_global;
       var etic=$("#etiqueta").val(); 
       var route ="{{ url('admin') }}";
       $( '#etiqueta-error' ).html( "" );
       var token=$("#token").val(); 
       $.ajax({
           url:route,
           headers:{'X-CSRF-TOKEN':token},
           type:'POST',
           dataType:'json',
           data:{
               id:identi,
               etiqueta:etic,
           },
           success:function(data) {
                if(data.success=='true'){
                    listaproductos();
                    $("#modanadmin").modal('toggle');
                    $("#message-success").fadeIn();
                }else if(data.success=='false'){
                    $("#message-success2").fadeIn();
                
                }
                else if(data.errors) {
                    if(data.errors.etiqueta){
                        $('#etiqueta-error').html(data.errors.etiqueta[0] );
                    }
                }
            },
       });
       
   });
  
    $("#combo").on( "click", function() {
            $('#tablasugerencia').show();
            tipoproducto=$("#combo").val();
            listaproductos();
        });
    $("#unidad").on( "click", function() {
        $('#tablasugerencia').show();
        tipoproducto=$("#unidad").val();
        listaproductos();
    });
    
</script>
@endsection