<?php

//chp.php

protected function insert_data_orders_table() {
    if (!$this->_param_count_check(0)) {
        return $this->_failed('INVALID_PARAMETER_COUNT');
    } else {
        $this->run_api(__FUNCTION__);
    }
}