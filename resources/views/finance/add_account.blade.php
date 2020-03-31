@extends('btemplate')

@section('content')
    <div class="page-header">
        <div class="page-header-title">
            <h4>Add New Account Info</h4>
            <span>Account Detail</span>
        </div>
        <div class="page-header-breadcrumb">
            <ul class="breadcrumb-title">
                <li class="breadcrumb-item">
                    <a href="index.html">
                        <i class="icofont icofont-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#!">Pages</a>
                </li>
                <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="page-body">
        <div class="row">


            <div class="col-md-12">


                <!-- Basic Inputs Validation start -->
                <div class="card">
                    <div class="card-header">
                        {{--<h5>Basic Inputs Validation</h5>--}}
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
                        <form id="main" method="post" action="{{url('/finance/accounts/store')}}" novalidate>
                            @csrf

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Account Title

                                </label>
                                <span class="col-sm-10">
                                    <input type="text" class="form-control @error('account_name') is-invalid @enderror"
                                           value="{{old('account_name')}}" name="account_name" id="name"
                                           placeholder="Account Title">


                                    @error('account_name')
    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Account Desc</label>
                                <div class="col-sm-10">
                                    <textarea rows="3" name="account_desc" cols="5"
                                              class="form-control @error('account_desc') is-invalid @enderror"
                                              placeholder="Account Description">{{old('account_desc')}}</textarea>
                                </div>
                            </div>


                            <div class="row">
                                <label class="col-sm-2 col-form-label">Account Type</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="account_type"
                                                   value="assets"> Asset
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="account_type"
                                                   value="liability"> Liability
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="account_type"
                                                   value="income-revenue"> Income Revenue
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="account_type"
                                                   value="expense"> Expense
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="account_type"
                                                   value="equity-capital"> Equity/Capital
                                        </label>
                                    </div>
                                    @error('account_type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    {{--<span class="messages"></span>--}}
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Basic Inputs Validation end -->

            </div>


        </div>
    </div>

@endsection
@section('javascript')
@endsection