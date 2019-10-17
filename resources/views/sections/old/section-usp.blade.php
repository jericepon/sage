@if (!empty($section->usp))

	@php ($desktopSlider = '')
	@php ($mobileSlider = '')

	@if (count($section->usp) > 3)
		@php ($desktopSlider = 'js-usp-slider')
	@endif

	@if (count($section->usp) > 1)
		@php ($mobileSlider = 'js-usp-slider-mobile')
	@endif

	<section class="section usp {{ $section->classes ?? '' }} js-slider">
		<div class="trust-bar">
			<div class="container d-lg-block d-none {{ $desktopSlider }}" data-autoplay="{{ $section->slider_speed }}">

				@foreach ($section->usp as $item)

					@if ($loop->iteration % 3 === 1)
						<div class="item">
					@endif

						@include( 'partials.usp-item' )

					@if ($loop->iteration % 3 === 0 || $loop->last)
						</div>
					@endif

				@endforeach

			</div>

			<div class="container d-lg-none d-block {{ $mobileSlider }}" data-autoplay="{{ $section->slider_speed }}">
					@foreach ($section->usp as $item)
						@include( 'partials.usp-item' )
					@endforeach
			</div>

		</div>
	</section>
@endif
