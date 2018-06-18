<?php

require_once  'simple_html_dom.php';
require_once  'BalanceInfo.class.php';

class Balance {

    protected $options = array();
    protected $cookieFilePath = null;
    protected $pageContent = null;

    public $cardNumber = null;
    protected $cardPassword = null;

    protected $balanceInfoObject = null;

    public function __construct($cardNumber, $cardPassword, $options = array()) {
        if ($options) {
            $this->options = array_merge_recursive($options);
        }
        $this->cookieFilePath = WDCS_COOKIE_PATH .

        $this->cardNumber = $cardNumber;
        $this->cardPassword = $cardPassword;

        $this->balanceInfoObject = new BalanceInfo('');
    }

    public function isLoggined($pageContent)
    {
        $ret = false;

        $domPageLoggined = new simple_html_dom();
        $domPageLoggined->load($pageContent);
        $title = $domPageLoggined->find('title', 0);
        if ($title) {
            if ("Logging in - Cardholder" == trim($title->plaintext)) {
                $ret = true;
            } else {
                $ret = false;
            }
        } else {
            $ret = false;
        }
        return $ret;
    }

    public function getBalanceInfo()
    {
        return $this->balanceInfoObject;
    }

    /**
     * @throws Exception
     */

    public function fetchContent()
    {

        $cookieFile = $this->generateCookie();
        $WdcsStateFields = $this->parseWdcsStateFields();

        $url = WDCS_MAIN_URL .'/login.aspx?ln=en';
        $headers = array();
        $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';
        $headers[] = 'Connection: keep-alive';
        $headers[] = 'Accept-Encoding=gzip, deflate';
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        $data = array(
            '__EVENTTARGET' => 'ctl00$ContentPlaceHolder$LoginCTRL$lnkLoginPanSanEmail',
            '__EVENTARGUMENT' => '',
            '__VIEWSTATE' => $WdcsStateFields['__VIEWSTATE'],
            '__EVENTVALIDATION' => $WdcsStateFields['__EVENTVALIDATION'],
            'ctl00$ContentPlaceHolder$LoginCTRL$txtPanSanEmail' => $this->cardNumber,
            'ctl00$ContentPlaceHolder$LoginCTRL$TbwLegthLimit_ClientState' => '',
            'ctl00$ContentPlaceHolder$LoginCTRL$txtAccessCodePanSanEmail' => $this->cardPassword,
            'ctl00$ContentPlaceHolder$LoginCTRL$txtReAccessCode' => '',
        );

        $content = $this->fetchUrl($url, 'POST', $data, $headers);

        $res = $this->isLoggined($content);
        if( !$res ){
            $errMessage = $this->catchErrorMessage($content);

            if( $errMessage ){
                $message = $errMessage;
            }else{
                $message = ' Logging is failed ';
            }
            $this->balanceInfoObject->setErrorMessage($message);

            throw new Exception($message);
        }

        $url = WDCS_MAIN_URL . '/Utilities.aspx?ln=en';
//        curl_setopt($ch, CURLOPT_REFERER, WDCS_MAIN_URL . '/mw.aspx?ln=en&pl=');
        $content = $this->fetchUrl($url);
        $dom = new simple_html_dom();
        $profile = $dom->load($content);
        $nodes = $profile->find("input[type=hidden]");
        $inputs = $profile->find("input[type=text]");
        $idType = $profile->find('#ctl00_ContentPlaceHolder_TabContainer1_tabMyProfile_txtIDNumber', 0);
        if( $idType ){
            $idType = $idType->value;
        }

        $ddlCountry = $profile->find('option[selected]', 2);
        $ddlCountry = $profile->find('#ctl00_ContentPlaceHolder_TabContainer1_tabMyProfile_ddlCountry',0);
        if( $ddlCountry ){
            $ddlCountry = $ddlCountry->find('option[selected=selected]',0);
            if( $ddlCountry ){
                $ddlCountry = $ddlCountry->value;
            }
        }

        $hiddenFields = array();
        foreach ($nodes as $node) {
            $hiddenFields[$node->name] = $node->value;
        }
        $fields = array();

        foreach ($inputs as $input) {
            $fields[$input->name] = $input->value;
        }
        $date = date("Y-m-d");

        if(isset($fields['ctl00$ContentPlaceHolder$TabContainer1$tabMyProfile$txtIDNumber'])) {
            $hiddenFields['ctl00$ContentPlaceHolder$TabContainer1$tabMyProfile$txtIDNumber'] = $fields['ctl00$ContentPlaceHolder$TabContainer1$tabMyProfile$txtIDNumber'];
        }

        unset($hiddenFields['ctl00_ContentPlaceHolder_TabContainer1_ClientState']);

        // TODO: _eventarget value can be parsed
        $hiddenFields['__EVENTTARGET'] = 'ctl00$ContentPlaceHolder$TabContainer1$tabTransactionHistory$butGetTransactionHIstory';

        $hiddenFields['ctl00_ContentPlaceHolder_TabContainer1_ClientState'] = '{"ActiveTabIndex":0,"TabEnabledState":[true,true,true,true,true,true],"TabWasLoadedOnceState":[false,false,true,false,false,false]}';
        $hiddenFields['ctl00$ContentPlaceHolder$TabContainer1$tabTransactionHistory$dateFrom'] ='2013-01-01';
        $hiddenFields['ctl00$ContentPlaceHolder$TabContainer1$tabTransactionHistory$dateTo'] = $date;
        $hiddenFields['ctl00$ContentPlaceHolder$TabContainer1$tabMyProfile$txtWebPassword'] = $this->cardPassword;
        $hiddenFields['ctl00$ContentPlaceHolder$TabContainer1$tabMyProfile$ddlIDtype'] = '2';
        $hiddenFields['ctl00$ContentPlaceHolder$TabContainer1$tabMyProfile$ddlCountry'] = $ddlCountry;
        $hiddenFields['ctl00$ContentPlaceHolder$hidError'] = "Unable to cast object of type 'AjaxControlToolkit.AccordionExtender' to type 'AjaxControlToolkit.AccordionPane'";
        //autorization

        $url = WDCS_MAIN_URL .'/Utilities.aspx?ln=en';
        $content = $this->fetchUrl($url, 'POST', $hiddenFields);
        $domTransact = new simple_html_dom();
        $profileTransact = $domTransact->load($content);

        $tabDiv = $profileTransact->find('div#TabContainer1_tabTransactionHistory', 0);
        $tabDiv = $profileTransact->find('div#ctl00_ContentPlaceHolder_TabContainer1_tabTransactionHistory', 0);
        $transactionList = '';
        if( $tabDiv) {
            $transactionList = $tabDiv->find('table', 2);
        }else{
            $transactionList = '';
        }
        $cardHoldersName = $profileTransact->find('span#ctl00_ContentPlaceHolder_lblCardholderName', 0)->plaintext;
        $currDate = $profileTransact->find('span#ctl00_ContentPlaceHolder_lblToday', 0);
        $cardBalance = $profileTransact->find('span#ctl00_ContentPlaceHolder_lblIniBalance', 0)->plaintext;
        $cardStatus = $profileTransact->find('span#ctl00_ContentPlaceHolder_lblStatusOfCard', 0)->plaintext;
//        $error = $profileTransact->find('td#contentcell', 0);
        $this->balanceInfoObject->setCardHolderName($cardHoldersName);
        $this->balanceInfoObject->setCardBalance($cardBalance);
        $this->balanceInfoObject->setCardStatus($cardStatus);
//        $this->balanceInfoObject->setErrorMessage($error);
        $this->balanceInfoObject->setRawTransationsList($transactionList);

        $this->removeCookie();
    }


    /**
     * @param $url
     * @param string $method
     * @param $data
     * @param $options
     * @return string
     * @throws Exception
     */
    protected function fetchUrl($url, $method = 'GET', $data=[], $headers=[])
    {

        $content = '';

        $cookieFile = $this->generateCookie();

        $ch = curl_init($url);
        if (count($headers) > 0) {
            curl_setopt($ch, CURLOPT_HEADER, false);
        }

        curl_setopt($ch, CURLOPT_AUTOREFERER,true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//        curl_setopt($ch, CURLOPT_REFERER, WDCS_MAIN_URL . '/mw.aspx?ln=en&pl=');
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:36.0) Gecko/20100101 Firefox/36.0');

        if ('POST' === $method) {
            curl_setopt($ch, CURLOPT_POST, TRUE);
            $reguestData = http_build_query($data);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $reguestData);
        }

        $content = curl_exec($ch);
        if (curl_error($ch)) {
            $errorMessage =  curl_errno($ch) . '::' . curl_error($ch);
            throw new Exception($errorMessage);
        }

        return $content;
    }

    protected function catchErrorMessage($pageContent)
    {
        $ret = '';

        $domPageLoggined = new simple_html_dom();
        $domPageLoggined->load($pageContent);

        $error = $domPageLoggined->find('#ctl00_ContentPlaceHolder_LoginCTRL_lblMemberLoginError', 0);

        if ($error) {
            if (isset($error->plaintext)) {
                return trim($error->plaintext);
            } else {
                return '';
            }
        } else {
            $ret = '';
        }

        return $ret;
    }

    protected function parseWdcsStateFields()
    {
        $return = array(
            '__VIEWSTATE' => '',
            '__EVENTVALIDATION' => '',
        );
        $ch = curl_init(WDCS_MAIN_URL);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:36.0) Gecko/20100101 Firefox/36.0');
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $pageContent = curl_exec($ch);
        $domPageLoggined = new simple_html_dom();
        $domPageLoggined->load($pageContent);
        $viewState = $domPageLoggined->find("input[name=__VIEWSTATE]",0);
        $eventValid = $domPageLoggined->find("input[name=__EVENTVALIDATION]",0);
        if( $viewState ){
            $return['__VIEWSTATE'] = $viewState->value;
        }

        if( $eventValid ){
            $return['__EVENTVALIDATION'] = $eventValid->value;
        }
        return $return;
    }

    protected function generateCookie()
    {
        return $this->cookieFilePath = WDCS_COOKIE_PATH . '/' . md5($this->cardNumber . $this->cardPassword);
    }

    protected function removeCookie()
    {
        if( file_exists($this->cookieFilePath) ){
            unlink($this->cookieFilePath);
            return true;
        }else{
            return false;
        }
    }

}