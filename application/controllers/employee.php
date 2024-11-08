<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of employee
 *
 * @author hp
 */
class employee extends CI_Controller {

  //put your code here
  public function __construct() {
    parent::__construct();
    $this->load->model('model_employee');
  }

  function index() {
    $this->load->model('model_jobtitle');
    $this->load->model('model_department');
    $data['jobtitle'] = $this->model_jobtitle->selectAllResult();
    $data['department'] = $this->model_department->selectAllResult();
    $this->load->model('model_user');
    $data['action'] = explode('|', $this->model_user->getAction($this->session->userdata('id'), "employee"));
    $this->load->view('employee/view', $data);
  }

  function get() {
    $query = "
            select 
            employee.*,
            (department.code || ': ' || department.name) department,
            (jobtitle.code || ': '|| jobtitle.name) jobtitle,
            (section.code || ': '|| section.name) section,
            (subsection.code || ': '|| subsection.name) subsection,
            (to_char(employee.startdate,'DD-MM-YYYY')) startdate_f,
            (to_char(employee.dob,'DD-MM-YYYY')) dob_f 
            from employee 
            left join department on employee.departmentid=department.id 
            left join jobtitle on employee.jobtitleid=jobtitle.id 
            left join section on employee.sectionid=section.id
            left join subsection on employee.subsectionid=subsection.id
            where true 
        ";
    $id = $this->input->post('id');
    if (!empty($id)) {
      $query .= " and employee.id ilike '%$id%' ";
    }
    $name = $this->input->post('name');
    if (!empty($name)) {
      $query .= " and employee.name ilike '%$name%' ";
    }
    //$query .= " order by employee.id_field desc";

    $sort = $this->input->post('sort');
    $order = $this->input->post('order');
    $query .= " order by $sort $order ";
    //echo $query;
    echo $this->model_employee->get($query);
  }

  function get_remote_data() {
    $name = $this->input->post('q');
    $query = "select 
               employee.*,
               department.name department,
               jobtitle.name jobtitle 
               from employee 
               left join department on employee.departmentid=department.id 
               left join jobtitle on employee.jobtitleid=jobtitle.id where true ";
    if ($name != "") {
      $query .= " and employee.name ilike '%$name%' or employee.id ilike '%$name%'";
    }
    //echo $query;
    echo $this->model_employee->get_remote_data($query);
  }

  function save() {
    $id = $this->input->post('id');
    $name = $this->input->post('name');
    $departmentid = $this->input->post('departmentid');
    $jobtitleid = $this->input->post('jobtitleid');
    $sectionid = $this->input->post('sectionid');
    $subsectionid = $this->input->post('subsectionid');
    $startdate = $this->input->post('startdate');
    $enddate = $this->input->post('enddate');
    $dob = $this->input->post('dob');
    $address = $this->input->post('address');
    $payrollstatus = $this->input->post('payrollstatus');
    $status = $this->input->post('status');
    $birthplace = $this->input->post('birthplace');
    $sex = $this->input->post('sex');
    $othersidentity = $this->input->post('othersidentity');
    $familystatus = $this->input->post('familystatus');
    $phone = $this->input->post('phone');
    $email = $this->input->post('email');

    $startdate = ($startdate == '' ? null : $startdate);
    $enddate = ($enddate == '' ? null : $enddate);
    $dob = ($dob == '' ? null : $dob);
    $data = array(
        "id" => $id,
        "name" => $name,
        "departmentid" => $departmentid,
        "jobtitleid" => $jobtitleid,
        "sectionid" => $sectionid,
        "subsectionid" => $subsectionid,
        "startdate" => $startdate,
        "enddate" => $enddate,
        "dob" => $dob,
        "address" => $address,
        "payrollstatus" => $payrollstatus,
        "status" => $status,
        "birthplace" => $birthplace,
        "sex" => $sex,
        "othersidentity" => $othersidentity,
        "familystatus" => $familystatus,
        "phone" => $phone,
        "email" => $email);

    if ($this->model_employee->insert($data)) {
      echo json_encode(array('success' => true));
    }
    else {
      echo json_encode(array('msg' => $this->db->_error_message()));
    }
  }

  function update($id) {
    $name = $this->input->post('name');
    $departmentid = $this->input->post('departmentid');
    $jobtitleid = $this->input->post('jobtitleid');
    $sectionid = $this->input->post('sectionid');
    $subsectionid = $this->input->post('subsectionid');
    $startdate = $this->input->post('startdate');
    $enddate = $this->input->post('enddate');
    $dob = $this->input->post('dob');
    $address = $this->input->post('address');
    $payrollstatus = $this->input->post('payrollstatus');
    $status = $this->input->post('status');
    $birthplace = $this->input->post('birthplace');
    $sex = $this->input->post('sex');
    $othersidentity = $this->input->post('othersidentity');
    $familystatus = $this->input->post('familystatus');
    $phone = $this->input->post('phone');
    $email = $this->input->post('email');

    $startdate = ($startdate == '' ? null : $startdate);
    $enddate = ($enddate == '' ? null : $enddate);
    $dob = ($dob == '' ? null : $dob);
    $data = array(
        "id" => $id,
        "name" => $name,
        "departmentid" => $departmentid,
        "jobtitleid" => $jobtitleid,
        "sectionid" => $sectionid,
        "subsectionid" => $subsectionid,
        "startdate" => $startdate,
        "enddate" => $enddate,
        "dob" => $dob,
        "address" => $address,
        "payrollstatus" => $payrollstatus,
        "status" => $status,
        "birthplace" => $birthplace,
        "sex" => $sex,
        "othersidentity" => $othersidentity,
        "familystatus" => $familystatus,
        "phone" => $phone,
        "email" => $email);

    if ($this->model_employee->update($data, array("id" => $id))) {
      echo json_encode(array('success' => true));
    }
    else {
      echo json_encode(array('msg' => $this->db->_error_message()));
    }
  }

  function delete() {
    if ($this->model_employee->delete(array("id" => $this->input->post('id')))) {
      echo json_encode(array('success' => true));
    }
    else {
      echo json_encode(array('msg' => $this->db->_error_message()));
    }
  }

}
