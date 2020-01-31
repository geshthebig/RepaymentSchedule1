<?php
    function calcPayment($loanAmount, $period, $interestRate)
    {
        //              (INTEREST/12) * ((1 + INTEREST/12) ^ TOTALPAYMENTS)
        // PMT = LOAN * -------------------------------------------
        //                  ((1 + INTEREST/12) ^ TOTALPAYMENTS) - 1
        var_dump($loanAmount);
        var_dump($period);
        var_dump($interestRate);
        $value1 = ($interestRate/12) * pow((1 + $interestRate/12), $period);
        $value2 = pow((1 + $interestRate/12), $period) - 1;
        $pmt    = $loanAmount * ($value1 / $value2);

        return $pmt;
    }
    
    function deleteSession() { // не се използва в тази версия на програмата
        $result = session_destroy();
        return $result;

    }

    if(isset($_POST['deleteSession'])){
        deleteSession();
    }

?>