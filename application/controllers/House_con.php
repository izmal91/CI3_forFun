<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class House_con extends CI_Controller 
{
    
    public function index()
    {
        echo 'Nothing here.';
    }


    /*==========================================================
    =            FOR CREATE NEW INFO - INSERT TABLE            =
    ==========================================================*/
    
    function create_info()
    {
        //variable sent to here.
        $house_name = $this->input->post('house_name');
        $house_unit_no = $this->input->post('house_unit_no');
        $house_address = $this->input->post('house_address');
        $user_id = $this->input->post('user_id');


        //validation - which variable is required.
        if(empty($house_name))
        {
            $response = array(
                "res"=>0,
                "msg"=>'House name is required.',
            );
            $this->output
                    ->set_status_header(200)
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response))
                    ->_display();
            exit();
        }

        if(empty($house_unit_no))
        {
            $response = array(
                "res"=>0,
                "msg"=>'House Unit No is required.',
            );
            $this->output
                    ->set_status_header(200)
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response))
                    ->_display();
            exit();
        }

        if(empty($user_id))
        {
            $response = array(
                "res"=>0,
                "msg"=>'User id is required.',
            );
            $this->output
                    ->set_status_header(200)
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response))
                    ->_display();
            exit();
        }



        //if validation is all ok, now do process insert to table here
        $this->load->model('model_house');
        $data = array(
            "table_column_name_house_name"=>$house_name,
            "table_column_name_house_unit_no"=>$house_unit_no,
            "table_column_name_house_address"=>$house_address,
            "table_column_name_created_at"=>date('Y-m-d H:i:s'),
            "table_column_name_created_by"=>$user_id,
        );
        $house_id = $this->model_house->insert_new($data);

        //check insert is success or not
        if($house_id > 0)
        {
            //success insert
            $response = array(
                "res"=>1,
                "msg"=>'Success!, new house created.',
            );
            $this->output
                    ->set_status_header(200)
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response))
                    ->_display();
            exit();
        }
        else
        {
            //fail insert
            $response = array(
                "res"=>0,
                "msg"=>'Action fail.',
            );
            $this->output
                    ->set_status_header(200)
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response))
                    ->_display();
            exit();
        }

    }
    
    /*=====  End of FOR CREATE NEW INFO - INSERT TABLE  ======*/




    
    
    /*====================================================
    =            FOR SAVE INFO - UPDATE TABLE            =
    ====================================================*/
    
    function save_info()
    {
        //variable sent to here.
        $house_id = $this->input->post('house_id');
        $house_name = $this->input->post('house_name');
        $house_unit_no = $this->input->post('house_unit_no');
        $house_address = $this->input->post('house_address');
        $user_id = $this->input->post('user_id');


        //validation - which variable is required.
        if(empty($house_id))
        {
            $response = array(
                "res"=>0,
                "msg"=>'House id is required.',
            );
            $this->output
                    ->set_status_header(200)
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response))
                    ->_display();
            exit();
        }

        if(empty($house_name))
        {
            $response = array(
                "res"=>0,
                "msg"=>'House name is required.',
            );
            $this->output
                    ->set_status_header(200)
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response))
                    ->_display();
            exit();
        }

        if(empty($house_unit_no))
        {
            $response = array(
                "res"=>0,
                "msg"=>'House Unit No is required.',
            );
            $this->output
                    ->set_status_header(200)
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response))
                    ->_display();
            exit();
        }

        if(empty($user_id))
        {
            $response = array(
                "res"=>0,
                "msg"=>'User id is required.',
            );
            $this->output
                    ->set_status_header(200)
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response))
                    ->_display();
            exit();
        }



        //if validation is all ok, now do process update to table here
        $this->load->model('model_house');
        $data = array(
            "table_column_name_house_name"=>$house_name,
            "table_column_name_house_unit_no"=>$house_unit_no,
            "table_column_name_house_address"=>$house_address,
            "table_column_name_updated_at"=>date('Y-m-d H:i:s'),
            "table_column_name_updated_by"=>$user_id,
        );
        $house_res_update = $this->model_house->update_info($house_id,$data);

        //check update is success or not
        if($house_res_update > 0)
        {
            //success update
            $response = array(
                "res"=>1,
                "msg"=>'Success!, house info saved.',
            );
            $this->output
                    ->set_status_header(200)
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response))
                    ->_display();
            exit();
        }
        else
        {
            //fail update
            $response = array(
                "res"=>0,
                "msg"=>'Action fail.',
            );
            $this->output
                    ->set_status_header(200)
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response))
                    ->_display();
            exit();
        }
    }
    
    /*=====  End of FOR SAVE INFO - UPDATE TABLE  ======*/
    





    /*=====================================================
    =            FOR DELETE ROW - UPDATE TABLE            =
    =====================================================*/
    
    function delete_house_info()
    {
        //variable sent to here.
        $house_id = $this->input->post('house_id');
        $user_id = $this->input->post('user_id');


        //validation - which variable is required.
        if(empty($house_id))
        {
            $response = array(
                "res"=>0,
                "msg"=>'House id is required.',
            );
            $this->output
                    ->set_status_header(200)
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response))
                    ->_display();
            exit();
        }

        if(empty($user_id))
        {
            $response = array(
                "res"=>0,
                "msg"=>'User id is required.',
            );
            $this->output
                    ->set_status_header(200)
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response))
                    ->_display();
            exit();
        }


        //if validation is all ok, now do process update to table here
        $this->load->model('model_house');
        $data = array(
            "table_column_name_active"=>'0',
            "table_column_name_deleted_at"=>date('Y-m-d H:i:s'),
            "table_column_name_deleted_by"=>$user_id,
        );
        $house_res_update = $this->model_house->update_info($house_id,$data);

        //check remove is success or not
        if($house_res_update > 0)
        {
            //success remove
            $response = array(
                "res"=>1,
                "msg"=>'Success!, house deleted.',
            );
            $this->output
                    ->set_status_header(200)
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response))
                    ->_display();
            exit();
        }
        else
        {
            //fail remove
            $response = array(
                "res"=>0,
                "msg"=>'Action fail.',
            );
            $this->output
                    ->set_status_header(200)
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response))
                    ->_display();
            exit();
        }
    }
    
    /*=====  End of FOR DELETE ROW - UPDATE TABLE  ======*/
            
}
