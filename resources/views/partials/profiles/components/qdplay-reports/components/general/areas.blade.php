<br>
<h5 class="text-bold text-uppercase mb-1 mt-4">Avance por &aacute;reas de la empresa:</h5>
<h5 class="text-bold mb-1 mt-1">
    @php
        $_date = explode('-', $date);
    @endphp
    {{ getMonthSpanish($_date[1]) }} {{ $_date[0]}}
</h5>
	<div class="row mb-2">
        <!---------------------------------------------->
        <table class="table table-light">
        <tbody>
            <tr style="border: 1pt solid transparent;">
                <!---------------------------------------------->
                @php
                    $completed = 0;
                    $current_area = null;
                @endphp

                @foreach($progress_per_area as $progress)
                    @if($progress->area !== $current_area)
                        @php
                            $completed = 0;
                            $current_area = $progress->area;
                        @endphp
                    @endif
                    @php $min_end_length = 0.95 * $progress->length; @endphp
                    @if($progress->end >= $min_end_length && $progress->length >= $min_end_length)
                        @php ++$completed @endphp
                    @endif
                @endforeach

                @if (!is_null($current_area))
                    @php
                        if ($mandatory_videos_count > 0) {
                            $degrees = (1 - ($completed / $mandatory_videos_count)) * 360;
                            $percentage = number_format(ceil($completed / $mandatory_videos_count * 100),0);
                        } else {
                            $degrees = $percentage = 0;
                        }
                    @endphp
                    <td style="text-align: center">
                        {{ $current_area }} : {{ $percentage }}% <br>
                    </td>
                @endif
            </tr>
        </tbody>
    </table>
	</div>
