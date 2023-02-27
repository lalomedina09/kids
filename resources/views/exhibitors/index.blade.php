@extends('layouts.app')

@section('content')

    <div class="education__container image-background"
        style="background-image: linear-gradient(rgba(0, 0, 0, .66), rgba(0, 0, 0, .66)), url(/images/static/authors.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
                    <div class="align-items-center align-vertical">
                        <h1 class="text-uppercase text-white mb-4">@lang('Exhibitors')</h1>

                        <p class="text-danger text-justify mb-4">
                            Este es el equipo de expositores de Querido Dinero e invitados que comparten experiencias y conocimiento sobre los temas que nos apasionan.
                            Únete a la comunidad de expertos.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 mb-5">
        <div class="container">
            <ul class="nav list-unstyled education--list text-center mb-5">
                <a href="#escritores-querido-dinero"
                    class="nav-item text-uppercase active"
                    data-toggle="tab">
                    @lang('Exhibitors') Querido Dinero
                </a>

                <a href="#escritores-invitados"
                    class="nav-item text-uppercase"
                    data-toggle="tab">
                    @lang('Guest Exhibitors')
                </a>
            </ul>

            <div class="tab-content">
                <div id="escritores-querido-dinero" class="tab-pane active">
                    <div class="row">
                        @foreach ($staff_authors as $author)
                            @include('partials.exhibitors.card', ['author' => $author])
                        @endforeach
                    </div>
                </div>

                <div id="escritores-invitados" class="tab-pane">
                    <div class="row">
                        @foreach ($guest_authors as $author)
                            @include('partials.exhibitors.card', ['author' => $author])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
