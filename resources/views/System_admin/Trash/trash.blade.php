@extends('App.layout.admin_layout')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div>
                @include('App.message.success')
                @include('App.message.error')
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">Trash</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="../../index.html">
                                <i class="fas fa-home"></i> Home</a>
                        </li>

                        <li class="breadcrumb-item active">Trash List</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Your content goes here  -->
        <div class="row clearfix">

            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="profile-tab-box">
                        <div class="p-l-20">
                            <ul class="nav ">
                                <li class="nav-item tab-all">
                                    <a class="nav-link active show" href="#budget" data-toggle="tab">Budget List</a>
                                </li>
                                <li class="nav-item tab-all p-l-20">
                                    <a class="nav-link" href="#people" data-toggle="tab">People List</a>
                                </li>
                                <li class="nav-item tab-all p-l-20">
                                    <a class="nav-link" href="#loan" data-toggle="tab">Loan List</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="budget" aria-expanded="true">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card project_widget">
                                    <div class="header">
                                        <h2>Budget List </h2>
                                        <div class="table-responsive">
                                            <table class="table table-hover js-basic-example contact_list">
                                                <thead>
                                                    <tr>
                                                        <th class="center">Budget_id</th>
                                                        <th class="center">Amount</th>
                                                        <th class="center">Budget_Name</th>
                                                        <th class="center">Strat_Date</th>
                                                        <th class="center">End_Date</th>
                                                        <th class="center">User_id</th>
                                                        <th class="center">User_Type</th>
                                                        <th class="center">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php($id =1)

                                                    @foreach ($budget as $data)
                                                        <tr>
                                                            <td class="text-center">{{ $id++ }} </td>
                                                            <td class="text-center">{{ $data->amount}}</td>
                                                            <td class="text-center"> {{ $data->budget_name }} </td>
                                                            <td class="center">{{ $data->start_date }}</td>
                                                            <td class="center">{{ $data->end_date }} </td>
                                                            <td class="center">{{ $data->user_id }}</td>
                                                            <td class="center">{{ $data->type_id }}</td>
                                                            <td class="center">
                                                                <a href="{{ route('restore.budget', ['id'=>$data->id]) }}" onclick="deleteMsg('Are you Sure To Restore Budget?')">
                                                                <button class="btn tblActnBtn"data-toggle="modal"
                                                                    data-target="#edit-form{{ $data->id }}">
                                                                    <i class="material-icons">restore</i></i>
                                                                </button>
                                                            </a>


                                        <a href="{{ route('destroy.budget', ['id' => $data->id]) }}" onclick="deleteMsg('Are you sure to Delete Budget?')">
                                        <button class="btn tblActnBtn">
                                            <i class="material-icons">delete</i>
                                        </button>
                                         </a>
                                        </td>
                                        </tr>
                                        @endforeach


                                        </tbody>
                                        </table>
                                    </div>
                                    </div>
                                    <div class="body">

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane active" id="people" aria-expanded="true">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card project_widget">
                                    <div class="header">
                                        <h2>People List</h2>
                                        <P>All  People in this section show we Deleted in the Finance System

                                        </P>
                                    </div>
                                    <div class="body">

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="timeline" aria-expanded="false">
                    </div>
                    <div role="tabpanel" class="tab-pane" id="loan" aria-expanded="false">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Finanace All Stuff Loan List
                                </h2>
                            </div>
                            <div class="body">

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
