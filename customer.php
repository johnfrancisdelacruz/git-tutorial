<?php

//customers from controler

public function insert_data_orders_table()
{
    if($this->customers_model->validate_session($this->params['P01']))
    
    {
    $result = $this->customers_model->insert_data_orders_table($this->params);
     $response = $this->customers_model->get_response();
  
     if ($response['ResponseId']=='0000') {
        return $this->success($response['ResponseMsg']);
    } else {
        return $this->failed($response['ResponseMsg']);
    }
} else {
        return $this->failed_response('Invalid session id');
    }  
}  