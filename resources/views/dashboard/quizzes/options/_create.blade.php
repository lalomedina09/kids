
{!! Form::open([
        'route' => 'dashboard.options.store',
        'method' => 'POST',
        'id' => 'formOptions',
    ]) !!}
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                {!! Form::hidden('question_id', $question->id, [
                        'class' => 'form-control',
                        'id' => 'question_id',
                        ]) !!}
                <div class="form-group col-md-12">
                    {!! Form::label('text', 'Ingresa una opción*') !!}
                    {!! Form::text('option', null, [
                        'class' => 'form-control',
                        'id' => 'option',
                        //'onkeydown' => 'ajaxSearchCategory()',
                        'placeholder' => 'Ingresa la opcion'
                        ]) !!}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="form-group col-md-12">
                    {!! Form::label('text', 'Comentarios') !!}

                    {{ Form::select('is_correct', array(
                        '',
                        '0'=>'Incorrecta',
                        '1'=>'Correcta'
                        ),null, ['class' => 'form-control', 'requied' => 'required'])
                    }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="form-group col-md-12">
                    {!! Form::label('text', '.') !!}
                    <input class="btn btn-success btn-block"
                        type="submit"
                        id="btn-send-form"
                        value="{{ $btn ?? 'Agregar Opción' }}">
                    <div id="contentLoading"></div>
                </div>
            </div>
        </div>
        <!--onclick="ajaxSendFormCategory();"-->
    </div>
{!! Form::close() !!}
