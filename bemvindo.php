<?php
 
// Convert Words (text) to Speech (MP3)
// ------------------------------------
 
// Google Translate API cannot handle strings > 100 characters
   $words = "Bem Vindo" . $_POST['user'] ;
    
// Replace the non-alphanumeric characters 
// The spaces in the sentence are replaced with the Plus symbol
   $words = urlencode($words);
 
// Name of the MP3 file generated using the MD5 hash
   $file  = md5($words);
  
// Save the MP3 file in this folder with the .mp3 extension 
   $file = "audio/" . $file . ".mp3";
   
// If the MP3 file exists, do not create a new request
   if (!file_exists($file)) {
     $mp3 = file_get_contents('http://translate.google.com/translate_tts?tl=pt&q=' . $words);
     file_put_contents($file, $mp3);
   }
?>
  

<audio  autoplay="autoplay">
  <source src=<?php echo $file ?> type="audio/mp3" />
</audio>