<h5 class="text-bold text-uppercase mb-1 mt-4">
    Promedio de horas que se le dedica al d&iacute;a:
</h5>

<h5 class="text-bold mb-4 mt-1">
    @php
        $_date = explode('-', $date);
    @endphp
    {{ getMonthSpanish($_date[1]) }} {{ $_date[0]}}
</h5>
<!-------------------------->
<!-------------------------->
<div class="row" style="margin-top: 1em;">
    <table class="table table-light" style="margin: 1rem 0; ">
        <tbody>
            <tr style="border: 0pt solid transparent;"><!--height: 200px; -->
                @php
                    $max_length = 0;
                    foreach ($time_per_day as $d)
                    if ($d->day_length > $max_length)
                        $max_length = $d->day_length;

                    $last_day_month = date('t', strtotime(request('date', date('Y-m-d'))));
                    $month = date('M', strtotime(request('date', date('Y-m-d'))));
                @endphp

                @for($day = 1; $day <= $last_day_month; ++$day)
                    @php $day_length = 0; @endphp
                        @foreach ($time_per_day as $d)
                            @if($d->day === $day)
                                @php
                                    $day_length = $d->day_length;
                                    break;
                                @endphp
                            @endif
                        @endforeach

                        @if($day_length > 0)
                            @php $hours = \QD\QDPlay\Formats::toHours($day_length); @endphp
                        @else
                            @php $hours = '00:00 hrs'; @endphp
                        @endif

                        <td style="width:1px; padding:2px;">
                            <p style="transform: rotate(270deg); letter-spacing: 0px; position: absolute; bottom: auto; font-size:12px;">
                                {{ $day }} &nbsp; <b> {{ $hours }} </b>
                            </p>
                        </td>
                @endfor
                <td style="width:1px; padding:2px;">
                    <p style="transform: rotate(270deg); letter-spacing: 1px; position: absolute; bottom: auto; font-size:12px;">
                        ........
                    </p>
                </td>
                <td style="width:1px; padding:2px;">
                    <p style="transform: rotate(270deg); letter-spacing: 1px; position: absolute; bottom: auto; font-size:12px;">
                        ........
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
</div>
