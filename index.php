<!--  CODE FOR STUDENT --> 

<form action='request.php' method='POST'>
<input name='todo'>
<input type='submit'>
</form> 
<?php 
$host = 'localhost';      // Database host
$dbname = 'todo_db';  // Your database name
$username = 'root';  // Your MySQL username
$password = '';  // Your MySQL password

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
     // Prepare SQL statement with placeholders
     $sql = "select * from todo_list";
    
     // Prepare statement
     $stmt = $pdo->prepare($sql);
 
     // Execute the statement
     $result = $stmt->execute();

        $result = $stmt->fetchAll();
        
?>
<table>
    <tr>
        <th>Sn</th>
        <th>Todo</th>
    </tr>

<?php

    $i=1;
        foreach($result as $row){
                echo "<tr><td>".$i++."</td><td>".$row['todo']."</td><td><a href='delete.php?id=".$row['id']."' >X</a></td></tr>";
        }

}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();  // Error message if connection fails
}

?>