<div class="row">

    <div class="col-md-8">

        <div class="form-group">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la Categoria'] ) !!}
        </div><!-- title -->

    </div><!-- col-md-8 -->


    <div class="col-md-4">

        <!-- Crear -->
        <div class="card mb-4">
            <div class="card-header">
                Crear
            </div><!-- .card-header -->
            <div class="card-body">
                <input class="btn btn-primary btn-block" type="submit" value="{{ $btn ?? 'Crear' }}">
            </div>
        </div><!-- .card -->

    </div><!-- .col-md-4 -->

</div><!-- .row -->
