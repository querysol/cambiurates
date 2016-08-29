@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-content forum-container">

                <div class="search-form">
                    <form action="" method="get">
                        <div class="input-group">
                            <input type="text" placeholder="Search ..." name="search" class="form-control input-lg" value="{{\Illuminate\Support\Facades\Input::get('search')}}">
                            <div class="input-group-btn">
                                <button class="btn btn-lg btn-primary" type="submit">
                                    Search
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
                <button id="apply" class="btn-green btn btn-sm" style="margin: 5px">Apply</button>
                <div class="hr-line-dashed"></div>
                <div class="table-responsive">
                    <table class="footable table table-stripped toggle-arrow-tiny default breakpoint footable-loaded">
                        <tr>
                            <th class="footable-first-column">
                                <input type="checkbox" name="check-all" class="i-checks check-all">
                            </th>
                            <th>Symbol</th>
                            <th>Title</th>
                            <th>Exchange Rate</th>
                            <th>Visible</th>
                            <th style="max-width: 30px">Buy</th>
                            <th style="max-width: 30px">Sell</th>
                            <th class="text-right footable-last-column">Action</th>
                        </tr>
                        @foreach($myExchangeRates->all() as $iIdx => $oExchangeRate)
                            <tr class="footable-{{$iIdx % 2 == 0 ? 'odd' : 'even'}}" style="display: table-row; background-color: #e1ffe6">
                                <td class="check-mail footable-first-column">
                                    <input type="checkbox" name="id[]" data-name="id" value="{{ $oExchangeRate->id }}" class="i-checks">
                                </td>
                                <td>
                                    {{ $oExchangeRate->symbol }}
                                </td>
                                <td>
                                    {{ $oExchangeRate->title }}
                                </td>
                                <td>
                                    {{ $oExchangeRate->exchangeRate }}
                                </td>
                                <td>
                                    <div class="flag-toggle-2">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" value="true" class="flag-checkbox" data-name="visible" name="visible[]"
                                                   {{ (true) ? 'checked' : '' }}
                                                   data-toggle="toggle"
                                                   data-size="small"
                                                   data-on-text="Visible"
                                                   data-off-text="Hidden"
                                            >
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <select name="buy_trade[]" data-name="trade_type" data-placeholder="Choose a trade type..." class="chosen-select col-md-6" style="width:30%;" tabindex="4">
                                        <option selected="selected" value="disabled">Disabled</option>
                                        <option value="percent">Margin(%)</option>
                                        <option value="flat_rate">Flat Rate</option>
                                    </select>
                                    <input type="text" value="0" class="form-control buy" name="buy[]" data-name="buy" style="width:30%;" disabled="disabled">
                                </td>
                                <td>
                                    <select name="sell_trade[]" data-name="trade_type" data-placeholder="Choose a trade type..." class="chosen-select col-md-6" style="width:30%;" tabindex="4">
                                        <option selected="selected" value="disabled">Disabled</option>
                                        <option value="percent">Margin(%)</option>
                                        <option value="flat_rate">Flat Rate</option>
                                    </select>
                                    <input type="text" value="0" class="form-control margin-rate-input" name="sell[]" data-name="sell" style="width:30%;"  disabled="disabled">
                                </td>

                                <td class="text-right footable-last-column">
                                    <div class="btn-group">
                                        <button class="btn-green btn btn-md single-row-edit">
                                            Edit
                                        </button>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @foreach($aExchangeRates->all() as $iIdx => $oExchangeRate)
                        <tr class="footable-{{$iIdx % 2 == 0 ? 'odd' : 'even'}}" style="display: table-row;">
                            <td class="check-mail footable-first-column">
                                <input type="checkbox" name="id[]" data-name="id" value="{{ $oExchangeRate->id }}" class="i-checks">
                            </td>
                            <td>
                                {{ $oExchangeRate->symbol }}
                            </td>
                            <td>
                                {{ $oExchangeRate->title }}
                            </td>
                            <td>
                                {{ $oExchangeRate->exchangeRate }}
                            </td>
                            <td>
                                <div class="flag-toggle-2">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="true" class="flag-checkbox" data-name="visible" name="visible[]"
                                               {{ (true) ? 'checked' : '' }}
                                               data-toggle="toggle"
                                               data-size="small"
                                               data-on-text="Visible"
                                               data-off-text="Hidden"
                                        >
                                    </label>
                                </div>
                            </td>
                            <td>
                                <select name="buy_trade[]" data-name="trade_type" data-placeholder="Choose a trade type..." class="chosen-select col-md-6" style="width:30%;" tabindex="4">
                                    <option selected="selected" value="disabled">Disabled</option>
                                    <option value="percent">Margin(%)</option>
                                    <option value="flat_rate">Flat Rate</option>
                                </select>
                                <input type="text" value="0" class="form-control buy" name="buy[]" data-name="buy" style="width:30%;" disabled="disabled">
                            </td>
                            <td>
                                <select name="sell_trade[]" data-name="trade_type" data-placeholder="Choose a trade type..." class="chosen-select col-md-6" style="width:30%;" tabindex="4">
                                    <option selected="selected" value="disabled">Disabled</option>
                                    <option value="percent">Margin(%)</option>
                                    <option value="flat_rate">Flat Rate</option>
                                </select>
                                <input type="text" value="0" class="form-control margin-rate-input" name="sell[]" data-name="sell" style="width:30%;"  disabled="disabled">
                            </td>

                            <td class="text-right footable-last-column">
                                <div class="btn-group">
                                    <button class="btn-green btn btn-md single-row-edit">
                                        Edit
                                    </button>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="7" class="footable-visible">
                                @if($aExchangeRates->render() != '')
                                    {{ $aExchangeRates->appends(\Illuminate\Support\Facades\Input::except(array('page')))->render() }}
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>

                @if(empty($aExchangeRates->all()))
                    <div class="alert alert-info alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        You don't have any exchangeRates!
                    </div>
                @endif
            </div>
        </div>

    </div>
@stop

@section('footer')
    <script type="text/javascript">
        $(document).ready(function () {

            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });

            $('input[name="visible[]"]').bootstrapSwitch();
            $('.chosen-select').chosen();

            var cbSelector = $(".flag-checkbox");
            cbSelector.bootstrapSwitch();
            cbSelector.on('switchChange.bootstrapSwitch', function (event, state) {
                $(this).val(state);
            });

            $('.single-row-edit').click(function () {

                var that = $(this);
                var row = that.parents('tr').first();
                var data = {};
                row.find('input').each(function () {
                     data[$(this).prop('data-name')] =  $(this).val();
                });
                row.find('select').each(function () {
                    data[$(this).prop('data-name')] =  $(this).val();
                });

                $.ajax({
                    method: "POST",
                    url: "my-exchange-rates/edit",
                    data: data,
                    success: function(result) {
                        row.after('<div id="msg" style="position: absolute;left:30%;z-index: 1000;" class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Error! </strong>All fields must be numeric. </div>');
                        setTimeout(function(){
                            $('#msg').remove();
                        }, 2000);

                    }, error: function (result) {
                        row.after('<div id="msg" style="position: absolute;left:30%;z-index: 1000;" class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Error! </strong>All fields must be numeric. </div>');
                        setTimeout(function(){
                            $('#msg').remove();
                        }, 2000);
                    }
                })
            });

            $('.check-all').on('ifClicked', function(event){
                $('.i-checks:not(:first)').iCheck('toggle');
            });

            $('select[data-name="trade_type"]').on('change',function () {
                var selected = $(this).val();
                var input = $(this).parent().find('input');
                if(selected == 'disabled') {
                    input.prop('disabled', true);
                } else {
                    input.prop('disabled', false);
                }
            });

            $('#apply').click(function () {

                var data = {};
                var that = $(this);

                $('.i-checks').each(function () {
                    var row_data = {};
                    var row = $(this).parents('tr').first();
                    if ($(this).prop("checked")) {
                        row.find('input').each(function () {
                            row_data[$(this).prop('data-name')] = $(this).val();
                        });
                        row.find('select').each(function () {
                            row_data[$(this).prop('data-name')] = $(this).val();
                        });
                        data[$(this).index()] = row_data;
                    }
                });

                if(Object.keys(data).length) {
                    call_ajax(data);
                }
                function call_ajax(data) {
                    $.ajax({
                        method: "POST",
                        url: "my-exchange-rates/edit-collection",
                        data: data,
                        success: function (result) {
                            that.after('<div id="msg"  class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">x</button> <strong>Error! </strong>All fields must be numeric. </div>');
                            setTimeout(function () {
                                $('#msg').remove();
                            }, 5000);

                        }, error: function (result) {
                            that.after('<div id="msg" class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">x</button> <strong>Error! </strong>All fields must be numeric. </div>');
                            setTimeout(function () {
                                $('#msg').remove();
                            }, 5000);
                        }
                    });
                }
            });

        });
    </script>
@endsection