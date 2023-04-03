
<div class="row">

    <div class="col-md-8">
        <div class="row">
            <div class="form-group col-md-6">
                {!! Form::label('text', 'Nombre*') !!}
                {!! Form::text('title', null, [
                    'class' => 'form-control',
                    'id' => 'title',
                    //'onkeydown' => 'ajaxSearchCategory()',
                    'placeholder' => 'Nombre del Quiz'
                    ]) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('text', 'Curso*') !!}
                {!! Form::select('course_id', $courses, null,
                        [
                            'class'=>'form-control',
                            'required'=>'required',
                            //'readonly' => 'readonly',
                        ])
                !!}
            </div>
            <div class="form-group col-md-12">
                {!! Form::label('text', 'Comentarios*') !!}
                {!! Form::text('comments', null, [
                    'class' => 'form-control',
                    'id' => 'comments',
                    //'onkeydown' => 'ajaxSearchCategory()',
                    'placeholder' => 'Comentarios'
                    ]) !!}
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
                    type="submit"
                    id="btn-send-form"
                    value="{{ $btn ?? 'Crear' }}">
                <div id="contentLoading"></div>
            </div>
            <input type="hidden" name="action" id="action" value="{{ $action }}">
        </div>
    </div>
    <!--onclick="ajaxSendFormCategory();"-->
</div>


<script>
    /*
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
    */
    /*
    if (username && password) {
                $('#submitButton').attr('disabled', false);
            } else {
                $('#submitButton').attr('disabled', true);
            }
    */
</script>
