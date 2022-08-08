<div class="row">

    <div class="col-lg-4">
        {{-- Finanzas para todos --}}
        @include('partials.auth.partials.category',
                [
                    'col' => $col = 4,
                    'name' => 'Finanzas para todos',
                    'code' => 'finance-for-all',
                ]
            )
        {{-- Planeacion --}}
        @include('partials.auth.partials.category',
                [
                    'col' => $col = 4,
                    'name' => 'Planeacion',
                    'code' => 'planning',
                ]
            )

        {{-- Inversion --}}
        @include('partials.auth.partials.category',
                [
                    'col' => $col = 4,
                    'name' => 'Inversion',
                    'code' => 'investment',
                ]
            )
    </div>

    <div class="col-lg-4">
        {{-- Deudas --}}
        @include('partials.auth.partials.category',
                [
                    'col' => $col = 4,
                    'name' => 'Deudas',
                    'code' => 'debts-1',
                ]
            )

        {{-- Empresas --}}
        @include('partials.auth.partials.category',
                [
                    'col' => $col = 4,
                    'name' => 'Empresas',
                    'code' => 'companies1',
                ]
            )

        {{-- Tema de adultos --}}
        @include('partials.auth.partials.category',
                [
                    'col' => $col = 4,
                    'name' => 'Tema de adultos',
                    'code' => 'adult-topics',
                ]
            )

        {{-- Economia --}}
        @include('partials.auth.partials.category',
                [
                    'col' => $col = 4,
                    'name' => 'Economia',
                    'code' => 'economy',
                ]
            )
    </div>


    <div class="col-lg-4">
        {{-- Inmobiliario --}}
        @include('partials.auth.partials.category',
                [
                    'col' => $col = 4,
                    'name' => 'Inmobiliario',
                    'code' => 'real-estate',
                ]
            )

        {{-- Estilo de vida --}}
        @include('partials.auth.partials.category',
                [
                    'col' => $col = 4,
                    'name' => 'Estilo de vida',
                    'code' => 'lifestyle1',
                ]
            )

        {{-- Tecnología --}}
        @include('partials.auth.partials.category',
                [
                    'col' => $col = 4,
                    'name' => 'Tecnologia',
                    'code' => 'technology1',
                ]
            )

        {{-- Editorial --}}
        @include('partials.auth.partials.category',
                [
                    'col' => $col = 4,
                    'name' => 'Editorial',
                    'code' => 'editorial',
                ]
            )
    </div>




    {{--
        <div class="col-lg-4">
            <div class="form-group">
                <label for="registerTopicsSaving" class="text-uppercase text-danger text-underline mb-2">Ahorro e inversion</label>

                @php $category = $categories->where('code', 'savings-investments')->first() @endphp
            @foreach($category->children as $category)
                <div class="custom-control custom-checkbox mt-1">
                    <label class="text-uppercase">
                        <input type="checkbox" name="interests[]" value="{{ $category->id }}"> {{ $category->name }}
                        <span class="custom-control-indicator"></span>
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-group">
            <label for="registerTopicsSaving" class="text-uppercase text-danger text-underline mb-2">Ahorro e inversión</label>
            @php $category = $categories->where('code', 'savings-investments')->first() @endphp

            @foreach($category->children as $category)
                <div class="custom-control custom-checkbox mt-1">
                    <label class="text-uppercase">
                        <input type="checkbox" name="interests[]" value="{{ $category->id }}"> {{ $category->name }}
                        <span class="custom-control-indicator"></span>
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-group">
            <label for="registerTopicsCredits" class="text-uppercase text-danger text-underline mb-2">Créditos y deudas</label>
            @php $category = $categories->where('code', 'debts')->first() @endphp

            @foreach($category->children as $category)
                <div class="custom-control custom-checkbox mt-1">
                    <label class="text-uppercase">
                        <input type="checkbox" name="interests[]" value="{{ $category->id }}"> {{ $category->name }}
                        <span class="custom-control-indicator"></span>
                    </label>
                </div>
            @endforeach
        </div>

        <div class="form-group">
            <label for="registerTopicsLifestyle" class="text-uppercase text-danger text-underline mb-2">Estilo de vida</label>
            @php $category = $categories->where('code', 'lifestyle')->first() @endphp

            @foreach($category->children as $category)
                <div class="custom-control custom-checkbox mt-1">
                    <label class="text-uppercase">
                        <input type="checkbox" name="interests[]" value="{{ $category->id }}"> {{ $category->name }}
                        <span class="custom-control-indicator"></span>
                    </label>
                </div>
            @endforeach
        </div>

        <div class="form-group">
            <label for="registerTopicsForecast" class="text-uppercase text-danger text-underline mb-2">Previsión</label>
            @php $category = $categories->where('code', 'forecast')->first() @endphp

            @foreach($category->children as $category)
                <div class="custom-control custom-checkbox mt-1">
                    <label class="text-uppercase">
                        <input type="checkbox" name="interests[]" value="{{ $category->id }}"> {{ $category->name }}
                        <span class="custom-control-indicator"></span>
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-group">
            <label for="registerTopicsTechnology" class="text-uppercase text-danger text-underline mb-2">Tecnología</label>
            @php $category = $categories->where('code', 'technology')->first() @endphp

            @foreach($category->children as $category)
                <div class="custom-control custom-checkbox mt-1">
                    <label class="text-uppercase">
                        <input type="checkbox" name="interests[]" value="{{ $category->id }}"> {{ $category->name }}
                        <span class="custom-control-indicator"></span>
                    </label>
                </div>
            @endforeach
        </div>

        <div class="form-group">
            <label for="registerTopicsEntrepreneurs" class="text-uppercase text-danger text-underline mb-2">Emprendedores</label>
            @php $category = $categories->where('code', 'entrepreneurs')->first() @endphp

            @foreach($category->children as $category)
                <div class="custom-control custom-checkbox mt-1">
                    <label class="text-uppercase">
                        <input type="checkbox" name="interests[]" value="{{ $category->id }}"> {{ $category->name }}
                        <span class="custom-control-indicator"></span>
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    --}}
</div>
