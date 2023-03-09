<?php
function toStrings($sentence){
    $censoredWords = array("", "ass", "fuck");
    $userSentence = explode(" ", $sentence);
    $newUserSentence="";
    foreach ($userSentence as $item) {
        if(array_search($item, $censoredWords)!= false){
            $newWord="";
          for ($i=0; $i<strlen($item); $i++){
            $newWord=$newWord."*";
          }
          $item=$newWord;
        }
        $newUserSentence = $newUserSentence." ".$item;
    }
        echo $newUserSentence;

}
toStrings("Zdanie do ocenzurowania");

?>