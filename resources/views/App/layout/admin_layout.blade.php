@extends('App.layout.links')
@section('layout_content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Final_finanace</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- Plugins Core Css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <!-- You can choose a theme from css/styles instead of get all themes -->
    <link href="{{ asset('assets/css/styles/all-themes.css') }}" rel="stylesheet" />
</head>

<body class="light">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30">
                <img class="loading-img-spin" src="{{ asset(session('user')->photo )}}" width="20" height="20" alt="admin">
            </div>
            <p>Please wait dear manager...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" onClick="return false;" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="#" onClick="return false;" class="bars"></a>
                <a class="navbar-brand" href="../../index.html">

                    <span class="logo-name">final_finance</span>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="pull-left">
                    <li>
                        <a href="#" onClick="return false;" class="sidemenu-collapse">
                            <i class="material-icons">reorder</i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Full Screen Button -->
                    <li class="fullscreen">
                        <a href="javascript:;" class="fullscreen-btn">
                            <i class="fas fa-expand"></i>
                        </a>
                    </li>
                    <!-- #END# Full Screen Button -->
                    <!-- #START# Notifications-->
                    <li class="dropdown">


                    </li>
                    <!-- #END# Notifications-->
                    <li class="dropdown user_profile">
                        <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown"
                            role="button">
                            <img src="{{ asset(session('user')->photo ) }}" width="32" height="32" alt="User">
                        </a>
                        <ul class="dropdown-menu pullDown">
                            <li class="body">
                                <ul class="user_dw_menu">
                                    <li>
                                        <a href="#" onClick="return false;">
                                            <i class="material-icons">person</i>Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">
                                            <i class="material-icons">feedback</i>Feedback
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">
                                            <i class="material-icons">help</i>Help
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}">
                                            <i class="material-icons">power_settings_new</i>Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Tasks -->
                    <li class="pull-right">
                        <a href="#" onClick="return false;" class="js-right-sidebar" data-close="true">
                            <i class="fas fa-cog"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <div>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="sidebar-user-panel active">
                        <div class="user-panel">
                            <div class=" image">
                                <img src="{{ asset(session('user')->photo ) }}" class="img-circle user-img-circle"
                                    alt="User Image" />
                            </div>
                        </div>
                        <div class="profile-usertitle">
                            <div class="sidebar-userpic-name"> {{ session('user')->firstname }} </div>
                            <div class="profile-usertitle-job ">Manager:{{session('user')->email }} </div>
                        </div>
                    </li>

                    <li>
                        <a href="{{ route('admin.home') }}">
                            <i class="fas fa-home"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('budget.save') }}">
                            <i class="fas fa-money-bill-wave-alt"></i>
                            <span>Budgets</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('budgetIncome.save')}}">
                            <i class="fas fa-box"></i>
                            <span>Budget_income</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('budgetType.save')}}">
                            <i class="fab fa-slack"></i>
                            <span>Budget_type</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('show.expenses') }}">
                            <i class="fas fa-mail-bulk"></i>
                            <span>Expenses</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('show.expenses')}}" onClick="return false;" class="menu-toggle">
                            <i class="fas fa-mail-bulk"></i>
                            <span>Expence </span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{ route('show.expenses')}}">Expence_Type</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../apps/calendar.html">
                            <i class="fas fa-people-carry"></i>
                            <span>Loan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('test.save') }}">
                            <i class="fas fa-people-carry"></i>
                            <span>Test Section </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('Show.People')}}">
                            <i class="fas fa-users"></i>
                            <span>People</span>
                        </a>
                    </li>
                      <li>
                        <a href="{{ route('trash.list') }}">
                            <i class="fas fa-trash"></i>
                            <span>Trash</span>
                        </a>
                    </li>
                    <li>
                        <a href="../apps/calendar.html">
                            <i class=" fas fa-user-lock"></i>
                            <span>My Accounts</span>
                        </a>
                    </li>
                    <li>
                        <a href="../apps/calendar.html">
                            <i class="fas fa-user-friends"></i>
                            <span>User_Mangmanet</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>


                </ul>
            </div>
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation">
                    <a href="#skins" data-toggle="tab" class="active">SKINS</a>
                </li>

            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane in active in active stretchLeft" id="skins">
                    <div class="demo-skin">
                        <div class="rightSetting">

                        </div>
                        <div class="rightSetting">
                            <p>SIDEBAR MENU COLORS</p>
                            <button type="button"
                                class="btn btn-sidebar-light btn-border-radius p-l-20 p-r-20">Light</button>
                            <button type="button"
                                class="btn btn-sidebar-dark btn-default btn-border-radius p-l-20 p-r-20">Dark</button>
                        </div>
                        <div class="rightSetting">
                            <p>THEME COLORS</p>
                            <button type="button"
                                class="btn btn-theme-light btn-border-radius p-l-20 p-r-20">Light</button>
                            <button type="button"
                                class="btn btn-theme-dark btn-default btn-border-radius p-l-20 p-r-20">Dark</button>
                        </div>
                        <div class="rightSetting">
                            <p>SKINS</p>
                            <ul class="demo-choose-skin choose-theme list-unstyled">
                                <li data-theme="black" class="actived">
                                    <div class="black-theme"></div>
                                </li>
                                <li data-theme="white">
                                    <div class="white-theme white-theme-border"></div>
                                </li>
                                <li data-theme="purple">
                                    <div class="purple-theme"></div>
                                </li>
                                <li data-theme="blue">
                                    <div class="blue-theme"></div>
                                </li>
                                <li data-theme="cyan">
                                    <div class="cyan-theme"></div>
                                </li>
                                <li data-theme="green">
                                    <div class="green-theme"></div>
                                </li>
                                <li data-theme="orange">
                                    <div class="orange-theme"></div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </div>
   <main>
    @yield('content')
   </main>
@endsection
