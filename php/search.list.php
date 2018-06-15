<?php
class ListSearch {
    private function contains($string, $substring) {
        return (stripos($string, $substring));
    }

    private function startsWith($string, $substring) {
        return (stripos($string, $substring) === 0); 
    }

    private function endsWith($string, $substring) {
        return (strripos($string, $substring) === (strlen($string) - strlen($substring) - 1));
    }

    public function searchTextList($listFile, $query, $option) {
        $wordlist = fopen($listFile, "r") or die ("Unable to open the word list file.");

        $foundWords = array();

        if ($option == "starts") {
            while (($word = fgets($wordlist)) !== false) {
                if ($this->startsWith($word, $query)) {
                    array_push($foundWords, $word);    
                }
            }
        } elseif ($option == "ends") {
            while (($word = fgets($wordlist)) !== false) {
                if ($this->endsWith($word, $query)) {
                    array_push($foundWords, $word);
                }
            }
        } else {
            while (($word = fgets($wordlist)) !== false) {
                if ($this->contains($word, $query)) {
                    array_push($foundWords, $word);
                }
            }    
        }

        fclose($wordlist);

        return $foundWords;
    }
}
?>