@php 
use App\Classes\Helper;
@endphp

<section class="section find-your-fit {{ $section->classes ?? '' }}">
    @if($section->show_section_title && $section->section_title)
        <div class="page-header">
            <div class="container">
                @if (!empty($section->is_h1))
                    <h1 class="title h2 text-center">{!! $section->section_title !!}</h1>
                @else 
                    <div class="title h2 text-center">{!! $section->section_title !!}</div>
                @endif
            </div>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-1 order-lg-0">
                <div class="wrapper">
                    @if($section->left_text)
                        {!! $section->left_text !!}
                    @endif
                </div>
            </div>
            <div class="col-lg-9 order-0 order-lg-1 mb-lg-0 mb-3">
                <div class="wrapper">
                    @if (wp_is_mobile() == 1)
                        @if(!empty($section->image_mobile))
                            {!! Helper::remove_width_and_height_attribute( wp_get_attachment_image( $section->image_mobile->ID, 'medium', false, array('class' => 'd-block lazy') ) ) !!}
                            {{-- d-lg-none --}}
                        @endif
                    @else
                        @if(isset($section->image_desktop))
                            @php $imgClass = empty($section->image_mobile) ? '' : 'd-lg-block';/*d-none*/  @endphp
                            {!! Helper::remove_width_and_height_attribute( wp_get_attachment_image( $section->image_desktop->ID, 'square-medium-resize', false, array('class' => $imgClass .' lazy') ) ) !!}
                        @endif
                    @endif
                </div>
            </div>
        </div>    
        <div class="row">
            <div class="col-lg-3">
                <div class="wrapper"></div>
            </div>
            <div class="col-lg-9">
                <div class="wrapper">
                    <div class="row">    
                        <div class="col-lg-4">
                            @if($section->bottom_text_1)
                                {!! $section->bottom_text_1 !!}
                            @endif
                        </div>
                        <div class="col-lg-4">
                            @if($section->bottom_text_2)
                                {!! $section->bottom_text_2 !!}
                            @endif
                        </div>
                        <div class="col-lg-4">
                            @if($section->bottom_text_3)
                                {!! $section->bottom_text_3 !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>      
</section>