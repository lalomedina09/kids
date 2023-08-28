<table class="table table-hover table-bordered" data-order='[[ 0, "asc" ]]'>
            <thead>
                <tr>
                    <th>@lang('Administrator')</th>
                    <th>@lang('Admin')</th>
                    <th>@lang('User ID')</th>
                    <th>@lang('Full name')</th>
                    <th>@lang('Email')</th>
                    <th>@lang('Course')</th>
                    <th>@lang('Course duration')</th>
                    <th>@lang('Minutes watched')</th>
                    <th>@lang('Advance percentage')</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>@lang('Administrator')</th>
                    <th>@lang('Admin')</th>
                    <th>@lang('User ID')</th>
                    <th>@lang('Full name')</th>
                    <th>@lang('Email')</th>
                    <th>@lang('Course')</th>
                    <th>@lang('Course duration')</th>
                    <th>@lang('Minutes watched')</th>
                    <th>@lang('Advance percentage')</th>
                </tr>
            </tfoot>

            <tbody>
                @foreach($data as $item)
                    @php
                        $duration = getDurationForCourse($item->course_id);
                    @endphp
                    <tr>
                        <td>{{ $item->administrador }}</td>
                        <td>{{ getNameUser($item->administrador) }}</td>
                        <td>{{ $item->user_id }}</td>
                        <td>{{ $item->nombre_completo }}</td>
                        <td>{{ $item->email }}</td>
                        {{--<td>{{ $item->course_id }}</td>--}}
                        <td>{{ $item->curso }}</td>
                        <td>{{ number_format($duration,2) }} Min</td>
                        <td>{{ number_format($item->min_vistos,2) }} Min</td>
                        <td>
                            @php
                                $getPorcent = (($item->min_vistos * 100)/$duration);
                                $avance = ($getPorcent>99) ? 100 : $getPorcent;
                            @endphp
                            {{ number_format($avance,2) }}%
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
