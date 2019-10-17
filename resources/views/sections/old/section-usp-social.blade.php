@if (!empty($section->usp))
    <section class="section usp usp-block {{ $section->classes ?? '' }}">
        <div class="container">
            <div class="row">

                @foreach ($section->usp as $item)
                    <div class="col-lg-4">
                        @include( 'partials.usp-item-social' )
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endif