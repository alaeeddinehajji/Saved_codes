
<?php {
    $servername = "localhost";
    $username = "u999326062_test";
    $password = "Ryples@123";
    $database = "u999326062_test";
    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
}

// method 1 by function
$sql = "SELECT * FROM tasks";
$result = mysqli_query($connection, $sql);
echo "<br> Result (by methode 1): <br>";
echo var_dump($result);
echo "<br>";
echo "<br>";

echo "row by row:";
if (mysqli_num_rows($result) > 0) {
    foreach ($result as $row) {
        echo "<br>element:<br>";
        echo var_dump($row);
    }
} else {
    echo "empty rows";
}

echo "<br><br>______________<br>";
//  method 2 by class
$sql = "SELECT * FROM tasks";
$result = $connection->query($sql);
echo "<br> Result (by methode 2): <br>";
echo var_dump($result);
echo "<br>";
echo "<br>";

/** 
 * MYSQLI_ASSOC, MYSQLI_NUM, or MYSQLI_BOTH.
 */
$rows = $result->fetch_all(MYSQLI_ASSOC);

echo "row by row:";
if (mysqli_num_rows($result) > 0) {
    foreach ($rows as $row) {
        echo "<br>element:<br>";
        echo var_dump($row);
    }
} else {
    echo "empty rows";
}

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br> Result after fetch_all(MYSQLI_ASSOC): <br>";
$result = $connection->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
echo var_dump($rows);
echo "<br>";
echo "<br>";
echo "<br> Result after fetch_all(MYSQLI_NUM): <br>";
$result = $connection->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
echo var_dump($rows);
echo "<br>";
echo "<br>";
echo "<br> Result after fetch_all(MYSQLI_BOTH): <br>";
$result = $connection->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
echo var_dump($rows);
echo "<br>";
echo "<br>";
echo "<br> Result after to fetch object: <br>";
if ($result = $connection->query($sql)) {
    while ($obj = $result->fetch_object()) {
        echo "<br>";
        var_dump($obj);
        printf("%s (%s)\n", $obj->ID, $obj->task);
    }
    $result->free_result();
}
