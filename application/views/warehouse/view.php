<div id="warehouse_toolbar" style="padding-bottom: 2px;">
    Code : <input type="text" size="12" class="easyui-validatebox" id="warehouse_code_s" onkeypress="if (event.keyCode === 13) {
                warehouse_search();
            }"/>    
    Name : <input type="text" size="12" class="easyui-validatebox" id="warehouse_name_s" onkeypress="if (event.keyCode === 13) {
                warehouse_search();
            }"/>    
    Description : <input type="text" size="20" class="easyui-validatebox" id="warehouse_description_s" onkeypress="if (event.keyCode === 13) {
                warehouse_search();
            }"/>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="warehouse_search()"> Search</a>
    <?php
    if (in_array('add', $action)) {
        ?>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="warehouse_add()"> Add</a>
        <?php
    }if (in_array('edit', $action)) {
        ?>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="warehouse_edit()"> Edit</a>
        <?php
    }if (in_array('delete', $action)) {
        ?>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="warehouse_delete()"> Delete</a>
        <?php
    }
    ?>
</div>
<table id="warehouse" data-options="
       url:'<?php echo site_url('warehouse/get') ?>',
       method:'post',
       title:'Warehouse',
       border:true,
       singleSelect:true,
       fit:true,
       pageSize:30,
       pageList: [30, 50, 70, 90, 110],
       rownumbers:true,
       fitColumns:false,
       pagination:true,
       striped:true,
       toolbar:'#warehouse_toolbar'">
    <thead>
        <tr>
            <th field="id" hidden="true"></th>            
            <th field="code" width="100" align="center">Code</th>
            <th field="name" width="120" align="center">Name</th>
            <th field="description" width="400" halign="center">Description</th>            
        </tr>
    </thead>
</table>
<script type="text/javascript">
    $(function() {
        $('#warehouse').datagrid();
    });
</script>
<?php
$this->load->view('warehouse/add');
?>
