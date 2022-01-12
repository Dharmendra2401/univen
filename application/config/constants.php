<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/

defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code
define('PNAME', 'Cast India');
define('COMPANY', 'http://vihatechnosoft.com/');
define('EMAIL_FROM', 'shuklaharsh50@gmail.com');
define('WEBSITE_NAME','Cast India');
define('REGISTRATION_EMAIL','noreply@univen.co');
define('REGISTRATION_EMAIL_STUDIO_RENTALS','noreply@univen.co');
define('NO_REPLY','noreply@castindia.in');
define('ADMIN_EMAIL','noreply@castindia.in');
define('ADMIN_EMAIL','noreply@castindia.in');
define('ASPIRANT',"Aspirant");
define('EMPLOYER',"Employer");
define('YES','Y');
define('NO','N');
define('UNIVEN_BUSINESS_IDENTITY_TBL','uni_business_identity');
define('BUSINESS_IDENTITY_COL','IMAGE,TITLE,DESCRIPTION');
define('UNIVEN_CLIENT_MERCHANT_RELATION_TBL','uni_client_merchant_relation');
define('CLIENT_MERCHANT_RELATION_COL','IMAGE,TITLE,DESCRIPTION');
define('UNIVEN_DATA_SHARING_SUB_HEADINGS_TBL','uni_data_sharing_sub_headings');
define('DATA_SHARING_SUB_HEADINGS_COL','IMAGE,TITLE,DESCRIPTION');
define('UNIVEN_OUR_STORY_TBL','uni_our_story');
define('OUR_STORY_COL','DESCRIPTION');
define('UNIVEN_MEET_TEAM_TBL','uni_meet_team');
define('MEET_TEAM_COL','IMAGE,PERSON_NAME,PERSON_DESIGNATION');
define('UNIVEN_CLIENT_MERCHANT_RELATION_TBL','uni_client_merchant_relation');
define('CLIENT_MERCHANT_RELATION_COL','IMAGE,TITLE,DESCRIPTION');
define('UNIVEN_SUBSCRIPTION_TBL','uni_subscription');
define('SUBSCRIPTION_COL','PRICE,DESCRIPTION');
define('UNIVEN_PROOF_IDENTITY_TBL','uni_proof_identity');
define('PROOF_IDENTITY_COL','LEGAL_NAME,TRADE_NAME,GSTIN,PAN_NUMBER,AADHAR_NUMBER,BUSINESS_CONSTITUTION,REGISTRATION_DATE,ADDITIONAL_BUSINESS_ADDRESS,PRINCIPAL_BUSINESS_ADDRESS,PINCODE,COUNTRY,STATE_NAME,PRINCIPAL_BUSINESS_NATURE');
define('UNIVEN_PROOF_COMMUNICATION_TBL','uni_proof_communication');
define('PROOF_COMMUNICATION_COL','PRIMARY_EMAIL,PRIMARY_MOBILE,PRIMARY_NAME,PRIMARY_REGISTERED_MOBILE,PRIMARY_SIGNATORY,WEBSITE,SECONDARY_EMAIL,SECONDARY_MOBILE,SECONDARY_NAME,PRIMARY_REGISTERED_EMAIL,PROMOTER_NAME');
define('UNIVEN_PROOF_BANKING_TBL','uni_proof_banking');
define('PROOF_BANKING_COL','BANK_ACC_NO,BRANCH,IFSC_CODE');
define('UNIVEN_PROOF_COMPLIANCE_TBL','uni_proof_compliance');
define('PROOF_COMPLIANCE_COL','EBILL_STATUS,SECTION_APPLICABILITY,GSTR_1_IFF_STATUS,MSME_REG_NO,CENTRE_JURISDICTION,GSTN_STATUS,TAXPAYER_TYPE,MSME_EFFECTIVE_DATE,EINVOICE_APPLICABILITY,TURNOVER,GSTR_3B_STATUS,GST_CANCELLATION_DATE,GST_REGISTRATION_DATE,STATE_JURISDICTION,ANNUAL_AGGR_TURNOVER');
define('UNIVEN_PROOF_CATELOUGE_TBL','uni_proof_catelouge');
define('PROOF_CATELOUGE_COL','BUSINESS_ACTI_NATURE,TYPE_INDUSTRY,KEY_PRODUCTS_SERVICES');
define('UNIVEN_START_HERE_PAGE_TBL','uni_start_here_page');
define('START_HERE_PAGE_COL','IMAGE,TITLE,DESCRIPTION');
define('UNIVEN_LOGIN_PAGE_TBL','uni_login_page');
define('LOGIN_PAGE_COL','IMAGE,TITLE,DESCRIPTION');
define('UNIVEN_FORGOT_PASSWORD_PAGE_TBL','uni_forgot_password_page');
define('FORGOT_PASSWORD_PAGE_COL','IMAGE,TITLE,DESCRIPTION');
define('UNIVEN_SET_NEWPASSWORD_PAGE_TBL','uni_set_newpassword_page');
define('SET_NEWPASSWORD_PAGE_COL','IMAGE,TITLE,DESCRIPTION');
define('UNIVEN_REGISTER_PAGE_TBL','uni_register_page');
define('REGISTER_PAGE_COL','IMAGE,TITLE,DESCRIPTION');
define('UNIVEN_OTP_PAGE_TBL','uni_otp_page');
define('OTP_PAGE_COL','IMAGE,TITLE,DESCRIPTION');
define('UNIVEN_ENTITIES_LIST_TBL','uni_proof_identity');
define('ENTITIES_LIST_COL','TRADE_NAME,GSTIN,PAN_NUMBER');
define('UNIVEN_NEWS_NOTIFICATION_TBL','uni_news_notification');
define('NEWS_NOTIFICATION_COL','LATEST,NEWS,UPDATES');
define('UNIVEN_AMENITIES_TBL','UNIVEN_amenities');
define('AMENITIES_NAME_COL','AMENITIES_NAME');
define('STUDIO_AVAILABILITY_DAYS_TBL','studio_availability_days');
define('DAYS_NAME_COL','DAYS_NAME');
define('REGISTRATION_EMAIL_UNIVEN','dharmendraupadhyay24@gmail.com');





/*
|--------------------------------------------------------------------------
|  Success Error Handling
|--------------------------------------------------------------------------
|
| These modes are used when working with API
|
|  EN_404_001:
|            EN=errorNumber 
|            404=HTTP_NOT_FOUND
|            001=errorId
|
*/
define('EN_404_001',"Please set type(key) value as ".EMPLOYER." or ".ASPIRANT);
define('EN_404_002',"Please set mobilenumber(key) value as Mobile Number.");
define('EN_404_003',"Please set email(key) value as Email.");
define('EN_404_004',"Please set pincode(key) value as Pincode.");
define('EN_404_005',"Please set userid(key) value as Userid.");
/*
|--------------------------------------------------------------------------
|   Success Message Handling
|--------------------------------------------------------------------------
|
| These modes are used when working with API
|
|  MSG_200_001:
|            MSG=MSG 
|            200=HTTP_OK
|            001=msgId
|
*/
define('MSG_200_001',"Verified Successfully ");
define('MSG_200_002',"Sorry! Mobile number not exist.");
define('MSG_200_003',"Sorry! Mobile number already exist.");
define('MSG_200_004',"");  
define('MSG_200_005',"Sorry! Email already exist."); 
define('MSG_200_006',"Successfully registered as  ".ASPIRANT.", please verify link send in your email !");
define('MSG_200_007',"Successfully registered as  " .EMPLOYER.", please verify link send in your email !");
define('MSG_200_008',"Successfully updated your additional details as ".ASPIRANT." !");
define('MSG_200_009',"Updation of your additional details as ".ASPIRANT." failed !");
define('MSG_200_010',"Successfully updated your additional details as ".EMPLOYER." !");
define('MSG_200_011',"Updation of your additional details as ".EMPLOYER." failed !");
define('MSG_200_012',"You are successfully updated your personal details !");
define('MSG_200_013',"Updation of your personal details failed !");
define('MSG_200_014',"You are successfully updated your educational details !");
define('MSG_200_015',"Updation of your educational details failed !");
define('MSG_200_016',"You are successfully added your profile !");
define('MSG_200_017',"Addition of your profile failed !");
define('MSG_200_018',"You are successfully updated your professional details !  ");
define('MSG_200_020',"You are successfully added your Job !");
define('MSG_200_021',"Addition of your Job failed !");
define('MSG_200_022',"You are successfully updated your Job !");
define('MSG_200_023',"Updation of your Job failed !");
define('MSG_200_024',"You are successfully deleted !");
define('MSG_200_043',"You are successfully disabled !");
define('MSG_200_044',"disable failed !");
define('MSG_200_025',"deletion failed !");
define('MSG_200_026',"Record already exist !");
define('MSG_200_027',"Duplicate job title with same user !");
define('MSG_200_028',"Blog Inserted Successfully!");
define('MSG_200_029',"Addition of your Blog failed !");
define('MSG_200_030',"Blog Updated Successfully!");
define('MSG_200_031',"Updation of your Blog failed !");
define('MSG_200_032',"Draft Inserted Successfully!");
define('MSG_200_033',"Drafting of your Blog failed !");
define('MSG_200_034',"Draft Updated Successfully!");
define('MSG_200_035',"Drafting of your Blog failed !");
define('MSG_200_035',"Drafting of your Blog failed !");
define('MSG_200_036', "Already registered user");
define('MSG_200_037',"Successfully registered as ".PORTFOLIO.", please verify link send in your email !");
define('MSG_200_038',"Successfully registered as Studio Rentals, please verify link send in your email !");
define('MSG_200_039',"You are successfully added in Studio Rentals !");
define('MSG_200_040',"You are successfully updated in Studio Rentals !  ");
define('MSG_200_041',"You are successfully submitted !");
define('MSG_200_042',"Sorry! Mobile number or Email already exist.");
define('MSG_200_045',"You are successfully added in rent related information !");
define('MSG_200_046',"Addition of your rent related information failed !");
define('MSG_200_047',"You are successfully booked your space !");
define('MSG_200_048',"Addition of your space booked related information failed !");
define('MSG_200_049',"You are successfully updated in booked space !");
define('MSG_200_050',"Updation of your space booked related information failed !");
define('MSG_200_051',"Addition of your Hire Artist related information failed !");
define('MSG_200_052',"Record successfully Inserted!");
define('MSG_200_053',"Insertion of Record failed !");
define('MSG_200_054',"You are successfully updated in Hire Artist !");
define('MSG_200_055',"Updation of your Hire Artist related information failed !");
define('MSG_200_056',"Sorry! Invalid Email or Password.");
define('MSG_200_057',"OTP Send Successfully!.");
define('MSG_200_058',"Password Reset Successfully!.");
define('MSG_200_059',"OTP Resend Successfully!.");
define('MSG_200_060',"Kindly Fill All Fields!.");
define('MSG_200_062',"Sorry! Email not exist.");
date_default_timezone_set("Asia/Kolkata");
