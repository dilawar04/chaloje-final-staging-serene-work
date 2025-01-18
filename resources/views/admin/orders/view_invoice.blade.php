@php

@endphp
@extends('admin.layouts.admin')

@section('content')

    <div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="kt-portlet" data-ktportlet="true" id="kt_portlet_tools_1">
                    <div class="kt-portlet__body">
                        <div class="row align-content-center justify-content-center">
                            <div class="col-lg-4">
                                <form method="post" action="{{ admin_url("apply_coupon/{$row->id}", true) }}">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label for="note" class="col-form-label">{{ __('Coupon Code') }}:</label>
                                            <input type="text" name="coupon_code" id="coupon_code" class="form-control" placeholder="{{ __('Coupon code') }}" />
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-label-success w-100">Apply</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div class="col-lg-4">

                                @if(count($data['coupons']) > 0)
                                    @foreach($data['coupons'] as $coupon)
                                        <div class="kt-separator--border-dashed pd-5">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Coupon</th>
                                                    <td>{{ $coupon->coupon_name }}</td>
                                                    <td rowspan="2" align="center">
                                                        <a class="btn btn-danger" href="{{ admin_url("delete_coupon/{$row->id}/{$coupon->coupon_code}", true) }}">Delete</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Discount</th>
                                                    <td>{{ number_format($coupon->discount) }} {{ $coupon->discount_type }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                @include('admin.orders.payment_modal')

                <div class="kt-portlet" data-ktportlet="true" id="kt_portlet_tools_1">
                    <div class="kt-portlet__body">
                    {!! $data['HTML'] !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- Scripts --}}
@section('scripts')

@endsection
