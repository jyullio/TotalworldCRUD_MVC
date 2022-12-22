<?php
    session_start();
    if(!isset($_SESSION["search_results"])){
        die("Something went wrong");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app.css">
    <title>Update / Delete</title>
</head>
<body>
    
    <header>
        <h1>Total World CRUD</h1>

        <h2>Results</h2>

        
        <?php foreach($_SESSION["search_results"] as $row){?>

            <form action="../controllers/process_form.php" method="post">
                
                <input type="hidden" name="city_id" value="<?= $row["ID"]?>">

                <label for="city_name">City name:</label>
                <input type="text" name="city_name" id="city_name" value="<?= htmlentities($row["Name"])?>">

                <label for="country_code">Country code:</label>
                <input type="text" name="country_code" id="country_code" value="<?= htmlentities($row["CountryCode"])?>">

                <label for="district">District:</label>
                <input type="text" name="district" id="district" value="<?= htmlentities($row["District"])?>">

                <label for="population">Population:</label>
                <input type="text" name="population" id="population" value="<?= htmlentities($row["Population"])?>">

                <button class="btn_update" type="submit" name="event" value="update">Update</button>
                
            </form>


            <form action="../controllers/process_form.php" method="post">

                <input type="hidden" name="city_id" value="<?= $row["ID"]?>">
                <button class="btn_delete" type="submit" name="event" value="delete">Delete</button>
            </form>

        <?php } ?>


        <footer>
            <form action="../controllers/process_form.php" method="post">
                <button class="btn_back" type="submit" name="event" value="back_to_form_search_add">Back</button>
            </form>
        </footer>
        

    </header>

</body>
</html>