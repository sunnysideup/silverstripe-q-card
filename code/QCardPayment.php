<?php

class QCardPayment extends EcommercePayment
{





    /**
     * Message shown before payment is made
     * @var String
     */
    private static $before_payment_message = "";

    /**
     * Message shown after payment is made
     * @var String
     */
    private static $after_payment_message = "";

    /**
     * Default Status for Payment
     * @var String
     */
    private static $default_status = "Pending";


    /**
     * Process the DirectCredit payment method
     */
    public function processPayment($data, $form)
    {
        $this->Status = Config::inst()->get("DirectCreditPayment", "default_status");
        $this->Message = Config::inst()->get("DirectCreditPayment", "after_payment_message");
        $this->write();
        return EcommercePayment_Success::create();
    }

    public function getPaymentFormFields($amount = 0, $order = null)
    {
        return new FieldList(
            new LiteralField($this->ClassName.'_BeforeMessage', '<div id="'.$this->ClassName.'_BeforeMessage">' . Config::inst()->get("DirectCreditPayment", "before_payment_message") . '</div>'),
            new HiddenField($this->ClassName, $this->ClassName, 0)
        );
    }

    public function getPaymentFormRequirements()
    {
        return null;
    }
}
