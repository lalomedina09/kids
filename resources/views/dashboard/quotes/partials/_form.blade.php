@push('scripts')
    <script type="text/javascript" src="{{ mix('js/dashboard/quotes/create.js') }}"></script>
@endpush

@if (isset($update) && $update)
    {!! Form::model($quote, ['route' => ['dashboard.quotes.update', $quote->id], 'method' => 'post', 'id' => 'form-quotes']) !!}
        @method('patch')
@else
    {!! Form::open(['route' => 'dashboard.quotes.store', 'method' => 'post', 'id' => 'form-quotes']) !!}
@endif

    <div class="row">

        <div class="col-md-8">

            <div class="form-group">
                <label for="title" class="form-label">Título de la cita:</label>
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título de la cita'] ) !!}
            </div>

            <div class="form-group">
                <label for="body" class="form-label">Contenido de la cita:</label>
                {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 10, 'data-label' => 'letters', 'data-limit' => 1000] ) !!}
            </div>

        </div>


        <div class="col-md-4">

            <div class="card mb-4">
                <div class="card-header">
                    Publicar
                </div>

                <div class="card-body">
                    <input class="btn btn-primary btn-block" type="submit" value="{{ $btn ?? 'Publicar' }}">
                </div>
            </div>

        </div>

    </div>
{!! Form::close() !!}
