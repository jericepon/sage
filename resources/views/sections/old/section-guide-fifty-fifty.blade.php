@php
use App\Classes\Helper;
@endphp

<section class="section guide-fifty {{ $section->classes ?? '' }}">
    <div class="container">
        <div class="guide-fifty-wrapper">
            <div class="row align-items-center justify-content-around">
                <div class="col-lg-6">
                    @if(isset($section->images) && is_object($section->images))
                        <div class="images row align-items-center">
                            @foreach ($section->images as $key => $item)
                                @if (empty($item['image']))
                                    @continue
                                @endif

                                <div class="col">
                                    @if (wp_is_mobile())
                                        {!! Helper::remove_width_and_height_attribute( wp_get_attachment_image( $item['image']['ID'], 'square-small', false, array( 'class'=>'lazy' ) )) !!}
                                    @else
                                        {!! Helper::remove_width_and_height_attribute( wp_get_attachment_image( $item['image']['ID'], 'large', false, array( 'class'=>'lazy' ) )) !!}
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col-lg-6">
                    @if($section->show_section_title && $section->section_title)
                        @if (!empty($section->is_h1))
                            <h1 class="h3 title text-center text-lg-left">{!! $section->section_title !!}</h1>
                        @else 
                            <div class="h3 title text-center text-lg-left">{!! $section->section_title !!}</div>
                        @endif
                    @endif
                    @if($section->text)
                        <div class="content">
                            {!! $section->text !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
