@extends('layouts.app')

@section('content')

            <div class="layout-px-spacing">  

            
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <form id="general-info" class="section general-info">
                            <div class="info">
                                <h6 class="">General Information</h6>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-2 col-lg-12 col-md-4">
                                                <div class="upload mt-4 pr-md-4">
                                                    <input type="file" id="input-file-max-fs" class="dropify" data-default-file="{{config('app.url')}}/avatar/avatar.png" data-max-file-size="2M" />
                                                    <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Picture</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="fullName">Full Name</label>
                                                                <input type="text" class="form-control mb-4" id="fullName" placeholder="Full Name" value="{{Auth::user()->name}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                        <div class="form-group">
                                                                <label for="fullName">Email</label>
                                                                <input type="text" class="form-control mb-4" id="fullName" placeholder="Full Name" value="{{Auth::user()->email}}">
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="profession">Profession</label>
                                                        <input type="text" class="form-control mb-4" id="profession" placeholder="Designer" value="Web Developer">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
               


             <div id="tabsBordered" class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="mt-2">PROFILE UPDATE</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area vertical-border-pill">

                                    <div class="row mb-4 mt-3">
                                        <div class="col-sm-3 col-12">
                                            <div class="nav flex-column nav-pills mb-sm-0 mb-3   text-center mx-auto" id="v-border-pills-tab" role="tablist" aria-orientation="vertical">
                                              <a class="nav-link active" id="v-border-pills-home-tab" data-toggle="pill" href="#v-border-pills-home" role="tab" aria-controls="v-border-pills-home" aria-selected="true">Personal Info</a>
                                              <a class="nav-link  text-center" id="v-border-pills-profile-tab" data-toggle="pill" href="#v-border-pills-profile" role="tab" aria-controls="v-border-pills-profile" aria-selected="false">Bank Details</a>
                                              <a class="nav-link  text-center" id="v-border-pills-messages-tab" data-toggle="pill" href="#v-border-pills-messages" role="tab" aria-controls="v-border-pills-messages" aria-selected="false">NOK Details</a>
                                              <a class="nav-link  text-center" id="v-border-pills-settings-tab" data-toggle="pill" href="#v-border-pills-settings" role="tab" aria-controls="v-border-pills-settings" aria-selected="false">KYC</a>
                                            </div>
                                        </div>

                                        <div class="col-sm-9 col-12">
                                            <div class="tab-content" id="v-border-pills-tabContent">
                                              <div class="tab-pane fade show active" id="v-border-pills-home" role="tabpanel" aria-labelledby="v-border-pills-home-tab">
                                                <h4 class="mb-4">We move your world!</h4>
                                                <p class="mb-4">
                                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.                                                
                                                </p>

                                                <p>
                                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                                </p>                                            
                                              </div>
                                              <div class="tab-pane fade" id="v-border-pills-profile" role="tabpanel" aria-labelledby="v-border-pills-profile-tab">

                                                <div class="medi">
                                                    <div class="media-bod">

                                                <div class="row">
                                                            <div class="col-md-6 mx-auto">
                                                                <h5 class="">Bank Details</h5>

                                                                @if( Session::has('bank_msg') )
                                                                    <p class="alert alert-info">
                                                                        {{Session::get('bank_msg')}}
                                                                    </p>
                                                                @endif
                                                                @if(count($errors)>0)
                                                                    <p class="alert alert-danger">
                                                                        @error('account_name')
                                                                                <strong>{{ $message }}</strong>
                                                                        @enderror
                                                                    </p>
                                                                @endif


                                                                <div class="">
                                                                   
                                                                    <div class="col-md-12">
                                                                    <form method="post" action="{{route('user.bank_info')}}">
                                                                    @csrf
                                                                    <input type="hidden" id="bank_name_id" name="bank_name">
                                                                <div class="form-group">
                                                                    <label for="country">Bank Name</label>
                                                                    <select  onchange="getCode()" name="bank_code" class="form-control" id="bank_namez">
                                                                        <option value="">{{$user_data->bank_name??'--Select Bank--'}}</option>
                                                                        <option value="044">Access Bank Plc</option>
                                                                        <option value="323">Access Money</option>
                                                                        <option value="401">Aso Savings and Loans</option>
                                                                        <option value="317">Cellulant</option>
                                                                        <option value="303">ChamsMobile</option>
                                                                        <option value="023">Citi Bank</option>
                                                                        <option value="551">Convenant Microfinance Bank</option>
                                                                        <option value="559">Coronation Merchant Bank</option>
                                                                        <option value="063">Diamond Bank Plc</option>
                                                                        <option value="302">Eartholeum</option>
                                                                        <option value="050">EcoBank Nigeria Plc</option>
                                                                        <option value="307">EcoMobile</option>
                                                                        <option value="084">Enterprise Bank</option>
                                                                        <option value="306">Etranzact</option>
                                                                        <option value="314">FET</option>
                                                                        <option value="070">Fidelity Bank Plc</option>
                                                                        <option value="318">Fidelity Mobile</option>
                                                                        <option value="011">First Bank of Nigeria Plc</option>
                                                                        <option value="214">First City Monument Bank</option>
                                                                        <option value="501">Fortis Microfinance Bank</option>
                                                                        <option value="308">FortisMobile</option>
                                                                        <option value="601">FSDH</option>
                                                                        <option value="315">GTMobile</option>
                                                                        <option value="058">Guaranty Trust Bank</option>
                                                                        <option value="324">Hedonmark</option>
                                                                        <option value="030">Heritage Bank</option>
                                                                        <option value="301">JAIZ Bank plc</option>
                                                                        <option value="402">Jubilee Life Mortgage Bank</option>
                                                                        <option value="082">Keystone Bank plc</option>
                                                                        <option value="50211">Kuda Bank</option>
                                                                        <option value="313">MKudi</option>
                                                                        <option value="325">MoneyBox</option>
                                                                        <option value="999">NIP Virtual Bank</option>
                                                                        <option value="552">NPF Microfinance Bank</option>
                                                                        <option value="327">PagaTech</option>
                                                                        <option value="526">Parralex</option>
                                                                        <option value="329">PayAttitude Online</option>
                                                                        <option value="305">Paycom</option>
                                                                        <option value="101">Providus Bank</option>
                                                                        <option value="311">ReadyCash Parkway</option>
                                                                        <option value="403">SafeTrust Mortgage Bank</option>
                                                                        <option value="076">Skye Bank</option>
                                                                        <option value="221">Stanbic IBTC Bank</option>
                                                                        <option value="304">Stanbic Mobile Money</option>
                                                                        <option value="068">Standard Chartered Bank of Nigeria</option>
                                                                        <option value="232">Sterling Bank</option>
                                                                        <option value="326">Sterling Mobile</option>
                                                                        <option value="100">SunTrust Bank</option>
                                                                        <option value="328">TagPay</option>
                                                                        <option value="319">Teasy Mobile</option>
                                                                        <option value="523">TrustBond</option>
                                                                        <option value="032">Union Bank of Nigeria Plc</option>
                                                                        <option value="033">United Bank for Africa</option>
                                                                        <option value="215">Unity Bank Plc</option>
                                                                        <option value="320">VTNetworks</option>
                                                                        <option value="035">Wema Bank Plc</option>
                                                                        <option value="057">Zenith Bank Plc</option>
                                                                        <option value="322">ZenithMobile</option>
                                                                    </select>

                                                                    <script>
                                                                        function getCode() {

                                                                        var select_id = document.getElementById("bank_namez");

                                                                        document.getElementById("bank_name_id").value = select_id.options[select_id.selectedIndex].text;


                                                                        
                                                                        }
                                                        
                                                                        </script>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="address">Account Name</label>
                                                                        <input type="text" class="form-control mb-4" id="address" name="account_name" placeholder="Enter Account Name" value="{{$user_data->account_name??''}}" >
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="address">Account Number</label>
                                                                        <input type="text" class="form-control mb-4" id="address" name="account_no" placeholder="Enter Account Number" value="{{$user_data->account_no??''}}" >
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                            <button class="btn btn-primary btn-block shadow">Submit</button>                                                                
                                                                    </div>
                                                                    </div>
                                                                
                                                                </div>
                                                                </form>
                                                            </div>

                                                            <div class="col-md-6 mx-auto">
                                                                <h5 class="">My Cards</h5>

                                                                @if(Session::has('card_msg'))

                                                                <p class="alert alert-success">
                                                                    {{Session::get('card_msg')}}
                                                                </p>



                                                                @endif
                                                                <div class="">

                                                                    @forelse($user_cards as $user_card)

                                                                    <div class="col-md-12 mx-auto">
                                                                    <div style="max-width: 400px; height:200px" class="card bg-dark shadow mx-auto mb-2">
                                                                        <div class="card-body">
                                                                        <button class="btn btn-danger btn-sm shadow float-right">Deactivate Card</button>

                                                                                <h4 class="mt-3">{{$user_card->bank}}</h4>
                                                                                <h6>Card</h6>

                                                                                <p class=" bg-dark-light p-1 ">XXXXXXXX{{$user_card->last4}}</p>

                                                                                <p class="bg-dark-light p-1 float-right ">Exp. Date: {{$user_card->exp_month}}/{{$user_card->exp_year}}</p>
                                                                                
                                                                                <br>
                                                                                


                                                                        </div>
                                                                    </div>
                                                                    </div>


                                                                    @empty

                                                                                <h4 class="text-center">No Cards Yet...</h4>


                                                                    @endforelse

                                                                    <div class="col-md-6 mx-auto">

                                                                    <form method="POST" action="{{ route('add_card') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                                                                        <div class="" style="">
                                                                            <div class="">
                                                                            
                                                                                <input type="hidden" name="email" value="{{Auth::user()->email}}"> {{-- required --}}
                                                                                <input type="hidden" name="orderID" value="345">
                                                                                <input type="hidden" name="amount" value="5000"> {{-- required in kobo --}}
                                                                                <input type="hidden" name="quantity" value="1">
                                                                                <input type="hidden" name="currency" value="NGN">
                                                                                <input type="hidden" name="callback_url" value="{{config('app.url')}}callback_card_add">
                                                                                <input type="hidden" name="metadata" value="{{ json_encode($array = [

                                                                                'user_id' => Auth::user()->id,
                                                                                
                                                                                ]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                                                                                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                                                                {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

                                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

                                                                                <p>
                                                                                    <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                                                                                        <i class="fa fa-plus-circle fa-lg"></i> Add Card
                                                                                    </button>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                        
                                                                    </div>
                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                            
                                                        
                                                        
                                                        </div>
                                                    </div>

                                              </div>
                                              <div class="tab-pane fade" id="v-border-pills-messages" role="tabpanel" aria-labelledby="v-border-pills-messages-tab">
                                                <p class="dropcap  dc-outline-primary">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                </p>
                                              </div>

                                              <div class="tab-pane fade" id="v-border-pills-settings" role="tabpanel" aria-labelledby="v-border-pills-settings-tab">
                                                    <blockquote class="blockquote">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    </blockquote>
                                              </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="code-section-container">
                                                
                                       

                                        <div class="code-section text-left">
                                            

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
           
                    
                <div class="account-settings-container layout-top-spacing">

                    <div class="account-content">
                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                            <div class="row">
                               
                               

                              

                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="contact" class="section contact">
                                        <div class="info">
                                            <h5 class="pt-3">Personal Information</h5>
                                            <div class="row">
                                                <div class="col-md-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="country">Country</label>
                                                                <select class="form-control" id="country">
                                                                    <option>Select Nationality</option>
                                                                    <option selected>Nigeria</option>
                                                                    <option>India</option>
                                                                    <option>Japan</option>
                                                                    <option>China</option>
                                                                    <option>Brazil</option>
                                                                    <option>Norway</option>
                                                                    <option>Canada</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label for="country">State of Origin</label>
                                                                <select class="form-control" id="country">
                                                                    <option>Select Nationality</option>
                                                                    <option selected>Nigeria</option>
                                                                    <option>India</option>
                                                                    <option>Japan</option>
                                                                    <option>China</option>
                                                                    <option>Brazil</option>
                                                                    <option>Norway</option>
                                                                    <option>Canada</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="location">Location</label>
                                                                <input type="text" class="form-control mb-4" id="location" placeholder="Location">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="phone">Phone</label>
                                                                <input type="text" class="form-control mb-4" id="phone" placeholder="Write your phone number here" value="+1 (530) 555-12121">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="text" class="form-control mb-4" id="email" placeholder="Write your email here" value="Jimmy@gmail.com">
                                                            </div>
                                                        </div>                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="website1">Website</label>
                                                                <input type="text" class="form-control mb-4" id="website1" placeholder="Write your website here">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>



                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="contact" class="section contact">
                                        <div class="info">
                                            <h5 class="">Next of Kins details</h5>
                                            <div class="row">
                                                <div class="col-md-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="country">Country</label>
                                                                <select class="form-control" id="country">
                                                                    <option>All Countries</option>
                                                                    <option selected>United States</option>
                                                                    <option>India</option>
                                                                    <option>Japan</option>
                                                                    <option>China</option>
                                                                    <option>Brazil</option>
                                                                    <option>Norway</option>
                                                                    <option>Canada</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="address">Address</label>
                                                                <input type="text" class="form-control mb-4" id="address" placeholder="Address" value="New York" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="location">Location</label>
                                                                <input type="text" class="form-control mb-4" id="location" placeholder="Location">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="phone">Phone</label>
                                                                <input type="text" class="form-control mb-4" id="phone" placeholder="Write your phone number here" value="+1 (530) 555-12121">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="text" class="form-control mb-4" id="email" placeholder="Write your email here" value="Jimmy@gmail.com">
                                                            </div>
                                                        </div>                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="website1">Website</label>
                                                                <input type="text" class="form-control mb-4" id="website1" placeholder="Write your website here">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <div id="contact" class="section contact">
                                        <div class="info">
                                           
                                            <div class="row">
                                                <div class="col-md-6 mx-auto">
                                                    <h5 class="">Bank Details</h5>

                                                     @if( Session::has('bank_msg') )
                                                        <p class="alert alert-info">
                                                            {{Session::get('bank_msg')}}
                                                        </p>
                                                    @endif
                                                    @if(count($errors)>0)
                                                        <p class="alert alert-danger">
                                                            @error('account_name')
                                                                    <strong>{{ $message }}</strong>
                                                            @enderror
                                                        </p>
                                                    @endif


                                                    <div class="">
                                                         <input type="hidden" id="bank_name_id" name="bank_name">
                                                        <div class="col-md-12">
                                                            <form method="post" action="{{route('user.bank_info')}}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="country">Bank Name</label>
                                                                <select  onchange="getCode()" name="bank_code" class="form-control" id="bank_namez">
                                                                       <option value="">{{$user_data->bank_name??'--Select Bank--'}}</option>
                                                                    <option value="044">Access Bank Plc</option>
                                                                    <option value="323">Access Money</option>
                                                                    <option value="401">Aso Savings and Loans</option>
                                                                    <option value="317">Cellulant</option>
                                                                    <option value="303">ChamsMobile</option>
                                                                    <option value="023">Citi Bank</option>
                                                                    <option value="551">Convenant Microfinance Bank</option>
                                                                    <option value="559">Coronation Merchant Bank</option>
                                                                    <option value="063">Diamond Bank Plc</option>
                                                                    <option value="302">Eartholeum</option>
                                                                    <option value="050">EcoBank Nigeria Plc</option>
                                                                    <option value="307">EcoMobile</option>
                                                                    <option value="084">Enterprise Bank</option>
                                                                    <option value="306">Etranzact</option>
                                                                    <option value="314">FET</option>
                                                                    <option value="070">Fidelity Bank Plc</option>
                                                                    <option value="318">Fidelity Mobile</option>
                                                                    <option value="011">First Bank of Nigeria Plc</option>
                                                                    <option value="214">First City Monument Bank</option>
                                                                    <option value="501">Fortis Microfinance Bank</option>
                                                                    <option value="308">FortisMobile</option>
                                                                    <option value="601">FSDH</option>
                                                                    <option value="315">GTMobile</option>
                                                                    <option value="058">Guaranty Trust Bank</option>
                                                                    <option value="324">Hedonmark</option>
                                                                    <option value="030">Heritage Bank</option>
                                                                    <option value="301">JAIZ Bank plc</option>
                                                                    <option value="402">Jubilee Life Mortgage Bank</option>
                                                                    <option value="082">Keystone Bank plc</option>
                                                                    <option value="50211">Kuda Bank</option>
                                                                    <option value="313">MKudi</option>
                                                                    <option value="325">MoneyBox</option>
                                                                    <option value="999">NIP Virtual Bank</option>
                                                                    <option value="552">NPF Microfinance Bank</option>
                                                                    <option value="327">PagaTech</option>
                                                                    <option value="526">Parralex</option>
                                                                    <option value="329">PayAttitude Online</option>
                                                                    <option value="305">Paycom</option>
                                                                    <option value="101">Providus Bank</option>
                                                                    <option value="311">ReadyCash Parkway</option>
                                                                    <option value="403">SafeTrust Mortgage Bank</option>
                                                                    <option value="076">Skye Bank</option>
                                                                    <option value="221">Stanbic IBTC Bank</option>
                                                                    <option value="304">Stanbic Mobile Money</option>
                                                                    <option value="068">Standard Chartered Bank of Nigeria</option>
                                                                    <option value="232">Sterling Bank</option>
                                                                    <option value="326">Sterling Mobile</option>
                                                                    <option value="100">SunTrust Bank</option>
                                                                    <option value="328">TagPay</option>
                                                                    <option value="319">Teasy Mobile</option>
                                                                    <option value="523">TrustBond</option>
                                                                    <option value="032">Union Bank of Nigeria Plc</option>
                                                                    <option value="033">United Bank for Africa</option>
                                                                    <option value="215">Unity Bank Plc</option>
                                                                    <option value="320">VTNetworks</option>
                                                                    <option value="035">Wema Bank Plc</option>
                                                                    <option value="057">Zenith Bank Plc</option>
                                                                    <option value="322">ZenithMobile</option>
                                                                </select>

                                                                <script>
                                                                    function getCode() {

                                                                    var select_id = document.getElementById("bank_namez");

                                                                    document.getElementById("bank_name_id").value = select_id.options[select_id.selectedIndex].text;


                                                                    
                                                                    }
                                                    
                                                                    </script>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="address">Account Name</label>
                                                                    <input type="text" class="form-control mb-4" id="address" name="account_name" placeholder="Enter Account Name" value="{{$user_data->account_name??''}}" >
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="address">Account Number</label>
                                                                    <input type="text" class="form-control mb-4" id="address" name="account_no" placeholder="Enter Account Number" value="{{$user_data->account_no??''}}" >
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                        <button class="btn btn-primary btn-block shadow">Submit</button>                                                                
                                                                </div>
                                                                </div>
                                                            
                                                            </div>
                                                            </form>
                                                        </div>

                                                <div class="col-md-6 mx-auto">
                                                <h5 class="">My Cards</h5>

                                                @if(Session::has('card_msg'))

                                                <p class="alert alert-success">
                                                    {{Session::get('card_msg')}}
                                                </p>



                                                @endif
                                                    <div class="">

                                                        @forelse($user_cards as $user_card)

                                                        <div class="col-md-12 mx-auto">
                                                           <div style="max-width: 400px; height:200px" class="card bg-dark shadow mx-auto mb-2">
                                                               <div class="card-body">
                                                               <button class="btn btn-danger btn-sm shadow float-right">Deactivate Card</button>

                                                                    <h4 class="mt-3">{{$user_card->bank}}</h4>
                                                                    <h6>Card</h6>

                                                                    <p class=" bg-dark-light p-1 ">XXXXXXXX{{$user_card->last4}}</p>

                                                                    <p class="bg-dark-light p-1 float-right ">Exp. Date: {{$user_card->exp_month}}/{{$user_card->exp_year}}</p>
                                                                    
                                                                    <br>
                                                                    


                                                               </div>
                                                           </div>
                                                        </div>


                                                        @empty

                                                                    <h4 class="text-center">No Cards Yet...</h4>


                                                        @endforelse

                                                        <div class="col-md-6 mx-auto">

                                                        <form method="POST" action="{{ route('add_card') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                                                            <div class="" style="">
                                                                <div class="col-md-8 mx-auto mt-3">
                                                                   
                                                                    <input type="hidden" name="email" value="{{Auth::user()->email}}"> {{-- required --}}
                                                                    <input type="hidden" name="orderID" value="345">
                                                                    <input type="hidden" name="amount" value="5000"> {{-- required in kobo --}}
                                                                    <input type="hidden" name="quantity" value="1">
                                                                    <input type="hidden" name="currency" value="NGN">
                                                                    <input type="hidden" name="callback_url" value="{{config('app.url')}}callback_card_add">
                                                                    <input type="hidden" name="metadata" value="{{ json_encode($array = [

                                                                    'user_id' => Auth::user()->id,
                                                                    
                                                                    ]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                                                                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                                                    {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

                                                                    <p>
                                                                        <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                                                                            <i class="fa fa-plus-circle fa-lg"></i> Add Card
                                                                        </button>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </form>
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        
                                        </div>
                                    </div>
                                </div>




                            </div>
                        </div>
                    </div>

                   
                </div>

            </div>
@endsection