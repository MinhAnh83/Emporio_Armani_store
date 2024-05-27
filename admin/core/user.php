<?php
class user extends database
{
    function login($user, $pass)
    {
        $rs = $this->setquery('select * from users where username = ?  and password = ?')->loadrow([$user, $pass]);
        $this->disconnect();
        return $rs;
    }
    //add
    function add($username, $password, $name, $gender, $email, $phone, $image, $status)
    {
        $rs = $this->setquery('insert into users values(null, ?, ?, ?, ?, ?, ?, ?, ?, current_timestamp(), current_timestamp())')->save([$username, $password, $name, $gender, $email, $phone, $image, $status]);
        return $rs;
    }
    //edit
    function update($id, $name, $image, $gender, $phone, $email, $status, $password)
    {
        $rs = $this->setquery('update users set status = ?,gender=?,name=?,phone=?,email=?,image=?,password=? where id = ?')->save([$status, $gender, $name, $phone, $email, $image, $password, $id]);
        $this->disconnect();
        return $rs;
    }
    //delete
    function delete($id, $currentuser)
    {
        $rs = $this->setquery('update users set status = 0 where id = ? and username != ?')->save([$id, $currentuser]);
        $this->disconnect();
        return $rs;
    }
    //list
    function _list()
    {
        $rs = $this->setquery('select * from users where status !=0')->loadrows();
        $this->disconnect();
        return $rs;
    }
    //find one user by id
    function find($id)
    {
        $rs = $this->setquery('select * from users where status !=0 and id = ?')->loadrow([$id]);
        $this->disconnect();
        return $rs;
    }
}