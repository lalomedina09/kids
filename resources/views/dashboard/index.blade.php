@extends('layouts.dashboard.base')

@section('dashboard-content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="m-0">
                Novedades en la plataforma
            </h4> <br>

            <ul class="list-group">
                <li class="list-group-item">
                    Reagendar asesoria(En proceso) <br>
                    *Pagina de Notificaciones (En Proceso) <br>
                    *Boton de acces directo a ver ordenes de compra <br>
                </li>
                <li class="list-group-item">
                    Administracion de categorias en la pestaña de Administración <br>
                    *Agrega <br>
                    *Actualiza <br>
                    *Desactiva <br>
                </li>
                <li class="list-group-item">
                    *Parametros > Precios > rating de precios<br>
                    * <br>
                </li>
                <li class="list-group-item">
                    * <br>
                    * <br>
                </li>
            </ul>
        </div>
        <!--<div class="col-md-4">
            <a class="btn btn-primary mt-2 disabled" href="{{ url('settings') }}">
                 Configuración básica proximamente
            </a>
        </div>-->
    </div>
@endsection
