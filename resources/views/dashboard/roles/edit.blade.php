@extends('layouts.dashboard.admin')

@section('dashboard-content')

    <div class="row mb-5">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-8 col-12">
            <h3 class="mb-5">Roles y permisos » Modificar roles de {{ $user->present()->full_name }}</h3>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-4 col-12">
            <div class="btn-group float-right">
                <a href="{{ route('dashboard.authorization.show', [$user->id]) }}" class="btn btn-outline-primary">
                    Ver roles y permisos
                </a>
                <a href="{{ route('dashboard.authorization.index') }}" class="btn btn-outline-primary">
                    Regresar
                </a>
            </div>
        </div>
    </div>

    @include('partials.dashboard.messages')

    <form action="{{ route('dashboard.authorization.update', [$user->id]) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 col-12">
                <div class="form-group">
                    <label for="user-role">Selecciona los roles para <span class="font-weight-bold">{{ $user->present()->full_name }}</span>:</label>

                    @foreach($roles as $role)
                        <div class="custom-control custom-checkbox mb-1">
                            <input type="checkbox" name="roles[]" id="{{ $role->name }}" class="custom-control-input" value="{{ $role->name }}"
                                {{ ($user->hasRole($role)) ? 'checked' : '' }}>
                            <label for="{{ $role->name }}" class="custom-control-label"> {{ $role->label }}</label>
                        </div>
                    @endforeach
                </div>

                @unless($permissions->isEmpty())
                    <hr>
                    <div class="form-group">
                        <label for="user-role">Selecciona los permisos para <span class="font-weight-bold">{{ $user->present()->full_name }}</span>:</label>

                        @foreach($permissions as $permission)
                            <div class="custom-control custom-checkbox mb-1">
                                <input type="checkbox" name="permissions[]" id="{{ $permission->name }}" class="custom-control-input" value="{{ $permission->name }}"
                                    {{ ($user->hasPermissionTo($permission)) ? 'checked' : '' }}>
                                <label for="{{ $permission->name }}" class="custom-control-label"> {{ $permission->label }}</label>
                            </div>
                        @endforeach
                    </div>
                @endunless
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        Guardar
                    </div>

                    <div class="card-body">
                        <input type="submit" class="btn btn-primary btn-block" value="Guardar">
                        <hr>
                        <a href="{{  route('dashboard.authorization.index') }}" class="btn btn-outline-secondary btn-block">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
