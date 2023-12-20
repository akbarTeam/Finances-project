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
                            All People &nbsp; <span class="fa fa-plus"></span>
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
                                    <form method="POST" id="budget-forms" action="{{ route('store.people') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <label for="person_id">person_id</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" id="person_id" name="person_id" class="form-control"
                                                    placeholder="Enter your New Person ID ">
                                            </div>
                                        </div>
                                        <label for="first_name">first_name</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="first_name" name="first_name" class="form-control"
                                                    placeholder="Enter your Person Name  ">
                                            </div>
                                        </div>

                                        <label for="last_name">last_name</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="last_name" name="last_name"
                                                    class="form-control"
                                                    placeholder="Enter your Person Last Name ">
                                            </div>
                                        </div>
                                        <label for="father_name">father_name</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="father_name" name="father_name" class="form-control"
                                                    placeholder="Enter your Person Father Name ">
                                            </div>
                                        </div>
                                        <label for="administraion_name">administraion_name</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="administraion_name" name="administraion_name" class="form-control"
                                                    placeholder="Enter your Person Adminstration Name ">
                                            </div>
                                            <label for="direction_name">direction_name</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="direction_name" name="direction_name" class="form-control"
                                                        placeholder="Enter your Person  Direction Name ">
                                                </div>
                                            </div>
                                            <label for="rank">rank</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="rank" name="rank" class="form-control"
                                                        placeholder="Enter your Person Rank in this Section ">
                                                </div>
                                            </div>
                                            <label for="address">address</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="address" name="address" class="form-control"
                                                        placeholder="Enter your Person Address in this section  ">
                                                </div>
                                            </div>
                                            <label for="phone_number">phone_number</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="number" id="phone_number" name="phone_number" class="form-control"
                                                        placeholder="Enter your Person Phone Number in this section ">
                                                </div>
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
                                        <th class="center">person_id</th>
                                        <th class="center">first_name</th>
                                        <th class="center">last_name</th>
                                        <th class="center">father_name</th>
                                        <th class="center">administraion_name</th>
                                        <th class="center">direction_name</th>
                                        <th class="center">rank</th>
                                        <th class="center">address</th>
                                        <th class="center">phone_number</th>
                                        <th class="center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peoples as $data)
                                        <tr>
                                            <td class="text-center">{{ $data->person_id }}</td>
                                            <td class="text-center"> {{ $data->first_name }} </td>
                                            <td class="center">{{ $data->last_name }}</td>
                                            <td class="center">{{ $data->father_name }} </td>
                                            <td class="center">{{ $data->administraion_name }} </td>
                                            <td class="center">{{ $data->direction_name }} </td>
                                            <td class="center">{{ $data->rank }} </td>
                                            <td class="center">{{ $data->address }} </td>
                                            <td class="center">{{ $data->phone_number }} </td>


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
                                                                    action="#"
                                                                    enctype="multipart/form-data"
                                                                    onsubmit=" return validateBudget({{ $data->id }})">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <label for="person_id">person_id</label>
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="number" id="person_id"
                                                                                name="id" class="form-control"
                                                                                value="{{ $data->person_id }}"
                                                                                placeholder="Enter your Person ID ">
                                                                        </div>
                                                                        <div class="text-danger"
                                                                            id="ibud{{ $data->id }}"></div>
                                                                    </div>
                                                                    <label for="first_name">first_name</label>
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" id="first_name"
                                                                                name="first_name" class="form-control"
                                                                                value="{{ $data->first_name }}"
                                                                                placeholder="Update your First Name ">
                                                                        </div>
                                                                        <div class="text-danger"
                                                                            id="mbud{{ $data->id }}"></div>
                                                                    </div>

                                                                    <label for="last_name">last_name</label>
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" id="last_name"
                                                                                name="last_name" class="form-control"
                                                                                value="{{ $data->last_name }}"
                                                                                placeholder="Update your Last Name in this section ">
                                                                        </div>
                                                                        <div class="text-danger"
                                                                            id="mbud{{ $data->id }}"></div>
                                                                    </div>

                                                                    <label for="father_name">father_name</label>
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" id="father_name"
                                                                                name="father_name" class="form-control"
                                                                                value="{{ $data->father_name }}"
                                                                                placeholder="Update your Father Name  ">
                                                                        </div>
                                                                        <div class="text-danger"
                                                                            id="s_date{{ $data->id }}"></div>
                                                                    </div>
                                                                    <label for="administraion_name">administraion_name</label>
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" id="administraion_name"
                                                                                name="administraion_name" class="form-control"
                                                                                value="{{ $data->administraion_name }}"
                                                                                placeholder="Update your Administration Name ">
                                                                        </div>
                                                                        <div class="text-danger"
                                                                            id="e_date{{ $data->id }}">
                                                                        </div>
                                                                        <label for="direction_name">direction_name</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="direction_name"
                                                                                    name="direction_name" class="form-control"
                                                                                    value="{{ $data->direction_name }}"
                                                                                    placeholder="Update your Direction Name  ">
                                                                            </div>
                                                                            <div class="text-danger"
                                                                                id="s_date{{ $data->id }}"></div>
                                                                        </div>
                                                                        <label for="rank">rank</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="rank"
                                                                                    name="rank" class="form-control"
                                                                                    value="{{ $data->rank }}"
                                                                                    placeholder="Update your Rank  ">
                                                                            </div>
                                                                            <div class="text-danger"
                                                                                id="s_date{{ $data->id }}"></div>
                                                                        </div>
                                                                        <label for="address">address</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="address"
                                                                                    name="address" class="form-control"
                                                                                    value="{{ $data->address }}"
                                                                                    placeholder="Update your Address  ">
                                                                            </div>
                                                                            <div class="text-danger"
                                                                                id="s_date{{ $data->id }}"></div>
                                                                        </div>
                                                                        <label for="phone_number">phone_number</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type= "number" id="rank"
                                                                                    name="phone_number" class="form-control"
                                                                                    value="{{ $data->phone_number }}"
                                                                                    placeholder="Update your phone_number  ">
                                                                            </div>
                                                                            <div class="text-danger"
                                                                                id="s_date{{ $data->id }}"></div>
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
