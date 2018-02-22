
<?php
    // FOR DISPLAYING ERRORS
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL| E_STRICT);

    // CLASS INCLUDES
    include 'Program.class.php';
    include 'Calculator.class.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>

        <?php
            $program = new Program();

            $program->outputName('Lakamatis Kilamutis');

            $program->outputFactorial(9);

            $program->outputArray([20, 1, 2, 5, 8, 3]);

            $program->outputDate('10 September 2010','17 December 2011');

            $calc = new Calculator();
            $calc->sum(2,1);
            $calc->subtract(2,5);
            $calc->multiply(8,12);
            $calc->divide(15,3);

            echo '<pre>=== Calling static method from Calculator class ===</pre>';

            Calculator::sum(8,1);
            Calculator::subtract(123,5);
            Calculator::multiply(85,12);
            Calculator::divide(33,3);
        ?>

    </body>
</html>
