<?php

class BalanceInfo {

    protected $cardBalance = null;
    protected $cardHolderName = null;
    protected $cardStatus = null;
    protected $errorMessage = null;
    protected $pageContent = null;
    protected $rawTransationsList = null;

    public function __construct($pageContent)
    {
        $this->pageContent = $pageContent;
    }

    /**
     * @return null
     */
    public function getRawTransationsList()
    {
        return $this->rawTransationsList;
    }

    /**
     * @param null $rawTransationsList
     */
    public function setRawTransationsList($rawTransationsList)
    {
        $this->rawTransationsList = $rawTransationsList;
    }

    /**
     * @return null
     */
    public function getPageContent()
    {
        return $this->pageContent;
    }

    /**
     * @param null $pageContent
     */
    public function setPageContent($pageContent)
    {
        $this->pageContent = $pageContent;
    }

    /**
     * @return null
     */
    public function getCardHolderName()
    {
        return $this->cardHolderName;
    }

    /**
     * @param null $cardHolderName
     */
    public function setCardHolderName($cardHolderName)
    {
        $this->cardHolderName = trim($cardHolderName);
    }

    /**
     * @return null
     */
    public function getCardBalance()
    {
        return $this->cardBalance;
    }

    /**
     * @param null $cardBalance
     */
    public function setCardBalance($cardBalance)
    {
        $cardBalance = str_replace('Card Balance:', '', $cardBalance);
        $this->cardBalance = trim($cardBalance);
    }

    /**
     * @return null
     */
    public function getCardStatus()
    {
        return $this->cardStatus;
    }

    /**
     * @param null $cardStatus
     */
    public function setCardStatus($cardStatus)
    {
        $cardStatus = str_replace('Card Status:', '', $cardStatus);
        $this->cardStatus = trim($cardStatus);
    }

    /**
     * @return null
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param null $errorMessage
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = trim($errorMessage);
    }


}