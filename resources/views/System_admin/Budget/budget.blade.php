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
                                    <h4 class="page-title">Contact List</h4>
                                </li>
                                <li class="breadcrumb-item bcrumb-1">
                                    <a href="../../index.html">
                                        <i class="fas fa-home"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item bcrumb-2">
                                    <a href="#" onClick="return false;">Apps</a>
                                </li>
                                <li class="breadcrumb-item active">Contact List</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div>
                            <button class="btn btn-hover color-7" data-toggle="modal" data-target="#budget-form">
                                Budget &nbsp; <span class="fa fa-plus"></span>
                            </button>
                        </div>
                        <div class="modal fade" id="budget-form" tabindex="-1" role="dialog" aria-labelledby="formModal"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="formModal">Add New Budgets</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" id="budget-forms" action="{{ route('store.budget') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <label for="id">Budget_id</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="number" id="id" name="id" class="form-control"
                                                        placeholder="Enter your budget Id ">
                                                </div>
                                            </div>
                                            <label for="amount">amount</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="number" id="amount" name="amount" class="form-control"
                                                        placeholder="Enter your budget Amount  ">
                                                </div>
                                            </div>

                                            <label for="budget_name">Budget_Name</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="budget_name" name="budget_name"
                                                        class="form-control"
                                                        placeholder="Enter your NEW Budget in this sction ">
                                                </div>
                                            </div>
                                            <label for="start_date">start_date</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="date" id="start_date" name="start_date"
                                                        class="form-control" placeholder="Enter your NEW Budget Time ">
                                                </div>
                                            </div>
                                            <label for="end_date">End_date</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="date" id="end_date" name="end_date"
                                                        class="form-control" placeholder="Enter your NEW Budget End_Time ">
                                                </div>
                                            </div>
                                            <label for="User_Id">user_id</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="number" id="user_id" name="user_id" class="form-control"
                                                        placeholder="Enter your User ID  ">
                                                </div>
                                            </div>
                                            <label for="type_id">type_id</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="type_id" name="type_id" class="form-control"
                                                        placeholder="Enter your Budget Type :  ">
                                                </div>


                                        </form>

                                        <div class="modal-footer">
                                            <button type="submit" id="budget-form"
                                                class="btn btn-info waves-effect">Save</button>
                                            <button type="button" class="btn btn-danger waves-effect"
                                                data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="card">

                        <div class="body">
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
                                        @foreach ($result as $data)
                                            <tr>
                                                <td class="text-center">{{ $data->id }} </td>
                                                <td class="text-center">{{ $data->amount}}</td>
                                                <td class="text-center"> {{ $data->budget_name }} </td>
                                                <td class="center">{{ $data->start_date }}</td>
                                                <td class="center">{{ $data->end_date }} </td>
                                                <td class="center">{{ $data->user_id }}</td>
                                                <td class="center">{{ $data->type_id }}</td>
                                                <td class="center">
                                                    <button class="btn tblActnBtn"data-toggle="modal"
                                                        data-target="#edit-form{{ $data->id }}">
                                                        <i class="material-icons">mode_edit</i>
                                                    </button>
                                                    <div class="modal fade" id="edit-form{{ $data->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="formModal"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="formModal">Update Budgets
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-left">
                                                                    <form method="POST"
                                                                        id="edit-forms{{ $data->id }}"
                                                                        action="{{ route('update.budget', ['id' => $data->id]) }}"
                                                                        enctype="multipart/form-data"
                                                                        onsubmit=" return validateBudget({{ $data->id }})">
                                                                        @method('PUT')
                                                                        @csrf
                                                                        <label for="budget_id">Budget_id</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="number"
                                                                                    id="budget_id{{ $data->id }}"
                                                                                    name="budget_id" class="form-control"
                                                                                    value="{{ $data->id }}"
                                                                                    placeholder="Enter your budget Id ">
                                                                            </div>
                                                                            <div class="text-danger"
                                                                                id="ibud{{ $data->id }}"></div>
                                                                        </div>
                                                                        <label for="amount">amount</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="number"
                                                                                    id="amount{{ $data->id }}"
                                                                                    name="amount"
                                                                                    class="form-control"
                                                                                    value="{{ $data->amount }}"
                                                                                    placeholder="Enter your NEW Budget Amount in this section ">
                                                                            </div>
                                                                            <div class="text-danger"
                                                                                id="mbud{{ $data->id }}"></div>
                                                                        </div>

                                                                        <label for="budget_name">Budget_Name</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text"
                                                                                    id="budget_name{{ $data->id }}"
                                                                                    name="budget_name"
                                                                                    class="form-control"
                                                                                    value="{{ $data->budget_name }}"
                                                                                    placeholder="Enter your NEW Budget in this sction ">
                                                                            </div>
                                                                            <div class="text-danger"
                                                                                id="mbud{{ $data->id }}"></div>
                                                                        </div>

                                                                        <label for="start_date">start_date</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="date"
                                                                                    id="start_date{{ $data->id }}"
                                                                                    name="start_date" class="form-control"
                                                                                    value="{{ $data->start_date }}"
                                                                                    placeholder="Enter your NEW Budget Time ">
                                                                            </div>
                                                                            <div class="text-danger"
                                                                                id="s_date{{ $data->id }}"></div>
                                                                        </div>
                                                                        <label for="end_date">End_date</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="date"
                                                                                    id="end_date{{ $data->id }}"
                                                                                    name="end_date" class="form-control"
                                                                                    value="{{ $data->end_date }}"
                                                                                    placeholder="Enter your NEW Budget End_Time ">
                                                                            </div>
                                                                            <div class="text-danger"
                                                                                id="e_date{{ $data->id }}"></div>
                                                                        </div>
                                                                        <label for="User_Id">user_id</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="number"
                                                                                    id="user_id{{ $data->id }}"
                                                                                    name="user_id" class="form-control"
                                                                                    value="{{ $data->user_id }}"
                                                                                    placeholder="Enter your User ID  ">
                                                                            </div>
                                                                            <div class="text-danger"
                                                                                id="uid{{ $data->id }}"></div>
                                                                        </div>
                                                                        <label for="type_id">type_id</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text"
                                                                                    id="type_id{{ $data->id }}"
                                                                                    name="type_id" class="form-control"
                                                                                    value="{{ $data->type_id }}"
                                                                                    placeholder="Enter your Budget Type :  ">
                                                                            </div>
                                                                           


                                                                    </form>

                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            id="edit-form{{ $data->id }}"
                                                                            class="btn btn-info waves-effect">Save</button>
                                                                        <button type="button"
                                                                            class="btn btn-danger waves-effect"
                                                                            data-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                            </div>

                            <a href="{{ route('trash.budget', ['id' => $data->id]) }}" onclick="deleteMsg('Are you sure to Delete Budget?')">
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
                </div>
            </div>
        </div>
    </section>
 @endsection
