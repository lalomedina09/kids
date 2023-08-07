<form class="row" method="post" action="{{ route('register.qdplay.signup.save') }}">
    @csrf
    <input type="hidden" name="codeConcept" value="{{ $codeConcept }}" placeholder="*Code" class="form-control" />

    <div class="col-sm-6 col-12 p-1">
        <input type="text" name="name" placeholder="*Nombre" class="form-control" />
    </div>
    <div class="col-sm-6 col-12 p-1">
        <input type="text" name="last_name" placeholder="*Apellido" class="form-control" />
    </div>
    <div class="col-12 p-1">
        <input type="email" name="email" placeholder="*Correo Electrónico" class="form-control" />
    </div>
    <div class="col-12 p-1">
        <input type="password" name="password" id="pass" placeholder="*Contraseña" class="form-control" />
    </div>
    <label class="col-12 p-1" style="font-size: 1rem;">
        <input type="checkbox" name="showpass" id="showpass" /> Mostrar contraseña
    </label>

    <div class="col-sm-6 col-12 p-1">
        <button class="btn bg-green-blue btn-rounded text-white text-initial text-bold w-100">
            Comenzar a aprender</button>
    </div>
    <div class="col-sm-6 col-12 p-1">
        {{--<select placeholder="Elige un plan" class="w-100 form-control">

        </select>--}}
    </div>
</form>
