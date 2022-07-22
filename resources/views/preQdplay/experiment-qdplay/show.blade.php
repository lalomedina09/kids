@extends('layouts.app')

@if (app()->environment() === 'production')
    @push('scripts-inline')
        @include('preQdplay.components.fb-convercion')
    @endpush
@endif


@include('preQdplay.experiment-qdplay.components.show.style')

@section('content')
    <link href="{{asset('/index_files/etapa1.css')}}" rel="stylesheet">
    <link href="{{asset('/index_files/app.css')}}" rel="stylesheet">


    {{-- --}}
    <div class="container">
        <div style="margin-left: 1%; margin-right: 1%;">

            @include('preQdplay.experiment-qdplay.components.show.video-principal')
            {{--@include('preQdplay.experiment-qdplay.components.show.video-principal')--}}

            @include('preQdplay.experiment-qdplay.components.show.temario')

            @include('preQdplay.experiment-qdplay.components.show.lo-que-aprenderas')

            @include('preQdplay.experiment-qdplay.components.show.expositor')

            @include('preQdplay.experiment-qdplay.components.show.descargables')

            {{--@include('preQdplay.experiment-qdplay.components.show.include_package')--}}
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="text-center mb-5 mt-4">
                        @if ($statusBuy == 0)
                            <a href="@auth # @else #login-modal @endauth"
                                class="btn btn-pill bg-green-blue text-white font-size-md font-weight-normal font-weight-bold text-transform-none btn-rounded"
                                @auth data-fullmodal="#modal-checkout" @else data-toggle="modal" @endauth>
                                Compra el paquete <span class="text-black">por sólo $299 MXN</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- --}}
    @auth
        @if ($statusBuy == 0)
            @include('preQdplay.components.checkout')

            @push('scripts')
                <script type="text/javascript" src="{{ mix('js/courses/checkout.js') }}"></script>
            @endpush
        @endif
    @endauth

@endsection

<script type="text/javascript" src="{{asset('/index_files/manifest.js.descarga')}}"></script>
<script type="text/javascript" src="{{asset('/index_files/vendor.js.descarga')}}"></script>
<script type="text/javascript" src="{{asset('/index_files/app.js.descarga')}}"></script>
<script type="text/javascript" src="{{asset('/index_files/etapa1.js.descarga')}}"></script>
<script type="text/javascript">
    var mas_lecciones = document.getElementById('mas-lecciones');
    var mas_comentarios = document.getElementById('mas-comentarios');

    function toggle_area(area_id) {
      let area = $(document.getElementById(area_id));
      if (area.hasClass('collapse'))
        area.removeClass('collapse');
      else
        area.addClass('collapse');
      return false;
    }

    function toggle_mas_lecciones() {
      if (mas_lecciones == null)
        return false;

      mas_lecciones.className = (mas_lecciones.className == 'collapse' ? '' : 'collapse');
      return false;
    }

    function toggle_mas_comentarios() {
      if (mas_comentarios == null)
        return false;

      mas_comentarios.className = (mas_comentarios.className == 'collapse' ? '' : 'collapse');
      return false;
    }
  </script>
