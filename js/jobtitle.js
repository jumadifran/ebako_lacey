/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function jobtitle_search() {
    var code = $('#jobtitle_code_s').val();
    var name = $('#jobtitle_name_s').val();
    var description = $('#jobtitle_description_s').val();

    $('#jobtitle').datagrid('reload', {
        code: code,
        name: name,
        description: description
    });
}

function jobtitle_add() {
    $('#jobtitle-form').dialog('open').dialog('setTitle', ' New Job title');
    $('#jobtitle-input').form('clear');
    url = base_url + 'jobtitle/save';
}

function jobtitle_save() {
    $('#jobtitle-input').form('submit', {
        url: url,
        onSubmit: function() {
            return $(this).form('validate');
        },
        success: function(content) {
            //            alert(content);
            var result = eval('(' + content + ')');
            if (result.success) {
                $('#jobtitle-form').dialog('close');
                $('#jobtitle').datagrid('reload');
            } else {
                $.messager.alert('Error', result.msg, 'error');
            }
        }
    });
}

function jobtitle_edit() {
    var row = $('#jobtitle').datagrid('getSelected');
    if (row != null) {
        $('#jobtitle-form').dialog('open').dialog('setTitle', ' Edit jobtitle');
        $('#jobtitle-input').form('load', row);
        url = base_url + 'jobtitle/update/' + row.id;
    } else {
        $.messager.alert('Waring', 'Choose Job title to Edit', 'warning');
    }
}

function jobtitle_delete() {
    var row = $('#jobtitle').datagrid('getSelected');
    if (row !== null) {
        $.messager.confirm('Confirm', 'Are you sure you want to remove this data?', function(r) {
            if (r) {
                $.post(base_url + 'jobtitle/delete', {
                    id: row.id
                }, function(result) {
                    if (result.success) {
                        $('#jobtitle').datagrid('reload');
                    } else {
                        $.messager.alert('Error', result.msg, 'error');
                    }
                }, 'json');
            }
        });
    } else {
        $.messager.alert('Waring', 'Choose Job title to Delete', 'warning');
    }
}

