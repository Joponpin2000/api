<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once '../objects/category.php';

// instantiate database and product object
$database = new DatabaseClass();
$db = $database->getConnection();

// initialize object
$product = new Category($db);

//query categories
$stmt = $category->read();
$num = $stmt->rowCount();

//check if more than 0 record found
if ($num > 0)
{
    //categories array
    $categories_arr = array();
    $categories_arr["records"] = array();

    // retreive our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        // extract row
        // this will make $row['name] to be $name
        extract($row);

        $category_item = array(
            "id" => $id,
            "name" => $name,
            "created_at" => $created_at
        );

        array_push($categories_arr["records"], $category_item);
    }
    // set response code - 200 OK
    http_response_code(200);

    // show categories data in json format
    echo json_encode($categories_arr);
}
else
{
    // set response code - 404 Not Found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(array("message" => "No categories found."));
}
?>