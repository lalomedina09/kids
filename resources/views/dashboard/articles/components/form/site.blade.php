<div class="card mb-4">
    <div class="card-header">
        Sitio a publicar
    </div>

    <div class="card-body">
        <div class="form-group">
            <select class="form-control" name="site" required="required">
                <!--<option value="" {{ ($article->site === "") ? 'selected="selected"' : '' }}>Elige el sitio</option>-->
                <option value="queridodinero.com" {{ ($article->site === "queridodinero.com") ? 'selected="selected"' : '' }}>queridodinero.com</option>
                <option value="dear-money.com" {{ ($article->site === "dear-money.com") ? 'selected="selected"' : '' }}>dear-money.com</option>
            </select>
        </div>
    </div>
</div>
