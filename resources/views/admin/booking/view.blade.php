@php
    $status_column_data = DB_enumValues('booking', 'status');
    $bulk_update['status'] = ['title' => 'Status', 'data' => $status_column_data];
    $form_buttons = ['new', 'delete', 'import', 'export'];

    $adult = json_decode($detail->adult);
    $flight = json_decode($row->flight_summary);
    $summary = json_decode($row->summary);
    $AdultDetails = json_decode($row->adult) ?? [];
    $ChildDetails = json_decode($row->child) ?? [];
    $InfantDetails = json_decode($row->infant) ?? [];

    $PassengersDetails = [
        'ADULT' => is_array($AdultDetails) ? $AdultDetails : [],
        'CHILD' => is_array($ChildDetails) ? $ChildDetails : [],
        'INFANT' => is_array($InfantDetails) ? $InfantDetails : []
    ];

@endphp
@extends('admin.layouts.admin')

@section('content')
    <style>
        /*--------------------------------------------------------------
3. Invoice General Style
----------------------------------------------------------------*/
        .cs-f10 {
            font-size: 10px;
        }

        .cs-f11 {
            font-size: 11px;
        }

        .cs-f12 {
            font-size: 12px;
        }

        .cs-f13 {
            font-size: 13px;
        }

        .cs-f14 {
            font-size: 14px;
        }

        .cs-f15 {
            font-size: 15px;
        }

        .cs-f16 {
            font-size: 16px;
        }

        .cs-f17 {
            font-size: 17px;
        }

        .cs-f18 {
            font-size: 18px;
        }

        .cs-f19 {
            font-size: 19px;
        }

        .cs-f20 {
            font-size: 20px;
        }

        .cs-f21 {
            font-size: 21px;
        }

        .cs-f22 {
            font-size: 22px;
        }

        .cs-f23 {
            font-size: 23px;
        }

        .cs-f24 {
            font-size: 24px;
        }

        .cs-f25 {
            font-size: 25px;
        }

        .cs-f26 {
            font-size: 26px;
        }

        .cs-f27 {
            font-size: 27px;
        }

        .cs-f28 {
            font-size: 28px;
        }

        .cs-f29 {
            font-size: 29px;
        }

        .cs-light {
            font-weight: 300;
        }

        .cs-normal {
            font-weight: 400;
        }

        .cs-medium {
            font-weight: 500;
        }

        .cs-semi_bold {
            font-weight: 600;
        }

        .cs-bold {
            font-weight: 700;
        }

        .cs-m0 {
            margin: 0px;
        }

        .cs-mb0 {
            margin-bottom: 0px;
        }

        .cs-mb1 {
            margin-bottom: 1px;
        }

        .cs-mb2 {
            margin-bottom: 2px;
        }

        .cs-mb3 {
            margin-bottom: 3px;
        }

        .cs-mb4 {
            margin-bottom: 4px;
        }

        .cs-mb5 {
            margin-bottom: 5px;
        }

        .cs-mb6 {
            margin-bottom: 6px;
        }

        .cs-mb7 {
            margin-bottom: 7px;
        }

        .cs-mb8 {
            margin-bottom: 8px;
        }

        .cs-mb9 {
            margin-bottom: 9px;
        }

        .cs-mb10 {
            margin-bottom: 10px;
        }

        .cs-mb11 {
            margin-bottom: 11px;
        }

        .cs-mb12 {
            margin-bottom: 12px;
        }

        .cs-mb13 {
            margin-bottom: 13px;
        }

        .cs-mb14 {
            margin-bottom: 14px;
        }

        .cs-mb15 {
            margin-bottom: 15px;
        }

        .cs-mb16 {
            margin-bottom: 16px;
        }

        .cs-mb17 {
            margin-bottom: 17px;
        }

        .cs-mb18 {
            margin-bottom: 18px;
        }

        .cs-mb19 {
            margin-bottom: 19px;
        }

        .cs-mb20 {
            margin-bottom: 20px;
        }

        .cs-mb21 {
            margin-bottom: 21px;
        }

        .cs-mb22 {
            margin-bottom: 22px;
        }

        .cs-mb23 {
            margin-bottom: 23px;
        }

        .cs-mb24 {
            margin-bottom: 24px;
        }

        .cs-mb25 {
            margin-bottom: 25px;
        }

        .cs-mb26 {
            margin-bottom: 26px;
        }

        .cs-mb27 {
            margin-bottom: 27px;
        }

        .cs-mb28 {
            margin-bottom: 28px;
        }

        .cs-mb29 {
            margin-bottom: 29px;
        }

        .cs-mb30 {
            margin-bottom: 30px;
        }

        .cs-pt25 {
            padding-top: 25px;
        }

        .cs-width_1 {
            width: 8.33333333%;
        }

        .cs-width_2 {
            width: 16.66666667%;
        }

        .cs-width_3 {
            width: 25%;
        }

        .cs-width_4 {
            width: 33.33333333%;
        }

        .cs-width_5 {
            width: 41.66666667%;
        }

        .cs-width_6 {
            width: 50%;
        }

        .cs-width_7 {
            width: 58.33333333%;
        }

        .cs-width_8 {
            width: 66.66666667%;
        }

        .cs-width_9 {
            width: 75%;
        }

        .cs-width_10 {
            width: 83.33333333%;
        }

        .cs-width_11 {
            width: 91.66666667%;
        }

        .cs-width_12 {
            width: 100%;
        }

        .cs-accent_color,
        .cs-accent_color_hover:hover {
            color: #2ad19d;
        }

        .cs-accent_bg,
        .cs-accent_bg_hover:hover {
            background-color: #2ad19d;
        }

        .cs-primary_color {
            color: #111111;
        }

        .cs-secondary_color {
            color: #777777;
        }

        .cs-ternary_color {
            color: #353535;
        }

        .cs-ternary_color {
            border-color: #eaeaea;
        }

        .cs-focus_bg {
            background: #f6f6f6;
        }

        .cs-accent_10_bg {
            background-color: rgba(42, 209, 157, 0.1);
        }

        .cs-container {
            max-width: 880px;
            padding: 30px 15px;
            margin-left: auto;
            margin-right: auto;
        }

        .cs-text_center {
            text-align: center;
        }

        .cs-text_right {
            text-align: right;
        }

        .cs-border_bottom_0 {
            border-bottom: 0;
        }

        .cs-border_top_0 {
            border-top: 0;
        }

        .cs-border_bottom {
            border-bottom: 1px solid #eaeaea;
        }

        .cs-border_top {
            border-top: 1px solid #eaeaea;
        }

        .cs-border_left {
            border-left: 1px solid #eaeaea;
        }

        .cs-border_right {
            border-right: 1px solid #eaeaea;
        }

        .cs-table_baseline {
            vertical-align: baseline;
        }

        .cs-round_border {
            border: 1px solid #eaeaea;
            overflow: hidden;
            border-radius: 6px;
        }

        .cs-border_none {
            border: none;
        }

        .cs-border_left_none {
            border-left-width: 0;
        }

        .cs-border_right_none {
            border-right-width: 0;
        }

        .cs-invoice.cs-style1 {
            background: #fff;
            border-radius: 10px;
            padding: 50px;
        }

        .cs-invoice.cs-style1 .cs-invoice_head {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        .cs-invoice.cs-style1 .cs-invoice_head.cs-type1 {
            -webkit-box-align: end;
            -ms-flex-align: end;
            align-items: flex-end;
            padding-bottom: 25px;
            border-bottom: 1px solid #eaeaea;
        }

        .cs-invoice.cs-style1 .cs-invoice_footer {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .cs-invoice.cs-style1 .cs-invoice_footer table {
            margin-top: -1px;
        }

        .cs-invoice.cs-style1 .cs-left_footer {
            width: 55%;
            padding: 10px 15px;
        }

        .cs-invoice.cs-style1 .cs-right_footer {
            width: 46%;
        }

        .cs-invoice.cs-style1 .cs-note {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
            margin-top: 40px;
        }

        .cs-invoice.cs-style1 .cs-note_left {
            margin-right: 10px;
            margin-top: 6px;
            margin-left: -5px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .cs-invoice.cs-style1 .cs-note_left svg {
            width: 22px;
        }

        .cs-invoice.cs-style1 .cs-invoice_left {
            max-width: 55%;
        }

        .cs-invoice_btns {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            margin-top: 30px;
        }

        .cs-invoice_btns .cs-invoice_btn:first-child {
            border-radius: 5px 0 0 5px;
        }

        .cs-invoice_btns .cs-invoice_btn:last-child {
            border-radius: 0 5px 5px 0;
        }

        .cs-invoice_btn {
            display: -webkit-inline-box;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            border: none;
            font-weight: 600;
            padding: 8px 20px;
            cursor: pointer;
        }

        .cs-invoice_btn svg {
            width: 24px;
            margin-right: 5px;
        }

        .cs-invoice_btn.cs-color1 {
            color: #111111;
            background: rgba(42, 209, 157, 0.15);
        }

        .cs-invoice_btn.cs-color1:hover {
            background-color: rgba(42, 209, 157, 0.3);
        }

        .cs-invoice_btn.cs-color2 {
            color: #fff;
            background: #2ad19d;
        }

        .cs-invoice_btn.cs-color2:hover {
            background-color: rgba(42, 209, 157, 0.8);
        }

        .cs-table_responsive {
            overflow-x: auto;
        }

        .cs-table_responsive > table {
            min-width: 600px;
        }

        .cs-50_col > * {
            width: 50%;
            -webkit-box-flex: 0;
            -ms-flex: none;
            flex: none;
        }

        .cs-bar_list {
            margin: 0;
            padding: 0;
            list-style: none;
            position: relative;
        }

        .cs-bar_list::before {
            content: '';
            height: 75%;
            width: 2px;
            position: absolute;
            left: 4px;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            background-color: #eaeaea;
        }

        .cs-bar_list li {
            position: relative;
            padding-left: 25px;
        }

        .cs-bar_list li:before {
            content: '';
            height: 10px;
            width: 10px;
            border-radius: 50%;
            background-color: #eaeaea;
            position: absolute;
            left: 0;
            top: 6px;
        }

        .cs-bar_list li:not(:last-child) {
            margin-bottom: 10px;
        }

        .cs-table.cs-style1.cs-type1 {
            padding: 10px 30px;
        }

        .cs-table.cs-style1.cs-type1 tr:first-child td {
            border-top: none;
        }

        .cs-table.cs-style1.cs-type1 tr td:first-child {
            padding-left: 0;
        }

        .cs-table.cs-style1.cs-type1 tr td:last-child {
            padding-right: 0;
        }

        .cs-table.cs-style1.cs-type2 > * {
            padding: 0 10px;
        }

        .cs-table.cs-style1.cs-type2 .cs-table_title {
            padding: 20px 0 0 15px;
            margin-bottom: -5px;
        }

        .cs-table.cs-style2 td {
            border: none;
        }

        .cs-table.cs-style2 td,
        .cs-table.cs-style2 th {
            padding: 12px 15px;
            line-height: 1.55em;
        }

        .cs-table.cs-style2 tr:not(:first-child) {
            border-top: 1px dashed #eaeaea;
        }

        .cs-list.cs-style1 {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .cs-list.cs-style1 li {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .cs-list.cs-style1 li:not(:last-child) {
            border-bottom: 1px dashed #eaeaea;
        }

        .cs-list.cs-style1 li > * {
            -webkit-box-flex: 0;
            -ms-flex: none;
            flex: none;
            width: 50%;
            padding: 7px 0px;
        }

        .cs-list.cs-style2 {
            list-style: none;
            margin: 0 0 30px 0;
            padding: 12px 0;
            border: 1px solid #eaeaea;
            border-radius: 5px;
        }

        .cs-list.cs-style2 li {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .cs-list.cs-style2 li > * {
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            padding: 5px 25px;
        }

        .cs-heading.cs-style1 {
            line-height: 1.5em;
            border-top: 1px solid #eaeaea;
            border-bottom: 1px solid #eaeaea;
            padding: 10px 0;
        }

        .cs-no_border {
            border: none !important;
        }

        .cs-grid_row {
            display: -ms-grid;
            display: grid;
            grid-gap: 20px;
            list-style: none;
            padding: 0;
        }

        .cs-col_2 {
            -ms-grid-columns: (1fr)[2];
            grid-template-columns: repeat(2, 1fr);
        }

        .cs-col_3 {
            -ms-grid-columns: (1fr)[3];
            grid-template-columns: repeat(3, 1fr);
        }

        .cs-col_4 {
            -ms-grid-columns: (1fr)[4];
            grid-template-columns: repeat(4, 1fr);
        }

        .cs-border_less td {
            border-color: transparent;
        }

        .cs-special_item {
            position: relative;
        }

        .cs-special_item:after {
            content: '';
            height: 52px;
            width: 1px;
            background-color: #eaeaea;
            position: absolute;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            right: 0;
        }

        .cs-table.cs-style1 .cs-table.cs-style1 tr:not(:first-child) td {
            border-color: #eaeaea;
        }

        .cs-table.cs-style1 .cs-table.cs-style2 td {
            padding: 12px 0px;
        }

        .cs-ticket_wrap {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .cs-ticket_left {
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
        }

        .cs-ticket_right {
            -webkit-box-flex: 0;
            -ms-flex: none;
            flex: none;
            width: 215px;
        }

        .cs-box.cs-style1 {
            border: 2px solid #eaeaea;
            border-radius: 5px;
            padding: 20px 10px;
            min-width: 150px;
        }

        .cs-box.cs-style1.cs-type1 {
            padding: 12px 10px 10px;
        }

        .cs-max_w_150 {
            max-width: 150px;
        }

        .cs-left_auto {
            margin-left: auto;
        }

        .cs-title_1 {
            display: inline-block;
            border-bottom: 1px solid #eaeaea;
            min-width: 60%;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }

        .cs-box2_wrap {
            display: -ms-grid;
            display: grid;
            grid-gap: 30px;
            list-style: none;
            padding: 0;
            -ms-grid-columns: (1fr)[2];
            grid-template-columns: repeat(2, 1fr);
        }

        .cs-box.cs-style2 {
            border: 1px solid #eaeaea;
            padding: 25px 30px;
            border-radius: 5px;
        }

        .cs-box.cs-style2 .cs-table.cs-style2 td {
            padding: 12px 0;
        }

        @media print {
            .cs-hide_print {
                display: none !important;
            }
        }

        @media (max-width: 767px) {
            .cs-mobile_hide {
                display: none;
            }
            .cs-invoice.cs-style1 {
                padding: 30px 20px;
            }
            .cs-invoice.cs-style1 .cs-right_footer {
                width: 100%;
            }
        }

        @media (max-width: 500px) {
            .cs-invoice.cs-style1 .cs-logo {
                margin-bottom: 10px;
            }
            .cs-invoice.cs-style1 .cs-invoice_head {
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
            }
            .cs-invoice.cs-style1 .cs-invoice_head.cs-type1 {
                -webkit-box-orient: vertical;
                -webkit-box-direction: reverse;
                -ms-flex-direction: column-reverse;
                flex-direction: column-reverse;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                text-align: center;
            }
            .cs-invoice.cs-style1 .cs-invoice_head .cs-text_right {
                text-align: left;
            }
            .cs-list.cs-style2 li {
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
            }
            .cs-list.cs-style2 li > * {
                padding: 5px 20px;
            }
            .cs-grid_row {
                grid-gap: 0px;
            }
            .cs-col_2,
            .cs-col_3,
            .cs-col_4 {
                -ms-grid-columns: (1fr)[1];
                grid-template-columns: repeat(1, 1fr);
            }
            .cs-table.cs-style1.cs-type1 {
                padding: 0px 20px;
            }
            .cs-box2_wrap {
                -ms-grid-columns: (1fr)[1];
                grid-template-columns: repeat(1, 1fr);
            }
            .cs-box.cs-style1.cs-type1 {
                max-width: 100%;
                width: 100%;
            }
            .cs-invoice.cs-style1 .cs-invoice_left {
                max-width: 100%;
            }
        }

    </style>
    <?php
    ?>
<form action="{{ admin_url('', true) }}" method="get" enctype="multipart/form-data" id="booking-form">
    @csrf
    @include('admin.layouts.inc.stickybar', compact('form_buttons'))
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="kt-portlet" data-ktportlet="true" id="kt_portlet_booking">
                    <div class="kt-portlet__head">
                        @include('admin.layouts.inc.portlet_head')
                        @include('admin.layouts.inc.portlet_actions')
                    </div>

                    <div class="kt-portlet__body kt-padding">


                        <div style="display: grid ;">
                            <table>
                                <!-- <thead>
                                <tr>
                                    <th colspan="1"><img width="400" height="300" src="https://demo.chaloje.com/assets/images/icon/chaloje.png" /></th>
                                    <th colspan="3"><h1><b>Invoice</b></h1></th>
                                </tr>
                                </thead> -->
                                <tbody>
                                <tr>
                                    <!-- <th class="cs-width_6 cs-semi_bold cs-primary_color cs-focus_bg cs-f16" colspan="2">Invoice To:</th> -->
                                    <th class="cs-width_6 cs-semi_bold cs-primary_color cs-focus_bg cs-f16" colspan="2">Company Info:</th>
                                </tr>
                                <tr>
                                    <!-- <td colspan="2">
{{--                                        @dump(collect($row)->all());--}}
{{--                                        @dump($detail);--}}
{{--                                        @dump($adult);--}}
{{--                                        @dump($flight);--}}
                                        <b class="cs-primary_color">Name: </b><i>{{ $adult[0]->Title . " " . $adult[0]->FullName }}</i><br>
                                        <b class="cs-primary_color">National ID#: </b><br><i>{{ $adult[0]->Cnic }}</i><br>
                                        <b class="cs-primary_color">Email#: </b><br><i>{{ $detail->email }}</i><br>
                                        <b class="cs-primary_color">Country: </b><i>Canada</i>
                                    </td> -->
                                    <td colspan="2">
                                        <address>
                                            Chaloje Travel & Tourism<br>
                                            Office No. 204, Plot No.66, 2nd Floor, Iconic Trade Center,<br>
                                            Behind Medicare Hospital,Bihar Muslim Society Block 3 Sharfabad, Karachi City, Sindh.<br>
                                            (021) 34855100,<br>
                                            Info@Chaloje.Com<br>
                                        </address>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="cs-table cs-style1">
                                <div class="cs-round_border">
                                    <div class="cs-table_responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th class="cs-width_6 cs-semi_bold cs-primary_color cs-focus_bg cs-f16" colspan="2">Ticket Information</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <!-- <tr> -->
                                                <!-- <td class="cs-width_6"><b class="cs-primary_color">Passenger Name: </b>{{ $adult[0]->Title . " " . $adult[0]->FullName }}</td> -->
                                                <!-- <td class="cs-width_6"><b class="cs-primary_color">Ticket Number: </b>#CH-{{ $row->id }}</td> -->
                                            <!-- </tr> -->
                                            <tr>
                                                <td class="cs-width_6"><b class="cs-primary_color">Issued By Date: </b>
                                                   {{ \Carbon\Carbon::parse($row->created_at)->format('Y-m-d') }}
                                                </td>
                                                <td class="cs-width_6"><b class="cs-primary_color">Booking Reference: </b>{{ $row->order_id }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th class="cs-width_6 cs-semi_bold cs-primary_color cs-focus_bg cs-f16 cs-border_top" colspan="8">Travel Information</th>
                                            </tr>
                                            <tr class=" cs-border_top">
                                                <th class="cs-width_5 cs-semi_bold cs-primary_color">Flight Details</th>
                                                <th class="cs-width_2 cs-semi_bold cs-primary_color">Full Name</th>
                                                <th class="cs-width_2 cs-semi_bold cs-primary_color">Cnic</th>
                                                <th class="cs-width_2 cs-semi_bold cs-primary_color">Dob</th>
                                                <th class="cs-width_2 cs-semi_bold cs-primary_color">Class</th>
                                                <th class="cs-width_2 cs-semi_bold cs-primary_color">Base Fare</th>
                                                <th class="cs-width_1 cs-semi_bold cs-primary_color">Taxes</th>
                                                <th class="cs-width_2 cs-text_right cs-semi_bold cs-primary_color">Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($PassengersDetails as $key => $PassengersDetail)
                                                @foreach($PassengersDetail as $PassengersDetail)
                                                    <tr>
                                                        <td class="cs-width_5">
                                                            {{ $flight->outbound->flight->AIRLINE }} 
                                                            {{ $flight->outbound->flight->FLIGHT_NO }} 
                                                            {{ $flight->outbound->flight->ORGN }} - {{ $flight->outbound->flight->DEST }} <br>
                                                            Date: {{ \Carbon\Carbon::parse($flight->outbound->flight->DEPARTURE_DATE . " " . $flight->outbound->flight->DEPARTURE_TIME)->format('d, F Y, D h:m A') }}
                                                        </td>
                                                        <td class="cs-width_2">{{$PassengersDetail->FullName}}</td>
                                                        <td class="cs-width_2">{{$PassengersDetail->Cnic}}</td>
                                                        <td class="cs-width_2">{{$PassengersDetail->Dob}}</td>
                                                        <td class="cs-width_2">{{$flight->outbound->baggage->title}}</td>
                                                        <td class="cs-width_2">{{$flight->outbound->baggage->FARE_PAX_WISE->$key->BASIC_FARE}}</td>
                                                        <td class="cs-width_1">{{$flight->outbound->baggage->FARE_PAX_WISE->$key->TAX}}</td>
                                                        <td class="cs-width_2 cs-text_right">{{$flight->outbound->baggage->FARE_PAX_WISE->$key->TOTAL}}</td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                            @if(isset($flight->inbound))
                                                @foreach($PassengersDetails as $key => $PassengersDetail)
                                                    @foreach($PassengersDetail as $PassengersDetail)
                                                        <tr>
                                                            <td class="cs-width_5">
                                                                {{ $flight->inbound->flight->AIRLINE }} 
                                                                {{ $flight->inbound->flight->FLIGHT_NO }} 
                                                                {{ $flight->inbound->flight->ORGN }} - {{ $flight->inbound->flight->DEST }} <br>
                                                                Date: {{ \Carbon\Carbon::parse($flight->inbound->flight->DEPARTURE_DATE . " " . $flight->inbound->flight->DEPARTURE_TIME)->format('d, F Y, D h:m A') }}
                                                            </td>
                                                            <td class="cs-width_2">{{$PassengersDetail->FullName}}</td>
                                                            <td class="cs-width_2">{{$PassengersDetail->Cnic}}</td>
                                                            <td class="cs-width_2">{{$PassengersDetail->Dob}}</td>
                                                            <td class="cs-width_2">{{$flight->inbound->baggage->title}}</td>
                                                            <td class="cs-width_2">{{$flight->inbound->baggage->FARE_PAX_WISE->$key->BASIC_FARE}}</td>
                                                            <td class="cs-width_1">{{$flight->inbound->baggage->FARE_PAX_WISE->$key->TAX}}</td>
                                                            <td class="cs-width_2 cs-text_right">{{$flight->inbound->baggage->FARE_PAX_WISE->$key->TOTAL}}</td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="cs-invoice_footer cs-border_top">
                                        <div class="cs-left_footer cs-mobile_hide"></div>
                                        <div class="cs-right_footer">
                                            <table class="table">
                                                <tbody>
                                                <tr class="cs-border_left">
                                                    <td class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">Subtoal</td>
                                                    <td class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg cs-primary_color cs-text_right">{{ number_format($flight->outbound->baggage->TOTAL + $flight->inbound->baggage->TOTAL) }}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="cs-semi_bold cs-primary_color cs-focus_bg cs-f16 cs-border_top" colspan="4">Payment Information</th>
                                            </tr>
                                            <tr>
                                                <td class="cs-width_3 cs-primary_color cs-semi_bold">Payment Gatway</td>
                                                <td class="cs-width_3 cs-primary_color cs-semi_bold">Date</td>
                                                <td class="cs-width_3 cs-primary_color cs-semi_bold cs-text_right">Total Amount</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="cs-width_3">{{ $payment->payment_method }}</td>
                                            <td class="cs-width_3">
                                                {{ \Carbon\Carbon::parse($row->created_at)->format('Y-m-d') }}
                                            </td>
                                            <td class="cs-width_3 cs-text_right">{{ number_format($flight->outbound->baggage->TOTAL + $flight->inbound->baggage->TOTAL)  }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="cs-invoice_footer">
                                    <div class="cs-left_footer cs-mobile_hide"></div>
                                    <div class="cs-right_footer">
                                        <table class="table">
                                            <tbody>
                                            <tr class="cs-border_none">
                                                <td class="cs-width_3 cs-border_top_0 cs-bold cs-f16 cs-primary_color">Total Amount</td>
                                                <td class="cs-width_3 cs-border_top_0 cs-bold cs-f16 cs-primary_color cs-text_right">{{ number_format($flight->outbound->baggage->TOTAL + $flight->inbound->baggage->TOTAL) }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="cs-note" style="text-align: center ;">
                                <div>
                                    <p class="cs-mb0"><b class="cs-primary_color cs-bold">📄 Note:</b></p>
                                    <p class="cs-m0"><i style="font-size: 30px;"> ❝  </i>Here we can write a additional notes for the client to get a better understanding of this invoice.<i style="font-size: 30px;">❞</i></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

{{-- Scripts --}}
@section('scripts')

@endsection
