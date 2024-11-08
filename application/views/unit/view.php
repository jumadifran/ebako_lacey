<div id="unit_toolbar" style="padding-bottom: 2px;">
  Code : <input type="text" size="12" class="easyui-validatebox" id="unit_code_s" onkeypress="if (event.keyCode === 13) {
        unit_search();
      }"/>    
  Name : <input type="text" size="12" class="easyui-validatebox" id="unit_name_s" onkeypress="if (event.keyCode === 13) {
        unit_search();
      }"/>    
  Description : <input type="text" size="20" class="easyui-validatebox" id="unit_description_s" onkeypress="if (event.keyCode === 13) {
        unit_search();
      }"/>
  <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="unit_search()"> Search</a>
  <?php if (in_array('add', $action)) { ?>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="unit_add()"> Add</a>
  <?php }if (in_array('edit', $action)) { ?>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="unit_edit()"> Edit</a>
  <?php }if (in_array('delete', $action)) { ?>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="unit_delete()"> Delete</a>
  <?php } ?>
</div>
<table id="unit" data-options="
       url:'<?php echo site_url('unit/get') ?>',
       method:'post',
       title:'Unit',
       border:true,
       singleSelect:true,
       fit:true,
       pageSize:30,
       pageList: [30, 50, 70, 90, 110],
       rownumbers:true,
       fitColumns:false,
       pagination:true,
       striped:true,
       sortName:'id',
       sortOrder:'desc',
       toolbar:'#unit_toolbar'">
  <thead>
    <tr>
      <th field="id" hidden="true"></th>            
      <th field="code" width="100" align="center" sortable="true">Code</th>
      <th field="name" width="120" halign="center" sortable="true">Name</th>
      <th field="description" width="400" halign="center" sortable="true">Description</th>            
    </tr>
  </thead>
</table>
<script type="text/javascript">
  $(function() {
    $('#unit').datagrid();
  });
</script>
<?php
$this->load->view('unit/add');

