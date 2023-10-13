<table class="table table-hover table-bordered" data-order='[[ 0, "asc" ]]'>
            <thead>
                <tr>
                    <th>@lang('Administrator')</th>
                    <th>@lang('Admin')</th>
                    <th>@lang('User ID')</th>
                    <th>@lang('Full name')</th>
                    <th>@lang('Email')</th>
                    <th>@lang('Plan')</th>
                    <th>@lang('Landing Code')</th>
                    <th>@lang('Course')</th>
                    <th>@lang('Course duration')</th>
                    <th>@lang('Minutes watched')</th>
                    <th>@lang('Advance percentage')</th>
                </tr>
            </thead>

            <tbody>
                @foreach($data as $item)
                @php
                $duration = getDurationForCourse($item->course_id);
                @endphp
                @if($item->user_id)
                <tr>
                    <td>{{ $item->administrador }}</td>
                    <td>{{ getNameUser($item->administrador) }}</td>
                    <td>{{ $item->user_id }}</td>
                    <td>{{ $item->nombre_completo }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->plan }}</td>
                    <td>{{ $item->code }}</td>
                    {{--<td>{{ $item->course_id }}</td>--}}
                    <td>{{ $item->curso }}</td>
                    <td>
                        {{--{{ convertNumerToHour(number_format($duration,2)) }}<br>--}}
                        {{ \QD\QDPlay\Formats::toHoursMinutes($duration*60) }}
                    </td>
                    <td>
                        {{--{{ convertNumerToHour(number_format($item->min_vistos,2)) }} <br>--}}
                        {{ \QD\QDPlay\Formats::toHoursMinutes($item->min_vistos*60) }}
                    </td>
                    <td>
                        @php
                        $getPorcent = (($item->min_vistos * 100)/$duration);
                        $avance = ($getPorcent>99) ? 100 : $getPorcent;
                        @endphp
                        {{ number_format($avance,2) }}%
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
