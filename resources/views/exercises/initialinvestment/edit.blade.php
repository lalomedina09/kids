@extends('layouts.exercises')

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/exercises/initialinvestment.js') }}"></script>
@endpush

@section('exercise-title', 'Inversión inicial')

@section('exercise-action')
    <button id="exercise-action" class="btn btn-danger"
        data-action="{{ route('exercises.initialinvestment.update') }}"
        data-method="post"
        data-token="{{ csrf_token() }}"
        data-toggle="tooltip" data-placement="left" title="Guardar">
        <span class="fa fa-save"></span>
    </button>
@endsection

@section('exercise-content')

    <div class="card mb-3">
        <div class="card-header text-center font-weight-bold">
            Gastos previos
        </div>
        <ul class="list-group list-group-flush">
            @include('partials.exercises.variable', [
                'label' => 'Asesorías y cursos',
                'variable' => 'capacitation_expenses',
                'format' => '$',
                'mutable' => 'total_previous_expenses'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Libros, impresiones, etc.',
                'variable' => 'books_expenses',
                'format' => '$',
                'mutable' => 'total_previous_expenses'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Estudios de mercado',
                'variable' => 'market_research_expenses',
                'format' => '$',
                'mutable' => 'total_previous_expenses'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Viajes',
                'variable' => 'travels_expenses',
                'format' => '$',
                'mutable' => 'total_previous_expenses'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Desarrollos de prototipos',
                'variable' => 'prototype_expenses',
                'format' => '$',
                'mutable' => 'total_previous_expenses'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Otros',
                'variable' => 'other_previous_expenses',
                'format' => '$',
                'mutable' => 'total_previous_expenses'
            ])
        </ul>
        @include('partials.exercises.result', [
            'label' => 'Total',
            'variable' => 'total_previous_expenses',
            'format' => '$',
        ])
    </div>

    <div class="card mb-3">
        <div class="card-header text-center font-weight-bold">
            Gastos e inversiones administrativas de la puesta en marcha:
        </div>
        <ul class="list-group list-group-flush">
            @include('partials.exercises.variable', [
                'label' => 'Notaría, registro, inscripciones, altas, trámites, etc.',
                'variable' => 'legal_expenses',
                'format' => '$',
                'mutable' => 'total_administrative_expenses'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Registro o compra de patentes, marcas, etc.',
                'variable' => 'trademark_expenses',
                'format' => '$',
                'mutable' => 'total_administrative_expenses'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Renta inicial del lugar (depósito inicial)',
                'variable' => 'initial_rent_expenses',
                'format' => '$',
                'mutable' => 'total_administrative_expenses'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Acondicionamiento del lugar administrativo',
                'variable' => 'aconditioning_administraive_expenses',
                'format' => '$',
                'mutable' => 'total_administrative_expenses'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Muebles y equipos de oficina',
                'variable' => 'administrative_equipment_expenses',
                'format' => '$',
                'mutable' => 'total_administrative_expenses'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Equipos informáticos (computadoras, softwares, etc)',
                'variable' => 'systems_expenses',
                'format' => '$',
                'mutable' => 'total_administrative_expenses'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Página de internet, dominio, hosting, correo, etc.',
                'variable' => 'web_expenses',
                'format' => '$',
                'mutable' => 'total_administrative_expenses'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Gastos de transporte',
                'variable' => 'transportation_expenses',
                'format' => '$',
                'mutable' => 'total_administrative_expenses'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Papelería, tarjetas de presentación, etc.',
                'variable' => 'stationery_expenses',
                'format' => '$',
                'mutable' => 'total_administrative_expenses'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Publicidad inicial',
                'variable' => 'advertising_expenses',
                'format' => '$',
                'mutable' => 'total_administrative_expenses'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Impuestos',
                'variable' => 'taxes_expenses',
                'format' => '$',
                'mutable' => 'total_administrative_expenses'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Otros',
                'variable' => 'other_administrative_expenses',
                'format' => '$',
                'mutable' => 'total_administrative_expenses'
            ])
        </ul>
        @include('partials.exercises.result', [
            'label' => 'Total',
            'variable' => 'total_administrative_expenses',
            'format' => '$',
        ])
    </div>

    <div class="card mb-3">
        <div class="card-header text-center font-weight-bold">
            Gastos e inversiones operativas de la puesta en marcha:
        </div>
        <ul class="list-group list-group-flush">
            @include('partials.exercises.variable', [
                'label' => 'Acondicionamiento del lugar operativo (en su caso)',
                'variable' => 'aconditioning_operating_expenses',
                'format' => '$',
                'mutable' => 'total_startup_expenses'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Maquinarias y equipos de operación/producción (en su caso)',
                'variable' => 'production_equipment_expenses',
                'format' => '$',
                'mutable' => 'total_startup_expenses'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Otros utensilios para producción (en su caso)',
                'variable' => 'other_production_expenses',
                'format' => '$',
                'mutable' => 'total_startup_expenses'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Muebles y otros equipos (en su caso)',
                'variable' => 'furniture_expenses',
                'format' => '$',
                'mutable' => 'total_startup_expenses'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Stock inicial y/o materia prima inicial (en su caso)',
                'variable' => 'initial_stock_expenses',
                'format' => '$',
                'mutable' => 'total_startup_expenses'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Gasto de transportación e instalación (en su caso)',
                'variable' => 'installation_expenses',
                'format' => '$',
                'mutable' => 'total_startup_expenses'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Otros',
                'variable' => 'other_startup_expenses',
                'format' => '$',
                'mutable' => 'total_startup_expenses'
            ])
        </ul>
        @include('partials.exercises.result', [
            'label' => 'Total',
            'variable' => 'total_startup_expenses',
            'format' => '$',
        ])
    </div>

    <div class="card">
        @include('partials.exercises.result', [
            'label' => 'Total de gastos iniciales',
            'variable' => 'total_initial_expenses',
            'format' => '$',
        ])
    </div>
@endsection
