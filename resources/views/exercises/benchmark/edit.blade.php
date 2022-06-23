@extends('layouts.exercises')

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/exercises/benchmark.js') }}"></script>
@endpush

@section('exercise-title', 'Indicadores clave')

@section('exercise-action')
    <button id="exercise-action" class="btn btn-danger"
        data-action="{{ route('exercises.benchmark.update') }}"
        data-method="post"
        data-token="{{ csrf_token() }}"
        data-toggle="tooltip" data-placement="left" title="Guardar">
        <span class="fa fa-save"></span>
    </button>
@endsection

@section('exercise-content')

    <div class="nav-scroller mb-3">
        <nav class="nav">
            <a href="#metrics"
                class="nav-link text-uppercase link-light link--underline link--underline--danger active"
                data-toggle="tab">
                Métricas de venta
            </a>

            <a href="#income"
                class="nav-link text-uppercase link-light link--underline link--underline--danger"
                data-toggle="tab">
                Desglose de ingreso
            </a>

            <a href="#profitability"
                class="nav-link text-uppercase link-light link--underline link--underline--danger"
                data-toggle="tab">
                Rentabilidades
            </a>

            <a href="#efficiency"
                class="nav-link text-uppercase link-light link--underline link--underline--danger"
                data-toggle="tab">
                Eficiencia
            </a>
        </nav>
    </div>

    <div class="tab-content">
        <div id="metrics" class="tab-pane active">
            <div class="card mb-3">
                @include('partials.exercises.result', [
                    'label' => 'Ingreso por ventas',
                    'variable' => 'sales_income',
                    'format' => '$',
                ])
            </div>

            <p class="text-uppercase font-weight-bold">Mes actual</p>

            <div class="card mb-3">
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Número de prospectos',
                        'variable' => 'metrics_current_prospects',
                        'mutable' => 'metrics_current_conversion'
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Prospectos convertidos en clientes nuevos',
                        'variable' => 'metrics_current_clients',
                        'mutable' => 'metrics_current_conversion'
                    ])
                </ul>
                @include('partials.exercises.result', [
                    'label' => 'Conversión de clientes',
                    'variable' => 'metrics_current_conversion',
                    'format' => '%',
                ])
            </div>

            <div class="card mb-3">
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Número de clientes que renuevan/regresan',
                        'variable' => 'metrics_current_returns',
                        'mutable' => 'metrics_current_total'
                    ])
                </ul>
                @include('partials.exercises.result', [
                    'label' => 'Total número de clientes del mes',
                    'variable' => 'metrics_current_total'
                ])
            </div>

            <div class="card mb-3">
                @include('partials.exercises.result', [
                    'label' => 'Venta promedio por cliente',
                    'variable' => 'metrics_current_average',
                    'format' => '$',
                ])
            </div>

            <hr>
            <p class="text-uppercase font-weight-bold">Mes anterior</p>

            <div class="card mb-3">
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Número de prospectos',
                        'variable' => 'metrics_past_prospects',
                        'mutable' => 'metrics_past_conversion'
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Prospectos convertidos en clientes nuevos',
                        'variable' => 'metrics_past_clients',
                        'mutable' => 'metrics_past_conversion'
                    ])
                </ul>
                @include('partials.exercises.result', [
                    'label' => 'Conversión de clientes',
                    'variable' => 'metrics_past_conversion',
                    'format' => '%',
                ])
            </div>

            <div class="card mb-3">
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Número de clientes que renuevan/regresan',
                        'variable' => 'metrics_past_returns',
                        'mutable' => 'metrics_past_total'
                    ])
                </ul>
                @include('partials.exercises.result', [
                    'label' => 'Total número de clientes del mes',
                    'variable' => 'metrics_past_total',
                ])
            </div>

            <div class="card mb-3">
                @include('partials.exercises.result', [
                    'label' => 'Venta promedio por cliente',
                    'variable' => 'metrics_past_average',
                    'format' => '$',
                ])
            </div>

            <hr>
            <p class="text-uppercase font-weight-bold">Diferencia</p>

            <div class="card mb-3">
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Número de prospectos',
                        'variable' => 'metrics_difference_prospects',
                        'format' => '%',
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Prospectos convertidos en clientes nuevos',
                        'variable' => 'metrics_difference_clients',
                        'format' => '%',
                    ])
                </ul>
                @include('partials.exercises.result', [
                    'label' => 'Conversión de clientes',
                    'variable' => 'metrics_difference_conversion',
                    'format' => '%',
                ])
            </div>

            <div class="card mb-3">
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Número de clientes que renuevan/regresan',
                        'variable' => 'metrics_difference_returns',
                        'format' => '%',
                    ])
                </ul>
                @include('partials.exercises.result', [
                    'label' => 'Total número de clientes del mes',
                    'variable' => 'metrics_difference_total',
                    'format' => '%',
                ])
            </div>

            <div class="card mb-3">
                @include('partials.exercises.result', [
                    'label' => 'Venta promedio por cliente',
                    'variable' => 'metrics_difference_average',
                    'format' => '%',
                ])
            </div>
        </div>

        <div id="income" class="tab-pane">
            <p class="text-uppercase font-weight-bold">Mes actual</p>

            <div class="card mb-3">
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Ventas pagadas de contado',
                        'variable' => 'income_current_cash_payment',
                        'format' => '$',
                        'mutable' => 'income_current_percentage'
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Ventas a crédito',
                        'variable' => 'income_current_credit_payment',
                        'format' => '$',
                        'mutable' => 'income_current_percentage'
                    ])
                </ul>
                @include('partials.exercises.result', [
                    'label' => '% Ventas a crédito del total del mes',
                    'variable' => 'income_current_percentage',
                    'format' => '%',
                ])
            </div>

            <div class="card mb-3">
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Ventas a crédito vigentes',
                        'variable' => 'income_current_active',
                        'format' => '$',
                        'mutable' => 'income_difference_active'
                    ])
                </ul>
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Ventas a crédito con retrasos entre 1 y 10 días',
                        'variable' => 'income_current_delay_1',
                        'format' => '$',
                        'mutable' => 'income_difference_delay_1'
                    ])
                </ul>
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Retrasos entre 11 y 30 días',
                        'variable' => 'income_current_delay_11',
                        'format' => '$',
                        'mutable' => 'income_difference_delay_11'
                    ])
                </ul>
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Retrasos con más de 30 días',
                        'variable' => 'income_current_delay_30',
                        'format' => '$',
                        'mutable' => 'income_difference_delay_30'
                    ])
                </ul>
            </div>

            <hr>
            <p class="text-uppercase font-weight-bold">Mes anterior</p>

            <div class="card mb-3">
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Ventas pagadas de contado',
                        'variable' => 'income_past_cash_payment',
                        'format' => '$',
                        'mutable' => 'income_past_percentage'
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Ventas a crédito',
                        'variable' => 'income_past_credit_payment',
                        'format' => '$',
                        'mutable' => 'income_past_percentage'
                    ])
                </ul>
                @include('partials.exercises.result', [
                    'label' => '% Ventas a crédito del total del mes',
                    'variable' => 'income_past_percentage',
                    'format' => '%',
                ])
            </div>

            <div class="card mb-3">
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Ventas a crédito vigentes',
                        'variable' => 'income_past_active',
                        'format' => '$',
                        'mutable' => 'income_difference_active'
                    ])
                </ul>
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Ventas a crédito con retrasos entre 1 y 10 días',
                        'variable' => 'income_past_delay_1',
                        'format' => '$',
                        'mutable' => 'income_difference_delay_1'
                    ])
                </ul>
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Retrasos entre 11 y 30 días',
                        'variable' => 'income_past_delay_11',
                        'format' => '$',
                        'mutable' => 'income_difference_delay_11'
                    ])
                </ul>
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Retrasos con más de 30 días',
                        'variable' => 'income_past_delay_30',
                        'format' => '$',
                        'mutable' => 'income_difference_delay_30'
                    ])
                </ul>
            </div>

            <hr>
            <p class="text-uppercase font-weight-bold">Diferencia</p>

            <div class="card mb-3">
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Ventas pagadas de contado',
                        'variable' => 'income_difference_cash_payment',
                        'format' => '%',
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Ventas a crédito',
                        'variable' => 'income_difference_credit_payment',
                        'format' => '%',
                    ])
                </ul>
                @include('partials.exercises.result', [
                    'label' => '% Ventas a crédito del total del mes',
                    'variable' => 'income_difference_percentage',
                    'format' => '%',
                ])
            </div>

            <div class="card mb-3">
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Ventas a crédito vigentes',
                        'variable' => 'income_difference_active',
                        'format' => '%',
                    ])
                </ul>
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Ventas a crédito con retrasos entre 1 y 10 días',
                        'variable' => 'income_difference_delay_1',
                        'format' => '%',
                    ])
                </ul>
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Retrasos entre 11 y 30 días',
                        'variable' => 'income_difference_delay_11',
                        'format' => '%',
                    ])
                </ul>
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Retrasos con más de 30 días',
                        'variable' => 'income_difference_delay_30',
                        'format' => '%',
                    ])
                </ul>
            </div>
        </div>

        <div id="profitability" class="tab-pane">
            <p class="text-uppercase font-weight-bold">Últimos 12 meses</p>

            <div class="card mb-3">
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'ROAA anual',
                        'variable' => 'profitability_current_roaa',
                        'format' => '%',
                        'mutable' => 'profitability_difference_roaa'
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'ROAE anual',
                        'variable' => 'profitability_current_roae',
                        'format' => '%',
                        'mutable' => 'profitability_difference_roae'
                    ])
                </ul>
            </div>

            <hr>
            <p class="text-uppercase font-weight-bold">12 meses anteriores</p>

            <div class="card mb-3">
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'ROAA anual',
                        'variable' => 'profitability_past_roaa',
                        'format' => '%',
                        'mutable' => 'profitability_difference_roaa'
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'ROAE anual',
                        'variable' => 'profitability_past_roae',
                        'format' => '%',
                        'mutable' => 'profitability_difference_roae'
                    ])
                </ul>
            </div>

            <hr>
            <p class="text-uppercase font-weight-bold">Diferencia</p>

            <div class="card mb-3">
                @include('partials.exercises.result', [
                    'label' => 'ROAA anual',
                    'variable' => 'profitability_difference_roaa',
                    'format' => '%',
                ])
                @include('partials.exercises.result', [
                    'label' => 'ROAE anual',
                    'variable' => 'profitability_difference_roae',
                    'format' => '%',
                ])
            </div>
        </div>

        <div id="efficiency" class="tab-pane">
            <p class="text-uppercase font-weight-bold">Últimos 12 meses</p>

            <div class="card mb-3">
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Rotación de inventarios',
                        'variable' => 'efficiency_current_rotation_inventory',
                        'format' => '$',
                        'mutable' => 'efficiency_current_days_inventory'
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Días de inventario',
                        'variable' => 'efficiency_current_days_inventory',
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Rotación de cuentas por cobrar',
                        'variable' => 'efficiency_current_rotation_receivable',
                        'format' => '$',
                        'mutable' => 'efficiency_current_days_receivable'
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Días de cuentas por cobrar',
                        'variable' => 'efficiency_current_days_receivable',
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Rotación de cuentas por pagar',
                        'variable' => 'efficiency_current_rotation_payable',
                        'format' => '$',
                        'mutable' => 'efficiency_current_days_payable'
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Días de cuentas por pagar',
                        'variable' => 'efficiency_current_days_payable',
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Brecha de financiamiento',
                        'variable' => 'efficiency_current_funding_gap',
                    ])
                </ul>
            </div>

            <hr>
            <p class="text-uppercase font-weight-bold">12 meses anteriores</p>

            <div class="card mb-3">
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Rotación de inventarios',
                        'variable' => 'efficiency_past_rotation_inventory',
                        'format' => '$',
                        'mutable' => 'efficiency_past_days_inventory'
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Dias de inventario',
                        'variable' => 'efficiency_past_days_inventory',
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Rotación de cuentas por cobrar',
                        'variable' => 'efficiency_past_rotation_receivable',
                        'format' => '$',
                        'mutable' => 'efficiency_past_days_receivable'
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Días de cuentas por cobrar',
                        'variable' => 'efficiency_past_days_receivable',
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Rotación de cuentas por pagar',
                        'variable' => 'efficiency_past_rotation_payable',
                        'format' => '$',
                        'mutable' => 'efficiency_past_days_payable'
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Dias de cuentas por pagar',
                        'variable' => 'efficiency_past_days_payable',
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Brecha de financiamiento',
                        'variable' => 'efficiency_past_funding_gap',
                    ])
                </ul>
            </div>

            <hr>
            <p class="text-uppercase font-weight-bold">Diferencia</p>

            <div class="card mb-3">
                <ul class="list-group list-group-flush">
                    @include('partials.exercises.variable', [
                        'label' => 'Rotación de inventarios',
                        'variable' => 'efficiency_difference_rotation_inventory',
                        'format' => '%',
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Dias de inventario',
                        'variable' => 'efficiency_difference_days_inventory',
                        'format' => '%',
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Rotación de cuentas por cobrar',
                        'variable' => 'efficiency_difference_rotation_receivable',
                        'format' => '%',
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Días de cuentas por cobrar',
                        'variable' => 'efficiency_difference_days_receivable',
                        'format' => '%',
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Rotación de cuentas por pagar',
                        'variable' => 'efficiency_difference_payable',
                        'format' => '%',
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Dias de cuentas por pagar',
                        'variable' => 'efficiency_difference_payable',
                        'format' => '%',
                    ])
                    @include('partials.exercises.variable', [
                        'label' => 'Brecha de financiamiento',
                        'variable' => 'efficiency_difference_funding_gab',
                        'format' => '%',
                    ])
                </ul>
            </div>
        </div>
    </div>

@endsection
