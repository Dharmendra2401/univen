<?php

abstract class globalModel extends superGlobal {
 
    public $database = null;
    public $used_db_tables_by_request = array();

    function __construct() {
        $this->database = configurations::getDBObject();
        $this->pdodatabase = configurations::getPDODBObject();
        parent::__construct();
    }

    function getDBTable($db_table = "", $require_new_object = false) {

        $db_table_class_name = generalFunctions::convertToActionName($db_table);

        if ($require_new_object == true or !isset($this->used_db_tables_by_request[$db_table_class_name])) {

            include_once(APPLICATION_PATH . "/models/dbtables/" . $db_table . ".php");
            $db_table_obj = new $db_table_class_name;
            if (method_exists($db_table_obj, "init")) {
                $db_table_obj->init();
            }
            $this->used_db_tables_by_request[$db_table_class_name] = $db_table_obj;
        } else {

            $db_table_obj = $this->used_db_tables_by_request[$db_table_class_name];
        }
        return $db_table_obj;
    }

    function getEmailContentByParams($template = "index", $field = "", $data = array()) {
        $email_template = $this->database->selectOne("email_templates", "name = '" . $template . "'");

        $s_array = array();
        $d_array = array();

        foreach ($data as $k => $v) {
            $s_array[] = "{" . $k . "}";
            $d_array[] = $v;
        }

        foreach ($email_template as $k => $v) {
            $s_array[] = "{" . $k . "}";
            $d_array[] = $v;
        }
        return str_replace($s_array, $d_array, $field);
    }

    function sendEmail($template = "index", $data = array(), $attachments = array(), $smtp = false) {

        $email_template = $this->database->selectOne("email_templates", "name = '" . $template . "'");
        require_once(APPLICATION_PATH . "/lib/phpmailer/class.phpmailer.php");

        $mail = new PHPMailer();

        if (generalFunctions::getConfValue("email_option") == "smtp") {
            $mail->IsSMTP();
            $mail->Host = generalFunctions::getConfValue("smtp_host");
            $mail->SMTPAuth = true;
            $mail->Username = generalFunctions::getConfValue("smtp_username");
            $mail->Password = generalFunctions::getConfValue("smtp_password");
            
            if (generalFunctions::getConfValue("smtp_secure_connection") == "TLS") {
                $mail->Port = generalFunctions::getConfValue("smtp_port");
                $mail->SMTPSecure = "tls";
                $data["from_email"] = generalFunctions::getConfValue("smtp_from_email");
                $data["from_name"] = generalFunctions::getConfValue("smtp_from_name");
            }
            
        } else {
            $mail->IsSendmail();
            $mail->Sendmail = generalFunctions::getConfValue("sendmail");
        }

        if ($email_template["format"] == 'html') {
            $mail->IsHTML(true);
            $mail->Body = $email_template["htmltext"];
        } else {
            $mail->Body = $email_template["text"];
        }

        if (isset($attachments) and count($attachments)) {
            foreach ($attachments as $k => $atcmnt) {
                $mail->AddAttachment($atcmnt);
            }
        }

        $s_array = array();
        $d_array = array();

        foreach ($data as $k => $v) {
            $s_array[] = "{" . $k . "}";
            $d_array[] = $v;
        }

        foreach ($email_template as $k => $v) {
            $s_array[] = "{" . $k . "}";
            $d_array[] = $v;
        }

        $from_email = (isset($data["from_email"]) and strlen($data["from_email"])) ? $data["from_email"] : $email_template["from_email"];
        $from_name = (isset($data["from_name"]) and strlen($data["from_name"])) ? $data["from_name"] : $email_template["from_name"];
        $to_email = (isset($data["to_email"]) and strlen($data["to_email"])) ? $data["to_email"] : $email_template["to_email"];
        $to_name = (isset($data["to_name"]) and strlen($data["to_name"])) ? $data["to_name"] : $email_template["to_name"];

        $mail->Subject = str_replace($s_array, $d_array, $email_template["subject"]);
        $mail->Body = str_replace($s_array, $d_array, $mail->Body);
        $mail->SetFrom($from_email, $from_name);

        if ($to_name) {
            $mail->AddAddress($to_email, $to_name);
        } else {
            $mail->AddAddress($to_email);
        }

        $mail->AddAddress($to_email);
        $mail->Send();
    }

    function translateValues($lang = "en_US", $data = array(), $reference_table = "", $reference_id = 0) {

        $sql = "SELECT * FROM translations WHERE reference_table = '" . $reference_table . "' AND language = '" . $lang . "' AND reference_id = '" . $reference_id . "'";

        $result = $this->database->queryData($sql);

        $trans_values = array();

        foreach ($result as $k => $v) {
            $trans_values[$v["reference_field"]] = $v["value"];
        }

        foreach ($trans_values as $field => $value) {
            if (isset($value) and !empty($value)) {
                $data[$field] = $value;
            }
        }
        return $data;
    }

    function allowAppsToEM($user_id = 0) {
        $appsapps = array(0);
        $allow_apps = $this->database->selectData("em_applications", "user_id = '" . $user_id . "'");
        foreach ($allow_apps as $v) {
            $appsapps[] = $v["app_id"];
        }
        return $appsapps;
    }

    function getSpeakersListDD() {
        $speakers = array();
        $result = array();

        if ($this->isUserIsEM()) {
            $customer_id = $this->getClientIdFromUser($_SESSION[$this->session_prefix]['user']['user_id']);
            $appsapps = $this->allowAppsToEM($_SESSION[$this->session_prefix]['user']['user_id']);

            $sql = "SELECT a.app_id,a.app_name,s.speaker_id, CONCAT(s.firstname,' ',s.lastname) AS name
                    FROM
                    speakers AS s INNER JOIN application_master AS a ON (s.app_id = a.app_id)
                    WHERE s.app_id IN ('" . implode("','", $appsapps) . "') AND a.status = 'Active' AND s.status = 1 AND a.customer_id = '" . $customer_id . "' ORDER BY a.app_name ASC,s.firstname ASC,s.lastname ASC";
            $result = $this->database->queryData($sql);
        } elseif ($this->isUSerIsClient()) {
            $customer_id = $this->getLoogedInClientId();
            $sql = "SELECT a.app_id,a.app_name,s.speaker_id, CONCAT(s.firstname,' ',s.lastname) AS name
                    FROM
                    speakers AS s INNER JOIN application_master AS a ON (s.app_id = a.app_id)
                    WHERE a.status = 'Active' AND s.status = 1 AND a.customer_id = '" . $customer_id . "' ORDER BY a.app_name ASC,s.firstname ASC,s.lastname ASC";
            $result = $this->database->queryData($sql);
        } else {
            $sql = "SELECT a.app_id,a.app_name,s.speaker_id, CONCAT(s.firstname,' ',s.lastname) AS name
                    FROM
                    speakers AS s INNER JOIN application_master AS a ON (s.app_id = a.app_id)
                    WHERE a.status = 'Active' AND s.status = 1 ORDER BY a.app_name ASC,s.firstname ASC,s.lastname ASC";
            $result = $this->database->queryData($sql);
        }



        foreach ($result as $data) {
            if (!in_array($data["app_id"], array_keys($speakers))) {
                $speakers[$data["app_id"]] = array();
                $speakers[$data["app_id"]]["name"] = $data["app_name"];
                $speakers[$data["app_id"]]["speakers"] = array();
            }
            $speakers[$data["app_id"]]["speakers"][$data["speaker_id"]] = $data["name"];
        }

        return $speakers;
    }

    function getApplicationList() {

        $applications = array();

        if ($this->isUserIsEM()) {
            $customer_id = $this->getClientIdFromUser($_SESSION[$this->session_prefix]['user']['user_id']);
            $appsapps = $this->allowAppsToEM($_SESSION[$this->session_prefix]['user']['user_id']);

            $applications = $this->database->getList("application_master", array("app_id", "app_name"), "app_id IN ('" . implode("','", $appsapps) . "') AND status = 'Active' AND customer_id = '" . $customer_id . "'", "app_name ASC");
        } elseif ($this->isUSerIsClient()) {
            $customer_id = $this->getLoogedInClientId();
            $applications = $this->database->getList("application_master", array("app_id", "app_name"), "status = 'Active' AND customer_id = '" . $customer_id . "'", "app_name ASC");
        } else {
            $sql = "SELECT a.app_id,a.app_name,c.customer_id,CONCAT(c.firstname,' ',c.lastname) AS name,c.company
                    FROM application_master AS a INNER JOIN customer_info AS c ON (a.customer_id = c.customer_id) AND a.status = 'Active' ORDER BY c.firstname,a.app_name ASC";
            $result = $this->database->queryData($sql);

            foreach ($result as $data) {
                if (!in_array($data["customer_id"], array_keys($applications))) {
                    $applications[$data["customer_id"]] = array();
                    $applications[$data["customer_id"]]["name"] = $data["company"];
                    $applications[$data["customer_id"]]["apps"] = array();
                }
                $applications[$data["customer_id"]]["apps"][$data["app_id"]] = $data["app_name"];
            }
        }

        return $applications;
    }

    function getLoogedInClientId() {
        return $this->getClientIdFromUser($_SESSION[$this->session_prefix]['user']['user_id']);
    }

    function getClientIdFromUser($user_id = 0) {
        if ($customer = $this->database->selectFieldOne(array("customer_id"), "users", "user_id = '" . $user_id . "'")) {
            return $customer["customer_id"];
        }

        return 0;
    }

    function getAppIdByCutomer($customer_id = 0) {
        $apps = array(0);
        $apps_a = $this->database->selectField(array("app_id"), "application_master", "customer_id = '" . $customer_id . "'");

        foreach ($apps_a as $d) {
            $apps[] = $d["app_id"];
        }

        return $apps;
    }

    function getLogo($module_url = "") {


        $file = $module_url . "/images/swlogo.png";

        $str = '<h1 id="logo"><a href="' . $module_url . '/home">starwood</a></h1>';

        if ($this->isUSerIsClient() or $this->isUserIsEM()) {
            $custinfo = $this->getModel("customers")->getCustInfoByUserId($_SESSION[$this->session_prefix]["user"]["user_id"]);

            if (isset($custinfo) and !empty($custinfo["image"]) and file_exists(APPLICATION_PATH . "/images/customers/" . $custinfo["image"])) {
                $file = APPLICATION_URL . "/images/customers/" . $custinfo["image"];

                $str = '<div style="float:left;margin-left:5px;"><table cellpadding="1" cellspacing="1" border="1">
                <tr>
                <td align="center"><a href="' . $module_url . '/home" border="0"><img width="40" alt="" src="' . $file . '"></a></td>
                </tr>
                <tr>
                <td valign = "middle" class = "midfntwhite">Event Management System</td>
                </tr>
                </table></div>';
            }
        }


        return $str;
    }

    function getHandoutFiles($table = "", $referencekey = 0) {
        $dataArr = array();
        $sql = "select file,filename from presentations where table_name ='" . $table . "' and reference_key = '" . $referencekey . "'";
        $result = $this->database->queryData($sql);
        $i = 0;
        foreach ($result as $val) {
            $dataArr[$i]['file'] = (!empty($val['file'])) ? APPLICATION_URL . "/images/handoutpdf/" . $val['file'] : '';
            $dataArr[$i]['filename'] = $val['filename'];
            $i++;
        }
        return $dataArr; 
    }

    function getTwitts($hashtag='') {
        include_once(APPLICATION_PATH . '/lib/twitter/TwitterAPIExchange.php');
        $settings = array(
            'oauth_access_token' => "1727693052-acGJUSwKhoVQmIrxo9EqFkOXhPi8z7VDbRUrySD",
            'oauth_access_token_secret' => "hUxHg6DPYWSV4fMZMHVWztA4hKiwSlZIU1dg0GhjA",
            'consumer_key' => "JqTlmfhpk0fK5PqtEPiRFg",
            'consumer_secret' => "ipk1VynhHXpqTGJH3CcYXwkV3q7ugZNYCZ2yrOatrU"
        );

        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        $getfield = '?q='.$hashtag;
        $requestMethod = 'GET';

        $twitter = new TwitterAPIExchange($settings);
        $response = $twitter->setGetfield($getfield)
                ->buildOauth($url, $requestMethod)
                ->performRequest();
        $twitts = json_decode($response);
        return $twitts;
        
    }

}

