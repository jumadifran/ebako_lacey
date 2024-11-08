/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function itemgroup_search(){
    var code = $('#itemgroup_code_s').val();
    var name = $('#itemgroup_name_s').val();
    var description = $('#itemgroup_description_s').val();
    
    $('#itemgroup').datagrid('reload',{
        code: code,
        name: name,
        description: description
    });
}

function itemgroup_add(){
    $('#itemgroup-form').dialog('open').dialog('setTitle',' New item group');
    $('#itemgroup-input').form('clear');
    url = base_url + 'itemgroup/save';
}

function itemgroup_save(){
    $('#itemgroup-input').form('submit',{
        url: url,        
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(content){   
            //            alert(content);
            var result = eval('('+content+')');
            if(result.success){
                $('#itemgroup-form').dialog('close');                           
                $('#itemgroup').datagrid('reload');
            } else {                
                $.messager.alert('Error',result.msg,'error');
            }
        }
    });
}

function itemgroup_edit(){
    var row = $('#itemgroup').datagrid('getSelected');
    if(row != null){
        $('#itemgroup-form').dialog('open').dialog('setTitle',' Edit item group');
        $('#itemgroup-input').form('load',row);
        url = base_url + 'itemgroup/update/'+row.id;
    }else{
        $.messager.alert('Waring','Choose itemgroup to Edit','warning');
    }
}

function itemgroup_delete(){
    var row = $('#itemgroup').datagrid('getSelected');
    if(row != null){
        $.messager.confirm('Confirm','Are you sure you want to remove this data?',function(r){
            if (r){
                $.post(base_url+'itemgroup/delete',{
                    id:row.id
                },function(result){
                    if (result.success){
                        $('#itemgroup').datagrid('reload');
                    } else {
                        $.messager.alert('Error',result.msg,'error');
                    }
                },'json');
            }
        });
    }else{
        $.messager.alert('Waring','Choose item group to Delete','warning');
    }
}

