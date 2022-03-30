<?php

// custonmer_model 


public function insert_data_orders_table($params) {      
    $insert_order_name =  $params['P04'];
    $insert_quantity =  $params['P05'];
    $insert_order_date_time = date('Y-m-d H:i:s');
    $insert_created_date_time =date('Y-m-d H:i:s');
    $insert_created_by = $params['P06'];
    $insert_customer_id = $params['P02'];

    $insert_orders_table = "INSERT INTO orders_table ( order_name, quantity, order_date_time, created_date_time,created_by,customer_id)
     VALUES ('{$insert_order_name}', '{$insert_quantity}', '{$insert_order_date_time}'
     ,'{$insert_created_date_time}', '{$insert_created_by}','{$insert_customer_id}')";
  
  if ($this->db->query($insert_orders_table)) {
  
  $query= $this->db
    -> select (array('o.id','o.order_name','o.quantity','o.order_date_time','o.created_date_time','o.created_by','o.customer_id','c.first_name','c.last_name','c.middle_name'))
    -> from ('orders_table o')
    -> join ('customers c', 'c.id = o.customer_id','right')
    -> where ('c.id' , $params['P02'])
    -> get();
    
 
    if ($query->num_rows() > 0) {
      
        $row = $query->row();
         $returnData = array(
            'Id' => $row -> id,
            'Order Name' => $row->order_name,
            'Quantity' => $row->quantity,
            'Order Date and Time' => $row->order_date_time,
            'Created Date and Time' => $row->created_date_time,
            'Created by' => $row->created_by,
            'Customer Id' => $row->customer_id,
            'FirstName' => $row->first_name,
            'LastName' => $row->last_name,
            'MiddleName' => $row->middle_name
           );
        
       return $this->success($returnData);
    } else {
        return $this->failed('Unable to retrieve customer details.');
    }

}else{
    return $this->failed('Unable to insert order details.');;
}
