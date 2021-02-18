@extends('layouts.app')

@section('content')

    <div class="layout-px-spacing">

            <div class="container pt-5">

            <h1>Hi, {{Auth::user()->name}}</h1>
            <h3 class="text-center">Current Subscriptions</h3>
                <div class="row overflow-auto flex-row flex-nowrap  mt-4 pb-4 pt-2">

                
                
                    @forelse($my_subscriptions as $sub)

                    <div  style="min-width:350px;" class="col-6">
                        <div class="widget widget-card-four">
                            <div class="widget-content">
                                <div class="w-content">
                                    <div class="w-info">

                                    <?php

                                        $my_sub_sum = App\PaymentSchedule::where('custom_name', $sub->custom_name)->sum('deduction_amount');

                                        $my_paid_sum = App\PaymentSchedule::where('custom_name', $sub->custom_name)->sum('deducted_amount');


                                        $backlog = App\BackLog::where('user_id', Auth::user()->id)->where('custom_name', $sub->custom_name )->first();

                                        $percent = ($my_paid_sum / $my_sub_sum) * 100;

                                    ?>
                                        
                                        <p class="">{{$sub->packages->package_name}}</p>
                                        <h5>{{$sub->custom_name}}</h5>

                                        <?php
                                                $sd = new Carbon\Carbon($sub->start_date);
                                                $sd = $sd->format('d');
                                                $sm = new Carbon\Carbon($sub->start_date);
                                                $sm = $sm->format('M');
                                                $sy = new Carbon\Carbon($sub->start_date);
                                                $sy = $sy->format('Y');

                                                $ed = new Carbon\Carbon($sub->end_date);
                                                $ed = $ed->format('d');
                                                $em = new Carbon\Carbon($sub->end_date);
                                                $em = $em->format('M');
                                                $ey = new Carbon\Carbon($sub->end_date);
                                                $ey = $ey->format('Y');
                                            ?>

                                            <p>{{$sd}} {{$sm}}, {{$sy}} to {{$ed}} {{$em}}, {{$ey}}</p>
                                          

                                      
                                    </div>
                                    <div class="">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                        </div>
                                    </div>
                                </div>
                                @if($backlog)
                                    <h6 class="pt-3 text-success">Backlog Cleared!!</h6>
                                    <h6 class="">NGN {{number_format($sub->backlog_amount, 2)}} / NGN {{number_format($sub->backlog_amount, 2)}}</h6>
                                @else
                                    <h6 class="pt-3 text-warning">Backlog Pending</h6>
                                    <h6 class="">NGN {{number_format(0, 2)}} / NGN {{number_format($sub->backlog_amount, 2)}}</h6>
                                @endif
                                
                                <h5 class="pt-3">NGN {{number_format($my_paid_sum, 2)}} / NGN {{number_format($my_sub_sum, 2)}}</h5>
                                <div class="progress mt-0">
                                    <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: {{$percent + 1}}%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <div class="justity-content-center mt-2 ">
                                    <a href="{{route('user.payment_schedule', $sub->custom_name)}}" class="btn btn-primary shadow text-center">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    @empty

                   
                    <div class="float-right">
                    <h5 class="text-center">You have no current subscriptions</h5>

                    <br>
                        <a class="btn btn-sm btn-warning shadow " href="{{route('user.my_profile')}}"> update profile</a>
                        <br>

                    

                    <br>
                        <a class="btn btn-sm btn-primary shadow " href="{{route('user.reliance_packages')}}"> view packages</a>
                    </div>

                    @endforelse


                </div>
            </div>

        <div class="row layout-top-spacing">

          

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
              @if($next_deduction == 'null')

              <div class="widget widget-five">
                    <div class="widget-content">

                        <div class="header">
                            <div class="header-body">
                                <h6>Next Deduction</h6>
                            
                            </div>
                            <div class="task-action">
                                <div class="dropdown  custom-dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask">
                                        <a class="dropdown-item" href="javascript:void(0);">Add</a>
                                        <a class="dropdown-item" href="javascript:void(0);">View</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Update</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Clear All</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-content">
                            <div class="">                                            
                                <p class="task-left">{{Carbon\Carbon::parse($next_deduction->date??'0000')->format('d')}}</p>
                                <p class="task-completed"><span>{{Carbon\Carbon::parse($next_deduction->date)->format('M')}}, {{Carbon\Carbon::parse($next_deduction->date)->format('Y')}}</span></p>
                            <p class="task-hight-priority"><span>{{$next_deduction->packages->package_name}}</span> <br> {{$next_deduction->custom_name}}</p>
                                <div class="">
                                    <a href="{{route('user.payment_schedule', $next_deduction->custom_name)}}" class="btn btn-primary shadow btn-sm">view details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

              @else

              <div class="widget widget-five">
                    <div class="widget-content">

                        <div class="header">
                            <div class="header-body">
                                <h6>Next Deduction</h6>
                            
                            </div>
                            <div class="task-action">
                                <div class="dropdown  custom-dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask">
                                        <a class="dropdown-item" href="javascript:void(0);">Add</a>
                                        <a class="dropdown-item" href="javascript:void(0);">View</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Update</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Clear All</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-content">
                            <div class="">                                            
                                <p class="task-left">0</p>
                                <p class="task-completed"><span>0, 000</span></p>
                            <p class="task-hight-priority"><span></span> <br> </p>
                                <div class="">
                                    <a href="" class="btn btn-primary shadow btn-sm"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

              @endif

            </div>

           <div class="col-md-4">
            <div class="widget widget-account-invoice-one">

                <div class="widget-heading">
                    <h5 class="">Account Info</h5>
                </div>

                <div class="widget-content">
                    <div class="invoice-box">
                        
                        <div class="acc-total-info">
                            <h5>wallet Balance</h5>
                            <p class="acc-amount">NGN {{number_format($my_wallet_bal,2)}}</p>
                        </div>

                       

                        <div class="inv-action">
                            <a href="{{route('user.wallet_summary')}}" class="btn btn-dark">Summary</a>
                            <a href="" class="btn btn-danger">Transfer</a>
                        </div>
                    </div>
                </div>

                </div>

           </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing ">
                <div class="widget widget-account-invoice-two">
                    <div class="widget-content">
                        <div class="account-box">
                            <div class="info">
                                <h5 class="">Active Card</h5>
                                <p class="inv-balance"></p>
                            </div>
                            <div class="acc-action">
                                <div class="">
                                    <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></a>
                                    <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg></a>
                                </div>
                                <a href="javascript:void(0);">More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row ">

             <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget-four">
                    <div class="widget-heading">
                        <h5 class="">Reliance Packages</h5>
                    </div>
                    <div class="widget-content">
                        <div class="vistorsBrowser">
                            <div class="browser-list">
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chrome"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="4"></circle><line x1="21.17" y1="8" x2="12" y2="8"></line><line x1="3.95" y1="6.06" x2="8.54" y2="14"></line><line x1="10.88" y1="21.94" x2="15.46" y2="14"></line></svg>
                                </div>
                                <div class="w-browser-details">
                                    <div class="w-browser-info">
                                        <h6>Steady Savings</h6>
                                        <p class="browser-count">65%</p>
                                    </div>
                                    <div class="w-browser-stats">
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: 65%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="browser-list">
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-compass"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg>
                                </div>
                                <div class="w-browser-details">
                                    
                                    <div class="w-browser-info">
                                        <h6>Target Savings</h6>
                                        <p class="browser-count">25%</p>
                                    </div>

                                    <div class="w-browser-stats">
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 35%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="browser-list">
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                                </div>
                                <div class="w-browser-details">
                                    
                                    <div class="w-browser-info">
                                        <h6>December Jollification</h6>
                                        <p class="browser-count">15%</p>
                                    </div>

                                    <div class="w-browser-stats">
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-4 layout-spacing">

                <div class="widget widget-one_hybrid widget-referral">
                    <div class="widget-heading">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                        </div>
                        <p class="w-value">1,900</p>
                        <h5 class="">Referral</h5>
                    </div>
                    <div class="widget-content">    
                        <div class="w-chart">
                            <div id="hybrid_followers1"></div>
                        </div>
                    </div>
                </div>
               
            </div>

            <div class="col-md-4 layout-spacing">
                <div class="widget widget-activity-three">

                    <div class="widget-heading">
                        <h5 class="">Notifications</h5>
                    </div>

                    <div class="widget-content">

                        <div class="mt-container mx-auto">
                            <div class="timeline-line">

                                @forelse($my_notifications as $note)

                                <div class="item-timeline timeline-new">
                                    <div class="t-dot">
                                        <div class="t-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                    </div>
                                    <div class="t-content">
                                        <div class="t-uppercontent">
                                            <h5>{{$note->subject}}</h5>
                                            <span class=""></span>
                                        </div>
                                        <p><span>Updated</span> {{$note->created_at->diffForHumans()}}</p>
                                        <div class="tags">
                                            <div class="badge badge-secondary">{{$note->status}}</div>
                                            
                                        </div>
                                    </div>
                                </div>

                                @empty

                                <h4 class="text-center">No notifications yet...</h4>


                                @endforelse

                                
                               

                                                                    
                            </div>                                    
                        </div>
                    </div>
                </div>
            </div>

            
        </div>

         

            <div class="row">
            
            

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-five">
                    <div class="widget-content">

                        <div class="header">
                            <div class="header-body">
                                <h6>Pending Tasks</h6>
                                <p class="meta-date">Nov 2019</p>
                            </div>
                            <div class="task-action">
                                <div class="dropdown  custom-dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask">
                                        <a class="dropdown-item" href="javascript:void(0);">Add</a>
                                        <a class="dropdown-item" href="javascript:void(0);">View</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Update</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Clear All</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-content">
                            <div class="">                                            
                                <p class="task-left">8</p>
                                <p class="task-completed"><span>12 Done</span></p>
                                <p class="task-hight-priority"><span>3 Task</span> with High priotity</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            </div>

           

        </div>

    </div>
    
@endsection  