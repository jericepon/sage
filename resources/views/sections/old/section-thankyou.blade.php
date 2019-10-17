<div class="wrapper lazy" data-bg="url({{ $page_info->receipt_bg ?: '' }})">
    <div class="container">

        {{-- Receipt Items --}}
        {{-- @php $selection = ; @endphp --}}
        @if (isset($receipt_info['receipt_items']) && is_array($receipt_info['receipt_items']))
            <div class="row">
                @foreach($receipt_info['receipt_items'] as $item)
                    @php $has_qty = true; @endphp
                    @php include( locate_template( 'parts/shop/receipt-selection.php' ) ) @endphp
                @endforeach
            </div>
        @endif
        
        {{-- Receipt summary --}}
        @if (isset($receipt_info['order']))

            {{-- Sub Total --}}
            <div class="row summary-product">
                <div class="col-lg-6 col-md-6 col-sm-6 col">
                    <p>{!! !empty( $translation['sub_total'] ) ? $translation['sub_total'] : null !!}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col">
                    <p>{!! $receipt_info['totals']['itemsTotalPrice'] !!}</p>
                </div>
            </div> 
            
            {{-- Discount --}}
            @if( !empty($receipt_info['totals']['totalDiscountPriceAsNumber']) )
                <div class="row summary-product">
                    <div class="col-lg-6 col-md-6 col-sm-6 col">
                        <p>{!! !empty( $translation['discount'] ) ? $translation['discount'] : null !!}</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col">
                        <p>{!! $receipt_info['totals']['totalDiscountPrice'] !!}</p>
                    </div>
                </div>            
            @endif
            
            {{-- Tax --}}
            @if( !empty($receipt_info['totals']['taxDeductedAsNumber']) )
                <div class="row summary-product">
                    <div class="col-lg-6 col-md-6 col-sm-6 col">
                        <p>{!! !empty( $translation['vat'] ) ? $translation['vat'] : null !!}</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col">
                        <p>{!! $receipt_info['totals']['taxDeductedAsNumber'] !!}</p>
                    </div>
                </div>            
            @endif
            
            {{-- Shipping --}}
            <div class="row summary-product">
                <div class="col-lg-6 col-md-6 col-sm-6 col">
                    <p>{!! !empty( $translation['shipping'] ) ? $translation['shipping'] : null !!}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col">
                    <p>{!! $receipt_info['totals']['shippingPrice'] !!}</p>
                </div>
            </div>
            
            {{-- Total --}}
            <div class="row summary-product">
                <div class="col-lg-6 col-md-6 col-sm-6 col">
                    <p><em>{!! !empty( $translation['total_price'] ) ? $translation['total_price'] : null !!}</em></p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col">
                    <p><em>{!! $receipt_info['totals']['grandTotalPrice'] !!}</em></p>
                </div>
            </div>

        @endif
        {{-- End: Receipt summary --}}

        {{-- Klarna Snippet --}}
        @if (!empty($receipt_info['paymentMethodData']['snippet']))
            <div class="row mt-3 is-child-full">
                {!! $receipt_info['paymentMethodData']['snippet'] !!}
            </div>
        @endif
    </div>
</div>