<br>
<h3 class="m-section__heading">Payment Schedule
    {{--<span class="pull-right">
        <a href="javascript: void(0);" class="btn btn-lg btn-primary btn-icon add-plane"><i class="la la-th-list -la-ellipsis-v"></i></a>
    </span>--}}
</h3>

<style>
    .payment-schedule-table td{
        padding: 2px;
    }
    .clone-table tr td .add-row{
        display: none;
        margin-right: 10px;
    }
    .clone-table tr:last-child td .add-row{
        display: inline-block;
    }
    .input-group-text {
        padding: 5px;
    }
    /*.remove-row{
        position: absolute !important;
        margin: 4px 0 0 -20px;
    }*/
</style>
@php
if($row->id > 0) {
    //$_payments = $this->m_project_properties->payments($row->id);
    $_payments = json_decode($row->payment, true);
}
if($_payments == null){
    //$_payments = json_decode('{["1-1":[{"floors":"1-1"}]]}');
    $_payments = json_decode('{"1-1":[{"id":"34"}]}', true);
}
$keys = array_keys($_payments['floors']);
//dump($keys, $_payments)
@endphp
<table class="table -table-striped table-hover -table-responsive grid-table payment-schedule-table clone-table">
    <thead class="thead-default">
    <tr>
        <th width="50" class="text-center">Actions</th>
        <th class="text-center">PARTICULARS</th>
        <th class="text-center" width="200" >Unique Key</th>
        <th width="200" class="text-center">Payment Terms</th>
        {{--<th class="text-center">Installment Plan</th>--}}
        @foreach ($keys as $i => $key)
            @php
                $floors = explode('-', $key);
            @endphp
            {{--<th width="150" class="clone-plane">
                <div class="input-group ">
                    <input type="text" class="form-control" name="payment[floors][{{ $i }}][]" placeholder="Units" value="{{ intval($floors[0]) }}" aria-describedby="basic-addon1">
                    <span class="input-group-text p-0" id="basic-addon1"><a href="javascript: void(0);" class="remove-v-column btn btn-sm btn-danger btn-icon"><i class="la la-trash"></i></a></span>
                    <input type="text" class="form-control" name="payment[floors][{{ $i }}][]" placeholder="Units" value="{{ intval($floors[1]) }}" aria-describedby="basic-addon1">
                </div>
            </th>--}}
        @endforeach
    </tr>
    </thead>
    <tbody>
    <?php
    $i = -1;
    foreach ($_payments['particulars'] as $k => $particular) {
        $i++;
    ?>
    <tr>
        <td class="text-center" width="100">
            <div class="d-flex">
                <a href="#" class="btn btn-sm btn-success btn-icon d-flex add-row"><i class="la la-plus"></i></a>
                <a href="#" class="btn btn-sm btn-danger btn-icon d-flex remove-row"><i class="la la-trash"></i></a>
            </div>
        </td>
        <td>
            <input type="text" name="payment[particulars][]" value="{{ $_payments['particulars'][$k] }}" placeholder="Particulars" class="form-control">
        </td>

        <td>
            <input type="text" name="payment[key][]" value="{{ $_payments['key'][$k] }}" placeholder="Key" class="form-control">
        </td>

        <td>
            <div class="input-group m-input-group">
                <input type="text" name="payment[payment_interval][]" value="{{ $_payments['payment_interval'][$k] }}" placeholder="Payment Interval" class="form-control">
                <div class="input-group-prepend">
                    <select name="payment[interval_type][]" id="interval_type" class="form-control">
                        {!! selectBox(array_combine(['Day', 'Month', 'Year'], ['Day', 'Month', 'Year']), $_payments['interval_type'][$k]) !!}
                    </select>
                </div>
            </div>
            {{--<div class="help-block text-danger">Interval start after booking.</div>--}}
        </td>

        {{--<td>
            <div class="input-group m-input-group">
                <input type="text" name="payment[installment_interval][]" value="{{ $_payments['installment_interval'][$k] }}" placeholder="Interval: every 3 month" class="form-control">
                <div class="input-group-prepend">
                    <select name="payment[installment_interval_type][]" id="installment_interval_type" class="form-control">
                        {!! selectBox(array_combine(['Day', 'Month', 'Year'], ['Day', 'Month', 'Year']), $_payments['installment_interval_type'][$k]) !!}
                    </select>
                </div>
                <input type="text" name="payment[installment_duration][]" value="{{ $_payments['installment_duration'][$k] }}" placeholder="Duration ex: 3 installment" class="form-control">
            </div>
        </td>--}}
        @foreach($_payments['amount'] as $f => $amount)
        <td width="250" class="clone-plane"><input type="text" name="payment[amount][{{ $f }}][]" value="{{ $_payments['amount'][$f][$k] }}" placeholder="amount" class="form-control"></td>
        @endforeach
    </tr>
    <?php } ?>
    </tbody>
    <tfoot style="display: none;">
    <tr>
        <td colspan="4"><b>TOTAL CASH</b></td>
        <td class="text-center"><b><?php echo number_format(array_sum($_payments['amount']));?></b></td></td>
    </tr>
    </tfoot>

</table>
<br>

<script>
    $(function () {
        $(document).ready(function () {
            $(document).on('click', '.add-plane', function (e) {
                e.preventDefault();
                var th_clone = $('th.clone-plane').eq(0);
                var n = $('th.clone-plane').length;

                th_clone.closest('tr').append(th_clone.clone().addClass('new-clone-plane'));
                th_clone.closest('tr').find('th:last').find('input').val('');
                th_clone.closest('tr').find('th:last').find('input[name*=payment\\[floors\\]]').attr('name', 'payment[floors]['+n+'][]');

                $('.clone-table tbody tr').each(function (i, v) {
                    var td_clone = $('td.clone-plane', v).not('.new-clone-plane');
                    //$(v).append('<td class="new-clone-plane"><input type="text" name="amount['+th_clone.length+'][]" value="" class="form-control"></td>');
                    $(v).append('<td class="new-clone-plane">'+td_clone.html()+'</td>');
                    $(v).find('td:last input').val('');
                    $(v).find('td:last input[name*=payment\\[amount\\]]').attr('name', 'payment[amount]['+n+'][]');
                });
            });


            $(document).on('click', '.remove-v-column', function (e) {
                e.preventDefault();
                if($('.clone-table th.clone-plane').length <= 1){
                    return false;
                }
                var th = $(this).closest('.clone-plane');
                var th_index = th[0].cellIndex;
                th.remove();
                $('tbody tr td:nth-child('+(th_index + 1)+')').remove();

            });
            $(document).on('click', '.add-row', function (e) {
                e.preventDefault();
                var tr_clone = $('.clone-table tbody tr:last').eq(0);
                var n = $('th.clone-plane').length;
                //tr_clone = tr_clone.clone().find('input,select').val('');
                tr_clone.closest('tbody').append('<tr>' + tr_clone.html() + '</tr>');
                $('.clone-table tbody tr:last').find('input').val('');
                $(v).find('td:last input[name*=payment\\[amount\\]]').attr('name', 'payment[amount]['+n+'][]');
            });

            $(document).on('click', '.remove-row', function (e) {
                e.preventDefault();
                if($('.clone-table tbody tr').length <= 1){
                    return false;
                }
                var th = $(this).closest('tr').remove();
            });
        });
    });
</script>