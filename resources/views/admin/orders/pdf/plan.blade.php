<style type="text/css">
    body {
        background: rgb(204,204,204);
    }
    page {
        background: white;
        display: block;
        margin: 0 auto;
        margin-bottom: 0.5cm;
        box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
    }
    page[size="A4"] {
        width: 21cm;
        height: 29.7cm;
    }
    page[size="A4"][layout="landscape"] {
        width: 29.7cm;
        height: 21cm;
    }
    page[size="A3"] {
        width: 29.7cm;
        height: 42cm;
    }
    page[size="A3"][layout="landscape"] {
        width: 42cm;
        height: 29.7cm;
    }
    page[size="A5"] {
        width: 14.8cm;
        height: 21cm;
    }
    page[size="A5"][layout="landscape"] {
        width: 21cm;
        height: 14.8cm;
    }
    @media print {
        body, page {
            margin: 0;
            box-shadow: 0;
        }
    }

    * {
        box-sizing: border-box;
    }
    .rotate {
        transform: rotate(-90deg);
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    }
    .relative{
        position: relative;
        font-family: Consolas;
        font-size: 12px;
    }
    #booking-id{position: absolute;top: 273px;left: 65px;}
    #block{position: absolute;top: 254px;left: 137px;}
    #plot{position: absolute;top: 254px;left: 209px;}
    #type{position: absolute;top: 254px;left: 347px;}
    #area{position: absolute;top: 254px;left: 281px;}
    #category{position: absolute;top: 254px;left: 281px;}
    #permitted_height{position: absolute;top: 254px;left: 433px;}
    #price{position: absolute;top: 254px;left: 497px;}
    #feature-corner{position: absolute; top: 312px;left: 142px;}
    #feature-park-facing{position: absolute;top: 312px;left: 218px;}
    #extra_cost{position: absolute;top: 312px;left: 423px;}
    #dev_fee{position: absolute;top: 312px;left: 500px;}
    #total_cost{position: absolute;top: 296px;left: 613px;}

    #payment_plan{
        position: absolute;
        top: 475px;
        left: 88px;

        font-family: Consolas;
        font-size: 12px;
        width: 81%;
    }
</style>

<page size="A4">
    @dump($data)
    <div class="relative">
        <img src="{{ media_url('img/pdf/E-2.png') }}" alt="" width="100%">

        <span id="booking-id" class="rotate">BCGUK{{ date("my") }}{{ \Str::substr($property->block, -1, 1) }}{{ \Str::padLeft($property->plot, 4, 0) }}</span>

        <div id="block">{{ $data['property']->block }}</div>
        <div id="type">{{ $data['property']->type }}</div>
        <div id="plot">{{ $data['property']->plot }}</div>
        <div id="area">{{ $data['property']->area }}</div>
        {{--<div id="category">{{ $data['property']->category }}</div>--}}
        <div id="area">{{ $data['property']->area }}</div>
        <div id="price">{{ $data['currency']->symbol }}{{ number_format(rate_conversion($data['property']->price, $data['order']->exchange_rate)) }}</div>
        <div id="permitted_height">{{ $data['property']->permitted_height }}</div>

        @if(count($data['property']->features) > 0)
            @foreach ($data['property']->features as $k => $item)
                <div id="feature-{{ \Str::slug($item['feature']) }}">{{ $data['currency']->symbol }}{{ number_format(rate_conversion($item['amount'], $data['order']->exchange_rate)) }}</div>
            @endforeach
        @endif
        <div id="extra_cost">{{ $data['currency']->symbol }}{{ number_format(rate_conversion($data['order']->extra_cost, $data['order']->exchange_rate)) }}</div>
        <div id="dev_fee">{{ $data['currency']->symbol }}{{ number_format(rate_conversion($data['dev_fee'], $data['order']->exchange_rate)) }}</div>
        <div id="total_cost">{{ $data['currency']->symbol }}{{ number_format(rate_conversion($data['order']->total_cost, $data['order']->exchange_rate)) }}</div>


        <table id="payment_plan">
            <colgroup>
                <col style="width: 40px;">
                <col style="width: 72px;">
                <col style="width: 60px;">
                <col style="width: 65px;">
                <col style="width: 65px;">
                <col style="width: 70px;">
                <col style="width: 90px;">
                <col style="width: 55px;">
            </colgroup>
            @php
                $total = $data['order']->total - $data['confirmation_fee'];
            @endphp
            @foreach ($data['_payments']['particulars'] as $k => $particular)
                @php
                    $_payment = (substr($data['_payments']['amount'][0][$k], -1) == '%'
                    ? ($data['order']->total * substr($data['_payments']['amount'][0][$k], 0, -1) / 100)
                    : $data['_payments']['amount'][0][$k]);
                    if($k == 0){
                        $_payment -= $data['confirmation_fee'];
                    }
                @endphp
                <tr>
                    <td align="center">
                        {{--{{ $data['_payments']['payment_interval'][$k] }} {{ $data['_payments']['interval_type'][$k] }}--}}
                        {{ $data['_payments']['key'][$k] }}
                    </td>
                    <td align="center">
                        @if($data['_payments']['key'][$k] <= 3)
                            {{ $currency->symbol }}{{ number_format(rate_conversion($_payment, $data['order']->exchange_rate), 2) }}
                        @endif
                    </td>
                    <td align="center">
                        @if($data['_payments']['key'][$k] > 3)
                            {{ $currency->symbol }}{{ number_format(rate_conversion($_payment, $data['order']->exchange_rate), 2) }}
                        @endif
                    </td>
                    <td align="center">{{ $currency->symbol }}{{ number_format(rate_conversion($data['dev_fee']/30, $data['order']->exchange_rate), 2) }}</td>
                    <td align="center">-{{ $currency->symbol }}{{ number_format(rate_conversion($data['discounts']['pre_launch']['discount']/30, $data['order']->exchange_rate), 2) }}</td>
                    <td align="center">-{{ $currency->symbol }}{{ number_format(rate_conversion($data['discounts']['cash']['discount']/30, $data['order']->exchange_rate), 2) }}</td>
                    <td align="center">-{{ $currency->symbol }}{{ number_format(rate_conversion($data['discounts']['special']['discount']/30, $data['order']->exchange_rate), 2) }}</td>
                    <td align="center">{{ $currency->symbol }}{{ number_format(rate_conversion($_payment, $data['order']->exchange_rate), 2) }}</td>
                    <td align="center">-{{ $currency->symbol }}{{ number_format(rate_conversion($total = abs($_payment - $total), $data['order']->exchange_rate), 2) }}</td>
                    @if($btn)
                        <td align="center">
                            @if(in_array($data['_payments']['key'][$k], array_keys($data['received'])))
                                <span class="text-success">Received</span>
                            @else
                                &nbsp;
                            @endif
                        </td>
                    @endif
                </tr>
            @endforeach
        </table>
    </div>
</page>
{{--<div class="page">
    <div class="" style="position: absolute; z-index: 0;">
        <img src="{{ asset_url('front/uploads/invoice-back.jpg') }}" alt="" width="100%" style="height: 11in; position: absolute; ">
    </div>
</div>--}}
