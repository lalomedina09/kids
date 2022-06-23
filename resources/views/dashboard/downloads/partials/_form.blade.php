<form action="{{ $route }}" method="post" enctype="multipart/form-data" id="form-courses">
    @csrf

    @if ($edit)
        @method('PATCH')
    @endif

    <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 col-12">
            <div class="form-group">
                <label for="download_name">* Nombre:</label>
                <input type="text" name="name" id="download_name" class="form-control" value="{{ ($edit) ? $download->name : old('name') }}">

                @if ($errors->has('name'))
                    <span class="small text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="download_description">* Descripción:</label>
                <textarea name="description" id="download_description" class="form-control" rows="10" data-label="letters" data-limit="1000">{{ ($edit) ? $download->description : old('description') }}</textarea>

                @if ($errors->has('description'))
                    <span class="small text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <span>Guardar</span>
                </div>

                <div class="card-body">
                    <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    Archivo
                </div>

                <div class="card-body">
                    @if($download->payload)
                        <ul>
                            <li><b>Nombre: </b>{{ $download->payload->file_name }}</li>
                            <li><b>Tamaño: </b>{{ $download->payload->human_readable_size }}</li>
                            <li><b>Tipo: </b>{{ $download->payload->mime_type }}</li>
                        </ul>
                    @endif

                    @unless($edit)
                        <div class="custom-file mt-4">
                            <input type="file" class="custom-file-input" name="payload" id="payload">
                            <label class="custom-file-label" for="payload">Seleccionar archivo...</label>
                        </div>

                        @if ($errors->has('payload'))
                            <span class="small text-danger">{{ $errors->first('payload') }}</span>
                        @endif
                    @endunless
                </div>
            </div>
        </div>
    </div>
</form>
