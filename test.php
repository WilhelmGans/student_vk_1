<?php
require 'TimeToWordConvertingInterface.php';
require 'TimeToWordConverter.php';

$timeWord = new TimeToWordConverter();

/**
 * @param int $hours
 * @param int $minutes
 * @param string $text
 * @param TimeToWordConverter $timeWord
 * @return string
 */
function test(int $hours, int $minutes, string $text, TimeToWordConverter $timeWord): string {
    if ($timeWord->convert($hours, $minutes) === $text) {
        $res = "YES <br>";
    } else {
        $res = "NO $text !== {$timeWord->convert($hours, $minutes)} <br>";
    }

    return $res;
}


var_dump(test(7, 0, 'Семь часов.', $timeWord));
var_dump(test(7, 1, 'Одна минута после семи.', $timeWord));
var_dump(test(7, 3, 'Три минуты после семи.', $timeWord));
var_dump(test(7, 12, 'Двенадцать минут после семи.', $timeWord));
var_dump(test(7, 15, 'Четверть восьмого.', $timeWord));
var_dump(test(7, 22, 'Двадцать две минуты после семи.', $timeWord));
var_dump(test(7, 30, 'Половина восьмого.', $timeWord));
var_dump(test(7,  35, 'Двадцать пять минут до восьми.', $timeWord));
var_dump(test(7, 41, 'Девятнадцать минут до восьми.', $timeWord));
var_dump(test(7, 56, 'Четыре минуты до восьми.', $timeWord));
var_dump(test(7, 59, 'Одна минута до восьми.', $timeWord));

var_dump(test(12, 1, 'Одна минута после двенадцати.', $timeWord));
var_dump(test(11, 59, 'Одна минута до двенадцати.', $timeWord));
var_dump(test(3, 40, 'Двадцать минут до четырёх.', $timeWord));
var_dump(test(2, 14, 'Четырнадцать минут после двух.', $timeWord));
var_dump(test(12, 30, 'Половина первого.', $timeWord));
var_dump(test(12, 31, 'Двадцать девять минут до часа.', $timeWord));


//var_dump($timeWord->convert(1, 0));
//var_dump($timeWord->convert(2, 0));
//var_dump($timeWord->convert(3, 0));
//var_dump($timeWord->convert(4, 0));
//var_dump($timeWord->convert(5, 0));
//var_dump($timeWord->convert(6, 0));
//var_dump($timeWord->convert(7, 0));
//var_dump($timeWord->convert(8, 0));
//var_dump($timeWord->convert(9, 0));
//var_dump($timeWord->convert(10, 0));
//var_dump($timeWord->convert(11, 0));
//var_dump($timeWord->convert(12, 0));
//var_dump($timeWord->convert(1, 15));
//var_dump($timeWord->convert(2, 15));
//var_dump($timeWord->convert(3, 15));
//var_dump($timeWord->convert(4, 15));
//var_dump($timeWord->convert(5, 15));
//var_dump($timeWord->convert(6, 15));
//var_dump($timeWord->convert(7, 15));
//var_dump($timeWord->convert(8, 15));
//var_dump($timeWord->convert(9, 15));
//var_dump($timeWord->convert(10, 15));
//var_dump($timeWord->convert(11, 15));
//var_dump($timeWord->convert(12, 15));
//var_dump("                              <br>");
//
//var_dump($timeWord->convert(1, 21));
//var_dump($timeWord->convert(2, 26));
//var_dump($timeWord->convert(3, 22));
//var_dump($timeWord->convert(4, 23));
//var_dump($timeWord->convert(5, 24));
//var_dump($timeWord->convert(6, 25));
//var_dump($timeWord->convert(7, 26));
//var_dump($timeWord->convert(7, 27));
//var_dump($timeWord->convert(8, 28));
//var_dump($timeWord->convert(9, 29));
//var_dump($timeWord->convert(10, 21));
//var_dump($timeWord->convert(11, 21));
//var_dump($timeWord->convert(12, 22));
//var_dump($timeWord->convert(7, 23));
//var_dump($timeWord->convert(1, 24));
//var_dump($timeWord->convert(5, 25));
//var_dump($timeWord->convert(6, 26));
//var_dump($timeWord->convert(1, 27));
//var_dump($timeWord->convert(5, 28));
//var_dump($timeWord->convert(1, 29));
//
//var_dump("                              <br>");
//var_dump("                              <br>");
//
//var_dump($timeWord->convert(1, 1));
//var_dump($timeWord->convert(2, 15));
//var_dump($timeWord->convert(3, 2));
//var_dump($timeWord->convert(4, 3));
//var_dump($timeWord->convert(5, 4));
//var_dump($timeWord->convert(6, 5));
//var_dump($timeWord->convert(7, 6));
//var_dump($timeWord->convert(7, 7));
//var_dump($timeWord->convert(8, 8));
//var_dump($timeWord->convert(9, 9));
//var_dump($timeWord->convert(10, 10));
//var_dump($timeWord->convert(11, 11));
//var_dump($timeWord->convert(12, 12));
//var_dump($timeWord->convert(7, 13));
//var_dump($timeWord->convert(1, 14));
//var_dump($timeWord->convert(5, 15));
//var_dump($timeWord->convert(6, 16));
//var_dump($timeWord->convert(1, 17));
//var_dump($timeWord->convert(5, 18));
//var_dump($timeWord->convert(1, 19));
//
//
//var_dump("                              <br>");
//var_dump("                              <br>");
//
//var_dump($timeWord->convert(1, 31));
//var_dump($timeWord->convert(2, 32));
//var_dump($timeWord->convert(3, 33));
//var_dump($timeWord->convert(4, 34));
//var_dump($timeWord->convert(5,  35));
//var_dump($timeWord->convert(6, 36));
//var_dump($timeWord->convert(7, 37));
//var_dump($timeWord->convert(7, 38));
//var_dump($timeWord->convert(8, 39));
//var_dump($timeWord->convert(9, 40));
//var_dump($timeWord->convert(10, 41));
//var_dump($timeWord->convert(11, 42));
//var_dump($timeWord->convert(12, 43));
//var_dump($timeWord->convert(7, 44));
//var_dump($timeWord->convert(1, 45));
//var_dump($timeWord->convert(5, 46));
//var_dump($timeWord->convert(6, 47));
//var_dump($timeWord->convert(1, 48));
//var_dump($timeWord->convert(5, 49));
//var_dump($timeWord->convert(0, 50));
//var_dump($timeWord->convert(10, 51));
//var_dump($timeWord->convert(11, 52));
//var_dump($timeWord->convert(12, 53));
//var_dump($timeWord->convert(7, 54));
//var_dump($timeWord->convert(1, 55));
//var_dump($timeWord->convert(5, 56));
//var_dump($timeWord->convert(6, 57));
//var_dump($timeWord->convert(1, 58));
//var_dump($timeWord->convert(5, 59));
//
//
//var_dump("                              <br>");
//var_dump("                              <br>");
//
//var_dump($timeWord->convert(1, 30));
//var_dump($timeWord->convert(2, 30));
//var_dump($timeWord->convert(3, 30));
//var_dump($timeWord->convert(4, 30));
//var_dump($timeWord->convert(5,  30));
//var_dump($timeWord->convert(6, 30));
//var_dump($timeWord->convert(7, 30));
//var_dump($timeWord->convert(7, 30));
//var_dump($timeWord->convert(8, 30));
//var_dump($timeWord->convert(9, 30));
//var_dump($timeWord->convert(10, 30));
//var_dump($timeWord->convert(11, 30));
//var_dump($timeWord->convert(12, 30));
//
//
//
//
//
//
//
//
//
//
//
