<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

function pg_connection_string() {
  return "dbname=d2cda3df5m1lok host=ec2-107-20-244-39.compute-1.amazonaws.com port=5432 user=jmnbdtcvtrmijv password=tKVu4N2X
U3cdBPd46lNfOS2t7f sslmode=require";
}
 
# Establish db connection
$db = pg_connect(pg_connection_string());
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    console.log("Connection Establised");
}

$query = "SELECT ID FROM interactions";
$result = mysqli_query($dbConnection, $query);

if(empty($result)) {
                $query = "CREATE TABLE interactions (
                          ID int(11) AUTO_INCREMENT,
                          query varchar(500) NOT NULL,
                          response varchar(500) NOT NULL,
                          responsePerception varchar(50),
                          date DATE
                          )";
                $result = mysqli_query($dbConnection, $query);
}


try {
    $db2 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $db2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $db2->prepare("SELECT ID, query, response, responsePerception, date FROM interactions"); 
    $stmt->execute();

    // set the resulting array to associative
    $result2 = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>