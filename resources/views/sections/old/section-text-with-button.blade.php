@if ($section->has_content )
    <section class="section text-button  {{ $section->classes ?? '' }}">
        <div class="container">

            @if ( $section->is_h1 && (get_page_template_slug() === 'views/template-text.blade.php' || get_post_type() === 'post') )
                <h1 class="title text-center">{!! $section->title ?: get_the_title() !!}</h1>

            @elseif ($section->title)
                @if($section->is_h1)
                    <h1 class="title text-center">{!! $section->title !!}</h1>
                @else
                    <div class="title h2 text-left">{!! $section->title !!}</div>
                @endif
            @endif

            @if ($section->preamble)
                <div class="preamble text-left">
                    {!! $section->preamble !!}
                </div>
            @endif

            @if ($section->content)
                <div class="content clearfix">
                    @if ($section->content)
                        {!! $section->content !!}
                    @endif
                </div>
            @endif

            @if ($section->link)
                <div class="buttons text-center text-lg-left">
                    <a href="{{ $section->link->url }}" target="{{ $section->link->target }}">
                        <button class="btn btn-lg btn-outline-primary" type="button">{!! $section->link->title !!}</button>
                    </a>
                </div>
            @endif
        </div>
    </section>
@endif
