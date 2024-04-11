<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php echo 'Rcipes';

    require_once("SmartCookClient.php");
    
    $request_data = [
        "attributes" => ["id", "name", "author"],
        "filter" => [
            "author" => ["Šeps Roman"],
        ]
    ];
    
    try {
        $data = (new SmartCookClient)
            ->setRequestData($request_data)
            ->sendRequest("recipes")
            ->getResponseData();
    } catch (Exception $e) {
        echo $e->getMessage();
    } 

    foreach($data["data"] as $key => $value) {
        echo "<li> ".$value["name"]." </li>";
    }
    ?>
     </h1>

    
</body>
</html>