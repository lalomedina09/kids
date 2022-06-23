@extends('layouts.exercises')

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/exercises/incomestatement.js') }}"></script>
@endpush

@section('exercise-title', 'Estado de resultados')

@section('exercise-action')
    <button id="exercise-action" class="btn btn-danger"
        data-action="{{ route('exercises.incomestatement.update') }}"
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
                'label' => 'Ingresos por ventas',
                'variable' => 'sales_income',
                'format' => '$',
                'mutable' => 'gross_profit'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Costo de ventas',
                'variable' => 'sales_costs',
                'format' => '$',
                'mutable' => 'gross_profit'
            ])
        </ul>
        @include('partials.exercises.result', [
            'label' => 'Utilidad bruta',
            'variable' => 'gross_profit',
            'format' => '$',
        ])
        @include('partials.exercises.result', [
            'label' => 'Margen bruto',
            'variable' => 'gross_margin',
            'format' => '%',
        ])
    </div>

    <div class="card mb-3">
        <ul class="list-group list-group-flush">
            @include('partials.exercises.variable', [
                'label' => 'Gastos Administrativos',
                'variable' => 'administrative_expenses',
                'format' => '$',
                'mutable' => 'operating_profit'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Tu Sueldo',
                'variable' => 'salary',
                'format' => '$',
                'mutable' => 'operating_profit'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Salarios del personal',
                'variable' => 'wages',
                'format' => '$',
                'mutable' => 'operating_profit'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Comisiones ventas',
                'variable' => 'sales_commissions',
                'format' => '$',
                'mutable' => 'operating_profit'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Publicidad y marketing',
                'variable' => 'advertising_marketing',
                'format' => '$',
                'mutable' => 'operating_profit'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Transporte y gasolina',
                'variable' => 'transport_fuel',
                'format' => '$',
                'mutable' => 'operating_profit'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Servicios web',
                'variable' => 'web_services',
                'format' => '$',
                'mutable' => 'operating_profit'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Papelería',
                'variable' => 'stationery',
                'format' => '$',
                'mutable' => 'operating_profit'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Depreciación de los activos del periodo',
                'variable' => 'period_depreciation',
                'format' => '$',
                'mutable' => 'operating_profit'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Otros',
                'variable' => 'other',
                'format' => '$',
                'mutable' => 'operating_profit'
            ])
        </ul>
        @include('partials.exercises.result', [
            'label' => 'Utilidad operativa',
            'variable' => 'operating_profit',
            'format' => '$',
        ])
        @include('partials.exercises.result', [
            'label' => 'Margen operativo',
            'variable' => 'operating_margin',
            'format' => '%',
        ])
    </div>

    <div class="card mb-3">
        <ul class="list-group list-group-flush">
            @include('partials.exercises.variable', [
                'label' => 'Intereses de créditos',
                'variable' => 'credit_interests',
                'format' => '$',
                'mutable' => 'pretax_profit'
            ])
        </ul>
        @include('partials.exercises.result', [
            'label' => 'Utilidad antes de impuestos',
            'variable' => 'pretax_profit',
            'format' => '$',
        ])
        @include('partials.exercises.result', [
            'label' => 'Margen antes de impuestos',
            'variable' => 'pretax_margin',
            'format' => '%',
        ])
    </div>

    <div class="card mb-3">
        <ul class="list-group list-group-flush">
            @include('partials.exercises.variable', [
                'label' => 'Impuestos',
                'variable' => 'taxes',
                'format' => '$',
                'mutable' => 'net_profit'
            ])
        </ul>
        @include('partials.exercises.result', [
            'label' => 'Utilidad neta',
            'variable' => 'net_profit',
            'format' => '$',
        ])
        @include('partials.exercises.result', [
            'label' => 'Margen neto',
            'variable' => 'net_margin',
            'format' => '%',
        ])
        @include('partials.exercises.result', [
            'label' => '¿Cuánto se queda en Utilidades Retenidas?',
            'variable' => 'retained_earnings',
            'format' => '$',
        ])
    </div>

    <div class="card">
        <div class="card-header text-center font-weight-bold">
            Punto de equilibrio del mes
        </div>
        @include('partials.exercises.result', [
            'label' => 'Proporción de gastos variables vs Ventas',
            'variable' => 'proportion_expenses_sales',
            'format' => '%',
        ])
        @include('partials.exercises.result', [
            'label' => 'Suma de gastos fijos',
            'variable' => 'fixed_expenses',
            'format' => '$',
        ])
        @include('partials.exercises.result', [
            'label' => 'Punto de equilibrio',
            'variable' => 'balance_point',
            'format' => '$',
        ])
    </div>

@endsection
