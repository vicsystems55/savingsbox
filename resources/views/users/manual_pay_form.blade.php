<form method="POST" action="{{ route('manual_pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
        <div class="" style="">
        <div class="">
            
            <input type="hidden" name="email" value="{{Auth::user()->email}}"> {{-- required --}}
            <input type="hidden" name="orderID" value="345">
            <input  type="hidden" name="amount" value="{{$schedule->deduction_amount * 100}}" > {{-- required in kobo --}}
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="currency" value="NGN">
            <input type="hidden" name="callback_url" value="{{config('app.url')}}callback_manual_pay">
            <input type="hidden" name="metadata" value="{{ json_encode($array = [

            'user_id' => Auth::user()->id,
            'package_name' => $my_schedule[0]->packages->package_name,
            'custom_name' => $my_schedule[0]->custom_name,
            'amount'=> $schedule->deduction_amount,
            'schedule_id'=> $schedule->id,
            
            
            ]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
            {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

            <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

            <p>
                <button class="btn btn-warning btn-sm " type="submit" value="Pay Backlog!">
                    <i class="fa fa-plus-circle fa-lg"></i> Pay Now !!
                </button>
            </p>
        </div>
        </div>
    </form>