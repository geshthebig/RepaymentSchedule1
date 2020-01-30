<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
        tuk sme

        <?php
            // if(!isset($_SESSION[])) {
            //     $_SESSION = aray ();
            // }
            
            $pmt = $_SESSION['pmt'];
            $rate = $_SESSION['interestRate'];
            $prin = $_SESSION['principal'];
            $int = $_SESSION['interest'];
            $remPrin = $_SESSION['remainPrincipal'];

            $pmt = round($pmt, 2);
            $rate = round($rate, 4);
            $remPrin = $_SESSION['loanAmount'];
            $int = $_SESSION['loanAmount'] * ($rate/12);
            $prin = $pmt - $int; print_r ("lihva" . $int); echo "<br>";echo "<br>";
            $remPrin = $remPrin- $prin;  print_r ("Glavnica" . $prin); echo "<br>";echo "<br>";
            
            $remPrin = round($remPrin, 2);
            $prin = round($prin, 2);
            $int = round($int, 2);
            
            print_r ($remPrin); echo "<br>";echo "<br>";
        ?>
        <table> 
            <tr>
                <th>Instalment No</th>
                <th>Principal</th>
                <th>Interest</th>
                <th>Instalment</th>
                <th>Remaining principal</th>
            </tr>
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
                    <td><?php echo $prin; ?> </td>
                    <td><?php echo $int; ?> </td>
                    <td><?php echo $pmt; ?> </td>
                    <td><?php echo $remPrin; ?> </td>
                </tr>
                <?php
                    $int = $remPrin * ($rate/12); $int = round($int, 2);
                    $prin = $pmt - $int;
                    $remPrin = $remPrin - $prin;
                }
                ?>
                <?php
                die();
                // echo "Instalment No: " . $i . "---" . $prin . "---" . $int . "---" . $pmt . "---" . $remPrin; echo "<br>";
                ?>
        </table>
    </body>

</html>