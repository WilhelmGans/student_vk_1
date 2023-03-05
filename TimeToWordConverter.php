<?php

class TimeToWordConverter implements TimeToWordConvertingInterface
{
    private const NUMBERS = array(
        1 => array('один', 'первого', 'часа', 'одна'),
        2 => array('два', 'второго', 'двух', 'две'),
        3 => array('три', 'третьего' ,'трёх'),
        4 => array('четыре', 'четвертого', 'четырёх'),
        5 => array('пять', 'пятого', 'пяти'),
        6 => array('шесть', 'шестого', 'шести'),
        7 => array('семь', 'седьмого', 'семи'),
        8 => array('восемь', 'восьмого', 'восьми'),
        9 => array('девять', 'девятого', 'десяти'),
        10 => array('десять', 'десятого', 'десяти'),
        11 => array('одиннадцать', 'одиннадцатого', 'одиннадцати'),
        12 => array('двенадцать', 'двенадцатого', 'двенадцати'),
        13 => array('тринадцать'),
        14 => array('четырнадцать'),
        15 => array('пятнадцать'),
        16 => array('шестнадцать'),
        17 => array('семнадцать'),
        18 => array('восемнадцать'),
        19 => array('девятнадцать'),
        20 => array('двадцать'),
        30 => array('тридцать'),
    );

    private const HOUR_RU = array('час', 'часа', 'часов');

    private const MINUTE_RU = array('минута', 'минуты', 'минут');

    private const TIME_PAST = 0;
    private const TIME_TO = 1;

    /**
     * @param int $hours
     * @param int $minutes
     * @return string
     */
    public function convert(int $hours, int $minutes): string
    {
        if ($minutes > 30) {
            $str = $this->minutesPeriodRu($hours, $minutes, self::TIME_TO);
        } elseif ($minutes < 30) {
            if ($minutes === 0) {
                $str = sprintf('%s %s', self::NUMBERS[$hours][0], $this->periodRu($hours, self::HOUR_RU));
            } elseif ($minutes === 15) {
                $nextHour = $hours === 12 ? 1 : $hours + 1;
                $str = sprintf('четверть %s', self::NUMBERS[$nextHour][1] ?? self::NUMBERS[$nextHour][0]);
            } else {
                $str = $this->minutesPeriodRu($hours, $minutes, self::TIME_PAST);
            }
        } else {
            $nextHour = $hours === 12 ? 1 : $hours + 1;

            $str = 'половина ' . self::NUMBERS[$nextHour][1] ?? self::NUMBERS[$nextHour][0];
        }

        $str .= '.';
        $char = mb_strtoupper(substr($str,0,2), "utf-8");
        $str[0] = $char[0];
        $str[1] = $char[1];

        return $str;
    }

    /**
     * @param int $hours
     * @param int $minutes
     * @param int $half
     * @return string
     */
    private function minutesPeriodRu(int $hours, int $minutes, int $half): string
    {
        $halfRu = '';

        if ($half === self::TIME_PAST) {
            $halfRu = 'после';
        } elseif ($half === self::TIME_TO) {
            $halfRu = 'до';
            $minutes = 60 - $minutes;
            $hours = $hours === 12 ? 1 : $hours + 1;
        }

        if ($minutes > 20) {
            $unit = $minutes % 10;
            $decimal = intdiv($minutes, 10) * 10;
            $minutesRu = self::NUMBERS[$decimal][0] . ' ' . (self::NUMBERS[$unit][3] ?? self::NUMBERS[$unit][0]);
        } else {
            $minutesRu = self::NUMBERS[$minutes][3] ?? self::NUMBERS[$minutes][0];
        }

        return sprintf(
            '%s %s %s %s',
            $minutesRu,
            $this->periodRu($minutes, self::MINUTE_RU),
            $halfRu,
            self::NUMBERS[$hours][2]
        );
    }

    /**
     * @param int $number
     * @param array $words
     * @return string
     */
    public function periodRu(int $number, array $words): string
    {
        $last = $number % 10;

        if($number === 1 || ($last === 1 && $number > 20)) {
            $name = $words[0];
        } elseif(($number >= 2 && $number <= 4) || ($last >= 2 && $last <= 4 && $number > 20)) {
            $name = $words[1];
        } else {
            $name = $words[2];
        }

        return $name;
    }
}