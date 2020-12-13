<?php
Class Payment_Api{
    private $nameOnCard = '';
    private $cardNumber = '';
    private $exp_month ='';
    private $exp_year= '';
    private $cvv = '';
    private $amount ='';
    private $pin='';
    private $is_success= false;
    private $reference_num = '';
    
    public function make_payment($nameOnCard, $cardNumber,
    $exp_month,$exp_year,$cvv,$amount,$pin){

        // connect to external api to make payment........
        //.......................................for test card number
        if(
            ($nameOnCard==="Soroosh Modarresi")&&
            ($cardNumber==="1234567891011121")&&
            ($exp_month==="02")&&
            ($exp_year==="88")&&
            ($cvv ==="111")&&
            ($pin==="1111")
        )
        {
            // return result success
            $is_success = true;
            $reference_num = strval(random_int (111111, 999999));
            $transaction_result=[$is_success,$reference_num];
        }
        else
        {
            $is_success = false;
            $reference_num = strval(random_int (111111, 999999));
            $transaction_result=[$is_success,$reference_num];
        }
        return $transaction_result;
    }
}
?>