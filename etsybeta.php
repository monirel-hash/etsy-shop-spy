<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Etsy store products</title>
</head><body>
<div class="container">
<form method="GET">
  Store Name: <input type="text" name="store" class="form-control" required><br>
  Api: <input type="text" name="api_key" class="form-control" value="zublyz5809xxjsn532qsiqx5" required><br>
  <input type="submit" value="Submit" name="submit">
</form> 
</div>
<?php
if (isset($_GET['submit'])) {

if (empty($_GET["store"]) || empty($_GET["api_key"])) {
echo "Please enter valid store name and api key";
exit();
}

$r = file_get_contents(sprintf('https://openapi.etsy.com/v2/shops/%s?includes=Listings:active&api_key=%s', $_GET["store"], $_GET["api_key"]));
$data = json_decode($r, true);

if(http_response_code() == 403){
echo "API key not authorized";
exit();
}

$Shop_Name = $data['results'][0]['shop_name'];
$Shop_creation = date('d-m-Y', time() - $data['results'][0]['creation_tsz']);

$r = file_get_contents(sprintf('https://openapi.etsy.com/v2/shops/%s/listings/active?&limit=100&api_key=%s', $_GET["store"], $_GET["api_key"]));
$data = json_decode($r, true);

echo "Always Drink Water !! " . PHP_EOL;

echo "<br>Shop Name: " . $Shop_Name ;
echo "<br>Shop Creation: " . $Shop_creation ;

echo "<table class='table table-bordered'>";
echo "<tr>";
echo "<th>Title</th>";
echo "<th>Images</th>";
echo "<th>Price</th>";
echo "<th>Quantity</th>";
echo "<th>Views</th>";
echo "<th>Favorites</th>";
echo "<th>Creation Date</th>";
echo "<th>Tags</th>";
echo "</tr>";


foreach ($data['results'] as $i) {
    $images_r = file_get_contents(sprintf('https://openapi.etsy.com/v2/listings/%s/images/?api_key=%s', $i['listing_id'], $_GET["api_key"]));
    $images_data = json_decode($images_r, true);
    echo "<tr>";
    echo "<td><a href='" . $i['url'] . "'>" . $i['title'] . "</a></td>";
    echo "<td>";
    foreach ($images_data['results'] as $img) {
        echo "<img src='" . $img['url_fullxfull'] . "' width='50' height='50'>";
        break;}
    echo "</td>";
    echo "<td>" . $i['price'] . "</td>";
    echo "<td>" . $i['quantity'] . "</td>";
    echo "<td>" . $i['views'] . "</td>";
    echo "<td>" . $i['num_favorers'] . "</td>";
    echo "<td>" . date('d-m-Y', $i['original_creation_tsz']) . "</td>";
    echo "<td>" . implode(',', $i['tags']) . "</td>";
    echo "</tr>";
}
echo "</table>";

}

    ?>
    
    </body>
    </html>