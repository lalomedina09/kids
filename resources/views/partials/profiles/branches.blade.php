<div id="{{ str_slug(__('Branches')) }}" class="tab-pane">

    <!-- Archivo para  botones dentro de la seccion-->
    @include('partials.profiles.components.btn-company')
    <hr>

    <!--- Table Data--->
    <h5 class="text-danger text-uppercase custom-f-s-small mb-5">@lang('List Branches')</h5>

    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="custom-f-s-small">#ID</th>
                <th scope="col" class="custom-f-s-small">Rol</th>
                <th scope="col" class="custom-f-s-small">Empresa</th>
                <th scope="col" class="custom-f-s-small">Sucursal</th>
                <th scope="col" class="custom-f-s-small">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row" class="custom-f-s-small">1</th>
                <td class="custom-f-s-small">Administración</td>
                <td class="custom-f-s-small">Clinicas Red</td>
                <td class="custom-f-s-small">Norte</td>
                <td class="custom-f-s-small">
                    <button class="btn btn-danger btn-pill custom-f-s-small btn-small" type="button">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <th scope="row" class="custom-f-s-small">2</th>
                <td class="custom-f-s-small">Operaciones</td>
                <td class="custom-f-s-small">Clinicas Red</td>
                <td class="custom-f-s-small">Norte</td>
                <td class="custom-f-s-small">
                    <button class="btn btn-danger btn-pill custom-f-s-small btn-small" type="button">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <th scope="row" class="custom-f-s-small">3</th>
                <td class="custom-f-s-small">Ingenieros</td>
                <td class="custom-f-s-small">Clinicas Red</td>
                <td class="custom-f-s-small">Sur</td>
                <td class="custom-f-s-small">
                    <button class="btn btn-danger btn-pill custom-f-s-small btn-small" type="button">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
    <!---- --->

    <h5 class="text-danger text-uppercase custom-f-s-small mb-3 mt-5">@lang('Add') @lang('Branch')</h5>
    <form action="{{ route('profile.update', ['profile']) }}" method="post" enctype="multipart/form-data"
        id="form-profile" class="form-custom">
        @csrf

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-12">
                <div class="form-group">
                    <label for="name" class="control-label text-uppercase custom-f-s-small">* @lang('Name Branch')</label>
                    <input type="text" name="name" class="form-control" value=""> {{-- {{ $user->name }} --}}
                    @if ($errors->has('name'))
                        <span class="small text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-12">
                <div class="form-group">
                    <label for="company_id" class="control-label text-uppercase custom-f-s-small"
                    title="Elige la empresa">* @lang('Company')</label>
                    <select name="countrycode" class="form-control" required="required">
                        @foreach (cache()->get('countries.json') as $countrycode)
                            <option value="{{ $countrycode->dial_code }}" {{ ($user->getMeta('blog', 'countrycode') == $countrycode->dial_code) ? 'selected' : '' }}>
                                 {{ $countrycode->name }} {{ $countrycode->dial_code }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('company_id'))
                        <span class="small text-danger">{{ $errors->first('company_id') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-12">
                <div class="form-group">
                    <label for="comments" class="control-label text-uppercase custom-f-s-small"
                    title="Comentarios adicionales">* @lang('Comments')</label>
                    <input type="text" name="comments" class="form-control" value="{{ $user->comments }}">
                    @if ($errors->has('comments'))
                        <span class="small text-danger">{{ $errors->first('comments') }}</span>
                    @endif
                </div>
            </div>

        </div>

        <p class="small font-italic custom-f-s-small">
            (*) @lang('The field is required')
        </p>

        <div class="form-group text-center">
            <input type="submit" value="@lang('Add')" class="btn btn-danger btn-pill custom-f-s-small">
        </div>
    </form>




</div>
