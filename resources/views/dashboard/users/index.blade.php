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

    @include('dashboard.users.partials._header', ['subtitle' => 'Querido Dinero » Usuarios'])

    <h3>
        <span class="fa fa-user"></span>
        Reporte de Usuarios
    </h3>

    <hr>

    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
            <div class="card">
                <div class="card-header text-center">
                    Nuevos <span class="text-small text-muted">(mes actual)</span>
                </div>
                <div class="card-body text-center">
                    <h1>{{ $report['new']['current'] }}</h1>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
            <div class="card">
                <div class="card-header text-center">
                    Nuevos <span class="text-small text-muted">(mes anterior)</span>
                </div>
                <div class="card-body text-center">
                    <h1>{{ $report['new']['past'] }}</h1>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
            <div class="card">
                <div class="card-header text-center">
                    Diferencia
                </div>
                <div class="card-body text-center">
                    <h1 class="{{ ($report['new']['difference'] > 0) ? 'text-success' : 'text-danger'}}">
                        {{ $report['new']['difference'] }}
                        <span class="small">({{ ($report['new']['difference'] > 0) ? '+' : '-' }} {{ $report['new']['percentage'] }}%)</span>
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <hr/>

    <div class="card">
        <div class="card-header">
            <span class="fed-icn search"></span>
            Búsqueda
        </div>

        <div id="search" class="card-body">
            <form id="filter-role" class="form-horizontal">
                <div class="form-row">
                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-12">
                        <label class="form-label">@lang('Name'):</label>
                        <input type="text" name="filters[name]"
                            id="filter-name" class="form-control"
                            value="{{ setFilter('name', $filters, $base['default']) }}"
                            placeholder="@lang('User name')">
                    </div>

                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-12">
                        <label class="form-label">@lang('E-mail'):</label>
                        <input type="text" name="filters[email]"
                            id="filter-email" class="form-control"
                            value="{{ setFilter('email', $filters, $base['default']) }}"
                            placeholder="@lang('E-mail')">
                    </div>

                    <div class="form-group col-lg-2 col-md-2 col-sm-2 col-12">
                        <label class="control-label">@lang('Order'):</label>
                        <select name="filters[order]"
                            id="filter-order" class="form-control">
                            @foreach ($base['order'] as $value => $label)
                                <option value="{{ $value }}"
                                    {{ (setFilter('order', $filters, $base['default']) == $value) ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-2 col-md-2 col-sm-2 col-12">
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

                    <div class="form-group col-lg-2 col-md-2 col-sm-2 col-12">
                        <label class="form-label">@lang('Search'):</label><br>
                        <button type="submit" class="btn btn-outline-secondary">
                            <span class="fa fa-filter"></span>
                        </button>
                        @if($search)
                            <a href="{{ route('dashboard.users.index') }}" class="btn btn-danger" title="@lang('Remove filters')">
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

    <div class="table-responsive my-3">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Cancelado</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->present()->full_name }}</td>
                        <td>
                            <a href="mailto:{{ $user->present()->email }}">
                                {{ $user->present()->email }}
                            </a>
                        </td>
                        <td>
                            {{ $user->present()->canceled }}
                        </td>
                        <td>{{ $user->present()->created_at }}</td>
                        <td>
                            @if(is_null($user->deleted_at))
                                <a href="{{ route('dashboard.users.show', $user->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            @endif
                            <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
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
