<?php
//apicity
include ("models/store.php");
class apiStore{
    public function storeAll(){
        $stores = Store::get();
        $json = json_encode($stores);
        print_r($json);
        $archivo="stores.json";
        file_put_contents($archivo,$json);
    }
}
?>