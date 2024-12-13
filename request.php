<?php 

$todo_name = $_POST['todo'];

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
     $sql = "INSERT INTO `todo_list`(`id`, `todo`) VALUES (null,:todoname)";
    
     // Prepare statement
     $stmt = $pdo->prepare($sql);
 
     // Bind parameters to statement (optional, but recommended)
     $stmt->bindParam('todoname', $todo_name, PDO::PARAM_STR);
     
     // Execute the statement
     $stmt->execute();

     header('Location: index.php');


}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();  // Error message if connection fails
}
?>
