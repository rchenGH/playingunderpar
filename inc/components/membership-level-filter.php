<?php

if(pmpro_hasMembershipLevel(array("2")) ) {
    $terms = 19;
}

if(pmpro_hasMembershipLevel(array("3")) ) {
    $terms = 20;
} 

if(pmpro_hasMembershipLevel(array("4", "5", "6", "7", "8")) ) {
    $terms = array(19, 20);
} 

?>