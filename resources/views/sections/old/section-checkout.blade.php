@if(!empty($page_content->bg_image))
    @php $bgImage = wp_get_attachment_image_url( $page_content->bg_image->ID, 'instagram-bg' ) @endphp
@else
    @php $bgImage = '' @endphp
@endif

{{-- No items in cart --}}
@if ($no_items)

    <section class="section checkout-container d-md-flex no-mb lazy" data-bg="url({{ $bgImage }})">
        <div class="container">

            <div class="page-header">
                <div class="container">

                    @if (!empty($no_selected_item_content->title))
                        <h1 class="title h1 text-center">{!! $no_selected_item_content->title !!}</h1>
                    @endif

                    @if (!empty($no_selected_item_content->text))
                        <div class="content">
                            {!! $no_selected_item_content->text !!}
                        </div>
                    @endif

                </div>
              </div>
        </div>
    </section>

{{-- Display cart items --}}
@else

    @php ($ctr = 0)
    {!! TemplateCheckout::startSelectionForm() !!}

        <section id="js-checkout-content" class="section checkout-container d-md-flex no-mb lazy" data-bg="url({{ $bgImage }})">
            <div class="checkout-col align-self-stretch lazy" data-bg="url({{ $bgImage }})">
                <div class="checkout-group">

                    @if (!empty($page_title))
                        <h1 class="h1 text-center text-md-left">{!! $page_title !!}</h1>
                    @endif

                    @if (!empty($page_content->order['title']))
                        @php ($ctr++)
                        <h3 class="checkout-title h4">{{ $ctr.'. '.$page_content->order['title'] }}</h3>
                    @endif

                    {{-- Cart items --}}
                    <div id="js-selectedItems--selection">
                        @php(include(locate_template('parts/shop/checkout-selection.php')))
                    </div>

                    {{-- Totals --}}
                    <div id="js-selectedTotals">
                        @php (include( locate_template( 'parts/shop/totals-selection.php' ) ))
                    </div>

                    {{-- Voucher --}}
                    <div class="discount-code">
                        @if (!empty($page_content->order['voucher_collapse_text']))
                            <a class="discount-code-title collapsed" href="#js-voucher-field" data-toggle="collapse" data-target="#js-voucher-field" aria-expanded="false" aria-controls="js-voucher-field">{{ $page_content->order['voucher_collapse_text'] }}</a>
                        @endif

                        <div class="collapse text-left" id="js-voucher-field">
                            @php (include( locate_template( 'parts/shop/voucher.php' ) ))
                        </div>
                    </div>

                    {{-- Newsletter --}}
                    <div id="js-selectedNewsletter" class="get-newsletter">
                        {!! TemplateCheckout::newsletterField() !!}
                    </div>
                </div>
            </div>

            <div class="checkout-col align-self-stretch pb-4 pb-md-0">
                <div class="checkout-group">
                    <div class="h1 d-none d-md-block">&nbsp;</div>

                    @if (!empty($page_content->payment['title']))
                        @php ($ctr++)
                        <h3 class="checkout-title h4">{{ $ctr.'. '.$page_content->payment['title'] }}</h3>
                    @endif

                    {{-- Payment Method --}}
                    <div id="js-selectedPaymentMethod" class="checkout-radios">
                        @php (include( locate_template( 'parts/shop/payment-options.php' ) ))
                    </div>
                </div>

                <div class="checkout-group">
                    @if (!empty($page_content->shipping['title']))
                        @php ($ctr++)
                        <h3 class="checkout-title h4">{{ $ctr.'. '.$page_content->shipping['title'] }}</h3>
                    @endif

                    {{-- Shipping options --}}
                    <div id="js-selectedShippingMethod" class="checkout-radios shipping-radios">
                        @php (include( locate_template( 'parts/shop/shipping-options.php' ) ))
                    </div>
                </div>
            </div>

            <div class="checkout-col align-self-stretch pb-4 pb-md-0">
                <div class="delivery-payment">
                    <div class="h1 d-none d-md-block">&nbsp;</div>

                    @if (!empty($page_content->delivery['title']))
                        @php ($ctr++)
                        <h3 class="checkout-title h4">{{ $ctr.'. '.$page_content->delivery['title'] }}</h3>
                    @endif

                    <div id="js-paymentFields">
                        @php (include( locate_template( 'parts/shop/payments-selection.php' ) ))
                    </div>
                </div>
            </div>
        </section>

    {!! TemplateCheckout::endSelectionForm() !!}

@endif
