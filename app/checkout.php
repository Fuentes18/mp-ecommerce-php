<?php
    // Get app configuration
    require_once 'config/configuration.php';

    //Mercado Pago SDK
    require 'vendor/autoload.php';

    //Add Mercado Pago credentials
    MercadoPago\SDK::setAccessToken(MP_ACCESS_TOKEN);

    //Add Mercado Pago integrator id
    MercadoPago\SDK::setIntegratorId(MP_INTEGRATOR_ID);

    //Preference
    $preference = new MercadoPago\Preference();

    //Payer information
    $payer = new MercadoPago\Payer();

    $payer->email = "test_user_36961754@testuser.com";
    $payer->name = "Lalo";
    $payer->surname = "Landa";
    $payer->phone = array(
        "area_code" => "54",
        "number" => "95551223"
    );
    $payer->address = array(
        "zip_code" => "1004",
        "street_number" => "123",
        "street_name" => "Falsa"
    );

    //Item information
    $item = new MercadoPago\Item();
    $item->id = 1234;
    $item->title = $_POST['title'];
    $item->quantity = 1;
    $item->unit_price = $_POST['price'];

    $img = explode("/", $_POST["img"]);
    $item->picture_url = RUTE_URL. "/" . $img[1];

    $item->description = "Dispositivo móvil de Tienda e-commerce";

    //Preference
    $preference->items = array($item);
    $preference->payer = $payer;
    $preference->payment_methods = array(
        "excluded_payment_methods" => array(
            array("id" => "visa")
        ),
        "installments" => 6
    );

    $preference->external_reference = "fuentes.emanuel18@gmail.com";
    $preference->auto_return = "approved";
    $preference->notification_url = RUTE_URL."/app/ipn.php";
    $preference->back_urls = array(
        "success" => RUTE_URL . "/callback/success.php",
        "failure" => RUTE_URL . "/callback/failure.php",
        "pending" => RUTE_URL . "/callback/pending.php"
    );

    $preference->save();
