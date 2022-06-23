<ul class="list-unstyled list-inline education--list text-center">
    <li class="list-inline-item {{ active_class('talleres') }}">
        <a href="{{ route('courses.index') }}" class="text-uppercase">
            <span>Todos</span>
        </a>
    </li>

    @foreach($categories as $category)
        <li class="list-inline-item {{ active_class('talleres/'.$category->present()->slug) }}">
            <a href="{{ route('courses.category.index', [$category->slug]) }}" class="text-uppercase">
                <img src="{{ asset('images/education/'. $category->code .'.png') }}" alt="Category logo">
                <span>@php $c=explode(' ', $category->name); echo end($c); @endphp</span>
            </a>
        </li>
    @endforeach
</ul>
