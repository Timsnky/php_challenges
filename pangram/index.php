<?php


echo "<h3>Pangram 1</h3>";

$string = file_get_contents("doc2.txt");

$startTime = microtime(true);

$alphaString = preg_replace("/[^a-z]+/", "", strtolower($string));

$alphaArray = str_split($alphaString);

$uniqueArray = array_unique($alphaArray);

$count = count($uniqueArray);

echo '<p><strong>' . $count . ' characters</strong></p>';

if($count == 26)
{
    echo '<p><strong>String is a Pangram</strong></p>';
}
else
{
    echo '<p><strong>String not a Pangram</strong></p>';
}

$endTime = microtime(true);

echo '<p><strong>Total Time : ' . ($endTime - $startTime) . '</strong></p>';

echo "<h3>Pangram 2</h3>";

$string = file_get_contents("doc2.txt");

$startTime = microtime(true);

$alphaArray = str_split($string);

$alphas = range('a', 'z');

$newArray = array();

foreach ($alphaArray as $string)
{
    $string = strtolower($string);

    if(in_array($string, $alphas))
    {
        unset($string, $alphas);

        if(count($alphas) == 0)
        {
            echo '<p><strong>String is a Pangram</strong></p>';

            break;
        }
    }
}

if(count($alphas) > 0)
{
    echo '<p><strong>String is not a Pangram</strong></p>';
}

$endTime = microtime(true);

echo '<p><strong>Total Time  : ' . ($endTime - $startTime) . '</strong></p>';

?>