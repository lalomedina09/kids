@extends('layouts.dashboard.admin')

@section('dashboard-content')

    <div class="row mb-5">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-8 col-12">
            <h3>
                <a href="{{ route('dashboard.reports.index') }}">Reportes</a>
                »
                <a href="{{ route('dashboard.reports.exercises.index') }}">Ejercicios</a>
                » Deuda
            </h3>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-4 col-12">
            <a href="{{ route('dashboard.reports.exercises.debt.download') }}"
                class="btn btn-sm btn-outline-primary float-right"
                data-method="post"
                data-token="{{ csrf_token() }}"
            ><span class="fa fa-download"></span> @lang('Download')</a>
        </div>
    </div>



    <div class="table-responsive">
        <table class="table table-hover table-bordered" data-order='[[ 4, "desc" ]]'>
            <thead>
                <tr>
                    @foreach($data['headers'] as $header)
                        <th>{{ $header }}</th>
                    @endforeach
                </tr>
            </thead>
            <tfoot>
                <tr>
                    @foreach($data['headers'] as $header)
                        <th>{{ $header }}</th>
                    @endforeach
                </tr>
            </tfoot>
            </tbody>
                @if(array_key_exists('data', $data) && !empty($data['data']))
                    @foreach($data['data'] as $results)
                        <tr>
                            @foreach($results as $result)
                                <td class="centered small">{{ $result }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td align="middle" colspan="{{ count($data['headers']) }}">
                            <p class="strong">Sin resultados</p>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

@endsection
