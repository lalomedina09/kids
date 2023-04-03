<style>
    .label {
        display: inline;
        padding: 0.2em 0.6em 0.3em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0.25em;
    }

    .label-success {
        background-color: #5cb85c;
    }
</style>
<div class="row">
    @php $count2 = 1; @endphp
    @foreach ($question->options as $option)
        <div class="col-md-3">
            <div class="card m-3">
                <p class="m-2">
                    <b>R{{ $count2++ }}</b>.- {{ $option->option }} <br><br>
                    <b>Tipo:</b>
                    @if($option->is_correct == 1)
                    <span class="label label-success" style="border-radius: 0.25em;color: #fff;background-color: #5cb85c;padding: 0.2em 0.6em 0.3em;">
                        <i class="lni lni-checkmark"></i>
                    </span>
                    @else
                        <span class="label label-success" style="border-radius: 0.25em;color: #fff;background-color: #d13b31;padding: 0.2em 0.6em 0.3em;">
                            <i class="lni lni-close"></i>
                        </span>
                    @endif <br>
                </p>
            </div>
        </div>
    @endforeach
</div>
