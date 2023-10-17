<div class="btn-group float-right">
    <a href="{{ route('dashboard.qdplay.reports.behavior.excel') }}" class="btn btn-outline-success">
        Exportar Datos Excel
    </a>
</div>

<br><br><br>

<table class="table table-responsive table-hover table-bordered" data-order='[[ 0, "asc" ]]'>
    <thead>
        <tr>
            <th>@lang('Plan')</th>
            <th>@lang('Colaborador')</th>
            <th>@lang('Code')</th>
            <th>@lang('User ID')</th>
            <th>@lang('Name')</th>
            <th>@lang('Last Name')</th>
            <th>@lang('Email')</th>
            <th>@lang('Course')</th>
            <th>@lang('Lesson')</th>
            <th>@lang('Registro')</th>
            <th>@lang('Source')</th>
            <th>@lang('Duration Lesson')</th>
            <th>@lang('Seen Time')</th>
        </tr>
    </thead>

    <tbody>
        @foreach($data as $user)
        @if($user)
        @foreach ($user as $behavior)
        <tr>
            <td>{{ $behavior->plan }}</td>
            <td>
                @if($behavior->area) Colaborador @else Independiente @endif
            </td>
            <td>{{ $behavior->code }}</td>
            <td>{{ $behavior->id }}</td>
            <td>{{ $behavior->name }}</td>
            <td>{{ $behavior->last_name }}</td>
            <td>{{ $behavior->email }}</td>
            <td>{{ $behavior->curso }}</td>
            <td><b>{{ $behavior->leccion }}</b></td>
            <td>{{ $behavior->registro }}</td>
            <td>
                @if ($behavior->origen == "web/qdplay/watch")
                Web
                @else
                App
                @endif

            </td>
            <td>
                {{ \QD\QDPlay\Formats::convertMinutes($behavior->duracion_video_seg) }} <br>
                {{--{{ round($behavior->duracion_video_seg) }} Seg--}}
            </td>
            <td>
                {{ \QD\QDPlay\Formats::convertMinutes($behavior->duracion_visualizado_seg) }} <br>
                {{--{{ round($behavior->duracion_visualizado_seg) }} Seg--}}
            </td>
        </tr>
        @endforeach
        @endif
        @endforeach
    </tbody>
</table>
