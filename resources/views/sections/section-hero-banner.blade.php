<section class='section hero-banner {{ $section->classes ?? '' }}'>
    <div class='hero-wrap'>

        <div class='hero-background'>
            <!-- Image Tag -->
            {{-- @if (wp_is_mobile() == 1) --}}
            @if (!wp_is_mobile())
                {!! $section->image !!}
            @endif

            {!! $section->image_mobile !!}

            {{-- Play button --}}
            @if($section->video_tag)
                {{-- d-block d-sm-block d-md-none --}}
                <div class="hero-play-btn js-hide-on-play js-playvideo {{ $section->play_button_class }}">
                    <button id="js-playvideo" class="btn btn-lg btn-icon btn-icon-lg btn-primary">
                        <img class="lazy" data-src="@asset('images/icon/icon-play.svg')" alt="">
                    </button>
                </div>
            @endif
        </div>

        {{-- Video tag --}}
        {!! $section->video_tag !!}

        @if (empty($section->title) && empty($section->text) && empty($section->links))
            @php $contentClass = 'js-hide-on-play'; @endphp
        @else
            @php $contentClass = ''; @endphp
        @endif

        @if (!empty($section->title) && !empty($section->links) && empty($section->text))
            @php $contentClass .= ' no-preamble'; @endphp
        @elseif (!empty($section->title) && !empty($section->text) && empty($section->links))
            @php $contentClass .= ' no-button'; @endphp
        @endif

        @php $titleClass = ''; @endphp
        @if (empty($section->links) && empty($section->text))
            @php $titleClass = 'only-element'; @endphp
        @endif

        @php $preambleClass = ''; @endphp
        @if (empty($section->title) && empty($section->links))
            @php $preambleClass = 'only-element'; @endphp
        @endif

        @php $linkClass = ''; @endphp
        @if (empty($section->title) && empty($section->text))
            @php $linkClass = 'only-element'; @endphp
        @endif

        {{-- Hero Content --}}
        <div class='hero-text {{ $contentClass }}'>
            @if($section->title)
                @if($section->is_h1)
                    <h1 class='h1 hero-title {{ $titleClass }} {{ $section->text_color ?: '' }}'>{!! $section->title !!}</h1>
                @else
                    <h2 class='h1 hero-title {{ $titleClass }} {{ $section->text_color ?: '' }}'>{!! $section->title !!}</h2>
                @endif
            @endif

            @if($section->text)
                <div class='hero-subtitle {{ $preambleClass }} {{ $section->text_color ?: '' }}'>{!! $section->text !!}</div>
            @endif

            @if($section->links)
                <div class='hero-btn {{ $linkClass }}'>

                    {{-- Mobile --}}
                    @foreach ($section->links as $key=>$item)
                        @php ($item = (object) $item)

                        <a href="{{ $item->link->url }}" target="{{ $item->link->target }}">
                            <button class="btn btn-lg {{ $item->classes }} d-md-none {{ $key+1 !== count($section->links) ? 'mr-3' : '' }}"
                                    type="button">{!! $item->link->title !!}</button>
                        </a>
                    @endforeach

                    {{-- Desktop --}}
                    @foreach ($section->links as $key=>$item)
                        @php ($item = (object) $item)

                        <a href="{{ $item->link->url }}" target="{{ $item->link->target }}">
                            <button class="btn btn-lg {{ $item->classes }} d-none d-md-inline-block {{ $key+1 !== count($section->links) ? 'mr-4' : '' }}"
                                    type="button">{!! $item->link->title !!}</button>
                        </a>
                    @endforeach

                </div>
            @endif
        </div>
    </div>
</section>
