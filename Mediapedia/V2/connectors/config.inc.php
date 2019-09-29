<?php
/*
 * Table names
 */
define('TBL_RESOURCE', "hom_med_resource");
define('TBL_RES_TYPE', "hom_med_type");
define('TBL_LANG', "hom_med_language");
define('TBL_QUALITY', "hom_med_quality");
define('TBL_CATEGORY', "hom_med_category");
define('TBL_READ', "hom_med_read");
define('TBL_LISTEN', "hom_med_listen");
define('TBL_BE_CAT', "hom_med_be_cat");
define('TBL_FROM', "hom_med_from");
define('TBL_CONTINENT', "hom_med_continent");
define('TBL_COUNTRY', "hom_med_country");
define('TBL_ROLE', "hom_med_role");
define('TBL_PEOPLE', "hom_med_people");
define('TBL_HAVE', "hom_med_have");
define('TBL_WATCH', "hom_med_watch");
define('TBL_LOG_BDD', "hom_log_bdd");
define('TBL_LOG_APP', "hom_log_app");
define('TBL_USERS', "hom_usr_subscribe");
define('TBL_PRIVS', "hom_usr_privs");


/*
 * Column names
 */
// TBL_RESOURCE
define('COL_RES_REF', "res_id");			// Not null
define('COL_RES_SEASON', "season");
define('COL_RES_TITLE', "title");			// Not null
define('COL_RES_DURATION', "duration");
define('COL_RES_DISABLED', "disabled");		// Not null
define('COL_RES_ON_AIR', "on_air");
define('COL_RES_FORMAT', "format");

// TBL_RES_TYPE
define('COL_TYPE_REF', "res_type");
define('COL_TYPE_LABEL', "label_type");

// TBL_LANG
define('COL_LANG_CODE', "code_language");
define('COL_LANG_LABEL', "label_language");

// TBL_QUALITY
define('COL_QUALITY_CODE', "code_quality");
define('COL_QUALITY_LABEL', "label_quality");

// TBL_CATEGORY
define('COL_CATEGORY_CODE', "code_category");
define('COL_CATEGORY_LABEL', "label_category");

// TBL_USERS
define('COL_USERS_USERNAME', "username");
define('COL_USERS_PWD', "psswrd");

// TBL_PRIVS
define('COL_PRIVS_CODE', "code_priv");
define('COL_PRIVS_LABEL', "label_priv");

// TBL_READ
// Constants are already defined

// TBL_LISTEN
// Constants are already defined

// TBL_BE_CAT
// Constants are already defined

// TBL_FROM
// Constants are already defined

// TBL_CONTINENT
define('COL_CONTINENT_CODE', "code_continent");
define('COL_CONTINENT_LABEL', "label_continent");

// TBL_COUNTRY
define('COL_COUNTRY_CODE', "code_country");
define('COL_COUNTRY_LABEL', "label_country");

// TBL_ROLE
define('COL_ROLE_CODE', "code_role");
define('COL_ROLE_LABEL', "label_role");

// TBL_PEOPLE
define('COL_PEOPLE_CODE', "code_people");
define('COL_PEOPLE_NAME', "name_people");
define('COL_PEOPLE_FIRSTNAME', "firstname_people");

// TBL_HAVE
// Constants are already defined

// TBL_WATCH
// Constants are already defined

// TBL_LOG_BDD
define('COL_LOG_ID', "log_id");
define('COL_LOG_DATE', "log_date");
define('COL_LOG_USER_BDD', "user_bdd");
define('COL_LOG_USER_APP', "user_id");
define('COL_LOG_OPERATION', "operation");
define('COL_LOG_TABLE_NAME', "tableName");
define('COL_LOG_COLUMN_NAME', "columnName");

// TBL_LOG_APP
define('COL_LOG_PAGE_NAME', "pageName");

/*
 * Error messages and codes
 */
//Empty field
define('MSG_EMPTY_FIELD', "This field can not be empty.");
define('CODE_EMPTY_FIELD', 20001);

//Data not inserted
define('MSG_NOT_INSERTED', "Your data have not been inserted.");
define('CODE_NOT_INSERTED', 20002);

//Data already inserted
define('MSG_ALREADY_INSERTED', "Your data have already been inserted.");
define('CODE_ALREADY_INSERTED', 20003);
