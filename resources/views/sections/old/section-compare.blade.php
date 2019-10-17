{{--  Compare Product  --}}

{{-- TODO: Add class .is-selected if used in Selected Product page --}}
@if ( $section->title || $section->product || $section->products_to_compare )
	<section class="section compare-product {{ $section->classes ?? '' }}">
		<div class="clouds">
			<figure>
				<img data-src="@asset('images/graphics/clouds.png')" class="d-none d-md-block lazy" alt="" srcset="">
				<img data-src="@asset('images/graphics/cloud.png')" class="d-block d-md-none lazy" alt="" srcset="">
			</figure>
		</div>
		<div class="container position-relative">

			@if ($section->title)
				<div class="compare-product-header text-center">
					@if($section->is_h1)
						<h1 class="title h2">{!! $section->title !!}</h1>
					@else
						<div class="title h2">{!! $section->title !!}</div>
					@endif					
				</div>
			@endif
			
			@if ($section->product || $section->products_to_compare)
				<div class="compare-product-body">

					@if ($section->product)
						<div class="product-first">
							<div class="row align-items-start align-items-lg-center">
								<div class="col-lg-4 order-1 order-lg-0">
									<div class="content text-right">
										<div class="title h3">{!! $section->product->title !!}</div>
										<p>{!! $section->product->description !!}</p>

										@if (!empty($section->product->link) && !empty($section->cta_text))
											<a class="btn btn-lg btn-outline-primary ml-auto d-none d-lg-block" href="{{ $section->product->link }}">{!! $section->cta_text !!}</a>
											<a class="btn btn-sm btn-outline-primary ml-auto d-block d-lg-none" href="{{ $section->product->link }}">{!! $section->cta_text !!}</a>
										@endif
									</div>
								</div>
								<div class="col-lg-4 align-self-start order-0 order-lg-1">
									<div class="product-compare-line product-compare-line-mobile d-block d-lg-none"></div>
									<figure class="image">
										@if (wp_is_mobile())
											<img class="lazy" data-src="{{ $section->product->image_mobile }}" alt="" srcset="">
										@else
											<img class="lazy" data-src="{{ $section->product->image }}" alt="" srcset="">
										@endif
									</figure>
								</div>
							</div>
							<div class="product-first-overlay"></div>
						</div>
					@endif

					@if ($section->products_to_compare)
						<div class="product-second">
							<div class="half-clouds">
								<figure>
									@if (wp_is_mobile())
										<img data-src="@asset('images/graphics/half-cloud.png')" class="lazy" alt="" srcset="">
										{{-- d-block d-lg-none --}}
									@else
										<img data-src="@asset('images/graphics/half-clouds.png')" class="lazy" alt="" srcset="">
										{{-- d-lg-block d-none --}}
									@endif
								</figure>
							</div>
							<div class="js-compare-slider">
								@foreach ($section->products_to_compare as $product)
									<div class="product-compare-item">
										<div class="row align-items-start align-items-lg-center">
											<div class="col-lg-4 align-self-start offset-lg-4">
												<figure class="image">

													@if (!empty($product->image))
														@if (wp_is_mobile())
															<img class="lazy" data-src="{{ $product->image_mobile }}" alt="" srcset="">
														@else
															<img class="lazy" data-src="{{ $product->image }}" alt="" srcset="">
														@endif
													@endif
													
												</figure>
											</div>
											<div class="col-lg-4">
												<div class="content text-left">
													<div class="title h3">{!! $product->title !!}</div>
													<p>{!! $product->description !!}</p>

													@if (!empty($product->link) && !empty($section->cta_text))
														<a class="btn btn-lg btn-outline-primary d-none d-lg-block" href="{{ $product->link }}">{!! $section->cta_text !!}</a>
														<a class="btn btn-sm btn-outline-primary d-block d-lg-none" href="{{ $product->link }}">{!! $section->cta_text !!}</a>
													@endif
												</div>
											</div>
										</div>
									</div>
								@endforeach
							</div>
						</div>

						<div class="product-compare-line d-none d-lg-block"></div>
						<div class="product-compare-page-dots d-none d-lg-block">
							<ol class="page-dots">
								@foreach ($section->products_to_compare as $key=>$product)
									<li class="dot {{ $key === 0 ? 'is-selected' : '' }}"></li>
								@endforeach
							</ol>
						</div>
					@endif

				</div>
			@endif

		</div>

		<div class="corner-cut corner-cut-top-left-sm"></div>
		<div class="corner-cut corner-cut-bottom-right-sm"></div>

	</section>
@endif