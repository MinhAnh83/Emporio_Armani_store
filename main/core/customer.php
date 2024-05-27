<?php
class customer extends database
{
    function login($user, $pass)
    {
        $rs = $this->setquery('select * from customer where email = ? and password = ?')->loadrow([$user, $pass]);
        $this->disconnect();
        return $rs;
    }
    // add
    function add_customer($name, $address, $email, $phone, $pass)
    {
        $rs = $this->setquery('insert into customer values(null, ?, ?, ?, ?, ?, 1)')->save([$name, $address, $email, $phone, $pass]);
        $this->disconnect();
        return $rs;
    }
    // Delete
    function delete_customer($id)
    {
        $rs = $this->setquery('update customer set status = 0 where id = ?')->save([$id]);
        $this->disconnect();
        return $rs;
    }
    //list
    function list_customer()
    {
        $rs = $this->setquery('select * from customer where status !=0')->loadrows();
        $this->disconnect();
        return $rs;
    }
}