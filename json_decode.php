<?php
$archivo = file_get_contents("http://localhost/2025/4Bweb2025/tarea_json/stores.json");
$data = json_decode($archivo,true);
//style
echo "<style>
    * {
        font-family: Arial, sans-serif;
    }
    label {
        font-size: 18px;
        font-weight: bold;
        margin: 20px;
        display: block;
        text-align: center;
    }
    table {
        width: 80%;
        border-collapse: collapse;
        margin: 20px auto;
        font-family: Arial, sans-serif;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }
    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }
</style>";

//cantidad del array
$cantidad = count($data);
echo "<label>Total de Items en DATA: ". $cantidad."</label>";

//iteracion con key-value
echo "<table><tr>";
foreach ($data as $item) {
    foreach ($item as $key => $value) {
        echo "<td>".$key."</td>";
    }
    break;
}
echo "</tr>";

foreach ($data as $item) {
    echo "<tr>";
    foreach ($item as $key => $value) {
        //echo $key." = ".$value."<br>";
        echo "<td>".$value."</td>";
    }
    echo "</tr>";
}

?>