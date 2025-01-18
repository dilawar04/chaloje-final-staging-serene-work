<style type="text/css">
    @page page {
        size: A4 portrait;
        margin: 2cm;
    }
    .page-break	{ display: block; page-break-before: always; }
    .page {
        page: page;
        page-break-after: auto;

        /*height: 297mm;*/
        /*background-image: url("{{ asset_url('front/uploads/invoice.jpg') }}");*/
        background-size: contain;
    }

    * {
        box-sizing: border-box;
    }


    /*html,body{ font-family: Courier;}*/
    html,body{ font-family: Courier; font-size: 11px; width: 100%; margin: 0; padding: 0;}
    .inv-form { font-size:12px;line-height:20px; padding: 3px; margin: 0; border-collapse:collapse; }
    .inv-form tr td,.inv-form tr th {  vertical-align: middle; padding:5px; border: 1px solid #ddd; border-collapse:collapse; }
    .inv-form .inv-hdr { background: #f2f2f2; text-align:center;}
    .inv-form .ftr { text-align:center;}

    div.inv-div {
        position: absolute;
        z-index: 1;
        width: 100%;
        padding: 25px;
    }
    table th, .theme-bg{
        background-color: #e5d3ab;
    }
</style>

<div style="position: relative;" class="page">
    {{--<div class="" style="position: absolute; z-index: 0;">
        <img src="{{ asset_url('front/uploads/invoice.jpg') }}" alt="" width="100%" style="height: 11in;">
    </div>--}}
    <div class="inv-div">
        {{--<p style="height: 100px"></p>--}}
        <table class="inv-form" width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <img src="{{ _img(asset_url('images/' . opt('logo'), 1), 190, 50, null, ['quality' => 100, 'func' => 'resize']) }}" alt="img">
                </td>
                <td align="center" valign="center">
                    <div class="">
                        <h2>INVOICE</h2>
                    </div>
                </td>
            </tr>
            <tr>
                <td width="50%" valign="center">
                    <p>{{ opt('address') }}</p>
                    <p>{{ opt('phone_number') }}</p>
                    <p>{{ opt('fax_number') }}</p>
                    <p>{{ opt('contact_email') }}</p>
                </td>
                <td width="50%" valign="center" align="right">
                    Invoice: <strong>{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</strong><br>
                    Date: <strong>{{ \Carbon\Carbon::parse($order->created_at)->format('Y-m-d') }}</strong><br>
                    Order Status: <strong>{{ $order->status  }}</strong><br>
                    Payment Status: <strong>{{ $order->payment_status }}</strong>
                </td>
            </tr>
        </table>
        <br>
        <table class="inv-form" width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <th colspan="2" align="left">Bill To:</th>
            </tr>
            <tr>
                <td colspan="2" valign="center">
                    Customer Name : {{ trim($customer->name) }}<br/>
                    E-mail: {{ $customer->email }}<br/>
                    Phone #: {{ $customer->phone }}<br/>
                    Address: {{ $customer->address }}
                </td>
            </tr>
        </table>
        <br>
        <table class="inv-form" width="100%" cellspacing="0" cellpadding="0">
            <tr style="" class="align-center">
                <th style="" width="60">S.No.</th>
                <th style="">Description</th>
                <th style="" width="100">Amount</th>
            </tr>
            <tr style="">
                <td style="" align="center">1</td>
                <td style="">
                    <p>{{ $property->block }}, Street #{{ $property->street }}, Plot # {{ $property->plot }}</p>
                    <p>{{ $property->area }} {{ $property->area_unit }}</p>
                </td>
                <td style="" align="center">{{ number_format($order_detail->price) }}</td>
            </tr>
            @if(count($features) > 0)
                @foreach ($features as $k => $item)
                    <tr style="">
                        <td align="center">{{ ($loop->index + 2) }}</td>
                        <td style="">{{ $item['feature'] }}</td>
                        <td style="" align="center">{{ number_format($item['amount']) }}</td>
                    </tr>
                @endforeach
            @endif
            <tr>
                <td style="" align="right" colspan="2"><b>Subtotal</b></td>
                <td style="" align="center"><b>{{ number_format($order->total_cost) }}</b></td>
            </tr>
        </table>
        <table class="inv-form" width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <td style="" align="left">
                    <p>Make all cheques payable to "Broadway City Gwadar".</p>
                    <p>"If you have any questions concerning this invoice,<br>contact {{ opt('contact_person') }} at {{ opt('contact_email') }} or {{ opt('phone_number') }}. "</p>
                </td>
                <td align="right">
                    <p><b>Credit</b></p>
                    <p><b>Tax</b></p>
                    <p><b>Additional discount</b></p>
                    <p><b>Balance due</b></p>
                </td>
                <td style="" align="center" width="100">
                    <p><b>{{ number_format($order->total_cost) }}</b></p>
                    <p><b>{{ number_format($order->tax) }}</b></p>
                    <p><b>{{ number_format($order->discount) }}</b></p>
                    <p><b>{{ number_format($order->total_amount) }}</b></p>
                </td>
            </tr>
        </table>
        <br/>
        <br/>
        <p>Rupees: {{ number_to_word(round($order->total_amount)) }}/-</p>
        <br/>

        @php
        $block = \App\Theme::block('invoice-terms', true);
        @endphp
        @if($block->id > 0)
            {!! do_shortcode($block->content) !!}
        @endif
    </div>
</div>
{{--<div class="page">
    <div class="" style="position: absolute; z-index: 0;">
        <img src="{{ asset_url('front/uploads/invoice-back.jpg') }}" alt="" width="100%" style="height: 11in; position: absolute; ">
    </div>
</div>--}}
