@if ($section->hasContent)
  <section class="section section-layering corner-cut corner-cut-bottom-right-sm lazy {{ $section->classes ?: '' }}" data-bg="url({{ $section->background }})">
    <div class="layering-content">
      <div class="container">

        {{-- desktop --}}
          <div class="row justify-content-around">

            {{-- title and subtitle --}}
            <div class="layering-cont order-0 order-lg-0 col-lg-4 col-md-12 col-sm-12 align-items-lg-center justify-content-lg-center d-flex align-item">
              <div class="layering-text d-block">
                @if ($section->title && $section->show_title)
                    @if($section->is_h1)
                      <h1 class="mb-lg-3">{!! $section->title !!}</h1>
                    @else
                      <h3 class="mb-lg-3">{!! $section->title !!}</h3>
                    @endif                  
                @endif

                @if ($section->text)
                  {!! $section->text !!}
                @endif

                @if ($section->link)
                  <a href="{{ $section->link->url ?? null }}" role="button"
                    target="{{ $section->link->target ?? null }}">
                    <button class="btn btn-lg btn-secondary d-none d-lg-block mt-3">
                      {!! $section->link->title ?? null !!}
                    </button>
                  </a>
                @endif
              </div>
            </div>

            {{-- product image --}}
            <div class="layering-cont layering-cont-main-image order-2 order-lg-1 col-lg-4 col-md-4 col-4 align-items-lg-center justify-content-lg-center d-flex">
              <div class="layering-cont-image">
                <figure>
                  @if (!empty($section->big_image))
                  <img data-src="{{ $section->big_image }}" class="lazy">
                  @endif
                </figure>
              </div>
            </div>

            {{-- product description --}}
            <div class="layering-cont order-1 order-lg-2 col-lg-4 col-md-8 col-8 align-items-lg-center justify-content-center d-flex flex-column prod-cont">
              @foreach ($section->small_images as $key => $item)
                <div class="layering-info-item d-flex align-items-center justify-content-lg-center">
                  <figure>
                    @if (wp_is_mobile() == 1)
                      {!! $item->image_mobile !!}
                    @else
                      {!! $item->image !!}
                    @endif
                  </figure>
                  <div>
                    <h4>{{ $item->title }}</h4>
                    <div class="small">{!! $item->text !!}</div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
      </div>
      <div class="layering-button d-lg-none">
        @if ($section->link)
          <a href="{{ $section->link->url ?? null }}" role="button"
            target="{{ $section->link->target ?? null }}">
            <button class="btn btn-lg btn-secondary position-absolute">
              {!! $section->link->title ?? null !!}
            </button>
          </a>
        @endif
    </div>
    </div>
  </section>
@endif