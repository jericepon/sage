<section class="section product-header no-mb">  
	<div class="container">
		<div class="page-header pb-0">
			<div class="container">
                @if($section->show_section_title)
                    @if($section->is_h1)
                        <h1 class="title h1 text-center">{!! $section->section_title !!}</h1>
                    @else
                        <div class="title h1 text-center">{!! $section->section_title !!}</div>
                    @endif
                @endif

				@if ($section->preamble)
					<div class="content text-center">
						{!! $section->preamble !!}
					</div>
				@endif
			</div>
		</div>

        @if ($section->show_filter)
        <div class="product-header-actionbox row align-items-center">
                <div class="col-lg-7 d-none d-lg-block"></div>        
                <div class="product-filter-toggle col-lg-5 text-center text-lg-right">
                    <div class="h4 d-inline-block mb-0">
                        <div class="js-filter-toggle h4 mb-0">
                            <div class="filter-open js-filter-open show">
                                {{ $section->translation->filter_and_sort_title ?? '' }}
                                <button class="btn btn-lg btn-icon btn-icon-lg btn-default" type="button">
                                    <img class="lazy" data-src="@asset('images/icon/filter-open.svg')" alt="" srcset="">
                                </button>
                            </div>
                            <div class="filter-close hide">
                                <div class="d-none d-lg-block">
                                    {{-- Add .silk-hash-clear to enable ajax clear filter --}}
                                    <a class="btn-clear section-hash-clear" href="#">{{ $section->translation->clear_button ?: 'Clear' }}</a>
                                    <button class="btn btn-primary btn-lg js-filter-close" type="button">{{ $section->translation->update_button ?: 'Update Filter' }}</button>
                                    <button class="btn btn-lg btn-icon btn-icon-lg btn-default js-filter-close" type="button">
                                        <img class="lazy" data-src="@asset('images/icon/filter-close.svg')" alt="" srcset="">
                                    </button>
                                </div>
                                <div class="js-filter-close d-block d-lg-none">
                                    {{ $section->translation->filter_and_sort_title ?? '' }}
                                    <button class="btn btn-lg btn-icon btn-icon-lg btn-default" type="button">
                                        <img class="lazy" data-src="@asset('images/icon/filter-close.svg')" alt="" srcset="">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="product-filter js-filter-collapse lazy" data-bg="url({{ $section->filter_background_image->url ?? '' }})">
                <div class="container">
                    <div class="button-container d-block d-lg-none">
                        <div class="row text-center d-block d-lg-flex">
                            <div class="column pb-0">
                                <button class="btn btn-primary btn-lg js-filter-close" type="button">{{ $section->translation->update_button }}</button>
                            </div>
                        </div>
                    </div>
        
                    <div class="filter-container">
                        <div class="row">
                            {{-- Colors --}}
                            @if($section->product_color && sizeof($section->product_color) > 0)
                                <div class="column">
                                <div class="h4 title js-accordion-toggle">{{ $section->translation->color ?? '' }}</div>
                                <div class="js-accordion-body">
                                    <ul class="color-selector">
                                        @foreach ($section->product_color as $color)
                                            @php $checked = '' @endphp
                                            @if(isset($filter_data['color']) && in_array($color['Name'], $filter_data['color']))
                                                @php $checked = 'checked="checked"' @endphp
                                            @endif
        
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input name="color" {{ $checked }} type="checkbox" id="colorCheck{{ $color['slug'] }}" value="{{ $color['slug'] }}" class="custom-control-input section-hash-filter">
                                                    <label class="custom-control-label" for="colorCheck{{ $color['slug'] }}"
                                                    style="{{ isset($color['Image']) ? 'background-image:url('.$color['Image'].')' : 'background-color:'.$color['Hex'] }};"></label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                </div>
                            @endif

                            {{-- Sizes --}}
                            @if($section->product_size && sizeof($section->product_size) > 0)
                                <div class="column">
                                    <div class="h4 title js-accordion-toggle">{{ $section->translation->size ?? '' }}</div>
                                    <div class="js-accordion-body">
                                        <ul class="size-selector">
                                            @foreach ($section->product_size as $size)
                                                @if (empty($size))
                                                    @continue
                                                @endif
        
                                                @php $checked = '' @endphp
                                                @if(isset($filter_data['size']) && in_array($size, $filter_data['size']))
                                                    @php $checked = 'checked="checked"' @endphp
                                                @endif
        
                                                <li>
                                                    <div class="custom-control custom-checkbox">
                                                    <input name="size" {{ $checked }} type="checkbox"  id="sizeCheck{{ $size }}" class="custom-control-input section-hash-filter" value="{{ strtolower($size) }}">
                                                        <label class="custom-control-label" for="sizeCheck{{ $size }}">
                                                            <span>{{ $size }}</span>
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif

                            {{-- Gender --}}
                            {{-- @if($section->product_gender && sizeof($section->product_gender) > 1)
                                <div class="column">
                                    <div class="h4 title js-accordion-toggle">{{ $section->translation->gender ?? '' }}</div>
                                    <div class="js-accordion-body">
                                        <ul class="category-selector">
                                            @foreach ($section->product_gender as $gender)
                                                @if (empty($gender))
                                                    @continue
                                                @endif

                                                @php $checked = '' @endphp
                                                @if(sizeof($section->product_gender) == 1)
                                                    @php $checked = 'checked="checked"' @endphp
                                                @endif

                                                <li>
                                                    <div class="custom-control custom-checkbox">
                                                    <input name="gender" {{ $checked }}  type="checkbox"  id="sizeCheck{{ $gender }}" class="custom-control-input section-hash-filter" value="{{ strtolower($gender) }}">
                                                        <label class="custom-control-label" for="sizeCheck{{ $gender }}">
                                                            <span>{{ $gender }}</span>
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif --}}

                            {{-- Activity --}}
                            @if($section->product_activity && sizeof($section->product_activity) > 1)
                                <div class="column">
                                    <div class="h4 title js-accordion-toggle">{{ $section->translation->activities ?? '' }}</div>
                                    <div class="js-accordion-body">
                                        <ul class="category-selector">
                                            @foreach ($section->product_activity as $val)
                                                @if (empty($val['Name']))
                                                    @continue
                                                @endif

                                                @php $checked = '' @endphp
                                                @if(sizeof($section->product_activity) == 1)
                                                    @php $checked = 'checked="checked"' @endphp
                                                @endif

                                                <li>
                                                    <div class="custom-control custom-checkbox">
                                                    <input name="activity" {{ $checked }}  type="checkbox"  id="sizeCheck{{ $val['Name'] }}" class="custom-control-input section-hash-filter" value="{{ strtolower($val['Name']) }}">
                                                        <label class="custom-control-label" for="sizeCheck{{ $val['Name'] }}">
                                                            <span>{{ $val['Name'] }}</span>
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif

                            {{-- Tech and Materials --}}
                            @if($section->product_tech_and_materials && sizeof($section->product_tech_and_materials) > 1)
                                <div class="column">
                                    <div class="h4 title js-accordion-toggle">{{ $section->translation->tech_and_materials ?? '' }}</div>
                                    <div class="js-accordion-body">
                                        <ul class="category-selector">
                                            @foreach ($section->product_tech_and_materials as $val)
                                                @if (empty($val['Name']))
                                                    @continue
                                                @endif

                                                @php $checked = '' @endphp
                                                @if(sizeof($section->product_tech_and_materials) == 1)
                                                    @php $checked = 'checked="checked"' @endphp
                                                @endif

                                                <li>
                                                    <div class="custom-control custom-checkbox">
                                                    <input name="tech_and_materials" {{ $checked }}  type="checkbox"  id="sizeCheck{{ $val['Name'] }}" class="custom-control-input section-hash-filter" value="{{ strtolower($val['Name']) }}">
                                                        <label class="custom-control-label" for="sizeCheck{{ $val['Name'] }}">
                                                            <span>{{ $val['Name'] }}</span>
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif

                            {{-- Price Range --}}
                            @if(sizeof($section->price_range) > 0)
                            <div class="column">
                                <div class="h4 title js-accordion-toggle">{{ $section->translation->price_range ?? '' }}</div>
                                <div class="js-accordion-body">
                                    <ul class="category-selector">
                                        @foreach ($section->price_range as $key => $val)
                                            @php $checked = '' @endphp
                                            @if(isset($filter_data['price_range']) && in_array($key, $filter_data['price_range']))
                                                @php $checked = 'checked="checked"' @endphp
                                            @endif

                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input name="price_range" {{ $checked }} id="customCheckRange{{ $key }}" value="{{ $key }}" class="custom-control-input section-hash-filter" type="checkbox">
                                                    <label class="custom-control-label" for="customCheckRange{{ $key }}">
                                                        <span>{{ $val }}</span>
                                                    </label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        </div>
                    </div>

                    <div class="sort-container">
                        <div class="row align-items-center">
                            <div class="column">
                                @if($section->product_gender && sizeof($section->product_gender) > 1)
                                    <div class="h4 title d-block d-lg-inline-block js-accordion-toggle">{{ $section->translation->gender }}</div>                                    
                                    <div class="js-accordion-body d-block d-lg-inline-block">
                                    <div class="form-group mb-0 pb-3 pb-lg-0">
                                        @foreach ($section->product_gender as $gender)
                                            @if (empty($gender))
                                                @continue
                                            @endif

                                            @php $checked = '' @endphp
                                            @if(sizeof($section->product_gender) == 1)
                                                @php $checked = 'checked="checked"' @endphp
                                            @endif
                                            
                                            <div class="custom-control custom-control-lg custom-radio d-inline-block">
                                                <input id="genderCheck{{ $gender }}" class="custom-control-input section-hash-filter" name="gender" type="radio" value="{{ strtolower($gender) }}">
                                                <label class="custom-control-label" for="genderCheck{{ $gender }}">
                                                    <span>{{ $gender }}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="column ml-lg-auto">
                                <div class="h4 title d-block d-lg-inline-block js-accordion-toggle">{{ $section->translation->sort['sort_title'] ?? '' }}</div>
                                <div class="js-accordion-body d-block d-lg-inline-block">
                                    <div class="form-group mb-0 pb-3 pb-lg-0">
                                        <select name="orderBy" class="form-control form-control-lg section-orderby-filter"> {{-- section-dropdown-filter --}}
                                            @if (!empty($section->translation->sort['title_asc']))
                                            <option value="title_asc">{{ $section->translation->sort['title_asc'] ?? '' }}</option>
                                            @endif
        
                                            @if (!empty($section->translation->sort['title_desc']))
                                            <option value="title_desc">{{ $section->translation->sort['title_desc'] ?? '' }}</option>
                                            @endif
        
                                            {{-- @if (!empty($section->translation->sort['popular']))
                                            <option value="pop_asc">{{ $section->translation->sort['popular'] ?? '' }}</option>
                                            @endif --}}
        
                                            @if (!empty($section->translation->sort['price_low_to_high']))
                                            <option value="price_asc">{{ $section->translation->sort['price_low_to_high'] ?? '' }}</option>
                                            @endif
        
                                            @if (!empty($section->translation->sort['price_high_to_low']))
                                            <option value="price_desc">{{ $section->translation->sort['price_high_to_low'] ?? '' }}</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="button-container d-block d-lg-none">
                        <div class="row text-center d-block d-lg-flex">
                            <div class="column">
                                <button class="btn btn-link btn-clear section-hash-clear">{{ $section->translation->clear_button ?? '' }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
	</div>
</section>

@if(isset($section->products) && sizeof($section->products) > 0)
    <section class="section product-listing no-mb">
        <div class="container p-0">          
            <div class="products d-flex flex-wrap justify-content-center section-product-listing">
                @foreach ($section->products as $key => $product)
                    @include( 'partials.product-item', [
                        'product' => $product, 'type' => 'section', 'price_range' => $section->price_range
                    ])
                @endforeach            
            </div>
            <div class="product-listing-empty section-filter-no-results" style="display:none;"><p>{{ $section->translation->no_products_available ?? '' }}</p></div>

            @if ($section->link)
                <div class="text-center">                        
                    <a href="{{ $section->link->url }}" class="btn btn-primary btn-lg text-center mt-2" {{ $section->link->target ? 'target=_blank' : '' }}>{{ $section->link->title }}</a>                    
                </div>
            @endif
        </div>
    </section>
@endif