<?php
session_start();
if(!isset($_SESSION['token']) && $_SESSION['token']!=="2297464fb85e872966df3e851d427db0"){
    header('Location: index.php');
    exit;
}else{
    require('api.php');
}
$response=str_replace(["[", "]", "},{"], ["", "", "}@{"], $response);
$breweries=explode("@", $response);
$breweriesList=[];
foreach($breweries as $brewery){
    array_push($breweriesList, json_decode($brewery, true));
}
?>

<h1 class="text-center p-3">Breweries List</h1>
<div class="table-responsive p-3 mt-4">
    <table class="table table-borderless table-hover">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Location</th>
                <th scope="col">Phone</th>
                <th scope="col">Website</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($breweriesList as $k=>$v){
                    $type=strtoupper($v['brewery_type']);
                    $location=$v['street'].", ".$v['city'].", ".$v['state'].", ".$v['postal_code'].", ".$v['country'];
                    $website=$v['website_url'];
                    echo "<tr>
                            <td>{$v['name']}</td>
                            <td>$type</td>
                            <td>$location</td>
                            <td>{$v['phone']}</td>
                            <td><a href='$website' target='_blank'>$website</a></td>
                        </tr>";
                }
            ?>
        </tbody>
    </table>
</div>
