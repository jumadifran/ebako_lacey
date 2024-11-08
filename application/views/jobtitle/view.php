<div id="jobtitle_toolbar" style="padding-bottom: 0;">
  Code : 
  <input type="text" size="12" class="easyui-validatebox" id="jobtitle_code_s" onkeypress="if (event.keyCode === 13) {
        jobtitle_search();
      }"/>    
  Name : <input type="text" size="12" class="easyui-validatebox" id="jobtitle_name_s" onkeypress="if (event.keyCode === 13) {
        jobtitle_search();
      }"/>    
  Description : <input type="text" size="20" class="easyui-validatebox" id="jobtitle_description_s" onkeypress="if (event.keyCode === 13) {
        jobtitle_search();
      }"/>
  <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="jobtitle_search()"> Search</a>

  <?php if (in_array('add', $action)) { ?>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="jobtitle_add()">Add</a>
  <?php }if (in_array('edit', $action)) { ?>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="jobtitle_edit()">Edit</a>
  <?php }if (in_array('delete', $action)) { ?>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="jobtitle_delete()">Delete</a>
  <?php } ?>
</div>
<table id="jobtitle" data-options="
       url:'<?php echo site_url('jobtitle/get') ?>',
       method:'post',
       title:'Job Title',
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
       toolbar:'#jobtitle_toolbar'">
  <thead>
    <tr>
      <th field="id" hidden="true"></th>            
      <th field="code" width="100" halign="center" sortable="true">Code</th>
      <th field="name" width="120" halign="center" sortable="true">Name</th>
      <th field="description" width="400" halign="center" sortable="true">Description</th>            
    </tr>
  </thead>
</table>
<script>
  $(function() {
    $('#jobtitle').datagrid();
  });
</script>
<?php
$this->load->view('jobtitle/add');

