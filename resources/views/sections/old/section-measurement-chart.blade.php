@php 
use App\Classes\Helper;
@endphp

<section class="section section-size-guide {{ $section->classes ?? '' }}">
    <div class="page-header">
      <div class="container">
        @if($section->show_section_title && $section->section_title)
          @if (!empty($section->is_h1))
            <h1 class="title h1 text-center">{!! $section->section_title !!}</h1>
          @else 
            <div class="title h1 text-center">{!! $section->section_title !!}</div>
          @endif
        @endif
        <div class="content text-center">
            @if($section->text)
                {!! $section->text !!}
            @endif
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 order-1 order-lg-0">
          <div class="size-guide-half">
            @if($section->left_text)
                {!! $section->left_text !!}
            @endif
          </div>
        </div>
        <div class="col-lg-6 order-0 order-lg-1">
          <div class="size-guide-half-sec">
            @if($section->image)
                {!! Helper::remove_width_and_height_attribute( wp_get_attachment_image( $section->image->ID, 'large', false, array( 'class'=>'lazy' ) )) !!}
            @endif
          </div>
        </div>
      </div>
    </div>
</section>