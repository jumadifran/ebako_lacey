<div id="upholstry_toolbar" style="padding-bottom: 2px;">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" id="upholstry_add" onclick="upholstry_add()"> Add</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" id="upholstry_edit" onclick="upholstry_edit()"> Edit</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" id="upholstry_delete" onclick="upholstry_delete()">Delete</a>
</div>
<table id="upholstry" data-options="
       url:'<?php echo site_url('upholstry/get') ?>',
       method:'post',
       border:false,
       singleSelect:true,
       title:'Upholstry',
       fit:true,
       pageSize:50,
       pageList: [50, 100],
       rownumbers:true,
       fitColumns:false,
       pagination:true,
       striped:true,
       toolbar:'#upholstry_toolbar'">
    <thead>
        <tr>
            <th field="description" width="160" halign="center">Description</th>
            <th field="code" width="90" align="center">Material Code</th>
            <th field="materialdescription" width="200" halign="center">Material Description</th>
            <th field="size_l" width="50" align="center" data-options="formatter:function(value,row,index){return (value == 0) ? '' : value;}">L</th>
            <th field="size_w" width="50" align="center" data-options="formatter:function(value,row,index){return (value == 0) ? '' : value;}">W</th>
            <th field="size_t" width="50" align="center" data-options="formatter:function(value,row,index){return (value == 0) ? '' : value;}">T</th>
            <th field="qty" width="40" align="center" data-options="formatter:function(value,row,index){return (value == 0) ? '' : value;}">Qty</th>
            <th field="volume_m3" width="60" halign="center" align="right" data-options="formatter:function(value,row,index){return (value == 0) ? '' : value;}">M3</th>
            <th field="volume_m2" width="60" halign="center" align="right" data-options="formatter:function(value,row,index){return (value == 0) ? '' : value;}">M2</th>
            <th field="total_qty" width="60" halign="center" align="right" data-options="formatter:function(value,row,index){return (value == 0) ? '' : value;}">Total Qty</th>
            <th field="unitcode" width="60" align="center">Unit</th>
            <th field="remark" width="150" halign="center">Remark</th>
        </tr>
    </thead>
</table>
<script type="text/javascript">
    $(function() {
        $('#upholstry').datagrid({});
    });
</script>
