<?php
class product extends database
{
    // add
    function add_product($sku, $name, $price, $qty, $image, $content, $category, $supplier, $status)
    {
        $rs = $this->setquery("insert into products values(null, ?, ?, ?, ?, ?,'','', ?, ?, ?,'','','','', ?, current_timestamp(),current_timestamp())")->save([$sku, $name, $price, $qty, $image, $content, $category, $supplier, $status]);
        return $rs;
    }
    // update
    function update_product($id, $name, $sku, $image, $price, $qty, $category, $supplier, $status, $content)
    {
        $rs = $this->setquery('update products set name = ?, sku =?, image = ?, price = ?, qty = ?, category_id=?, supplier_id=?, status=?, content = ? 
        WHERE id =?')->save([$name, $sku, $image, $price, $qty, $category, $supplier, $status, $content, $id]);
        $this->disconnect();
        return $rs;
    }
    // Edit
    function delete_product($id)
    {
        $rs = $this->setquery('update products set status = 0 where id = ?')->save([$id]);
        $this->disconnect();
        return $rs;
    }
    //list
    function list_product()
    {
        $rs = $this->setquery('select products.id as id, products.name as name, products.sku, products.image as image, products.price, products.qty, 
        categories.name as categories, suppliers.name as suppliers, products.status as status 
        from `products` inner join suppliers on supplier_id = suppliers.id inner join categories on category_id = categories.id 
        where products.status != 0 and category_id = categories.id and supplier_id = suppliers.id')->loadrows();
        $this->disconnect();
        return $rs;
    }
    function find_product($id)
    {
        $rs = $this->setquery('select * from products where status !=0 and id = ?')->loadrow([$id]);
        $this->disconnect();
        return $rs;
    }
}