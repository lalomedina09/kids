@extends('layouts.dashboard.admin')

@php
  function setFilter($name, $filters, $default) {
    $default = (array_has($default, $name)) ? $default[$name] : '';
    return ((!is_array($filters)) ? $default : (
        array_has($filters, $name) ? $filters[$name] : $default
    ));
  }
@endphp

@section('dashboard-content')

    <h3 class="mb-5">Roles y permisos » Usuarios</h3>

    <div class="card">
        <div class="card-header">
            <span class="fed-icn search"></span>
            Búsqueda
        </div>

        <div id="search" class="card-body">
            <form id="filter-role" class="form-horizontal">
                <div class="form-row">
                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="form-label">@lang('Name'):</label>
                        <input type="text" name="filters[name]"
                            id="filter-name" class="form-control"
                            value="{{ setFilter('name', $filters, $base['default']) }}"
                            placeholder="@lang('User name')">
                    </div>

                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label for="roles" class="form-label">@lang('Role')</label>
                        <select name="filters[role]"
                            id="filter-role" class="form-control">
                            @foreach ($base['roles'] as $value => $label)
                                <option value="{{ $value }}"
                                    {{ (setFilter('role', $filters, $base['default']) == $value) ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="form-label">@lang('Limit'):</label>
                        <select name="filters[limit]"
                            id="filter-limit" class="form-control">
                            @foreach ($base['limit'] as $value => $label)
                                <option value="{{ $value }}"
                                    {{ (setFilter('limit', $filters, $base['default']) == $value) ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="form-label">@lang('Search'):</label><br>
                        <button type="submit" class="btn btn-outline-secondary">
                            <span class="fa fa-filter"></span>
                        </button>
                        @if($search)
                            <a href="{{ route('dashboard.authorization.index') }}" class="btn btn-danger" title="@lang('Remove filters')">
                                <span class="fa fa-undo"></span>
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

    <hr>

    @include('partials.dashboard.messages')

    @if($users->hasPages())
        <div class="text-center">
            {!! $users->render() !!}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Permisos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            <a href="{{ route('dashboard.authorization.show', [$user->id]) }}">
                                {{ $user->id }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('dashboard.authorization.show', [$user->id]) }}">
                                {{ $user->present()->full_name }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('dashboard.authorization.show', [$user->id]) }}">
                                {{ $user->present()->email }}
                            </a>
                        </td>
                        <td>
                            @forelse ($user->roles as $role)
                                <span class="badge badge-info">{{ $role->label }}</span>
                            @empty
                                <span class="badge badge-secondary">Ninguno</span>
                            @endforelse
                        </td>
                        <td>
                            {{ $user->permissions_count }}
                        </td>
                        <td>
                            <a href="{{ route('dashboard.authorization.edit', [$user->id]) }}" class="btn btn-sm btn-outline-primary">Modificar roles</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($users->hasPages())
        <div class="text-center">
            {!! $users->render() !!}
        </div>
    @endif
@endsection
