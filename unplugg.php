

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>The HTML5 Herald</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="css/styles.css?v=1.0">
  <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
  <style>
    .card {
      display: inline-block;
      height: 350px;
      width: 350px;
      margin: 2%;
    }
    html, body, .grid-container { height: 100%; margin: 0; }

.grid-container {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-template-rows: 1fr 1fr 1fr 1fr;
  gap: 10px 10px;
}

img {
height: 100%;
width: 100%;
}

/* For presentation only, no need to copy the code below */
.grid-container * { 
 position: relative;
}

.grid-container *:after { 
 position: absolute;
 top: 0;
 left: 0;
}
  </style>

</head>

<body>

<?php 
 // <img src="data:image/jpeg;base64,'.<?php $imageData .'">

$curl = curl_init();
$json = (file_get_contents("https://api.unsplash.com/photos/random?count=10&client_id=_RERrRDtVYxvlfrE2DSWoHA0Onfi58pjAS9jd_cpQ1M"));



// set our url with curl_setopt()
//$response = file_get_contents('https://api.unsplash.com/photos/random?count=10&client_id=_RERrRDtVYxvlfrE2DSWoHA0Onfi58pjAS9jd_cpQ1M');


$response = json_decode($json);

?>

<div>
<?php 

//print gettype($response); ?>

</div>

<div class="grid-container">
<?php 
for ($x = 0; $x < 10; $x++) {
  $raw= $response[$x]->{'urls'}->{'small'};
  $imageData = base64_encode(file_get_contents($raw)); ?>
<?php
    echo '<div class="card" onclick="removeImage()"><img src="data:image/jpeg;base64,'.$imageData.'"></div>';

    ?>


<?php } ?>
</div>
  <script >
$(".card").on("click",function(){
  $(this).remove();
});
function remove(){

}
</script>
</body>
</html>


