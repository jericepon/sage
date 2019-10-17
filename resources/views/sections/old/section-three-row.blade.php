@if ($section->items)
    <section class="section section-three-row">
        <div class="three-row">
            <div class="container ">

                {{-- desktop --}}
                <div class="row d-lg-flex d-none justify-content-center">
                    @foreach ($section->items as $item)
                        @if ($item->link->url)
                            <a href="{{ $item->link->url }}" class="item col-lg-4 m-0 justify-content-center align-content-center corner-cut corner-cut-top-left-sm" target="{{ $item->link->target }}">
                        @else
                            <div class="item col-lg-4 m-0 justify-content-center align-content-center corner-cut corner-cut-top-left-sm">
                        @endif

                            <div class="title-cont lazy" data-bg="url({{ $item->image }})">
                                @if ($item->title)
                                    <div>
                                        <h2>{!! $item->title !!}</h2>
                                    </div>
                                @endif
                            </div>

                        @if ($item->link->url)
                            </a>
                        @else
                            </div>
                        @endif
                    @endforeach
                </div>

                {{-- mobile --}}
                <div class="row js-row-slider d-block d-lg-none">

                    @foreach ($section->items as $item)
                        @if ($item->link->url)
                            <a href="{{ $item->link->url }}" class="item col-lg-4 m-0 justify-content-center align-content-center corner-cut corner-cut-top-left-sm" target="{{ $item->link->target }}">
                        @else
                            <div class="item col-lg-4 m-0 justify-content-center align-content-center corner-cut corner-cut-top-left-sm">
                        @endif

                            <div class="title-cont lazy" data-bg="url({{ $item->image }})">
                                @if ($item->title)
                                    <div>
                                        <h2>{!! $item->title !!}</h2>
                                    </div>
                                @endif
                            </div>

                        @if ($item->link->url)
                            </a>
                        @else
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endif
