<?php
    // Get app configuration
    require_once 'config/configuration.php';

    //Mercado Pago SDK
    require '../vendor/autoload.php';

    use MercadoPago;

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
    $item->picture_url = "https://alejandro088-mp-ecommerce-php.herokuapp.com" . $img;
    $item->description = "Dispositivo móvil de Tienda e-commerce";

    //Preference
    $preference->items = array($item);
    $preference->payer = $payer;
    $preference->payment_methods = array(
        "excluded_payment_methods" => array(
            array("id" => "amex")
        ),
        "excluded_payment_types" => array(
            array("id" => "atm")
        ),
        "installments" => 6
    );

