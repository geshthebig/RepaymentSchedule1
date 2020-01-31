<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Repayment Schedule</title>
        <link rel="stylesheet" href="style.css">
    </head>

    

    <body>
        <h1 class="Schedule-h1">Repayment schedule</h1>
        <a class="buttonSchedule" href="index.php">GO BACK</a>
        
        <?php
            // if(!isset($_SESSION[])) {
            //     $_SESSION = aray ();
            // }
            
            $pmt = $_SESSION['pmt'];
            $rate = $_SESSION['interestRate'];
            $prin = $_SESSION['principal'];
            $int = $_SESSION['interest'];
            $remPrin = $_SESSION['remainPrincipal'];
            // $intSum = $_SESSION['intSum'];
            // $pmtSum = $_SESSION['pmtSum'];
            // $prinSum = $_SESSION['prinSum'];
            
            $pmt = round($pmt, 2);
            $rate = round($rate, 4);
            $remPrin = $_SESSION['loanAmount'];
            $int = $_SESSION['loanAmount'] * ($rate/12);
            $prin = $pmt - $int; //print_r ("lihva" . $int); echo "<br>";echo "<br>";
            $remPrin = $remPrin- $prin;  //print_r ("Glavnica" . $prin); echo "<br>";echo "<br>";
            
            $int = round($int, 2);
            $remPrin = round($remPrin, 2);
            $prin = round($prin, 2);
            
            $intSum = $int;
            $pmtSum = 0;
            $prinSum = 0;

            //print_r ("Оставаща главница" . $remPrin); echo "<br>";echo "<br>";
        ?>
        <table> 
            <thead>
                <tr>
                    <th>Instalment No</th> <th>Principal</th> <th>Interest</th> <th>Instalment</th> <th>Remaining principal</th>
                </tr>
            </thead>
            <?php
                for ($i = 1; $i<=$_SESSION['period']; $i++) {
                    if ($i == $_SESSION['period']) {
                        $prin += $remPrin;
                        $pmt = $prin + $int;
                        $remPrin = 0;
                    }
            ?>
                    <tr> 
                        <td><?php echo $i; ?> </td> 
                        <td><?php echo number_format($prin,2,"."," "); ?> </td>
                        <td><?php echo number_format($int,2,"."," "); ?> </td>
                        <td><?php echo number_format($pmt,2,"."," "); ?> </td>
                        <td><?php echo number_format($remPrin,2,"."," "); ?> </td>
                    </tr>
                    <?php
                                                        
                        // ---- ПРОВЕРКА ------
                        // var_dump($prinSum);
                        
                        $prinSum += $prin;    
                        $int = $remPrin * ($rate/12); 
                        $prin = $pmt - $int;
                        $remPrin = $remPrin - $prin;
                        $intSum += $int; 
                        $pmtSum += $pmt;
                        
                        // ---- ПРОВЕРКА ------
                        // var_dump($prinSum);
                        // die();
                    
                }
                    ?>
                    <tr class="sumRow"> 
                        <td><?php echo "SUM:"; ?> </td> 
                        <td><?php echo number_format($prinSum,2,"."," "); ?> </td>
                        <td><?php echo number_format($intSum,2,"."," "); ?> </td>
                        <td><?php echo number_format($pmtSum,2,"."," "); ?> </td>
                        <td><?php echo ""; ?> </td>
                    </tr>
                <?php
                        $_SESSION ['intSum'] = $intSum;
                        $_SESSION ['pmtSum'] = $pmtSum;
                                    
                       
                    // print_r ("Interest SUM" . $intSum); echo "<br>";
                    // print_r ("Instalments SUM" . $pmtSum);echo "<br>";
                    // print_r ("Principa SUM" . $prinSum);echo "<br>";
                    die();
                ?>
        </table>
    </body>

</html>