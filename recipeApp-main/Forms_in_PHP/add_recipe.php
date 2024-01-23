<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $name = $_POST['name'];
        $description = $_POST['description'];
        $ingredients = $_POST['ingredients'];
        $steps = $_POST['steps'];

        $query = "INSERT INTO recipes (name, description, ingredients, steps) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->execute([$name, $description, $ingredients, $steps]);

        header("Location: index.php");
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    } finally {
        $conn = null;
    }
}
?>
