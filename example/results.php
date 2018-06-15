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

    $resultArray = $ListSearch->searchTextList($wordListFile, $query, $opt);
?>
<html>
<head>
    <title>Results</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>  
    <div id="result-info">Found <?php echo count($resultArray); ?> results.</div>
    <div id="result-container">
<?php
    foreach ($resultArray as $result) {
        echo '<div class="item">'.str_replace($query, "<b>$query</b>", $result).'</div>';
    }
?>
    </div>
</body>
</html>
