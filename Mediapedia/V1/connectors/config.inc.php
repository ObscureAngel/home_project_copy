<?php
/*
 * Table names
 */
define('TBL_FILMS', "hom_med_film_serie");
define('TBL_VID_TYPE', "hom_med_type");
define('TBL_AUDIO', "hom_med_language");
define('TBL_SUBTITLE', "hom_med_language");
define('TBL_QUALITY', "hom_med_quality");
define('TBL_CATEGORY', "hom_med_category");
define('TBL_USERS', "hom_usr_subscribe");
define('TBL_PRIVS', "hom_med_privs_subscribe");
define('TBL_READ', "hom_med_read");
define('TBL_LISTEN', "hom_med_listen");
define('TBL_BE_CAT', "hom_med_be_cat");
define('TBL_FROM', "hom_med_from");
define('TBL_CONTINENT', "hom_med_continent");
define('TBL_COUNTRY', "hom_med_country");
define('TBL_FILM_ROLE', "hom_med_film_role");
define('TBL_FILM_PERS', "hom_med_pers_film");
define('TBL_HAVE', "hom_med_have");
define('TBL_WATCH', "hom_med_watch");


/*
 * Column names
 */
define('COL_GEN_SEASON_ID', "season_id");

// TBL_FILMS
define('COL_FILM_REF', "id_fs");
define('COL_FILM_SEASON', "tot_season");
define('COL_FILM_TITLE', "titre");
define('COL_FILM_DURATION', "duration");
define('COL_FILM_ENTRY', "adding_date");

// TBL_VID_TYPE
define('COL_TYPE_REF', "ref_type");
define('COL_TYPE_LABEL', "label_type");

// TBL_AUDIO
define('COL_AUDIO_CODE', "code_language");
define('COL_AUDIO_LABEL', "label_language");

// TBL_SUBTITLE
define('COL_SUBTITLE_CODE', "code_language");
define('COL_SUBTITLE_LABEL', "label_language");

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

// TBL_FILM_ROLE
define('COL_FILM_ROLE_CODE', "code_role");
define('COL_FILM_ROLE_LABEL', "label_role");

// TBL_FILM_PERS
define('COL_FILM_PERS_CODE', "code_pers_film");
define('COL_FILM_PERS_NAME', "name_pers_film");
define('COL_FILM_PERS_FIRSTNAME', "firstname_pers_film");

// TBL_HAVE
// Constants are already defined

// TBL_WATCH
// Constants are already defined

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