<div class="mt-3"></div>
@php
    $airlines = [
    'airsial' => ['title' => 'Airsial', 'inputs' => ['URL', 'Username' => ['type' => 'text'], 'Password' => ['type' => 'password']]],
    'airblue' => ['title' => 'AirBlue', 'inputs' => ['URL', 'ID' => ['title' => 'ID','type' => 'text'], 'Password' => ['type' => 'password'], 'key', 'Type', 'Version', 'Target']],
    'flyjinnah' => ['title' => 'FlyJinnah', 'inputs' => ['URL', 'USERNAME' => ['type' => 'text'], 'PASSWORD' => ['type' => 'password'], 'AGENT_CODE', 'Version', 'TerminalID' => ['title' => 'Terminal ID'], 'Payment_CompanyName']],
    'airserene' => ['title' => 'AirSerene', 'inputs' => ['CarrierCode', 'EndPoint', 'IP', 'AuthAppID', 'AuthUserID', 'AuthTktdeptid', 'SignatureKey', 'Token', 'PlannedActiveTime', 'Username' => ['type' => 'text'] ]],
    'hblgateway' => ['title' => 'Hbl Payment Gateway', 'inputs' => ['URL', 'USER_ID' => ['type' => 'text'] , 'PASSWORD' => ['type' => 'password'], 'public_key' => ['type' => 'textarea'], 'private_key' => ['type' => 'textarea'], 'CHANNEL', 'CLIENT_NAME']],
    ];

    $modes = ['Test', 'Live'];
@endphp

@foreach($airlines as $airline => $airline_op)
    <?php
    $airline_opt = json_decode(opt($airline));
    ?>
<h5>{{ $airline_op['title'] }}</h5>
<div class="row">
    @foreach($modes as $mode)
        <div class="col-lg-6">
            <div class="form-group m-form__group row ass">
                <div class="col-lg-12">
                    <label class="col-form-label">{{ $mode }}:</label>
                    <input type="radio" name="opt[{{ $airline }}][mode]" value="{{ $mode }}" {{ _checked($mode, $airline_opt->mode) }}>
                </div>
            </div>

            @foreach ($airline_op['inputs'] as $key => $input_op)
                @php
                    $title = str_replace(['_', '-'], [' ', ' '], isset($input_op['title']) ? $input_op['title'] : (is_int($key) ? Str::title($input_op) : Str::title($key)));
                    $name = isset($input_op['name']) ? $input_op['name'] : is_int($key) ? $input_op : $key;//Str::slug($key, '_', true);
                    $type = isset($input_op['type']) ? $input_op['type'] : 'text';
                @endphp
            <div class="form-group">
                <label class="col-form-label">{{ $title }}:</label>
                @if(in_array($type, ['textarea']))
                    <textarea name="opt[{{ $airline }}][{{ $mode }}][{{ $name }}]" rows="{{ isset($input_op['rows']) ? $input_op['rows'] : 4  }}" class="form-control" placeholder="{{ $title }}">{{ $airline_opt->{$mode}->{$name} }}</textarea>
                @else
                    <input type="{{ $type }}" name="opt[{{ $airline }}][{{ $mode }}][{{ $name }}]" class="form-control" placeholder="{{ $title }}" value="{{ $airline_opt->{$mode}->{$name} }}">
                @endif
            </div>
            @endforeach

        </div>
    @endforeach
</div>
<div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
@endforeach

