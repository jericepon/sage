<section class="section hero-fifty-fifty {{ $section->classes ?? '' }}">
    <div class='hero-wrap'>
        <div class='hero-background'>
            <div class='hero-image-cont'>
                @if (isset($section->hero_data) && is_array($section->hero_data))
                    @foreach ($section->hero_data as $key => $item)
                        <div class="hero-image-skew {{ $key==1 ? 'hero-image-skew-right' : ''}}">
                            <div class="group-image">
                                @if (wp_is_mobile() == 1)
                                    {!! $item->image_mobile !!}
                                @else
                                    {!! $item->image !!}
                                @endif

                                {!! $item->video_tag !!}
                            </div>


                            @if (empty($item->title) && empty($section->link))
                                @php $contentClass = 'js-hide-on-play'; @endphp        
                            @else 
                                @php $contentClass = ''; @endphp  
                            @endif                            

                            <div class="hero-text {{ $item->color_scheme=='dark_scheme' ? 'is-dark-text' : '' }} {{ $contentClass }}">
                                @if(!empty($item->title))
                                    @if($section->is_h1)
                                        <h1 class="h1 hero-title">{!! $item->title !!}</h1>
                                    @else
                                        <h2 class="h1 hero-title">{!! $item->title !!}</h2>
                                    @endif                                
                                @endif

                                @if (!empty($item->link))
                                    <div class='hero-btn text-center d-md-none d-sm-none d-lg-block'>
                                        <a href="{{ $item->link->url }}" target="{{ $item->link->target }}">
                                            <button class="btn btn-lg  {{ $item->color_scheme=='dark_scheme' ? 'btn-outline-secondary' : 'btn-outline-primary' }}"
                                                type="button">{!! $item->link->title !!}</button>
                                        </a>
                                    </div>
                                @endif
                                
                                @if (!empty($item->video_tag))
                                    <div class="hero-play-btn js-hide-on-play js-playvideo">
                                        <button id="js-playvideo" class="btn btn-lg btn-icon btn-icon-lg btn-primary justify-content-center {{ $item->play_button_class }}">
                                            <img class="lazy" data-src="@asset('images/icon/icon-play.svg')" alt="">
                                        </button>
                                    </div>
                                @endif                           
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>