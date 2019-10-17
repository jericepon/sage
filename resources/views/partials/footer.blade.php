<footer class="content-info">
  <div class="container">
    @php dynamic_sidebar('sidebar-footer') @endphp
  </div>
  
  @if (!empty($logo['footerLogo']))
      <a href="{{ $home_url }}" class="brand-footer d-none d-lg-inline-block">
          {!! $logo['footerLogo'] !!}
      </a>
  @endif

  @if (!empty($logo['footerLogoMobile']))
      <a class="brand-footer d-block d-lg-none">
          {!! $logo['footerLogoMobile'] !!}
      </a>
  @endif
            
  @if($social_links)
      <ul class="group-links d-md-none d-none d-lg-block no-bullet float-right">
        @foreach($social_links as $link)
            <li>
                <a href="{{ $link['url']  }}" target="_blank" rel="nofollow noreferrer">
                    @if($link['media'] === 'instagram')
                        <img data-src="@asset('images/icon/icon-insta.svg')" class="lazy" alt="">
                    @elseif($link['media'] === 'twitter')
                        <img data-src="@asset('images/icon/icon-twitter.svg')" class="lazy" alt="">
                    @elseif($link['media'] === 'pinterest')
                        <img data-src="@asset('images/icon/icon-pinterest.svg')" class="lazy" alt="">
                    @elseif($link['media'] === 'youtube')
                        <img data-src="@asset('images/icon/icon-youtube.svg')" class="lazy" alt="">
                    @else
                        <img data-src="@asset('images/icon/icon-facebook.svg')" class="lazy" alt="">
                    @endif
                </a>
            </li>
        @endforeach
      </ul>
  @endif
</footer>

{{-- Footer Script from sitewide global --}}
{!! $scripts->footer_script ?? null !!}