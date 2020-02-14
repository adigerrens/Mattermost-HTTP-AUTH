<?php

die();

header('Content-Type: text/plain; charset="UTF-8"');

try {
    require_once __DIR__ . '/LDAP/config_ldap.php';

    $ldap_base_dn_entry = $ldap_base_dn[0];
    $ldap_search_filter = '(&(objectClass=user)(samaccountname=*))';

    $ldap_link = ldap_connect($ldap_host);
    $bind = ldap_bind($ldap_link, $ldap_bind_dn, $ldap_bind_pass);

    $ldap_result = ldap_search($ldap_link, $ldap_base_dn_entry, $ldap_search_filter, array('*'), 0, 1, 10);

    if($ldap_result) {
        $ldap_data = ldap_get_entries($ldap_link, $ldap_result);
        print_r($ldap_data);
    }
} catch (Exception $exception) {
    print_r($exception);
}