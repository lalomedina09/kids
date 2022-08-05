<div class="row">

    <div class="col-md-8">
        <div class="row">
            <div class="form-group col-md-6">
                {!! Form::label('text', 'Nombre*', ['class' => 'fomr-control']) !!}
                {!! Form::text('name', null, [
                    'class' => 'form-control',
                    'id' => 'name',
                    'onkeydown' => 'ajaxSearchCategory()',
                    'placeholder' => 'Nombre de la Categoria'
                    ]) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('text', 'Fijo*', ['class' => 'fomr-control']) !!}
                {!! Form::text('slug', null,
                    [
                        'class' => 'form-control',
                        'readonly' => true,
                        'id' => 'slug',
                        'placeholder' => 'Fijo'
                    ] ) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('text', 'Codigo Unico*', ['class' => 'fomr-control']) !!}
                {!! Form::text('code', null,
                    [
                        'class' => 'form-control',
                        'id' => 'code',
                        'placeholder' => 'Codigo'
                    ] ) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('text', 'Categoria Principal', ['class' => 'fomr-control']) !!}

                @php
                    $readonly = ($action == 'update') ? true : false ;
                @endphp

                {!! Form::text('parent_id', null,
                    [
                    'class' => 'form-control',
                    'readonly' => $readonly,
                    'placeholder' => 'Categoria Padre',
                    ])
                !!}
                <div id="contentLoading"></div>
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
            </div>
        </div>
    </div>

</div>


<script>

    function ajaxSearchCategory() {

        let url = "{{ route('dashboard.categories.searchSlug')}}";
        let token = $('#token').val();
        let name = $('#name').val();
        //let code = $('#code').val();

        if (name != '') {
            $.post(url, {
                _token: token,
                name: name
            },
            function(data){
                console.log(data);
                $("#slug").val(data.slug);
                //$("#code").val(data.code);
            });
        }
    }

    function ajaxSendFormCategory() {

        let url = "{{ route('dashboard.categories.searchcodeCategory')}}";
        let token = $('#token').val();
        let code = $('#code').val();
        alert('piki piki ');
        if (code != '') {
            $('#contentLoading').html('<div class="loading"><img src ="/images/preload-gif.jpg" width="50px" alt="loading" /><br/><p>Espera....</p></div>');
            $.post(url, {
                _token: token,
                code: code,
            },
            function(data){
                console.log(data);
                $("#code").val(data.code);
                alert('no solicito nada al servidor');
                $('#formCategory').submit();
            });
        }
    }

</script>
