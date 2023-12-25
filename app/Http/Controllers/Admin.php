<?php

namespace App\Http\Controllers;


use App\Models\Budget;
use App\Models\Budget_income;
use App\Models\Budget_type;
use App\Models\Expense;
use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LDAP\Result;
use PhpParser\Node\Expr\FuncCall;

use function PHPUnit\Framework\returnSelf;

class Admin extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

     return view('System_admin.home.home');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $result=Budget::where('trash',0)->get();
       return view('System_admin.Budget.budget',compact('result'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $budget= New Budget();
        $budget->id =$request->id;
        $budget->amount=$request->amount;
        $budget->budget_name= $request->budget_name;
        $budget->start_date=$request->start_date;
        $budget->end_date=$request->end_date;
        $budget->user_id = $request->user_id;
        $budget->type_id = $request->type_id;
        $budget->save();
        if($budget){
            return redirect()->back()->with('success', 'budget Added Successfully');
        }else{
            return redirect()->back()->with('error', 'OooPs! please  check  your internet connection! Try agin ');
        }
    }
    // this is the update Budget
    public function updateBudget(Request  $request , $id)
    {
        $budget= Budget::find($id);
        // ->update([
        //     'id' => $request->budget_id,
        //     'budget_name' => $request->budget_name,
        //     'start_date'=>$request->start_date,
        //     'end_date'=>$request->end_date,
        //     'user_id'=>$request->user_id,
        //     'type_id'=>$request->type_id
        // ]);
        $budget->id= $request->budget_id;
        $budget->amount =$request->amount;
        $budget->budget_name=$request->budget_name;
        $budget->start_date=$request->start_date;
        $budget->end_date=$request->end_date;
        $budget->user_id=$request->user_id;
        $budget->type_id =$request->type_id ;
        $budget->save();
        if($budget){
            return redirect()->back()->with('success', 'Budget Updated Successfully');
        }else{
            return redirect()->back()->with('error', 'Ooops! plase check your intenet connection! Try agin');
        }
    }

    //Trash  budget
   public function trashBudget($id)
   {
    $budget=Budget::where('id', $id)->update(['trash'=>1]);
    if($budget)
    {
        return redirect()->back()->with('success', 'Budget Trash   Successfully');
    }else{
        return redirect()->back()->with('error', 'Ooops! plase check your intenet connection! Try agin');
    }

   }
   //destroy budget in this section
   public function destroyBudget($id)
   {
    $budget = Budget::where('id', $id)->delete();
    if($budget)
    {
        return redirect()->back()->with('success', 'Budget Deleted Successfully');
    }else{
        return redirect()->back()->with('error', 'Ooops! plase chech your intnent connection ! Try agin');
    }
   }
   //restore Budget in this section
   public function restoreBudget($id)
   {
    $budget = Budget::where('id', $id)->update(['trash'=> 0]);
    if($budget)
    {
        return redirect()->back()->with('success', 'Budget Restore Successfully');
    }else{
        return redirect()->back()->with('error', 'Ooops! plase check your internet Connection! Try agin');
    }

   }

   //this is the Trash List
   public function trashList()
   {
    $budget=Budget::where('trash', 1)->get();
    return view('System_admin.Trash.trash' ,compact('budget'));
   }
   //this is the Home page created by javed elham
   public function home(){
    $type1= DB::select("SELECT sum(amount) as type1 from budgets where type_id =1");
    $type2= DB::select("SELECT sum(amount) as type2 from budgets where type_id =2");
    $type3= DB::select("SELECT sum(amount) as type3 from budgets where type_id =3");


    return view('System_admin.home.home', compact('type1','type2','type3'));
   }


   // this is the test Section in the laravel
   public function test(){
    return view('System_admin.test.test');
   }

   //  this is the Budget Income section
   public function budgetIncome()
   {
    $result=Budget_income::get();
     return view('System_admin.Budget_income.Budget_income', compact('result'));
   }
   // this is the Budget Income Stroe
   public function storebudgetIncome(Request $request)
   {
      $result= New Budget_income();
      $result->	id =$request->income_id;
      $result->budget_id= $request->budget_id;
      $result->amount=$request->amount;
      $result->income_date=$request->income_date;
      $result->save();
      if($result)
      {
        return redirect()->back()->with('success', 'BudgetIncome Added  Successfully');
    }else{
        return redirect()->back()->with('error', 'Ooops! plase check your internet Connection! Try agin');
    }
   }
   //this is the budgetIncome  Update
   public function updateBudgetIncome(Request  $request , $id)
   {
       $result =Budget_income::find($id);
       $result->id =$request->id;
       $result->budget_id= $request->budget_id;
       $result->amount=$request->amount;
       $result->income_date=$request->income_date;
       $result->save();
       if($result)
        {
        return redirect()->back()->with('success', 'BudgetIncome  Updated Successfully');
        }else{
        return redirect()->back()->with('error', 'Ooops! plase check your intenet connection! Try agin');
        }

   }
   public function destroyBudgetIncome($id)
   {

        $result = Budget_income::where('id', $id)->delete();
        if($result)
        {
            return redirect()->back()->with('success', 'Budget Deleted Successfully');
        }else{
            return redirect()->back()->with('error', 'Ooops! plase chech your intnent connection ! Try agin');
        }
    }

    // this is BudgetType in this section
    public function budgetType()
    {
        $budgetType = Budget_type::get();
        return view('System_admin.BudgetType.budgetType', compact('budgetType'));
    }
    public function storeBudgetType(Request $request)
    {
        $budgetType = New Budget_type();
        $budgetType->type_id =$request->type_id;
        $budgetType->type_name = $request->type_name;
        $budgetType->save();
        if($budgetType)
        {
            return redirect()->back()->with('success', 'Budget Type Added Successfully ');
        }else{
            return redirect()->back()->with('error', 'Ooops! plase chech your intnent connection ! Try agin' );
        }
    }
    // this is Expenses in this section
    public function Expenses()
    {
        $Expenses= Expense::get();
        return view('System_admin.Expenses.Expenses', compact('Expenses'));

    }
    // this is Store Expenses in this section
    public function storeExpenses(Request $request)
    {
        $Expenses = New Expense();
        $Expenses->id = $request->id ;
        $Expenses->budget_id = $request->budget_id;
        $Expenses->expense_type_id=$request->expense_type_id;
        $Expenses->amount=$request->amount;
        $Expenses->expense_date=$request->expense_date;
        $Expenses->save();
        if($Expenses){
            return redirect()->back()->with('success','Expenses Added Successfully');

        }else{
            return redirect()->back()->with('error', 'Ooops! plase check your intenet connection! Try agin');
        }

    }
    //this is updateExpenses
    public function updateExpenses(Request  $request , $id)
    {
        $Expenses =Expense::find($id);
       $Expenses->id = $request->id ;
       $Expenses->budget_id = $request->budget_id;
       $Expenses->expense_type_id=$request->expense_type_id;
       $Expenses->amount=$request->amount;
       $Expenses->expense_date=$request->expense_date;
       $Expenses->save();
       if($Expenses)
        {
        return redirect()->back()->with('success', 'Expenses   Updated Successfully');
        }else{
        return redirect()->back()->with('error', 'Ooops! plase check your intenet connection! Try agin');
        }
    }
    // this is People section
    public function ShowPeople()
    {
        $peoples = People::get();
        return view('System_admin.People.People', compact('peoples'));
    }
    // this is insert People section
    public function StorePeople(Request $request)
    {
        $peoples = New People();
        $peoples->person_id = $request->person_id;
        $peoples->first_name = $request->first_name;
        $peoples->last_name = $request->last_name;
        $peoples->father_name = $request->father_name;
        $peoples->administraion_name = $request->administraion_name;
        $peoples->direction_name = $request->direction_name;
        $peoples->rank = $request->rank;
        $peoples->address = $request->address;
        $peoples->phone_number = $request->phone_number;
        $peoples->save();
        if($peoples)
        {
            return redirect()->back()->with('success', 'Person Added Successfully');
        }else{
            return redirect()->back()->with('error', 'Ooops! plase check your intenet connection! Try agin');
        }

    }

    // this is Function for update people
    public function updatepeople(Request  $request , $id)
    {
        $peoples= People::find($id);
        $peoples->id = $request->id;
        $peoples->first_name = $request->first_name;
        $peoples->last_name = $request->last_name;
        $peoples->father_name = $request->father_name;
        $peoples->administraion_name = $request->administraion_name;
        $peoples->direction_name = $request->direction_name;
        $peoples->rank = $request->rank;
        $peoples->address = $request->address;
        $peoples->phone_number = $request->phone_number;
        $peoples->save();
        if($peoples)
        {
            return redirect()->back()->with('success', 'Person Updated Successfuly');
        }else{
            return redirect()->back()->with('error', 'Ooops! plase check your intenet connection! Try agin');
        }

    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
