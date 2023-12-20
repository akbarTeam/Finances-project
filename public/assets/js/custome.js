function deleteMsg(data)
{
    let ans=confirm(data);
    if(!ans){
        event.preventDefault();
    }
}
function validateBudget(id){
    let budget_id =$("#budget_id"+id).val();
    let budget_name =$("#budget_name"+id).val();
    let stat_date =$("#start_date"+id).val();
    let end_date =$("#end_date"+id).val();
    let user_id= $("#user_id"+id).val();
    let type_id =$("#type_id"+id).val();
    let result = true;
    if(budget_id==""){
        $(`#ibud{id}`).text("budget ID connt be Null  ");
        result = false;
    }else{
        $(`#ibud{id}`).text('');
        result = true;
    }
    if(budget_name ==""){
        $(`#mbud{id}`).text("budget Name  connt be Null  ");
        result = false;
    }else{
        $(`#ibud{id}`).text('');
        result = true;
    }



}
