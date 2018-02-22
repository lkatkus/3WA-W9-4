<?php
    class Calculator{

        public function __construct(){
            echo '====== Calculator ======';
        }

        public static function sum($var1, $var2){
            $result = $var1 + $var2;
            echo '<pre>';
            echo $var1.' + '.$var2.' = '.$result;
            echo '</pre>';
        }

        public static function subtract($var1, $var2){
            $result = $var1 - $var2;
            echo '<pre>';
            echo $var1.' - '.$var2.' = '.$result;
            echo '</pre>';
        }

        public static function multiply($var1, $var2){
            $result = $var1 * $var2;
            echo '<pre>';
            echo $var1.' * '.$var2.' = '.$result;
            echo '</pre>';
        }

        public static function divide($var1, $var2){
            $result = $var1 / $var2;
            echo '<pre>';
            echo $var1.' / '.$var2.' = '.$result;
            echo '</pre>';
        }
    }
?>
