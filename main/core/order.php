<?php
class order extends database
{
    // add
    function add_order($cus_id, $total)
    {
        $rs = $this->setquery('insert into orders values(null,CURRENT_TIMESTAMP,?,?)')->loadrow([$cus_id, $total]);
        $this->disconnect();
        return $rs;
    }
    //find
    function find_order($cus_id, $total)
    {
        $rs = $this->setquery('select * from orders where customer_id = ? and total_amount = ?')->loadrow([$cus_id, $total]);
        $this->disconnect();
        return $rs;
    }
    //detail
    function order_detail($id, $pro_name, $qty)
    {
        $rs = $this->setquery('insert into order_detail values(null, ?, ?, ?)')->save([$id, $pro_name, $qty]);
        $this->disconnect();
        return $rs;
    }
}