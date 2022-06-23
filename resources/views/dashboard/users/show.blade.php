@extends('layouts.dashboard.admin')

@section('dashboard-content')

    @include('dashboard.users.partials._header', ['subtitle' => "Usuarios » Ver"])

    @include('partials.dashboard.messages')

    <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
            <div class="card mb-3">
                <div class="card-header">
                    Información general
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="font-weight-bold">Nombre(s):</span>
                        {{ $user->present()->name }}
                    </li>
                    <li class="list-group-item">
                        <span class="font-weight-bold">Apellido(s):</span>
                        {{ $user->present()->last_name }}
                    </li>
                    <li class="list-group-item">
                        <span class="font-weight-bold">Correo electrónico:</span>
                        {{ $user->present()->email }}
                    </li>
                    <li class="list-group-item">
                        <span class="font-weight-bold">Género:</span>
                        {{ $user->present()->gender }}
                    </li>
                    <li class="list-group-item">
                        <span class="font-weight-bold">Fecha de nacimiento:</span>
                        {{ $user->present()->birthdate }}
                        <span class="text-muted">({{ $user->present()->age }} años)</span>
                    </li>
                    <li class="list-group-item">
                        <span class="font-weight-bold">Estado:</span>
                        {{ $user->present()->state }}
                    </li>
                    <li class="list-group-item">
                        <span class="font-weight-bold">Ocupación:</span>
                        {{ $user->present()->job }}
                    </li>
                </ul>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <span>Intereses:</span>
                </div>

                <div class="card-body">
                    <div class="row">
                        @foreach ($user->interests as $interest)
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                <li>{{ $interest->name }}</li>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <span>Otros datos:</span>
                </div>

                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="fa fa-user"></span>&nbsp;&nbsp;
                        <span class="font-weight-bold">Identificador único:</span> {{ $user->id }}
                    </li>
                    <li class="list-group-item">
                        <span class="fa fa-calendar"></span>&nbsp;&nbsp;
                        <span class="font-weight-bold">Fecha de creación:</span> {{ $user->present()->created_at }}
                    </li>
                    <li class="list-group-item">
                        <span class="fa fa-calendar"></span>&nbsp;&nbsp;
                        <span class="font-weight-bold">Primer acceso:</span> {{ $user->present()->first_login }}
                    </li>
                    <li class="list-group-item">
                        <span class="fa fa-calendar"></span>&nbsp;&nbsp;
                        <span class="font-weight-bold">Último acceso:</span> {{ $user->present()->last_login }}
                    </li>
                    <li class="list-group-item">
                        <span class="fa fa-trash"></span>&nbsp;&nbsp;
                        <span class="font-weight-bold">Eliminado:</span> {{ $user->present()->deleted_at }}
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="card mb-4">
                <div class="card-header">
                    Acciones
                </div>

                <div class="card-body">
                    @if(is_null($user->deleted_at))
                        <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-outline-primary btn-block">Editar</a>
                        <hr>
                        <a href="{{ route('dashboard.users.destroy', $user->id) }}" class="btn btn-outline-danger btn-block"
                            data-method="delete"
                            data-token="{{ csrf_token() }}"
                            data-confirm="¿Estás seguro de dar de baja al usuario? Presiona OK para confirmar">
                            Dar de baja
                        </a>
                        <hr/>
                        <a href="{{ route('dashboard.users.password', $user->id) }}" class="btn btn-outline-warning btn-block"
                            data-method="post"
                            data-token="{{ csrf_token() }}"
                            data-confirm="Se enviará un correo electrónico al usuario para que reestablezca su contraseña. Presiona OK para confirmar">
                            Restablecer contraseña
                        </a>
                    @else
                        <a href="{{ route('dashboard.users.restore', $user->id) }}" class="btn btn-outline-primary btn-block"
                            data-method="post"
                            data-token="{{ csrf_token() }}"
                            data-confirm="¿Estás seguro de reactivar al usuario? Presiona OK para confirmar">
                            Reactivar
                        </a>
                    @endif
                    <hr>
                    <a href="{{ route('dashboard.users.index') }}"
                        class="btn btn-outline-secondary btn-block">@lang('Back')</a>
                </div>
            </div>
        </div>
    </div>

@endsection
