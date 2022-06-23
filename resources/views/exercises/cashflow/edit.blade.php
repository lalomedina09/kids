@extends('layouts.exercises')

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/exercises/cashflow.js') }}"></script>
@endpush

@section('exercise-title', 'Flujo de efectivo')

@section('exercise-action')
    <button id="exercise-action" class="btn btn-danger"
        data-action="{{ route('exercises.cashflow.update') }}"
        data-method="post"
        data-token="{{ csrf_token() }}"
        data-toggle="tooltip" data-placement="left" title="Guardar">
        <span class="fa fa-save"></span>
    </button>
@endsection

@section('exercise-content')

    <div class="card mb-3">
        <ul class="list-group list-group-flush">
            @include('partials.exercises.variable', [
                'label' => 'Entrada por ventas de este mes',
                'variable' => 'current_month_sales_income',
                'format' => '$',
                'mutable' => 'operational_cash_flow'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Entrada por ventas de meses pasados',
                'variable' => 'past_months_sales_income',
                'format' => '$',
                'mutable' => 'operational_cash_flow'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Salida por inventario',
                'variable' => 'inventory_outcome',
                'format' => '$',
                'mutable' => 'operational_cash_flow'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Salida por otras compras',
                'variable' => 'other_purchases_outcome',
                'format' => '$',
                'mutable' => 'operational_cash_flow'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Salida por gastos administrativos y operativos',
                'variable' => 'administrative_operational_outcome',
                'format' => '$',
                'mutable' => 'operational_cash_flow'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Salida por impuestos',
                'variable' => 'taxes_outcome',
                'format' => '$',
                'mutable' => 'operational_cash_flow'
            ])
        </ul>
        @include('partials.exercises.result', [
            'label' => 'Flujo operativo del mes',
            'variable' => 'operational_cash_flow',
            'format' => '$',
        ])
    </div>

    <div class="card mb-3">
        <ul class="list-group list-group-flush">
            @include('partials.exercises.variable', [
                'label' => 'Salida por compra de activos de largo plazo',
                'variable' => 'long_term_assets_purchases_outcome',
                'format' => '$',
                'mutable' => 'reinvestment_cash_flow'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Entrada por venta de activos',
                'variable' => 'assets_sales_income',
                'format' => '$',
                'mutable' => 'reinvestment_cash_flow'
            ])
        </ul>
        @include('partials.exercises.result', [
            'label' => 'Flujo de reinversión del mes',
            'variable' => 'reinvestment_cash_flow',
            'format' => '$',
        ])
    </div>

    <div class="card mb-3">
        <ul class="list-group list-group-flush">
            @include('partials.exercises.variable', [
                'label' => 'Entrada por capital aportado',
                'variable' => 'injected_capital_income',
                'format' => '$',
                'mutable' => 'funding_cash_flow'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Salida por pago de dividendos socios',
                'variable' => 'dividends_payments_outcome',
                'format' => '$',
                'mutable' => 'funding_cash_flow'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Entrada por préstamos bancarios',
                'variable' => 'bank_loans_income',
                'format' => '$',
                'mutable' => 'funding_cash_flow'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Salida por devolución de préstamos',
                'variable' => 'loans_repayment_outcome',
                'format' => '$',
                'mutable' => 'funding_cash_flow'
            ])
        </ul>
        @include('partials.exercises.result', [
            'label' => 'Flujo de financiamiento del mes',
            'variable' => 'funding_cash_flow',
            'format' => '$',
        ])
    </div>

    <div class="card mb-3">
        @include('partials.exercises.result', [
            'label' => 'Flujo total',
            'variable' => 'total_cash_flow',
            'format' => '$',
        ])
    </div>

    <div class="card">
        @include('partials.exercises.result', [
            'label' => 'Efectivo al inicio del periodo',
            'variable' => 'beginning_period_cash',
            'format' => '$',
        ])
        @include('partials.exercises.result', [
            'label' => 'Movimientos de efectivo en el periodo',
            'variable' => 'period_cash_movements',
            'format' => '$',
        ])
        @include('partials.exercises.result', [
            'label' => 'Efectivo al final del periodo',
            'variable' => 'period_final_cash',
            'format' => '$',
        ])
    </div>
@endsection
