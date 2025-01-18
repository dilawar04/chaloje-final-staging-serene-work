{{-- Modal --}}
<div class="modal fade" id="payment-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="post" action="{{ admin_url("income/store") }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="income_head" value="1">
            <input type="hidden" name="key" value="">
            <input type="hidden" name="order_id" value="">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <div class="col-lg-12">
                            <label for="title" class="col-form-label">{{ __('Description') }}:</label>
                            <input type="text" name="title" id="title" class="form-control" required placeholder="{{ __('Description') }}" value=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for="amount" class="col-form-label">{{ __('Receive Amount') }}:</label>
                            <div class="input-group m-input-group">
                                <input type="text" name="amount" id="amount" class="form-control" required placeholder="{{ __('Receive Amount') }}" value=""/>
                                <div class="input-group-append">
                                    <span class="input-group-text currency-code">GBP</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="date" class="col-form-label">{{ __('Receiving Date') }}:</label>
                            <input type="text" name="date" id="date" class="form-control datepicker" required autocomplete="off" placeholder="{{ __('Receiving Date') }}" value="{{ date('Y-m-d') }}"/>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <div class="col-lg-8">
                            <label for="receipt" class="col-form-label">{{ __('Receipt') }}:</label>
                            <div class="custom-file">
                                <input type="file" name="receipt" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                <span class="form-text text-muted">jpg, png only allow & max 1mb size</span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label for="date" class="col-form-label">{{ __('Status') }}:</label>
                            <select name="status" id="status" class="form-control">
                                {!! selectBox(DB_enumValues('income', 'status'), 'Paid') !!}
                            </select>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <div class="col-lg-12 text-center">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#payment-modal').on('show.bs.modal', function (e) {
            // do something...
            const data = $(e.relatedTarget).data();
            $(e.target).find('[name=amount]').attr('value', data.row.amount);
            $(e.target).find('[name=income_head]').attr('value', data.row.head);
            $(e.target).find('[name=order_id]').attr('value', data.row.order_id);
            $(e.target).find('[name=title]').attr('value', data.row.title);
            $(e.target).find('[name=key]').attr('value', data.row.key);
            $(e.target).find('.currency-code').html(data.row.currency.short_name);
            //console.log('modal', e, data.row);
        })
    })
</script>