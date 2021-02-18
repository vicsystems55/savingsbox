@extends('layouts.app')
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>

@section('content')

<div  class="layout-px-spacing">

    <h4 class=" display-4 mt-3">{{$type}}</h4>


            @if($type == 'steady')


            <div class="card col-md-7">
                <div class="card-body">

                <h6>Setup</h6>

                <h4>Total Amount: NGN 0.00 </h4>

                    <form action="">
                        @csrf
                        <div class="form-group">
                            <label for="">Select Amount</label>
                            <input type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Select Frequency</label>
                            <select class="form-control" name="frequency" id="">
                                <option value="Daily">Daily</option>
                                <option value="Weekly">Daily</option>
                                <option value="Biweekly">Daily</option>
                                <option value="Monthly">Daily</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary shadow">Create</button>
                        </div>




                    </form>

                </div>
            </div>



            @elseif($type == 'target')

            <div class="card col-md-7">
                    <div class="card-body">

                    <h6>Setup</h6>

                    <h4>Total Amount: NGN 0.00 </h4>

                        <form action="">
                            @csrf
                            <div class="form-group">
                                <label for="">Select Amount</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Select Frequency</label>
                                <select class="form-control" name="frequency" id="">
                                    <option value="Daily">Daily</option>
                                    <option value="Weekly">Daily</option>
                                    <option value="Biweekly">Daily</option>
                                    <option value="Monthly">Daily</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary shadow">Create</button>
                            </div>




                        </form>

                    </div>
                </div>





            @endif



            

  

   

                                   

</div>
                          

                         
                        

                        

                       
                  

                  


              
@endsection

