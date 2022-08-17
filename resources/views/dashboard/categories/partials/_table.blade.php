@if (count($categories)>0)
<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Slug</th>
                <th>Codigo</th>
                <th>Exclusivo</th>
                @if(!$subcategory)
                    <!--<th>Artículos</th>-->
                    <th>Sub categorías</th>
                @endif
                <th>Actualizado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Slug</th>
                <th>Codigo</th>
                <th>Exclusivo</th>
                @if(!$subcategory)
                    <!--<th>Artículos</th>-->
                    <th>Sub categorías</th>
                @endif
                <th>Actualizado</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach($categories as $category)

                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->present()->name }}</td>
                    <td>{{ $category->present()->slug }}</td>
                    <td>{{ $category->present()->code }}</td>
                    <td>
                        @if ($category->code == 1)
                            Qdplay
                        @else
                            Generico
                        @endif
                    </td>
                    {{--<td>{{ number_format($category->articles->count()) }}</td>--}}
                    @if(!$subcategory)
                        <td>{{ number_format($category->getManyChilds($category->id)->count()) }}</td>
                    @endif
                    <td>{{ $category->getDateHuman($category->updated_at) }}</td>
                    <td class="text-center">
                        <a href="{{ route('dashboard.categories.edit', $category->id) }}" class="btn btn-sm btn-outline-warning">
                            <i class="lni lni-pencil"></i>
                        </a>
                        @if(!$subcategory)
                            <a href="{{ route('dashboard.categories.show', $category->id) }}" class="btn btn-sm btn-outline-info">
                                <i class="lni lni-eye"></i>
                            </a>
                        @else
                            <a href="{{ route('dashboard.categories.destroy', $category->id) }}" class="btn btn-sm btn-outline-danger">
                                <i class="lni lni-trash-can"></i>
                            </a>
                        @endif
                        {{--{!! Link::delete('Remover', ['route' => ['dashboard.categories.destroy', $category->id]]) !!}--}}
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>

@else
    <div class="col-md-12">
        <p>Comienza agregar subcategorias</p>
    </div>
@endif
