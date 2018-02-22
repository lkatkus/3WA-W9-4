<?php
    class Program{

        public function __construct(){
            echo '<pre>';
            echo 'Class outputs this text :)';
            echo '</pre>';
        }

        public function outputName($name){
            echo '<pre>';
            echo '====== outputName ======';
            echo '</pre>';

            if($name){
                echo '<pre>';
                echo 'Hello my name is '.$name;
                echo '</pre>';
            }else{
                echo '<pre>';
                echo 'Please enter your name';
                echo '</pre>';
            }

        }

        public function outputFactorial($number){
            echo '<pre>';
            echo '====== outputFactorial ======';
            echo '</pre>';

            if($number){
                $result = 1;
                echo '<pre>';

                    for($i = 0; $number > 0; $i++){
                        echo $number;
                        if($number > 1){
                            echo ' * ';
                        }
                        $result *= $number;
                        $number--;
                    }
                    echo ' = '.$result;

                echo '</pre>';

            }else{
                echo '<pre>';
                echo 'Please enter a number';
                echo '</pre>';
            }

        }

        public function outputArray($array){
            echo '<pre>';
            echo '====== outputArray ======';
            echo '</pre>';

            if($array){
                echo '<pre>';
                echo 'Unsorted Array ';
                for($i = 0; $i < sizeof($array); $i++){
                    echo $array[$i].' ';
                }
                var_dump($array);
                echo '</pre>';

                echo '<pre>';
                sort($array);
                echo 'Sorted Array ';
                for($i = 0; $i < sizeof($array); $i++){
                    echo $array[$i].' ';
                }
                var_dump($array);
                echo '</pre>';
            }else{
                echo '<pre>';
                echo 'Please enter an array';
                echo '</pre>';
            }

        }

        public function outputDate($date1, $date2){
            echo '<pre>';
            echo '====== outputDate ======';
            echo '</pre>';

            echo '<pre>';
            echo $date1;
            echo '</pre>';

            echo '<pre>';
            echo $date2;
            echo '</pre>';

            $date1 =  date_create($date1);
            $date2 = date_create($date2);

            $diff=date_diff($date1,$date2);

            echo '<pre>';
            echo $diff->format("%y Year %m Month %d Day");
            echo '</pre>';
        }
    }

?>
