@if ($page_name != 'coming_soon' && $page_name != 'contact_us' && $page_name != 'error404' && $page_name != 'error500' && $page_name != 'error503' && $page_name != 'faq' && $page_name != 'helpdesk' && $page_name != 'maintenence' && $page_name != 'privacy' && $page_name != 'auth_boxed' && $page_name != 'auth_default')

    <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">
            
        <nav id="sidebar">
            <div class="shadow-bottom"></div>

            <ul class="list-unstyled menu-categories" id="accordionExample">
                
                @if ($page_name != 'alt_menu' && $page_name != 'blank_page' && $page_name != 'boxed' && $page_name != 'breadcrumb' )

                    <li class="menu {{ ($category_name === 'dashboard') ? 'active' : '' }}">
                        <a href="#dashboard" data-active="{{ ($category_name === 'dashboard') ? 'true' : 'false' }}" data-toggle="collapse" aria-expanded="{{ ($category_name === 'dashboard') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>Dashboard</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ ($category_name === 'dashboard') ? 'show' : '' }}" id="dashboard" data-parent="#accordionExample">
                            <li class="{{ ($page_name === 'sales') ? 'active' : '' }}">
                                <a href="/sales"> Sales </a>
                            </li>
                            <li class="{{ ($page_name === 'analytics') ? 'active' : '' }}">
                                <a href="/analytics"> Analytics </a>
                            </li>
                        </ul>
                    </li>

                    <!-- <li class="menu {{ ($category_name === 'apps') ? 'active' : '' }}">
                        <a href="#app" data-active="{{ ($category_name === 'apps') ? 'true' : 'false' }}" data-toggle="collapse" aria-expanded="{{ ($category_name === 'apps') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                                <span>Apps</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ ($category_name === 'apps') ? 'show' : '' }}" id="app" data-parent="#accordionExample">
                            <li class="{{ ($page_name === 'chat') ? 'active' : '' }}">
                                <a href="/apps/chat"> Chat </a>
                            </li>
                            <li class="{{ ($page_name === 'mailbox') ? 'active' : '' }}">
                                <a href="/apps/mailbox"> Mailbox  </a>
                            </li>
                            <li class="{{ ($page_name === 'todo-list') ? 'active' : '' }}">
                                <a href="/apps/todoList"> Todo List </a>
                            </li>                            
                            <li class="{{ ($page_name === 'notes') ? 'active' : '' }}">
                                <a href="/apps/notes"> Notes </a>
                            </li>
                            <li class="{{ ($page_name === 'scrumboard') ? 'active' : '' }}">
                                <a href="/apps/scrumboard">Scrumboard</a>
                            </li>
                            <li class="{{ ($page_name === 'contacts') ? 'active' : '' }}">
                                <a href="/apps/contacts"> Contacts </a>
                            </li>
                            <li class="{{ ($page_name === 'invoice') ? 'active' : '' }}">
                                <a href="/apps/invoice"> Invoice List </a>
                            </li>
                            <li class="{{ ($page_name === 'calendar') ? 'active' : '' }}">
                                <a href="/apps/calendar"> Calendar </a>
                            </li>
                        </ul>
                    </li> -->

                    

                    <li class="menu {{ ($category_name === 'drag_n_drop') ? 'active' : '' }}">
                        <a href="/drag_and_drop" data-active="{{ ($category_name === 'drag_n_drop') ? 'true' : 'false' }}" aria-expanded="{{ ($category_name === 'drag_n_drop') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-move"><polyline points="5 9 2 12 5 15"></polyline><polyline points="9 5 12 2 15 5"></polyline><polyline points="15 19 12 22 9 19"></polyline><polyline points="19 9 22 12 19 15"></polyline><line x1="2" y1="12" x2="22" y2="12"></line><line x1="12" y1="2" x2="12" y2="22"></line></svg>
                                <span>Reliance Packages</span>
                            </div>
                        </a>
                    </li>


                    <li class="menu {{ ($category_name === 'drag_n_drop') ? 'active' : '' }}">
                        <a href="/drag_and_drop" data-active="{{ ($category_name === 'drag_n_drop') ? 'true' : 'false' }}" aria-expanded="{{ ($category_name === 'drag_n_drop') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-move"><polyline points="5 9 2 12 5 15"></polyline><polyline points="9 5 12 2 15 5"></polyline><polyline points="15 19 12 22 9 19"></polyline><polyline points="19 9 22 12 19 15"></polyline><line x1="2" y1="12" x2="22" y2="12"></line><line x1="12" y1="2" x2="12" y2="22"></line></svg>
                                <span>My Profile</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu {{ ($category_name === 'drag_n_drop') ? 'active' : '' }}">
                        <a href="/drag_and_drop" data-active="{{ ($category_name === 'drag_n_drop') ? 'true' : 'false' }}" aria-expanded="{{ ($category_name === 'drag_n_drop') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-move"><polyline points="5 9 2 12 5 15"></polyline><polyline points="9 5 12 2 15 5"></polyline><polyline points="15 19 12 22 9 19"></polyline><polyline points="19 9 22 12 19 15"></polyline><line x1="2" y1="12" x2="22" y2="12"></line><line x1="12" y1="2" x2="12" y2="22"></line></svg>
                                <span>Notifications</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu {{ ($category_name === 'drag_n_drop') ? 'active' : '' }}">
                        <a href="/drag_and_drop" data-active="{{ ($category_name === 'drag_n_drop') ? 'true' : 'false' }}" aria-expanded="{{ ($category_name === 'drag_n_drop') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-move"><polyline points="5 9 2 12 5 15"></polyline><polyline points="9 5 12 2 15 5"></polyline><polyline points="15 19 12 22 9 19"></polyline><polyline points="19 9 22 12 19 15"></polyline><line x1="2" y1="12" x2="22" y2="12"></line><line x1="12" y1="2" x2="12" y2="22"></line></svg>
                                <span>Settings</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu {{ ($category_name === 'drag_n_drop') ? 'active' : '' }}">
                        <a href="/drag_and_drop" data-active="{{ ($category_name === 'drag_n_drop') ? 'true' : 'false' }}" aria-expanded="{{ ($category_name === 'drag_n_drop') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-move"><polyline points="5 9 2 12 5 15"></polyline><polyline points="9 5 12 2 15 5"></polyline><polyline points="15 19 12 22 9 19"></polyline><polyline points="19 9 22 12 19 15"></polyline><line x1="2" y1="12" x2="22" y2="12"></line><line x1="12" y1="2" x2="12" y2="22"></line></svg>
                                <span>Support</span>
                            </div>
                        </a>
                    </li>

                  

                @else
                
                
                @endif
                
            </ul>
            
        </nav>

    </div>
    <!--  END SIDEBAR  -->

@endif