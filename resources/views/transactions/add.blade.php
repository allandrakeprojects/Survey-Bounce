@extends('btemplate')

@section('content')
    <div class="page-body">
        <div class="row">
            <div class="col-md-12">


                <!-- Basic Inputs Validation start -->
                <div class="card">
                    <div class="card-header">
                        <h5>Add New Transaction</h5>
                        {{--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>--}}
                    </div>
                    <div class="card-block">
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                        @endif
                            <form id="transaction_form">
                            @csrf


<div class="form-group row">
    <label class="col-sm-2 col-form-label">Transaction Description</label>
    <div class="col-sm-10">
        <textarea rows="3" name="desc" cols="5" class="form-control @error('account_desc') is-invalid @enderror" placeholder="Transaction Description">{{old('account_desc')}}</textarea>
    </div>
</div>


<div class="form-group row">
    <label class="col-sm-2 col-form-label">Date</label>
    <span class="col-sm-10"><input type="date" id="date_input" class="form-control" placeholder="Date" name="date"></span>
</div>



<div class="row">
    <div class="col-sm-6">
<div class="row"><div class="col-sm-12">  <h4 class="sub-title alert-info">Debit Side</h4></div></div>




        <!-- Card Start -->
        <div class="card b-l-info business-info services m-b-20 debit_account_card debit_1"  >

            <div class="card-header show" style="padding: 5px 20px;">
                <div class="service-header"><h5 class="card-header-text">Debit Account </h5></div>
                <button id="edit-info-btn" type="button" class="btn btn-danger btn-mini waves-effect waves-light f-right"><i class="icofont icofont-close"></i></button>
            </div>

            <div class="card-block" style="padding: 5px 1.25rem" >
                <div class="form-group row first-more" style="margin-bottom: 3px;">
                    <span class="col-sm-12"><input type="input" class="form-control ac_info_inputs accounts_inputs debit_account_input" placeholder="Account Name" name="debit_account[]"></span>
                </div>

                <div class="form-group row first-more" style="margin-bottom: 3px;">
                    <span class="col-sm-12"><input type="input" class="form-control ac_info_inputs trans_desc_input" placeholder="Account Desc" name="debit_desc[]"></span>
                </div>

                <div class="form-group row first-more" style="margin-bottom: 3px;">
                    <span class="col-sm-12"><input type="input" class="form-control ac_info_inputs amount_inputs debit_amount_input" placeholder="Amount (Rs)" name="debit_amount[]"></span>
                </div>
            </div></div> <!-- card end -->



            <div class="form-group row" id="debit_add_more_btn" >
                <span class="col-sm-12">
                    <button onclick="addMoreDebitAccount();" type="button" class="btn btn-primary btn-block btn-info" id="to_show">Add More Account</button>
                </span>
            </div>





    </div> <!-- col end -->



    <!----------------------------                Credit Side            ---------------------------------->
<div class="col-sm-6">
<div class="row"><div class="col-sm-12">  <h4 class="sub-title alert-success">Credit Side</h4></div></div>



    <!-- Card Start -->
    <div class="card b-l-success business-info services m-b-20 debit_account_card debit_1"  >

        <div class="card-header show" style="padding: 5px 20px;">
            <div class="service-header"><h5 class="card-header-text">Credit Account </h5></div>
            <button id="edit-info-btn" type="button" class=" btn btn-danger btn-mini waves-effect waves-light f-right"><i class="icofont icofont-close"></i></button>
        </div>

        <div class="card-block" style="padding: 5px 1.25rem" >
            <div class="form-group row first-more" style="margin-bottom: 3px;">
                <span class="col-sm-12"><input type="input" class="form-control ac_info_inputs accounts_inputs credit_account_input" placeholder="Account Name" name="credit_account[]"></span>
            </div>

            <div class="form-group row first-more" style="margin-bottom: 3px;">
                <span class="col-sm-12"><input type="input" class="form-control ac_info_inputs trans_desc_input" placeholder="Account Desc" name="credit_desc[]"></span>
            </div>

            <div class="form-group row first-more" style="margin-bottom: 3px;">
                <span class="col-sm-12"><input type="input" class="form-control ac_info_inputs amount_inputs credit_amount_input" placeholder="Amount (Rs)" name="credit_amount[]"></span>
            </div>
        </div></div> <!-- card end -->




    <div class="form-group row" id="credit_add_more_btn" >
                <span class="col-sm-12">
                    <button onclick="addMoreCreditAccount();" type="button" class="btn btn-primary btn-block btn-success" id="to_show">Add More Account</button>
                </span>
    </div>



</div> <!-- col end -->



                                <div class="row" style="height:100px;">
                                    <div class="col-md-12" allign="center">
                                        <label for="exampleFormControlSelect1"></label>
                                        <button onclick="submit_data();" type="button" class="btn btn-primary btn-block">Submit</button>
                                    </div>
                                </div>

</div>

                        </form>
                    </div>
                </div>
                <!-- Basic Inputs Validation end -->

            </div>
        </div>
    </div>



    <style>

        .form-control{
            font-size: 16px !important;
            font-weight: bold !important;
            border-radius: 2px !important;
        }
        .ui-autocomplete {
            position: absolute;
            z-index: 1000;
            cursor: default;
            padding: 0;
            margin-top: 2px;
            list-style: none;
            background-color: #ffffff;
            border: 1px solid #ccc;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }
        .ui-autocomplete > li {
            padding: 3px 20px;
        }
        .ui-autocomplete > li.ui-state-focus {
            background-color: #DDD;
        }
        .ui-helper-hidden-accessible {
            display: none;
        }
    </style>





@endsection
@section('javascript')
    <script type="text/javascript">




        <?php if(isset($_GET['res-status']) && $_GET['res-status'] == 'true'){ ?>
                alert('Transaction added successfully!');
        <?php } ?>


        $("#myModal").on('show.bs.modal', function () {
            //$(this).addClass("vis-hidden");
        });
        $("#myModal").on('shown.bs.modal', function () {
            //$(this).css({"top":(($(window).height() - $(this).height()) / 2 )+"px"}).removeClass("vis-hidden");
        });


        function submit_data(e) {


            var debitTotal = 0;
            var creditTotal = 0;
            var emptyInput = 0;

            $('.ac_info_inputs').removeClass('form-control-danger');



            var date = $('#date_input').val();
            if(date == ''){
                $('#date_input').addClass('form-control-danger');
                alert('Please enter the date');
                return false;
            }

            $('.ac_info_inputs').each(function(index,ele){
               var val = $(ele).val();
               if(val == ''){
                   $(ele).addClass('form-control-danger');
                   emptyInput++;
                   return false;
               }
            });


            $('.debit_amount_input').each(function(index,ele){
                debitTotal += parseInt($(ele).val());
            });



            $('.credit_amount_input').each(function(index,ele){
                creditTotal += parseInt($(ele).val());
            });

            if(debitTotal != creditTotal){
                alert('Debit and Credit total amount are not equal');
                return false;
            }else if(emptyInput > 0){
                alert('Please fill the all fields!');
                return false;
            }

            var fdata = $('#transaction_form').serialize();
            $.ajax({
                method: "POST",
                data: fdata,
                url: "{{ url('finance/transaction/save') }}"
            }).done(function (res) {
                console.log(res);
                // alert(res.message);
                if (res.status) {
                     window.location = '{{url('/finance/transaction/add?res-status=true')}}';
                }
            });
        }





        var count_number = $('.debit_account_card').length;
        function addMoreDebitAccount() {
            count_number++; // form-control accounts_inputs debit_account_input
        var debitHtml ='<div class="card b-l-success business-info services m-b-20 debit_account_card debit_'+count_number+'"  >';
            debitHtml += '<div class="card-header show" style="padding: 5px 20px;">';
            debitHtml += '<div class="service-header"><h5 class="card-header-text">Debit Account</h5></div>';
            debitHtml += '<button onclick="delete_debit_account('+count_number+')" type="button" class=" btn btn-danger btn-mini waves-effect waves-light f-right"><i class="icofont icofont-close"></i></button>';
            debitHtml += '</div>';

            debitHtml += '<div class="card-block" style="padding: 5px 1.25rem" >';
            debitHtml += '<div class="form-group row first-more" style="margin-bottom: 3px;">';
            debitHtml += '<span class="col-sm-12"><input type="input" class="form-control ac_info_inputs accounts_inputs debit_account_input" placeholder="Account Name" name="debit_account[]"></span>';
            debitHtml += '</div>';
            debitHtml += '<div class="form-group row first-more" style="margin-bottom: 3px;">';
            debitHtml += '<span class="col-sm-12"><input type="input" class="form-control ac_info_inputs trans_desc_input" placeholder="Account Desc" name="debit_desc[]"></span></div>';

            debitHtml += '<div class="form-group row first-more" style="margin-bottom: 3px;">';
            debitHtml += '<span class="col-sm-12"><input type="input" class="form-control ac_info_inputs amount_inputs debit_amount_input" placeholder="Amount (Rs)" name="debit_amount[]"></span>';
            debitHtml += '</div>';
            debitHtml += '</div></div>';

            $(debitHtml).insertBefore('#debit_add_more_btn');

            callAutoComplete();
        }
        // addMoreCreditAccount

        function addMoreCreditAccount() {




            count_number++;
            var debitHtml ='<div class="card b-l-success business-info services m-b-20 debit_account_card debit_'+count_number+'"  >';
            debitHtml += '<div class="card-header show" style="padding: 5px 20px;">';
            debitHtml += '<div class="service-header"><h5 class="card-header-text">Credit Account</h5></div>';
            debitHtml += '<button onclick="delete_debit_account('+count_number+')" type="button" class=" btn btn-danger btn-mini waves-effect waves-light f-right"><i class="icofont icofont-close"></i></button>';
            debitHtml += '</div>';

            debitHtml += '<div class="card-block" style="padding: 5px 1.25rem" >';
            debitHtml += '<div class="form-group row first-more" style="margin-bottom: 3px;">';
            debitHtml += '<span class="col-sm-12"><input type="input" class="form-control ac_info_inputs accounts_inputs credit_account_input" placeholder="Account Name" name="credit_account[]"></span>';
            debitHtml += '</div>';


            debitHtml += '<div class="form-group row first-more" style="margin-bottom: 3px;">';
            debitHtml += '<span class="col-sm-12"><input type="input" class="form-control ac_info_inputs trans_desc_input" placeholder="Account Desc" name="credit_desc[]"></span> </div>';

            debitHtml += '<div class="form-group row first-more" style="margin-bottom: 3px;">';
            debitHtml += '<span class="col-sm-12"><input type="input" class="form-control ac_info_inputs amount_inputs credit_amount_input" placeholder="Amount (Rs)" name="credit_amount[]"></span>';
            debitHtml += '</div>';
            debitHtml += '</div></div>';

            $(debitHtml).insertBefore('#credit_add_more_btn');

            callAutoComplete();
        }


        function delete_debit_account(id) {
            $('.debit_'+id).remove();
        }


        function callAutoComplete() {

            $( ".accounts_inputs" ).autocomplete({
                source: function( request, response ) {
                    // Fetch data
                    $.ajax({
                        url: "{{ url('/get-account') }}",
                        type: 'get',
                        dataType: "json",
                        data: {
                            search: request.term
                        },
                        success: function( data ) {
                            response( data );
                        }
                    });
                },
                select: function (event, ui) {
                    // Set selection
//accounts_inputs
                    $(this).val(ui.item.label);

                    // $('#autocomplete').val(ui.item.label); // display the selected text
                    // $('#selectuser_id').val(ui.item.value); // save selected id to input
                    return false;
                }
            });
        }

        callAutoComplete();



    </script>
@endsection