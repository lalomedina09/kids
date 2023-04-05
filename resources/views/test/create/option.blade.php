<div class="row">
    @php $count2 = 1; @endphp
    @foreach ($question->options as $option)
        @php
            $nameRadio =  $option->question_id;
            $label = $option->id;
            $numOption = " Opción: ". $count2
        @endphp
        <div class="col-md-4">
            <div class="form-group">
                <!----------->
                <label class="content-input">
                    <input type="checkbox" name="Vehiculo" id="autovia" value="autovia">Autovia
                    <i></i>
                </label>
                <!----------->
                {{--
                <input type="radio" id="option{{ $option->question_id }}" required name="answers[{{ $option->question_id }}]" value="{{ $option->id }}" />
                <label for="option{{ $option->question_id }}" title="{{ $option->option }}">{{ $option->option }}</label>
                --}}
            </div>
        </div>
    @endforeach
</div>
