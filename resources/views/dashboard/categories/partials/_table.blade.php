@if (count($categories)>0)
<div class="table-responsive">
    <!--<table class="table table-hover table-bordered">-->
        <table class="table table-hover table-bordered" data-order='[[ 2, "desc" ]]'>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Traducción</th>
                <th>Slug</th>
                <th>Codigo</th>
                <th>Exclusivo</th>
                @if(!$subcategory)
                    <th>Sub categorías</th>
                @endif
                <th>Actualizado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)

                <tr>
                    <td class="small">{{ $category->id }}</td>
                    <td class="small">{{ $category->present()->name }}</td>
                    <td class="small">{{ $category->present()->translate_en }}</td>
                    <td class="small">{{ $category->present()->slug }}</td>
                    <td class="small">{{ $category->present()->code }}</td>
                    <td class="small">
                        @if ($category->exclusive == 1)
                            Qdplay
                        @else
                            Generico
                        @endif
                    </td>
                    @if(!$subcategory)
                        <td class="small">{{ number_format($category->getManyChilds($category->id)->count()) }}</td>
                    @endif
                    <td class="small">{{ $category->getDateHuman($category->updated_at) }}</td>
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
