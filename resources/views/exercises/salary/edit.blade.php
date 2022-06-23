@extends('layouts.exercises')

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/exercises/salary.js') }}"></script>
@endpush

@section('exercise-title', 'Mi sueldo')

@section('exercise-action')
    <button id="exercise-action" class="btn btn-danger"
        data-action="{{ route('exercises.salary.update') }}"
        data-method="post"
        data-token="{{ csrf_token() }}"
        data-toggle="tooltip" data-placement="left" title="Guardar">
        <span class="fa fa-save"></span>
    </button>
@endsection

@section('exercise-content')

    <div class="card mb-3">
        <div class="card-header text-center font-weight-bold">
            Gastos fijos
        </div>
        <ul class="list-group list-group-flush">
            @include('partials.exercises.variable', [
                'label' => 'Hipotéca o renta',
                'variable' => 'home_mortgage_rent_expenses',
                'format' => '$',
                'mutable' => 'fixed_expenses_total'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Servicios',
                'variable' => 'services_expenses',
                'format' => '$',
                'mutable' => 'fixed_expenses_total'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Otros servicios',
                'variable' => 'other_services_expenses',
                'format' => '$',
                'mutable' => 'fixed_expenses_total'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Supermercado',
                'variable' => 'supermarket_expenses',
                'format' => '$',
                'mutable' => 'fixed_expenses_total'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Transporte',
                'variable' => 'transport_expenses',
                'format' => '$',
                'mutable' => 'fixed_expenses_total'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Dependientes',
                'variable' => 'dependents_expenses',
                'format' => '$',
                'mutable' => 'fixed_expenses_total'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Salud y deporte',
                'variable' => 'health_sport_expenses',
                'format' => '$',
                'mutable' => 'fixed_expenses_total'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Eduación y aprendizaje',
                'variable' => 'education_learning_expenses',
                'format' => '$',
                'mutable' => 'fixed_expenses_total'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Personal',
                'variable' => 'personal_expenses',
                'format' => '$',
                'mutable' => 'fixed_expenses_total'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Otros',
                'variable' => 'other_expenses',
                'format' => '$',
                'mutable' => 'fixed_expenses_total'
            ])
        </ul>
        @include('partials.exercises.result', [
            'label' => 'Total gastos fijos',
            'variable' => 'fixed_expenses_total',
            'format' => '$',
        ])
        @include('partials.exercises.result', [
            'label' => 'Proporción',
            'variable' => 'expenses_proportion',
            'format' => '%',
        ])
    </div>

    <div class="card mb-3">
        <div class="card-header text-center font-weight-bold">
            Lujos
        </div>
        <ul class="list-group list-group-flush">
            @include('partials.exercises.variable', [
                'label' => 'Diversión',
                'variable' => 'fun_expenses',
                'format' => '$',
                'mutable' => 'luxuries_expenses_total'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Viajes',
                'variable' => 'travels_expenses',
                'format' => '$',
                'mutable' => 'luxuries_expenses_total'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Ropa',
                'variable' => 'clothing_expenses',
                'format' => '$',
                'mutable' => 'luxuries_expenses_total'
            ])
            @include('partials.exercises.variable', [
                'label' => 'Computadoras, celulares, gadgets',
                'variable' => 'gadgets_expenses',
                'format' => '$',
                'mutable' => 'luxuries_expenses_total'
            ])
        </ul>
        @include('partials.exercises.result', [
            'label' => 'Total',
            'variable' => 'luxuries_expenses_total',
            'format' => '$',
        ])
        @include('partials.exercises.result', [
            'label' => 'Proporción',
            'variable' => 'luxuries_proportion',
            'format' => '%',
        ])
    </div>

    <div class="card mb-3">
        <div class="card-header text-center font-weight-bold">
            Ahorro e inversiones
        </div>
        <ul class="list-group list-group-flush">
            @include('partials.exercises.variable', [
                'label' => 'Ahorro para metas',
                'variable' => 'goals_savings',
                'format' => '$',
                'mutable' => 'savings_total'
            ])
        </ul>
        @include('partials.exercises.result', [
            'label' => 'Total',
            'variable' => 'savings_total',
            'format' => '$',
        ])
        @include('partials.exercises.result', [
            'label' => 'Proporción',
            'variable' => 'savings_proportion',
            'format' => '%',
        ])
    </div>

    <div class="card">
        @include('partials.exercises.result', [
            'label' => 'Total de tu sueldo',
            'variable' => 'salary_total',
            'format' => '$',
        ])
    </div>

@endsection
