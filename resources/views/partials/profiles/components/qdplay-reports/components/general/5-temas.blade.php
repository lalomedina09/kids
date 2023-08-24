<h5 class="text-bold text-uppercase">
    Top 5 temas m&aacute;s vistos este mes por mis colaboradores:
</h5>
<h5 class="text-bold mb-1 mt-1">
    @php
        $_date = explode('-', $date);
    @endphp
    {{ getMonthSpanish($_date[1]) }} {{ $_date[0]}}
</h5>
<div class="row">
    @php
        $max_views = 0;
        if (count($most_watched_categories) > 0)
        $max_views = $most_watched_categories[0]->total_views;
    @endphp

    <table class="table table-light">
        <tbody>
            <tr style="border: 1pt solid transparent;">
                @foreach ($most_watched_categories as $i => $category)
                    <td style="text-align: center">
                        <div class="star-bar" style="height: {{ (($category->total_views / $max_views) * 5) + 10 }}px;"> </div>
                    </td>
                @endforeach
            </tr>
            <tr style="border: 1pt solid transparent;">
                @foreach ($most_watched_categories as $i => $category)
                    <td style="text-align: center">
                        <!--Categoría <br>-->
                        <b>{{ $category->name }}</b> <br>
                        <b>{{ $category->total_views }} </b> Vistas
                    </td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
