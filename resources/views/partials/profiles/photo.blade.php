@push('styles-inline')
<style type="text/css">
	#profile-photos .circle {
		-webkit-appearance: none !important;
		-moz-appearance: none !important;
		-o-appearance: none !important;
		-ms-appearance: none !important;appearance: none !important;
		width: 100px;
		height: 100px;
		border: 3px solid #000;
		border-radius: 50%;
		cursor: pointer;
		outline: 0;
		vertical-align: middle;
		background-size: contain;
	}

	#profile-photos .circle:checked,
	#profile-photos .circle:checked~input
	{
		border: 5px solid #96C865;
	}

	#profile-photos img.image--profile-change:not([src=""]) {
		border: 5px solid #96C865;
	}

	#drop_zone {
		display: block;
		margin: 0 auto;
		padding: 1em;
		border: 4px solid #18b79b;
		border-radius: 40px;
		max-width: 500px;
		text-align: center;
		font-weight: bold;
	}

	#drop_zone.highlight {
		border: 4px solid #7da958;
	}
</style>
@endpush

<div id="{{ str_slug(__('Change profile photo')) }}" class="tab-pane">
	<a href="#{{ str_slug(__('General information')) }}"
		data-toggle="tab"
		><img src="{{ asset('etapa1/2. visualizacion curso-06.png') }}" alt="Regresar" class=" icon-40 mb-3" /></a>
	
	<h5 class="text-uppercase mb-3">@lang('Change profile photo')</h5>

	<div class="row mb-3" id="profile-photos">
		@for ($i = 5; $i <= 15; ++$i)
		<div class="col-2 mb-1" style="min-width: 100px;">
			<input type="radio" name="profile_photo_radio" value="{{ 'etapa1/7. Perfiles-' . str_pad($i,2,'0',STR_PAD_LEFT) . '.png' }}" class="circle"
				   style="background-image: url('{{ asset('etapa1/7. Perfiles-' . str_pad($i,2,'0',STR_PAD_LEFT) . '.png') }}')" />
		</div>
		@endfor

		<div class="col-2 mb-1" style="min-width: 100px;">
			<label for="profile_photo">
				<img src="" id="profile_photo_img" class="image--profile-change circle" />
			</label>
		</div>
	</div>
	
	<label for="profile_photo" id="drop_zone"
		 ondragover="highlightHandler(event);"
		 ondragenter="highlightHandler(event);"
		 ondragleave="unhighlightHandler(event);"
		 ondrop="dropHandler(event);">
		<img src="{{ asset('etapa1/upload.png') }}" alt="@lang("Upload")" />
		<p>Arrastra tu foto aqu&iacute;<br />o Selecciona desde tu computadora</p>
	</label>
</div>

@push('scripts-inline')
<script type="text/javascript">
	var profile_photo_checked = document.getElementById('profile_photo_checked'),
		profile_photo_radios = document.getElementsByName('profile_photo_radio'),
		profile_photo_img = document.getElementById('profile_photo_img'),
		profile_photo_drop_area = document.getElementById('profile_photo_drop_area');
	
	profile_photo_img.onload = function() {
		if (profile_photo_img.src)
			for(let j=0;j<profile_photo_radios.length;++j)
				profile_photo_radios[j].checked = false;
		profile_photo_checked.value = null;
		window.location.hash = "#{{ str_slug(__('General information')) }}";
	};
	
	function dropHandler(ev) {  
		ev.preventDefault();
		drop_zone.classList.remove('highlight');
		document.getElementById('profile_photo').files = ev.dataTransfer.files;
		$("#profile_photo").change();
		window.location.hash = "#{{ str_slug(__('General information')) }}";
	}

	function highlightHandler(ev) {
		ev.preventDefault();
		drop_zone.classList.add('highlight');
	}
	
	function unhighlightHandler(ev) {
		ev.preventDefault();
		drop_zone.classList.remove('highlight');
	}

	for (var i=0;i<profile_photo_radios.length;++i)
		profile_photo_radios[i].onchange = function() {
			if (this.checked) {
				profile_photo_checked.value = this.value;
				$('.image--profile-change').first().attr('src', this.value);
				$('.image--profile-change__alert').removeClass('d-none');
				window.location.hash = "#{{ str_slug(__('General information')) }}";
			}
		}
	
</script>
@endpush