<div class="table-responsive">

        {{--<div class="text-right">
            <a class="btn btn-info" href="{{ url($page) }}" target="_blank">
                Ver Landing
            </a>
            <a class="btn btn-success" href="{{ route('dashboard.landings.export.results.excel', [$page]) }}">
                Exportar resultados Excel
            </a>
            <br>
        </div>--}}
        <br>
        <table class="table table-hover table-bordered" data-order='[[ 0, "asc" ]]'>
            <thead>
                <tr>
                    <th>Num</th>
                    <th>Curso</th>
                    <th>Quiz</th>
                    <th>Comentarios</th>
                    <th>Preguntas</th>
                    <th>Actualizado</th>
                    <th>Acciones</th>
                    {{--<th>Estado</th>--}}
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Num</th>
                    <th>Curso</th>
                    <th>Quiz</th>
                    <th>Comentarios</th>
                    <th>Preguntas</th>
                    <th>Actualizado</th>
                    <th>Acciones</th>
                    {{--<th>Estado</th>--}}
                </tr>
            </tfoot>
            <tbody>
                @php $count = 1; @endphp
                @foreach($quizzes as $result)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $result->quizzesable->name }}</td>
                        <td>{{ $result->title }}</td>
                        <td>{{ $result->comments }}</td>
                        <td>{{ count($result->questions) }}</td>
                        <td class="small"> {{ getCustomDateHuman($result->updated_at) }} </td>
                        <td class="text-center">
                            {{--
                            <a href="{{ route('dashboard.quizzes.edit', $result->id) }}" class="btn btn-sm btn-outline-warning">
                                <i class="lni lni-pencil"></i>
                            </a>

                            <a href="{{ route('dashboard.quizzes.show', $result->id) }}" class="btn btn-sm btn-outline-info">
                                <i class="lni lni-eye"></i>
                            </a>

                            <a href="{{ route('dashboard.quizzes.destroy', $result->id) }}" class="btn btn-sm btn-outline-danger">
                                <i class="lni lni-trash-can"></i>
                            </a>
                            --}}
                            <a href="{{ route('dashboard.questions.create', $result->id) }}"
                                class="btn btn-sm btn-outline-warning"
                                title="Agregar Preguntas al Quiz">
                                <i class="lni lni-plus"></i>
                            </a>
                            {{--{!! Link::delete('Remover', ['route' => ['dashboard.categories.destroy', $category->id]]) !!}--}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><!-- .table -->
    </div><!-- .table-responsive -->
