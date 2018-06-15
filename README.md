# Substring Search
Performs a case-insensitive search for words within a text file that contain, start with, or end with a specified substring.

## Use

### The word list file
The words list file should be a plaintext file with a single word per line.

### Including within your project

To use, you must first include the **_search.list.php_** file within your project's code.
```php
require "./php/search.list.php";  
$ListSearch = new ListSearch();
```

You can then call the **_searchTextList()_** function to return an array of results containing a particular substring like so.

```php
$listFileLocation = "./example/words.txt";
$substring = "xy";

// An array of results that contained "xy".
$resultArray = $ListSearch->searchTextList($listFileLocation, $substring);
```

Where
* **_$listFileLocation_** is the path to the file containing the list of words.
* **_$substring_** is the substring you're looking for within each of the words contained within the word list file.

You may also specify whether or not you'd like to limit results to words that either _contain_, _start_, or _end_ with the substring.
```php
// An array of results that contain the specified substring (default).
$resultArray = $ListSearch->searchTextList($listFileLocation, $substring, "contains");

// An array of results that start with the specified substring.
$resultArray = $ListSearch->searchTextList($listFileLocation, $substring, "starts");

// An array of results that end with the specified substring.
$resultArray = $ListSearch->searchTextList($listFileLocation, $substring, "ends");
```

## Author
* **Mathew Norman** - *Initial Development* - [TheMathewNorman](https://github.com/TheMathewNorman)

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
