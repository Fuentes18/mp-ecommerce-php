<?php
    // Base URL
    define("RUTE_URL", (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https" : "http") . "://$_SERVER[HTTP_HOST]");

    //Mercado Pago credentials
    define('MP_ACCESS_TOKEN', 'APP_USR-8709825494258279-092911-227a84b3ec8d8b30fff364888abeb67a-1160706432');

    //Mercado Pago integrator id
    define('MP_INTEGRATOR_ID', 'dev_24c65fb163bf11ea96500242ac130004');