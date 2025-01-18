<?php

namespace App\Helpers;

class HBL
{
    private $publicPEMKey = '-----BEGIN PUBLIC KEY-----
MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEAs3LjqaxR51XzybpwlYOp
F4mIIDSs3ymZzadwq467O2mfrwVL1V5HlDhOCzaCwhW1gSsl90Nfc/NYKlHIxzEh
VUlG2nMYH2WXegy47CFwFdiSnE/FM38Nklz/uah7cVDreJU5AJlUNoMI3GFd9o3n
tTZ2ElmXzw38vEXLjPg8by1Od2f6kljxv3Qva+V+2KLYXbKWOwoLpdONhjPNmBCm
4nYxxrwIGYSnQJrdWMdHPRbY4xkIpXX06NwXwIipFphMVTl/p1GtvFpRBKOwhkZJ
yvPuI0mgCHHYfVLdjIivKQ8PeXJCP+x26dE5r2XPzAEHivCcI+K5kiWFf/fGj74O
0tL3jWJ02bcxHMisl0nbpGkb8SszYV2o1E8tDlYnx3QpLHL5xKufdxEjbaXebQXl
yA/O9M722/mFZh2TQqqZhewEUS0bJYJf4m37hhCobMwXwvbJR+wnac0juMZR1GOy
APACErIzUc+FaJ4wKat0YBCveg237GtOqS6CYKnq+SIJpw0m+nuoEOMzj6nnK2m6
xtC0pHbr3gZWijwxVhEm6pUZTR8JU3eqC5JE4xQIBK1aFA9TJ2eVC1hCxSi1+9Ga
Gc+pYYQdvzQJDdMmaGSGzKOl3bQUTfxOMh7+OHV3iiQojpkCjcB8ihF3o2/ZHPnt
hE8yAEdRJwFbjNmhVInjwZcCAwEAAQ==
-----END PUBLIC KEY-----';

    public function rsaEncryptCyb($plainData, $publicPEMKey = null)
    {
        if (!$publicPEMKey)
            $publicPEMKey = $this->publicPEMKey;

        $encryptionOk = openssl_public_encrypt($plainData, $encryptedData, $publicPEMKey, OPENSSL_PKCS1_PADDING);

        if ($encryptionOk === false) {
            return false;
        }
        return base64_encode($encryptedData);

        return false;

    }

    public function rsaDecryptCyb($data, $publicPEMKey = null)
    {
        //to do
    }
}

function decryptData($data)
{
    $privatePEMKey = '-----BEGIN RSA PRIVATE KEY-----
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
-----END RSA PRIVATE KEY-----';
    $DECRYPT_BLOCK_SIZE = 512;
    $decrypted = '';

    $data = str_split(base64_decode($data), $DECRYPT_BLOCK_SIZE);
    foreach($data as $chunk)
    {
        $partial = '';

        $decryptionOK = openssl_private_decrypt($chunk, $partial, $privatePEMKey, OPENSSL_PKCS1_PADDING);

        if($decryptionOK === false)
        {
            $decrypted = '';
            return $decrypted;
        }
        $decrypted .= $partial;
    }

    return utf8_decode($decrypted);
}

function recParamsEncryption($arrJson, $cyb, $public_key)
{
    foreach ($arrJson as $jsonIndex => $jsonValue) {
        if (!is_array($jsonValue))
            if ($jsonIndex !== 'USER_ID')
                $arrJson[$jsonIndex] = $cyb->rsaEncryptCyb($jsonValue, $public_key);
            else{
                $arrJson[$jsonIndex] = $jsonValue;
            }

        else {
            $arrJson[$jsonIndex] = recParamsEncryption($jsonValue, $cyb, $public_key);
        }
    }
    return $arrJson;
}

function callAPI($method, $url, $data)
{
    $is_live = 'no';
    $use_proxy = 'no';
    $curl = curl_init();
    switch ($method) {
        case 'POST':
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data) curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case 'PUT':
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
            if ($data) curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        default:
            if ($data) $url = sprintf('%s?%s', $url, http_build_query($data));
    }// OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    if ($is_live === 'yes') {
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    }// PROXY
    if ($use_proxy === 'yes') {
        //$proxy = ‘your proxy’;curl_setopt($curl, CURLOPT_PROXY, $proxy);
    }//EXECUTE
    $result = curl_exec($curl);
    if (!$result) {
        die('Connection Failure'.$result);
    }
    curl_close($curl);
    return $result;
}

function debug($mixParam, $bolToStop = false)
{
    if (defined('DEBUG_MODE') && DEBUG_MODE == '1') {
        $arrDebugParams = debug_backtrace();
        //print_r($arrDebugParams);

        echo '<pre style="background-color:#F90; border:#000 thin solid; font-family:Verdana, Geneva, sans-serif;padding:3px;">';
        echo 'Value of variable at <i>' . $arrDebugParams[0]['file'] . ':' . $arrDebugParams[0]['line'] . '</i> is <br />';
        if (empty($mixParam))
            echo '<i><b>empty</b></i>';
        else
            print_r($mixParam);
        echo '</pre>';


        //echo $strOutputHtml;
        if ($bolToStop)
            exit;
    }
}
