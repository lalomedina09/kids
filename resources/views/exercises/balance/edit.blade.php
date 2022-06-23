@extends('layouts.exercises')

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/exercises/balance.js') }}"></script>
@endpush

@section('exercise-title', 'Balance general')

@section('exercise-action')
    <button id="exercise-action" class="btn btn-danger"
        data-action="{{ route('exercises.balance.update') }}"
        data-method="post"
        data-token="{{ csrf_token() }}"
        data-toggle="tooltip" data-placement="left" title="Guardar">
        <span class="fa fa-save"></span>
    </button>
@endsection

@section('exercise-content')

    <div class="nav-scroller mb-3">
        <nav class="nav">
            <a href="#assets"
                class="nav-link text-uppercase link-light link--underline link--underline--danger active"
                data-toggle="tab">
                Activos
            </a>

            <a href="#liabilities"
                class="nav-link text-uppercase link-light link--underline link--underline--danger"
                data-toggle="tab">
                Pasivos
            </a>

            <a href="#capital"
                class="nav-link text-uppercase link-light link--underline link--underline--danger"
                data-toggle="tab">
                Capital
            </a>
        </nav>
    </div>

    <div class="tab-content">
        <div id="assets" class="tab-pane active">
            <div class="card mb-3">
                <div class="card-header text-center font-weight-bold">
                    Corto plazo
                </div>
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Efectivo',
                        'variable' => 'assets.short.cash',
                        'format' => '$',
                        'mutable' => 'assets.short.subtotal'
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Inventario (producto)',
                        'variable' => 'assets.short.inventory',
                        'format' => '$',
                        'mutable' => 'assets.short.subtotal'
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Cuentas por cobrar',
                        'variable' => 'assets.short.accounts',
                        'format' => '$',
                        'mutable' => 'assets.short.subtotal'
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Otros',
                        'variable' => 'assets.short.other',
                        'format' => '$',
                        'mutable' => 'assets.short.subtotal'
                    ])
                </ul>
                @include('partials.exercises.result', [
                    'label' => 'Subtotal',
                    'variable' => 'assets.short.subtotal',
                    'format' => '$'
                ])
            </div>

            <div class="card mb-3">
                <div class="card-header text-center font-weight-bold">
                    Largo plazo
                </div>
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Muebles, Equipos, Vehículos, Maquinaria',
                        'variable' => 'assets.long.equipment',
                        'format' => '$',
                        'mutable' => 'assets.long.subtotal'
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Depreciación (signo negativo)',
                        'variable' => 'assets.long.depreciation',
                        'format' => '$',
                        'mutable' => 'assets.long.subtotal'
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Otros',
                        'variable' => 'assets.long.other',
                        'format' => '$',
                        'mutable' => 'assets.long.subtotal'
                    ])
                </ul>
                @include('partials.exercises.result', [
                    'label' => 'Subtotal',
                    'variable' => 'assets.long.subtotal',
                    'format' => '$'
                ])
            </div>

            <div class="card">
                @include('partials.exercises.result', [
                    'label' => 'Total',
                    'variable' => 'assets.total',
                    'format' => '$'
                ])
            </div>
        </div>

        <div id="liabilities" class="tab-pane">
            <div class="card mb-3">
                <div class="card-header text-center font-weight-bold">
                    Corto plazo
                </div>
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Crédito de Proveedores',
                        'variable' => 'liabilities.short.providers',
                        'format'=> '$',
                        'mutable' => 'liabilities.short.subtotal'
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Adelanto de Clientes',
                        'variable' => 'liabilities.short.prepayment',
                        'format' => '$',
                        'mutable' => 'liabilities.short.subtotal'
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Créditos Financieros',
                        'variable' => 'liabilities.short.credit',
                        'format' => '$',
                        'mutable' => 'liabilities.short.subtotal'
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Otros',
                        'variable' => 'liabilities.short.other',
                        'format' => '$',
                        'mutable' => 'liabilities.short.subtotal'
                    ])
                </ul>
                @include('partials.exercises.result', [
                    'label' => 'Subtotal',
                    'variable' => 'liabilities.short.subtotal',
                    'format' => '$'
                ])
            </div>

            <div class="card mb-3">
                <div class="card-header text-center font-weight-bold">
                    Largo plazo
                </div>
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Créditos Financieros',
                        'variable' => 'liabilities.long.credit',
                        'format' => '$',
                        'mutable' => 'liabilities.long.subtotal'
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Otros',
                        'variable' => 'liabilities.long.other',
                        'format' => '$',
                        'mutable' => 'liabilities.long.subtotal'
                    ])
                </ul>
                @include('partials.exercises.result', [
                    'label' => 'Subtotal',
                    'variable' => 'liabilities.long.subtotal',
                    'format' => '$'
                ])
            </div>

            <div class="card">
                @include('partials.exercises.result', [
                    'label' => 'Total',
                    'variable' => 'liabilities.total',
                    'format' => '$'
                ])
            </div>
        </div>

        <div id="capital" class="tab-pane">
            <div class="card">
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Capital Social',
                        'variable' => 'capital.social',
                        'format' => '$',
                        'mutable' => 'capital.total'
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Utilidades Retenidas',
                        'variable' => 'capital.utilities',
                        'format' => '$',
                        'mutable' => 'capital.total'
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Reservas',
                        'variable' => 'capital.stockpile',
                        'format' => '$',
                        'mutable' => 'capital.total'
                    ])
                </ul>
                @include('partials.exercises.result', [
                    'label' => 'Total',
                    'variable' => 'capital.total',
                    'format' => '$'
                ])
            </div>
        </div>
    </div>

    <hr>

    <div class="card">
        <div class="card-footer d-flex justify-content-between">
            <p class="mb-0 font-weight-bold">¿Hay balance?</p>
            <p class="mb-0 font-weight-bold">{{ array_get($answers, 'balance', false) ? 'No, verificar cifras' : 'Sí' }}</p>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <p class="mb-0 font-weight-bold">Nivel de endeudamiento</p>
            <p class="mb-0 font-weight-bold">{{ format_value(array_get($answers, 'indebtedness', '0.0'), '%') }}</p>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <p class="mb-0 font-weight-bold">Activo corto plazo / Pasivo corto plazo</p>
            <p class="mb-0 font-weight-bold">{{ format_value(array_get($answers, 'diff', '0.0')) }}</p>
        </div>
    </div>

@endsection
