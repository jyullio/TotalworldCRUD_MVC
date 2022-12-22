<?php

    session_start();
    require("../model/database.php");

    
    if(isset($_POST["event"])){
        
        switch($_POST["event"]){


            case "back_to_form_search_add":

                unset($_SESSION["search_results"]);
                header("location: ../view/form_search_add.php");
                exit();

                break;

            case "search":

                $rows = database_select_by_name($_POST["city_name"]);

                if($rows){
                    $_SESSION["search_results"] = $rows;
                    header("location: ../view/form_update_delete.php");
                }else{
                    $_SESSION["flash_error_msg"] = "Cant find city!!!";
                    header("location: ../view/form_search_add.php");
                }

                exit();

                break;
            
            
            case "add":

                $err = database_insert($_POST["city_name"] , $_POST["country_code"] , $_POST["district"] , $_POST["population"]);

                if($err){
                    $_SESSION["flash_success_msg"] = "Success add city!!!";
                }else{
                    $_SESSION["flash_error_msg"] = "Error add city!!!";
                }

                header("Location: ../view/form_search_add.php");
                exit();

                break;

            case "delete":

                $err = database_delete_by_id($_POST["city_id"]);

                if($err){
                    $_SESSION["flash_success_msg"] = "Success delete city!!!";
                }else{
                    $_SESSION["flash_error_msg"] = "Error delete city!!!";
                }

                header("Location: ../view/form_search_add.php");
                exit();

                break;

            case "update":

                $err = database_update($_POST["city_id"] , $_POST["city_name"] , $_POST["country_code"] , $_POST["district"] , $_POST["population"]); 

                if($err){
                    $_SESSION["flash_success_msg"] = "Success updade city!!!";
                }else{
                    $_SESSION["flash_error_msg"] = "Error update city!!!";
                }

                header("location: ../view/form_search_add.php");
                exit();

                break;

            default:
                die("Something went wrong");

        }


    }else{
        die("Something went wrong");
    }



?>