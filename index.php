<?php
    // include('PostParam.php'); //от това няма смисъл, защото изпълнението на програмата минава от PostParam.php с redirect 
    // към тази страница. Include се прави за страница, в която има формули, които ни трябват в текущата страница
    session_start();
    include ('Formulas.php');

    // print_r ($_SESSION);
    echo "<br>";
    // print_r ($loanAmount);// така не става, трябва през сесия да се докара тук и евентуално и да се принтира

    // $pmt = calcPayment($loanAmount, $period, $interestRate);
    // print_r($pmt); // така не става, трябва през сесия 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Financing parameters</title>
    <link rel="stylesheet" href="style.css">

</head>

    <header class="content">
        <h1> Find the best financing scheme for your investment </h1>
        <h3> Please enter your financing parameters: </h3>
    </header>
    
    <body>
        <div class="container">
            <form action="postParam.php" method="post" class="Form"> 
                <div>    
                    <label>Loan amount</label>
                    <input class="parameters-input" type="text" name="loanAmount" placeholder="Enter loan amount">
                </div> 

                <div>
                    <label>Period (months)</label>
                    <input class="parameters-input" type="text" name="period" placeholder="Enter months of repayment" >
                </div> 
                    
                <div>
                    <label>Interest rate</label>
                    <input class="parameters-input" type="text" name="interestRate" placeholder="Enter the rate">
                </div> 
                <input type="submit" value="Check" class= "button" id="Check">
            </form>
        </div>
        
        <div class="resume">
            <h3>Given the chosen parameters: </h3>
            <li>Loan amount: <span> <?php echo number_format($_SESSION['loanAmount'],2,"."," ");?> </span> </li>
            <li>Period (months): <span> <?php echo $_SESSION['period'];?> </span></li>
            <li>Interest rate: <span> <?php echo sprintf("%.2f%%", $_SESSION['interestRate'] * 100);?> </span></li>
            
            <div class="summary">
                <li><span class="summary-text">Your monthly instalment is:</span> <span class="summary-number"><?php echo number_format($_SESSION['pmt'],2,"."," ");?> </span></li>
                <li><span class="summary-text">The Total interest is:</span> <span class="summary-number"><?php echo number_format($_SESSION ['intSum'],2,"."," ");?> </span></li>
                <li><span class="summary-text">The Total paid amount is:</span> <span class="summary-number"><?php echo number_format($_SESSION ['pmtSum'],2,"."," ");?> </span></li>
            </div>

            <form action="Schedule.php" method="post" class="schedule"> 
                <div>    
                    <label>see the Repayment schedule</label>
                    <input type="submit" value="Schedule" class= "button" id="Schedule">
                </div> 
            </form>
            
            <!-- <form action="postParam.php" method="post" class="DeleteSession"> 
                <div>    
                    <label>Enter new parameters</label>
                    <input type="submit" name="deleteSession" value="Enter new" class= "button">
                    // ?php deleteSession(); ? //
                </div>  -->
        </div>
    </body>

    <footer>
        <hr>
        <h4>see additional financial information here:</h4>
        <ul class=addFinInfo>
            <li> <a href="https://www.moitepari.bg/">https://www.moitepari.bg/</a> </li>
            <li> <a href="http://www.bnb.bg/PressOffice/POUsefullinks/index.htm">http://www.bnb.bg/PressOffice/POUsefullinks/index.htm</a> </li>
        </ul>

    </footer>
</html>

