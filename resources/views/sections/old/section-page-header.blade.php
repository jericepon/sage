@if (($section->section_title && $section->show_section_title ) || $section->text )
    <section class="{{ $section->classes ?? '' }}">
        <div class="container">

            <div class="page-header">
                <div class="container">

                    @if ($section->section_title && $section->show_section_title)
                        @if (!empty($section->is_h1))
                            <h1 class="title h1 text-center">{!! $section->section_title !!}</h1>
                        @else 
                            <div class="title h1 text-center">{!! $section->section_title !!}</div>
                        @endif
                    @endif

                    @if ($section->text)
                        <div class="content">
                            {!! $section->text !!}
                        </div>
                    @endif

                </div>
              </div>
        </div>
    </section>
@endif
