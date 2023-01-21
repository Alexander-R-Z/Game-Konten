<?php

// Rertieve the data from the database
// Somthing like this // $connection = new PDO("mysql:host=localhost;dbname=databaseName", "username", "password");

// Count the number of entries in the database
// Something like this // $count = $connection->query("SELECT COUNT(*) FROM tableName")->fetchColumn();
// maby use this to onlay count id // $count = $connection->query("SELECT COUNT(id) FROM tableName")->fetchColumn();

// dataGrid create defult one create new entry
// echo "<ul class="valoDataGrid">
//     <li class="create-new-entety"><form>...</form></li>";
//     for ($i = 0; $i < $count; $i++) { // create a li for each entry by $count
//         dataGrid create a li for each entry
//         <li class="create-new-entety"><form>...</form></li>"
//     }
// echo "</ul>";


// Should look like this

/*

$connection = new PDO("mysql:host=localhost;dbname=databaseName", "username", "password");
$count = $connection->query("SELECT COUNT(*) FROM tableName")->fetchColumn();

echo "<ul class=\"valoDataGrid\">
    <li class=\"create-new-entety\"><form>...</form></li>";
    for ($i = 0; $i < $count; $i++) {
        echo "<li class=\"create-new-entety\"><form>...</form></li>";
    }
echo "</ul>";

*/

// Then add the css to the page

/* CSS

ul.valoDataGrid{
    list-style: none;
    margin: 0;
    padding: 0;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    grid-gap: 1rem;
    display: grid;
}
ul < li < form{
    padding: 1rem;
    background: var(--background-color);
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

*/