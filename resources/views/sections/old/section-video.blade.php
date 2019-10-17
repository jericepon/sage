<section class="section hero-banner {{ $section->classes ?? '' }}">
    <div class="hero-wrap ratio-modifier">
        <div class="hero-background ratio-modifier">
            {!! $section->image !!}
            {!! $section->image_mobile !!}
        </div>

        {{-- Video tag --}}
        {!! $section->video_tag !!}

        {{-- Play button --}}
        @if($section->video_tag)
            <div class="hero-play-btn js-hide-on-play js-playvideo {{ $section->button_class }}">
                <button id="js-playvideo" class="btn btn-lg btn-icon btn-icon-lg btn-primary">
                    <img class="lazy" data-src="@asset('images/icon/icon-play.svg')" alt="">
                </button>
            </div>
        @endif        
    </div>
</section>