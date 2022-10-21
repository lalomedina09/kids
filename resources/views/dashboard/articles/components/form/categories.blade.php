<div class="card mb-4">
                <div class="card-header">
                    Categorías
                </div>

                <div class="card-body">
                    @forelse($categories as $category)
                        <div class="custom-control custom-checkbox">
                            {!! Form::checkbox('categories[]', $category->id, null, ['id' => $category->slug, 'class' => 'custom-control-input']) !!}
                            <label for="{{ $category->slug }}" class="custom-control-label"> {!! $category->name !!}</label>
                        </div>
                    @empty
                        <p>No hay categorías en la base de datos.</p>
                    @endforelse
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    Subcategorías (Etiquetas)
                </div>

                <div class="card-body">
                    @forelse($tags as $tag)
                        <div class="custom-control custom-checkbox">
                            {!! Form::checkbox('tags[]', $tag->id, null, ['id' => $tag->slug, 'class' => 'custom-control-input']) !!}
                            <label for="{{ $tag->slug }}" class="custom-control-label"> {!! $tag->name !!}</label>
                        </div>
                    @empty
                        <p>No hay etiquetas en la base de datos.</p>
                    @endforelse
                </div>
            </div>
