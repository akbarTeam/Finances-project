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
                                    <form method="POST" id="budget-forms" action="{{ route('store.Expenses') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <label for="id">id</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" id="id" name="id" class="form-control"
                                                    placeholder="Enter your Expenses Id ">
                                            </div>
                                        </div>
                                        <label for="budget_id">budget_id</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" id="budget_id" name="budget_id" class="form-control"
                                                    placeholder="Enter your budget ID  ">
                                            </div>
                                        </div>

                                        <label for="expense_type_id">expense_type_id</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" id="expense_type_id" name="expense_type_id"
                                                    class="form-control"
                                                    placeholder="Enter your Expenses Type ID  in this sction ">
                                            </div>
                                        </div>
                                        <label for="amount">amount</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" id="amount" name="	amount" class="form-control"
                                                    placeholder="Enter your Expenses Amount ">
                                            </div>
                                        </div>
                                        <label for="expense_date">expense_date</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="date" id="expense_date" name="expense_date" class="form-control"
                                                    placeholder="Enter your Expenses Date in this section ">
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
                                        <th class="center">id</th>
                                        <th class="center">budget_id</th>
                                        <th class="center">expense_type_id</th>
                                        <th class="center">amount</th>
                                        <th class="center">Expenses_date</th>

                                        <th class="center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Expenses as $data)
                                        <tr>
                                            <td class="text-center">{{ $data->id }} </td>
                                            <td class="text-center">{{ $data->budget_id }}</td>
                                            <td class="text-center"> {{ $data->expense_type_id }} </td>
                                            <td class="center">{{ $data->amount }}</td>
                                            <td class="center">{{ $data->expense_date }} </td>

                                            <td class="center">
                                                <button class="btn tblActnBtn"data-toggle="modal"
                                                    data-target="#edit-form{{ $data->id }}">
                                                    <i class="material-icons">mode_edit</i>
                                                </button>
                                                <div class="modal fade" id="edit-form{{ $data->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="formModal" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="formModal">Update Expenses
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-left">
                                                                <form method="POST" id="edit-forms{{ $data->id }}"
                                                                    action="{{ route('update.Expenses', ['id' => $data->id]) }}"
                                                                    enctype="multipart/form-data"
                                                                    onsubmit=" return validateBudget({{ $data->id }})">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <label for="id">id</label>
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="number" id="id"
                                                                                name="id" class="form-control"
                                                                                value="{{ $data->id }}"
                                                                                placeholder="Enter your budget Id ">
                                                                        </div>
                                                                        <div class="text-danger"
                                                                            id="ibud{{ $data->id }}"></div>
                                                                    </div>
                                                                    <label for="budget_id">budget_id</label>
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="number" id="budget_id"
                                                                                name="budget_id" class="form-control"
                                                                                value="{{ $data->budget_id }}"
                                                                                placeholder="Enter your NEW Budget Amount in this section ">
                                                                        </div>
                                                                        <div class="text-danger"
                                                                            id="mbud{{ $data->id }}"></div>
                                                                    </div>

                                                                    <label for="expense_type_id">expense_type_id</label>
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="number" id="expense_type_id"
                                                                                name="expense_type_id" class="form-control"
                                                                                value="{{ $data->expense_type_id }}"
                                                                                placeholder="Enter your NEW Budget in this sction ">
                                                                        </div>
                                                                        <div class="text-danger"
                                                                            id="mbud{{ $data->id }}"></div>
                                                                    </div>

                                                                    <label for="amount">amount</label>
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="number" id="amount"
                                                                                name="amount" class="form-control"
                                                                                value="{{ $data->amount }}"
                                                                                placeholder="Enter your NEW Budget Time ">
                                                                        </div>
                                                                        <div class="text-danger"
                                                                            id="s_date{{ $data->id }}"></div>
                                                                    </div>
                                                                    <label for="expense_date">expense_date</label>
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="date" id="expense_date"
                                                                                name="expense_date" class="form-control"
                                                                                value="{{ $data->expense_date }}"
                                                                                placeholder="Enter your NEW Budget End_Time ">
                                                                        </div>
                                                                        <div class="text-danger"
                                                                            id="e_date{{ $data->id }}">
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

                        <a href="#" onclick="deleteMsg('Are you sure to Delete Budget?')">
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
