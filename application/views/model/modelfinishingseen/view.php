<div id="modelfinishingseen_toolbar" style="padding-bottom: 2px;">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="modelfinishingseen_add()"> Add</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="modelfinishingseen_edit()"> Edit</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="modelfinishingseen_delete()"> Delete</a>
</div>
<table id="modelfinishingseen" data-options="
       url:'<?php echo site_url('modelfinishingseen/get') ?>',
       method:'post',
       border:false,
       singleSelect:true,
       fit:true,
       title:'Finishing Seen Face',
       pageSize:30,
       rownumbers:true,
       fitColumns:false,
       pagination:false,
       striped:true,
       toolbar:'#modelfinishingseen_toolbar'">
    <thead>
        <tr>
            <th field="id" hidden="true"></th>   
            <th field="description" width="200" halign="center">Description</th>
            <th field="finishing_type_name" halign="center" width="150">Finishing Type</th>
            <th field="area" width="120" align="center" data-options="formatter:function(value,row,index){return (value == 0) ? '' : value}">Area</th>
            <th field="size_l" width="50" align="center" data-options="formatter:function(value,row,index){return (value == 0) ? '' : value}">L</th>
            <th field="size_w" width="50" align="center" data-options="formatter:function(value,row,index){return (value == 0) ? '' : value}">W</th>            
            <th field="qty" width="80" align="center">Qty</th>
            <th field="total_area" width="80" align="center">M2</th>
            <th field="remark" width="250" halign="center">Remark</th>
        </tr>
    </thead>
</table>
<script type="text/javascript">
    $(function() {
        $('#modelfinishingseen').datagrid({
            view: detailview,
            detailFormatter: function(index, row) {
                return '<div class="modelfinishingseen_ddv" style="padding:10px"></div>';
            },
            onExpandRow: function(index, row) {
                var modelfinishingseen_ddv = $(this).datagrid('getRowDetail', index).find('div.modelfinishingseen_ddv');
                modelfinishingseen_ddv.datagrid({
                    url: '<?php echo site_url('modelfinishingseen/get_detail_material') ?>',
                    queryParams: {
                        modelfinishingseenid: row.id
                    },
                    fitColumns: false,
                    singleSelect: true,
                    rownumbers: true,
                    loadMsg: '',
                    height: 150,
                    width: 'auto',
                    columns: [[
                            {field: 'o_itemcode', title: 'Item Code', width: 173},
                            {field: 'o_itemdescription', title: 'Item Description', width: 373, halign: 'center'},
                            {field: 'o_qty', title: 'Qty', width: 80, align: 'center'},
                            {field: 'o_unitcode', title: 'Unit', width: 80, align: 'center'}
                        ]],
                    onResize: function() {
                        $('#modelfinishingseen').datagrid('fixDetailRowHeight', index);
                    },
                    onLoadSuccess: function() {
                        setTimeout(function() {
                            $('#modelfinishingseen').datagrid('fixDetailRowHeight', index);
                        }, 0);
                    }
                });
                $('#modelfinishingseen').datagrid('fixDetailRowHeight', index);
            }
        });
    });
</script>