<?php

    function database_create_connection(){

        $host = "localhost";
        $user = "root";
        $database = "world";
        $password = "";

        $dns = "mysql:host={$host};dbname={$database}";
        $pdo = new PDO($dns , $user , $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

        return $pdo;

    }

    function database_select_by_name($city_name){

        $pdo = database_create_connection();

        $data_placeholder = [
            "city_name" => $city_name,
        ];

        $stmt = $pdo -> prepare("SELECT ID , Name , CountryCode , District , Population FROM city WHERE Name = :city_name");
        $stmt -> execute($data_placeholder);
        $rows = $stmt -> fetchAll();

        return $rows;

    }

    function database_id_exists_in_city_table($pdo , $city_id){

        $data_placeholder = [
            "city_id" => $city_id,
        ];

        $stmt = $pdo -> prepare("SELECT * FROM city WHERE ID = :city_id");
        $stmt -> execute($data_placeholder);
        $qtd_rows = $stmt -> rowCount();
        if($qtd_rows === 0)
            return false;

        return true;

    }

    function database_delete_by_id($city_id){

        $pdo = database_create_connection();
        
        $data_placeholder =[
            "city_id" => $city_id,
        ];

        //check if exists any city with this id in the city table inside DATABASE
        if(!database_id_exists_in_city_table($pdo , $city_id)){
            return false;
        }
        
        $stmt = $pdo -> prepare("DELETE FROM city WHERE ID = :city_id");
        $stmt -> execute($data_placeholder);
        
        return true;
        
    }


    function database_country_code_exists_in_country_table($pdo , $country_code){

        $data_placeholder = [
            "country_code" => $country_code,
        ];

        $stmt = $pdo -> prepare("SELECT * FROM country WHERE Code = :country_code");
        $stmt -> execute($data_placeholder);
        $qtd_rows = $stmt -> rowCount();
        if($qtd_rows === 0)
            return false;

        return true;
    }

    function database_insert($city_name , $country_code , $district , $population){
        
        $pdo = database_create_connection();

        //check if exists any country with this code in the country table inside DATABASE
        if(!database_country_code_exists_in_country_table($pdo , $country_code)){
            return false;
        }

        $data_placeholder = [
            "city_name" => $city_name,
            "country_code" => $country_code,
            "district" => $district,
            "population" => $population,
        ];

        $stmt = $pdo -> prepare("INSERT INTO city (Name,CountryCode,District,Population) VALUES (:city_name , :country_code , :district , :population)");
        $stmt -> execute($data_placeholder);

        return true;
        
    }

    function database_update($city_id , $city_name , $country_code , $district , $population){

        $pdo = database_create_connection();

        //check if exists any country with this code in the country table inside DATABASE
        if(!database_country_code_exists_in_country_table($pdo , $country_code)){
            return false;
        }

        $data_placeholder = [
            "city_id" => $city_id,
            "city_name" => $city_name,
            "country_code" => $country_code,
            "district" => $district,
            "population" => $population,
        ];
 
        $stmt = $pdo -> prepare("UPDATE city SET Name = :city_name , CountryCode = :country_code , District = :district , Population = :population WHERE ID = :city_id");
        $stmt -> execute($data_placeholder);

        return true;

    }
    

?>


