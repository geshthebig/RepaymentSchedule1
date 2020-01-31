<?php
    include ('Formulas.php');
    session_start();

    if (isset($_POST['loanAmount']) && isset($_POST['period']) && isset($_POST['interestRate'])) {
        $loanAmount = floatval($_POST['loanAmount']);
        $period = floatval($_POST['period']);
        $interestRate = floatval($_POST['interestRate']) / 100;

        // $interest = $loanAmount * ($interestRate / 12);
        // $principal = calcPayment($loanAmount, $period, $interestRate) - $interest;
        // $remainPrincipal = $loanAmount - $principal;
        // $instNo = 1;
        
        // echo "<br>";
        // print_r ($loanAmount);
        // echo "<br>";
        // print_r ($period);
        // echo "<br>";
        // print_r ($interestRate);   
    
        $_SESSION['pmt'] = calcPayment($loanAmount, $period, $interestRate);
        

        $_SESSION['loanAmount'] = $loanAmount;
        $_SESSION['period'] = $period;
        $_SESSION['interestRate'] = $interestRate;

        $_SESSION['interest'] = $interest;
        $_SESSION['principal'] = $principal;
        $_SESSION['remainPrincipal'] = $remainPrincipal;
        $_SESSION['instNo'] = $instNo;
    }

    header('Location: /RepaymentSchedule1');
?>
