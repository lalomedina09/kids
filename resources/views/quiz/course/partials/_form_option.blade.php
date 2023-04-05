<div class="row">
    @php $count2 = 1; @endphp
    <ul>
        @foreach ($question->options as $option)
            @php
                $nameRadio =  $option->question_id;
                $label = $option->id;
                $numOption = " Opción: ". $count2
            @endphp

                    <input type="radio" id="option{{ $option->question_id }}" required name="answers[{{ $option->question_id }}]" value="{{ $option->id }}" />
                    <label for="option{{ $option->question_id }}" class="font-weight-lighter" title="{{ $option->option }}">{{ $option->option }}</label>
                <br>

            <!--<div class="col-md-4">
                <div class="form-group">
                    <input type="radio" id="option{{ $option->question_id }}" required name="answers[{{ $option->question_id }}]" value="{{ $option->id }}" />
                    <label for="option{{ $option->question_id }}" class="font-weight-lighter" title="{{ $option->option }}">{{ $option->option }}</label>

                </div>
            </div>-->
        @endforeach
    </ul>
</div>
