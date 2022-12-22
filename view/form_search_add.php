<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read / Insert</title>
    <link rel="stylesheet" href="app.css">
    

</head>
<body>
    
    <header>
        <h1>Total World CRUD</h1>
    </header>

    <main>
        

        <?php
            
            if(isset($_SESSION["flash_error_msg"])){
                echo '<p style="color:red;margin:0">' . $_SESSION["flash_error_msg"] . '</p>';
                unset($_SESSION["flash_error_msg"]);
            }

            if(isset($_SESSION["flash_success_msg"])){
                echo '<p style="color:green;margin:0">' . $_SESSION["flash_success_msg"] . '</p>';
                unset($_SESSION["flash_success_msg"]);
            }
            
        ?>

        <h2>Read data</h2>

        <form action="../controllers/process_form.php" method="POST">

            <label for="city_name">City name:</label>
            <input type="text" name="city_name" id="city_name">
            
            <button type="submit" name="event" value="search">Search</button>

        </form>

        
        <h2>Insert data</h2>
        <form action="../controllers/process_form.php" method="POST">

            
            <label for="city_name">City name:</label>
            <input type="text" name="city_name" id="city_name">
            
            <label for="country_code">Country Code:</label>
            <input type="text" name="country_code" id="country_code">

            <label for="district">District:</label>
            <input type="text" name="district" id="district">

            <label for="population">Population:</label>
            <input type="text" name="population" id="population">

            <button type="submit" name="event" value="add">Add</button>

        </form>
        

    </main>

</body>
</html>