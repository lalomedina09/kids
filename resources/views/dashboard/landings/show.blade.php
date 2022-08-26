@extends('layouts.dashboard.admin')

@section('dashboard-content')

    <div class="row mb-5">
        <div class="col-12">
            <h3>Landing Pages » {{ $page }}</h3>
        </div>
    </div>

    <ul class="nav nav-tabs mb-4">
        @foreach ($pages as $p)
            <a href="{{ route('dashboard.landings.show', [$p]) }}"
                class="nav-item nav-link {{ $p == $page ? 'active' : '' }}"
            >{{ $p }}</a>
        @endforeach


    </ul>

    <div class="table-responsive">
        <div class="text-right">
            <a class="btn btn-success" href="{{ route('dashboard.landings.export.results.excel', [$page]) }}">
                Exportar resultados Excel
            </a>
            <br>
        </div>
        <br>
        <table class="table table-hover table-bordered" data-order='[[ 2, "desc" ]]'>
            <thead>
                <tr>
                    @foreach ($columns->fields as $field => $item)
                        <th>{{ $field }}</th>
                    @endforeach
                    <th>Estado</th>
                    <th>Fecha de registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    @foreach ($columns->fields as $field => $item)
                        <th>{{ $field }}</th>
                    @endforeach
                    <th>Estado</th>
                    <th>Fecha de registro</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($results as $result)
                    <tr>
                        {{--<td class="small">
                            <ul class="m-0 pl-3">
                                @foreach ($result->fields as $field => $value)
                                    <li><strong>{{ $field }}</strong>: {{ $value }}</li>
                                @endforeach
                            </ul>
                        </td>--}}
                        @foreach ($result->fields as $field => $value)
                            @if ($field == "Tipo")

                            @else
                                <td>{{ $value }}</td>
                            @endif
                        @endforeach
                        <td>
                            @if ($result->synced)
                                <span class="badge badge-success">Sincronizado</span>
                            @else
                                <span class="badge badge-danger">No sincronizado</span>
                            @endif
                        </td>
                        <td class="small" data-order="{{ optional($result->created_at)->timestamp }}">{{ $result->present()->created_at }}</td>
                        <td>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><!-- .table -->
    </div><!-- .table-responsive -->

@endsection
