@extends('layouts.app')

@section('content')
            <div class="layout-px-spacing">

            <h1 class="mt-5">Notifications</h1>



                        <div id="" class="col-md-8">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                           
                                        </div>                   
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <ul class="list-group task-list-group">
                                    @forelse($notifications as $notify)

                                    <li class="list-group-item list-group-item-action">
                                            <div class="">
                                                <label class="new-control new-checkbox checkbox-primary w-100 justify-content-between">
                                                  <!-- <input type="checkbox" class="new-control-input"> -->
                                                  <span class="new-control-indicator"></span>
                                                    <span class="ml-2">
                                                    <h6>{{$notify->subject}}</h6>
                                                        {{$notify->body}}
                                                    </span>
                                                    <span clas="font-italic">{{$notify->created_at->diffForHumans()}}</span>
                                                    <span class="ml-3 d-block">
                                                        <span class="badge badge-secondary">{{$notify->status}}</span>
                                                    </span>
                                                </label>
                                            </div>
                                        </li>


                                    @empty

                                    <h4 class="text-center mt-5">No notifications yet...</h4>


                                    @endforelse
                                        
                                        
                                    </ul>

                                   

                                </div>
                            </div>
                        </div>


                    </div>

                </div>

            </div>
@endsection