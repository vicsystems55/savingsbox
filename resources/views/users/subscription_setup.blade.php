@extends('layouts.app')

@section('content')

<div class="layout-px-spacing">

    <h4 class=" display-4 mt-3">December Jollification</h4>

    <h6>Setup</h6>

    <div class="row">

        <div class="col-md-6">

            @if(count($errors)>0)
            <p class="alert alert-danger">
                    @error('authorization_code')
                            <strong>Please Select a Card</strong>  
                    @enderror
            </p>
            @endif

            
                <div class="card">
                    <div class="card-body">

                        <form method="post" action="{{route('user.create_payment_schedule')}}">

                        @csrf
                        
                        <div class="form-group">
                            <label for="">Custom Name</label>
                            <input type="text" name="custom_name" value="{{Carbon\Carbon::now()->format('M')}}-{{rand(33223,99999)}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Start Date</label>
                            <input onchange="backlogValue(this.id)" name="start_date" id="dateTimeFlatpickr" value="{{Carbon\Carbon::now()->format('Y')}}-{{Carbon\Carbon::now()->format('m')}}-{{Carbon\Carbon::now()->format('d')}}" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date..">
                        </div>

                        <div class="form-group">
                            <label for="">Deduction Amount</label>
                            <input type="hidden" name="deduction_amount" value="1550">
                            <input  value="NGN {{number_format('1550', 2)}}" class="form-control flatpickr flatpickr-input active" type="text" >
                        </div>

                        <div class="form-group">
                            <label for="">Frequecy</label>
                            <select class="form-control" name="frequency" value="Monthly" id="">
                            <option value="Monthly">Monthly</option>
                                <option value="Daily">Daily</option>
                                <option value="Weekly">Weekly</option>
                                <option value="Biweekly">Biweekly</option>
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">End Date</label>
                            <input id="dateTimeFlatpickr" value="November, {{Carbon\Carbon::now()->format('Y')}}" class="form-control flatpickr flatpickr-input active" type="text"  readonly>
                        </div>

                        <input type="hidden" name="authorization_code" id="authcode_id">

                        <div class="form-group">
                            <button class="btn btn-primary btn-block btn-lg shadow">
                                Submit
                            </button>
                        </div>

                        </form>



                    </div>
                </div>

        
        </div>


        <div class="col-md-6">


                <h4>Back Log Amount</h4>

                <div class="card mb-2">
                    <div class="card-body">

                        <?php

                        $start_date = Carbon\Carbon::now();

                        $end_date = new Carbon\Carbon( Carbon\Carbon::now()->format('Y') .':11:01 11:53:20');

                        $diff_in_months = $end_date->diffInMonths($start_date);

                        $months_left = 12 - $diff_in_months;

                        $back_log = 1550 * $months_left;

                        ?>

                        <h1 class="text-center">NGN {{number_format($back_log, 2)}}</h1>

                        <form method="POST" action="{{ route('add_card') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                            <div class="" style="">
                                <div class="col-md-8 mx-auto mt-3">
                                    
                                    <input type="hidden" name="email" value="{{Auth::user()->email}}"> {{-- required --}}
                                    <input type="hidden" name="orderID" value="345">
                                    <input type="hidden" name="amount" value="{{$back_log * 100}}"> {{-- required in kobo --}}
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
                                            <i class="fa fa-plus-circle fa-lg"></i> Pay Backlog
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                <h4>Select Debit Card</h4>

                <div style="height: 230px;" class="card mb-2">

                    <div class="card-body overflow-auto">
                    <style>
                        .dcard:hover {
                            border: 1px white solid;
                        }
                    </style>

                    @forelse($user_cards as $user_card)

                        <div class="col-md-12 mx-auto">
                        <div style="max-width: 400px; height:200px" id="{{$user_card->id}}_body" class="dcard card bg-dark shadow mx-auto mb-2">
                            <div class="card-body">
                            <button  onclick="getAuthCode(this.id,'{{($user_card->authorization_code)}}')" id="{{$user_card->id}}" class="btn btn-success btn-sm shadow float-right">Select Card</button>

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

                        <script>
                            function getAuthCode(btn, authCode) {
                                console.log(authCode);
                                document.getElementById('authcode_id').value= authCode;

                                document.getElementById(btn +'_body').classList.add("border");
                                
                            }
                        </script>

                    </div>
                </div>
        
        
        </div>

    </div>


   

                                   

</div>
                          

                         
                        

                        

                       
                  

                  


              
@endsection

