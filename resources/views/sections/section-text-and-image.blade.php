@if ($section->hasContent)
    <section class="section fifty-fifty-section {{ $section->classes ?? '' }}">
        <div class="row fifty-fifty {{ $section->colorScheme=='is-light' ? 'is-light' : 'is-dark' }} mx-0 {{ ($section->orderClass == 'order-md-2') ? 'is-text-first' : 'is-image-first'  }}">

            <div class="fifty-fifty-item image col-md-6 p-0 order-1 lazy {{ $section->orderClass }}" data-bg="url({{ $section->image ?? '' }})">
                <div class="corner-cut corner-cut-bottom-right d-none d-md-none"></div>
            </div>

            <div class="fifty-fifty-item d-flex align-items-center col-md-6 order-2 order-md-1 p-md-0 {{ ($section->orderClass == 'order-md-2') ? 'justify-content-end' : 'justify-content-start'  }}">
                <div class="fifty-fifty-content">
                    @if ($section->title)
                        @if($section->is_h1)
                            <h1 class="h3">{!! $section->title !!}</h1>
                        @else
                            <div class="h3">{!! $section->title !!}</div>
                        @endif
                    @endif

                    @if ($section->text)
                        {!! $section->text !!}
                    @endif

                    @if ($section->link)
                        <div class="buttons text-left">
                            <a href="{{ $section->link->url ?: null }}" target="{{ $section->link->target ?: null }}">
                                <button class="btn btn-lg btn-outline-primary" type="button">{!! $section->link->title ?: null !!}</button>
                            </a>
                        </div>
                    @endif

                </div>
                <div class="corner-cut corner-cut-bottom-right d-block d-md-none"></div>
            </div>

            <div class="corner-cut corner-cut-bottom-right d-none d-md-block"></div>
        </div>
    </section>
@endif
