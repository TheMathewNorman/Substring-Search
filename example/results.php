<?php
    // Specify the location of the word list file.
    $wordListFile = "./files/words.txt";

    // Include the search.list.php file.
    require "../php/search.list.php";
    $ListSearch = new ListSearch();

    if (!isset($_GET['q']) || !isset($_GET['show'])) {        
        header("Location: index.html");
    }

    // Specify the search query (substring) value to look.
    $query = strtolower($_GET['q']);
    
    // Specify the option for the results.
    $option = $_GET['show'];

    // Run the searchTextList function.
    $resultArray = $ListSearch->searchTextList($wordListFile, $query, $option);
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
    // Iterate through, and display/process the results.
    foreach ($resultArray as $result) {
        echo '<div class="item">'.str_replace($query, "<b>$query</b>", $result).'</div>';
    }
?>
    </div>
</body>
</html>
