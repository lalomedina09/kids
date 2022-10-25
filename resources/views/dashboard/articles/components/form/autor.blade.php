<div class="card mb-4">
    <div class="card-header">
        Autor
    </div>

    <div class="card-body">
        @can('blog.articles.publish')
            <div class="form-group">
                <select name="author_id"
                    id="author" class="form-control">
                    @foreach ($authors as $id => $fullname)
                        <option value="{{ $id }}"
                            {{ ($article->author_id == $id) ? 'selected="selected"' : '' }}>
                            {{ $fullname }}
                        </option>
                    @endforeach
                </select>
            </div>
        @else
            <p>{{ auth()->user()->present()->fullname }}</p>
        @endif
    </div>
</div>
