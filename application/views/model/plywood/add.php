<form id="plywood-input" method="post" novalidate>
    <table width="100%" border="0">            
        <tr>
            <td align="right" width="30%"><label class="field_label">Description :</label></td>
            <td width="70%">
                <input type="text" name="description" class="easyui-validatebox" style="width: 270px" required="true" />
            </td>
        </tr>    
        <tr>
            <td align="right" ><label class="field_label">Material :</label></td>
            <td>
                <input type="text" id="plywooditemid" name="itemid" <?php echo $required ?> style="width: 270px"/>
                <script type="text/javascript">
                    $(function() {
                        $('#plywooditemid').combobox({
                            url: '<?php echo site_url('item/get_for_combo') ?>',
                            method: 'post',
                            valueField: 'id',
                            textField: 'code',
                            panelHeight: '200',
                            mode: 'remote',
                            formatter: formatPlywoodItemFormat,
                            onSelect:function(row){
                                $('#plywoodmaterialdescription').val(row.description);
                                $('#plywoodunitcode').combobox('clear');
                                $('#plywoodunitcode').combobox('reload', base_url + 'itemunitprice/get_remote_unit/' + row.id);
                                $('#plywoodunitcode').combobox('setValue',row.unitcode);
                            }
                        });
                    });
                    function formatPlywoodItemFormat(row){
                        var s = '<span style="font-weight:bold">' + row.code +'</span><br/>' +
                            '<span style="color:#888;font-size:7.5pt">Desc: ' + row.description + '</span><br/>' +
                            '<span>Unit Code: '+row.unitcode+'</span><br/>';
                        return s;
                    }
                </script>
            </td>
        </tr>
        <tr>
            <td align="right"><label class="field_label">Material Description :</label></td>
            <td>
                <input name="materialdescription" id="plywoodmaterialdescription" class="easyui-validatebox" readonly="true" style="width: 270px;">
            </td>
        </tr>
        <tr>
            <td align="right"><label class="field_label">Unit Code :</label></td>
            <td>
                <input id="plywoodunitcode" name="unitcode" <?php echo $required ?> panelHeight="auto" editable="false" class="easyui-combobox" panelHeight="auto" data-options="valueField:'id',textField:'text'" style="width: 100px;">
            </td>
        </tr>
        <tr>
            <td align="right"><label class="field_label">Size :</label></td>
            <td>
                <table width="80%" border="0" style="border-width: 1px;border-collapse: collapse;border-color: #ccccff;" cellpadding="0" cellspacing="0">                        
                    <tr>
                        <td align="center" style="border: 1px solid #ccccff;" width="33%"><b>L</b></td>
                        <td align="center" style="border: 1px solid #ccccff;" width="33%"><b>W</td>
                        <td align="center" style="border: 1px solid #ccccff;" width="33%"><b>T</b></td>
                    </tr>
                    <tr>
                        <td align="center" style="border: 1px solid #ccccff;padding: 2px;"><input type="text" class="easyui-numberbox" name="size_l" precision="2"  style="width: 80%;text-align: center;"/></td>
                        <td align="center" style="border: 1px solid #ccccff;padding: 2px;"><input type="text" class="easyui-numberbox" name="size_w" precision="2"  style="width: 80%;text-align: center;" /></td>
                        <td align="center" style="border: 1px solid #ccccff;padding: 2px;"><input type="text" class="easyui-numberbox" name="size_t" precision="2"  style="width: 80%;text-align: center;" /></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td align="right"><label class="field_label">Qty :</label></td>
            <td><input type="text" name="qty" style="text-align: center" class="easyui-numberbox" size="5" value=""/></td>
        </tr>
        <tr>
            <td align="right"><label class="field_label">Total Qty :</label></td>
            <td><input type="text" name="total_qty" style="text-align: center" class="easyui-numberbox" precision="4" size="10" value=""/></td>
        </tr>
        <tr>
            <td align="right"><label class="field_label">Remark :</label></td>
            <td>
                <textarea name="remark" id="remark" class="easyui-validatebox" style="width: 90%;height: 45px"></textarea>
            </td>
        </tr>
    </table>        
</form>