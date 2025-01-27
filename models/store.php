<?php

require_once('mysqlconnection.php');

//atributos; constructor; metodos: get, set, otros;
class Store
{
    //SQL Statements
    private static $select = 'select store.store_id, CONCAT(staff.first_name, " ", staff.last_name) as '.'staff_fullname'.', address.address, address.district, store.last_update from store
    join staff on store.manager_staff_id = staff.staff_id
    join address on store.address_id = address.address_id
    order by store_id';
    private static $select_one = 'select store_id, staff_fullname, address_store_id, last_update from staff_fullname where store_id = ?';

    //atributes
    private $store_id;
    private $staff_fullname;
    private $address;
    private $district;
    private $last_update;

    //getters and setters
    public function get_store_id()
    {
        return $this->store_id;
    }
    public function set_store_id($store_id)
    {
        return $this->store_id = $store_id;
    }
    public function get_staff_fullname()
    {
        return $this->staff_fullname;
    }
    public function set_staff_fullname($staff_fullname)
    {
        return $this->$staff_fullname  = $staff_fullname;
    }
    public function get_address()
    {
        return $this->address;
    }
    public function set_address($address)
    {
        return $this->address = $address;
    }
    public function get_district()
    {
        return $this->district;
    }
    public function set_district($district)
    {
        return $this->district = $district;
    }
    public function get_last_update()
    {
        return $this->last_update;
    }
    public function set_last_update($last_update)
    {
        return $this->last_update = $last_update;
    }


    //constructor
    public function __construct()
    {
        //zero arguments
        if (func_num_args() == 0) {
            $this->store_id = '';
            $this->staff_fullname  = '';
            $this->address = '';
            $this->district = '';
            $this->last_update = '';
        }
        //two arguments received, create object with values from arguments
        if (func_num_args() == 5) {
            $args = func_get_args(); //read arguments into array
            $this->store_id = $args[0];
            $this->staff_fullname  = $args[1];
            $this->district = $args[2];
            $this->last_update = $args[3];
            $this->address = $args[4];
        }
    }

    //instance methods

    //class methods
    public static function get()
    {
        if (func_num_args() == 0) {
            //empty array
            $list = array();
            //connect to db
            $connection = MySqlConnection::get_connection();

            //command
            $command = $connection->prepare(self::$select);

            //bind result
            $command->bind_result($store_id, $staff_fullname, $address, $district, $last_update);

            //execute command
            $command->execute();

            //read data
            while ($command->fetch()) {
                $list[] = array(
                    "store_id" => $store_id,
                    "staff_fullname" => $staff_fullname, 
                    "address" => $address,
                    "district" => $district, 
                    "last_update" => $last_update);
            }

            return $list;
        }
    }
}
