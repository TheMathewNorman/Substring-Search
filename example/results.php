<?php
$wordListFile = "./files/words.txt";

require "../php/search.list.php";
$ListSearch = new ListSearch();

if (isset($_GET['q']) && isset($_GET['show'])) {
    $query = strtolower($_GET['q']);
    $opt = $_GET['show'];
} else {
    header("Location: index.html");
}
?>
<html>
<head>
    <title>Results</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>  
    <div id="container">
<?php
    foreach ($ListSearch->searchTextList($wordListFile, $query, $opt) as $result) {
        echo '<div class="item">'.str_replace($query, "<b>$query</b>", $result).'</div>';
    }
?>
    </div>
</body>
</html>
