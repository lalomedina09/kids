@extends('layouts.dashboard.base')

@section('dashboard-content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="m-0">
                Novedades en la plataforma
            </h4> <br>

            <ul class="list-group">
                <li class="list-group-item">
                    *Módulo de Asesorías
                    Couch le puede solicitar documentos al asesorado y está disponible la opción  de subir y listar documentos.
                    <ul>
                        <li>Relacionar Documentos</li>
                        <li>Couch envia comentarios y que documentos requiere</li>
                        <li>Asesorado puede subir los documentos</li>
                        <li>Ambos pueden descargar los documentos</li>
                    </ul>
                </li>
                <li class="list-group-item">
                    *Editar Perfil
                    <ul>
                        <li>
                            Nuevo Campo para agregar link de tiktok
                        </li>
                        <li>
                            Al ver un artículo podemos ver icono de tiktok
                        </li>
                    </ul>
                </li>
                <li class="list-group-item">
                    *Botón para descargar datos en excel de tabla de marketplace, por ahora descarga todos los datos posteriormente integramos los filtros
                </li>
                <li class="list-group-item">
                    *El couch ya puede subir varios archivos adjuntos
                </li>
                <li class="list-group-item">
                    *Genere y subi el sitemap.xml para Queridodinero
                </li>
                <li class="list-group-item">
                    *Nuevas funciones para el proceso de re agendar asesoría
                </li>
                <li class="list-group-item">
                    *Nuevo Sitio <a href="https://dear-money.com" target="_blank">dear-money.com</a> <br>
                    *Instalación de certificados SSL
                    *Administracion de posts con origen para dear money <br>
                    *Genere el sitemap.xml para las urls de dear money
                </li>
                <li class="list-group-item">
                    *Se cambio la página home por el blog
                    *Se desactivaron opciones del menu principal
                </li>
                <li class="list-group-item">
                    *Nuevas landings para campañas de QD Play
                </li>
                <li class="list-group-item">
                    *Instalación de libreria para facebook
                    *Instalación de librería para exportar importar en Excel
                </li>
                <li class="list-group-item">
                    *Funcion para actulizar la Url de un articulo
                    *Opcion para selecionar en que dominio sera visible el articulo
                </li>
                <li class="list-group-item">
                    *Landing de Registros Qdplay Empresas <br>
                    *Fecha de ultima actualizacion en los articulos publicados <br>
                    *Boton de descarga Excel en resultados de las landings <br>
                    *Agregue columnas en los resultados de landing para que se vea mas ordenada la información
                </li>
                <li class="list-group-item">
                    *Reagendar asesoria (Terminado espera de bugs) <br>
                    *Pagina de Notificaciones <br>
                    *Boton de acces directo a ver ordenes de compra <br>
                </li>
                <li class="list-group-item">
                    *Administración de categorias <br>
                    <ul>
                        <li>Agrega</li>
                        <li>Actualiza</li>
                        <li>Desactiva</li>
                    </ul>
                </li>
                <li class="list-group-item">
                    *Parametros > Precios > rating de precios<br>
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
