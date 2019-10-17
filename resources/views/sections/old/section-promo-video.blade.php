@if (!empty($section->items))
    <section class="section section-three-promo three-promo">
        <div class="promo-cont js-promo-slider">

            @foreach ($section->items as $item)
                <div class="promo-cont-item">
                    <div class="promo-item">
                        
                        {{-- Desktop Image --}}
                        {!! $item->image !!}
                        
                        {{-- Mobile image --}}
                        {!! $item->image_mobile !!}

                        {{-- Video --}}
                        {!! $item->video_tag !!}

                        @if (!empty($item->video_tag))
                            <div class="promo-item-play-btn js-hide-on-play">
                                <button id="js-playvideo" class="btn btn-lg btn-icon btn-icon-lg btn-primary js-playvideo js-hide-on-play">
                                    <img class="lazy" data-src="@asset('images/icon/icon-play.svg')" alt="">
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach

        </div>

        @if (!empty($section->title))
            <div class="promo-cont mt-3">
                <div class="title h3 text-center">{!! $section->title !!}</div>
            </div>
        @endif

    </section>
@endif
