@if ($section->title || $section->systems || $section->text)
    <section class="section system-slider {{ $section->classes ?? '' }}">
        <div class="container">
            <div class="system-slider-header">
                
                @if ($section->title)
                    @if($section->is_h1)
                        <h1 class="title h3 text-center">{!! $section->title !!}</h1>                        
                    @else
                        <div class="title h3 text-center">{!! $section->title !!}</div>
                    @endif                     
                @endif

                @if ($section->text)
                    <div class="content text-center">
                        {!! $section->text !!}
                    </div>
                @endif

            </div>

            @if ( is_array($section->systems) && array_filter( $section->systems ) )
                @php $hasControls = count($section->systems) > 1 ? 'true' : 'false' @endphp
                <div class="system-slider-body">
                    <div class="systems js-system-slider" data-has-btn="{{ $hasControls }}">
                        @foreach ($section->systems as $item)
                            <a href="{{ $item->link }}" class="system-item">
                                <figure class="m-0">
                                    <img class="lazy" data-src="{{ $item->image }}" alt="" srcset="">
                                </figure>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
@endif