<?php
class HitChecker
{

    private static $REC_A1 = 0;
    private static $REC_A2 = 0.5;
    private static $REC_B1 = 0;
    private static $REC_B2 = -1;

    private static $RAD = 0.5;

    private static $TRIANGLE_Y = 0;
    private static $TRIANGLE_X = 0;
    private static $TRIANGLE_B = 1;
 
    public function check($x, $y, $r) {
        return ($this->check_if_in_triangle($x, $y, $r) || $this->check_if_in_quarter_of_circle($x, $y, $r) || $this->check_if_in_rectangle($x, $y, $r)) ? "TRUE" : "FALSE";
    }

    private function check_if_in_triangle($x, $y, $r) {
        return $x <= self::$TRIANGLE_X && $y >= self::$TRIANGLE_Y && ($y - $x - $r * self::$TRIANGLE_B) <= 0;
    }

    private function check_if_in_quarter_of_circle($x, $y, $r) {
        return $x <= 0 && $y <= 0 && (pow($x, 2) + pow($y, 2) <= pow($r * self::$RAD, 2));
    }

    private function check_if_in_rectangle($x, $y, $r) {
        return $x >= self::$REC_A1 * $r && $x <= self::$REC_A2 * $r && $y >= self::$REC_B2 * $r && $y <= self::$REC_B1 * $r;
    }
}
?>