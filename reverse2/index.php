<?php

echo "<h3>File Reversal</h3>";

$startTime = microtime(true);

$string = file_get_contents("doc.txt");

$stringArray = explode(' ',$string);

$newString = "";

for ($i = count($stringArray) - 1; $i >= 0; $i --)
{
    $newString .= $stringArray[$i];
    $newString .= " ";
}

echo '<p>' . $newString . '</p>';

$endTime = microtime(true);

echo '<p><strong>Total Time : ' . ($endTime - $startTime) . '</strong></p>';

?>