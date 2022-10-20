<div class="row">

    <div class="col-md-8">
        <div class="row">
            <div class="form-group col-md-6">
                {!! Form::label('text', 'Nombre*') !!}
                {!! Form::text('name', null, [
                    'class' => 'form-control',
                    'id' => 'name',
                    'onkeydown' => 'ajaxSearchCategory()',
                    'placeholder' => 'Nombre de la Categoria'
                    ]) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('text', 'Fijo*') !!}
                {!! Form::text('slug', null,
                    [
                        'class' => 'form-control',
                        'readonly' => true,
                        'id' => 'slug',
                        'placeholder' => 'Fijo'
                    ] ) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('text', 'Codigo Unico* (palabra en ingles)') !!}
                {!! Form::text('code', null,
                    [
                        'class' => 'form-control',
                        'id' => 'code',
                        'placeholder' => 'Codigo'
                    ] ) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('text', 'Categoria Principal') !!}

                @php
                    $readonly = ($parent_id == 2) ? true : false ;
                @endphp

                @if ($parent_id == 2)
                    {!! Form::text('parent_id', $parent_id,
                        [
                        'class' => 'form-control',
                        'readonly' => $readonly,
                        'placeholder' => 'Categoria Padre',
                        ])
                    !!}
                @else
                    {!! Form::select('parent_id', $categories, null,
                        [
                            'class'=>'form-control',
                            'readonly' => $readonly,
                        ])
                    !!}
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header">
                Acción
            </div>
            <div class="card-body">
                <input class="btn btn-primary btn-block"
                    type="button"
                    id="btn-send-form"
                    onclick="ajaxSendFormCategory();"
                    value="{{ $btn ?? 'Crear' }}">

                <div id="contentLoading"></div>
            </div>
            <input type="hidden" name="action" id="action" value="{{ $action }}">
        </div>
    </div>

</div>


<script>

    function ajaxSearchCategory() {

        let url = "{{ route('dashboard.categories.searchSlug')}}";
        let token = $('#token').val();
        let name = $('#name').val();
        let typeAction = $('#action').val();
        $('#btn-send-form').attr('disabled', true);
        //let code = $('#code').val();

        if (name != '') {
            $.post(url, {
                _token: token,
                name: name
            },
            function(data){
                $("#slug").val(data.slug);
                $('#btn-send-form').attr('disabled', false);
            });
        }
    }

    function ajaxSendFormCategory() {
        let url = "{{ route('dashboard.categories.searchcodeCategory')}}";
        let token = $('#token').val();
        let code = $('#code').val();
        let action = $('#action').val();


        if (code != '') {
            $('#contentLoading').html('<div class="loading"><img src ="/images/preload-gif.jpg" width="70px" alt="loading" /><br/><p>Espera....</p></div>');
            $.post(url, {
                _token: token,
                code: code,
                action: action,
            },
            function(data){
                console.log(data);
                $("#code").val(data.code);
                $('#formCategory').submit();
            });
        }else{
            alert('Los campos son obligatorios');
        }
    }
    /*
    if (username && password) {
                $('#submitButton').attr('disabled', false);
            } else {
                $('#submitButton').attr('disabled', true);
            }
    */
</script>
