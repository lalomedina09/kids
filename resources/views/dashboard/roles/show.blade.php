@extends('layouts.dashboard.admin')

@section('dashboard-content')

    <div class="row mb-5">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-8 col-12">
            <h3>Roles y permisos » Ver roles y permisos de {{ $user->present()->full_name }}</h3>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-4 col-12">
            <div class="btn-group float-right">
                <a href="{{ route('dashboard.authorization.edit', [$user->id]) }}" class="btn btn-outline-primary">
                    Modificar roles y permisos
                </a>
                <a href="{{ route('dashboard.authorization.index') }}" class="btn btn-outline-primary">
                    Regresar
                </a>
            </div>
        </div>
    </div>

    @include('partials.dashboard.messages')

    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="card">
                <div class="card-header">
                    Roles
                </div>

                <div class="card-body">
                    <ul>
                        @foreach ($user->roles as $role)
                            <li>{{ $role->label }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="card">
                <div class="card-header">
                    Permisos heredados
                </div>

                <div class="card-body">
                    <p><b>{{ $user->fullname }}</b> puede:</p>
                    <ul>
                        @foreach ($user->getPermissionsViaRoles()->unique('id') as $permission)
                            <li>{{ $permission->label }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="card">
                <div class="card-header">
                    Permisos directos
                </div>

                <div class="card-body">
                    <p><b>{{ $user->fullname }}</b> puede:</p>
                    <ul>
                        @foreach ($user->getDirectPermissions()->unique('id') as $permission)
                            <li>{{ $permission->label }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
