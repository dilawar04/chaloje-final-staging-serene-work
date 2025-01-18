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
    #plot{position: absolute;top: 317px;left: 375px;}

    #category-125{position: absolute;top: 223px;left: 144px;}
    #category-250{position: absolute;top: 223px;left: 319px;}
    #category-500{position: absolute;top: 223px;left: 468px;}
    #category-100{position: absolute;top: 223px;left: 635px;}

    #block_id-1 {position: absolute; top: 316px;left: 131px; }
    #block_id-2 {position: absolute; top: 316px;left: 175px; }
    #block_id-3 {position: absolute; top: 316px;left: 219px; }
    #block_id-4 {position: absolute; top: 316px;left: 264px; }

    #type-R1{position: absolute;    top: 316px;left: 535px;}
    #type-R2{position: absolute;    top: 316px;left: 592px;}
    #type-Commercial{position: absolute;    top: 316px;left: 708px;}


    #name{position: absolute;top: 379px;left: 250px;}
    #photo{position: absolute;top: 409px;left: 592px;}
    #email{position: absolute;top: 580px;left: 250px;}
    #mobile{position: absolute;top: 554px;left: 250px;}
    #city{position: absolute;top: 468px;left: 250px;}
    #cnic{position: absolute;top: 608px;left: 250px;}
    #address{position: absolute;top: 438px;left: 250px;}
    #nominee_name{position: absolute;top: 712px;left: 250px;}
    #nominee_email{position: absolute;top: 772px;left: 250px;}
    #nominee_relation{position: absolute;top: 741px;left: 250px;}
    #nominee_cnic{position: absolute;top: 800px;left: 250px;}
    #nominee_passport{position: absolute;top: 831px;left: 250px;}
    #nominee_mobile{position: absolute;top: 772px;left: 576px;}
</style>

<page size="A4">
    {{--@dump($data['property'])--}}
    <div class="relative">
        <img src="{{ media_url('img/pdf/E-1.png') }}" alt="" width="100%">

        <div id="plot">{{ $data['property']->plot }}</div>
        <div id="block_id-{{ $data['property']->block_id }}">✔</div>
        <div id="category-{{ $data['property']->category }}">✔</div>

        <div id="type-{{ $data['property']->type }}">✔</div>

        <div id="name">{{ $data['customer']->name }}</div>
        <div id="photo"><img src="{{ asset_url("order_members/{$data['customer']->photo}") }}" width="128" alt=""></div>
        <div id="address">{{ $data['customer']->address }}</div>
        <div id="email">{{ $data['customer']->email }}</div>
        <div id="mobile">{{ $data['customer']->mobile }}</div>
        <div id="city">{{ $data['customer']->city }}</div>
        <div id="cnic">{{ $data['customer']->cnic }}</div>
        <div id="nominee_name">{{ $data['customer']->nominee_name }}</div>
        <div id="nominee_email">{{ $data['customer']->nominee_email }}</div>
        <div id="nominee_relation">{{ $data['customer']->nominee_relation }}</div>
        <div id="nominee_cnic">{{ $data['customer']->nominee_cnic }}</div>
        <div id="nominee_passport">{{ $data['customer']->nominee_passport }}</div>
        <div id="nominee_mobile">{{ $data['customer']->nominee_mobile }}</div>
    </div>
</page>
{{--<div class="page">
    <div class="" style="position: absolute; z-index: 0;">
        <img src="{{ asset_url('front/uploads/invoice-back.jpg') }}" alt="" width="100%" style="height: 11in; position: absolute; ">
    </div>
</div>--}}
