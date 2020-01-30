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

    $remPrin = $_SESSION['loanAmount'];
    $remPrin = $remPrin- $prin;
    $int = $_SESSION['loanAmount'] * ($rate/12);
    $prin = $pmt - $int;

    $remPrin = round($remPrin, 2);
    print_r ($remPrin); echo "<br>";echo "<br>";
    
    for ($i = 1; $i<=$_SESSION['period']; $i++) {
        if ($i == $_SESSION['period']) {
            $prin += $remPrin;
            $remPrin = 0;
        }

        echo "Instalment No: " . $i . "---" . $prin . "---" . $int . "---" . $pmt . "---" . $remPrin; echo "<br>";
        $int = $remPrin * ($rate/12);
        $prin = $pmt - $int;
        $remPrin = $remPrin - $prin;
    }

    die();
?>

</body>
</html>