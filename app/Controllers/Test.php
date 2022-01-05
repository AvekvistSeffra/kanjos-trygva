<?php

namespace App\Controllers;

class Test extends BaseController
{
    public function index()
    {
        // return view("logged_in")
        return view("form.php");  
    }

    // public function vaildate_data(){
    //     echo "Test for fun!";
    // }

    // public function write_text($data = "Write some texts!"){
    //     echo "<h1>The input data is: ".$data."!</h1>";
    // }

    
    // public function vaildate_data(){
    //     $this->load->library("form_validation");
    //     $this->form_vaildation->set_rules("email", "email", "required");
    //     $this->form_vaildation->set_rules("password", "password", "required");
    
    //     if($this->form_vaildation-->run()){
    //         $email = $this->input->post("email");
    //         $password = $this->input->post("password");

    //         if($this->can_log_in(($email, $password))){
    //             echo "User found!";
    //         }else{
    //             echo "User not found!";
    //         }    
    //     }else{
    //         echo "Data are not clear";
    //     }
    // }

    // public function can_log_in($email, $passowrd){
    //     $this->db->where("email", $email);
    //     $this->db->where("password", $password);
    //     $query = $this->db->get("users");

    //     if($query->num_rows() > 0){
    //         return True;
    //     }else{
    //         return False;
    //     }
    // }

    // public function log_in(){
    //     $data["title"] = "Log in test with session";
    //     $this->load->view("logged_in/index.php");

    // }



 
}