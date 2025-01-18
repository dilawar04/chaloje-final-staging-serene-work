<?php


namespace App\Http\Controllers\Api;

use CodeDredd\Soap\Facades\Soap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SereneController extends Controller {
    public function __construct()
    {
        //$this->middleware('auth');
    }

    private function makeSession($api = 'serene'){
        $endpoint = 'http://srn.app.radixx.com/SRN/Radixx.ConnectPoint/ConnectPoint.Security.svc?wsdl';
        $params = ['CarrierCode' => 'ER', 'LogonID' => 'CHALOJE_ER_P', 'Password' => 'RGO$PRD!'];
        $header = ['SOAPAction' => 'http://tempuri.org/IConnectPoint_Security/RetrieveSecurityToken'];
        $response = Soap::withHeaders($header)
            ->baseWsdl($endpoint)
            ->call('RetrieveSecurityToken',$params);

        if ($response->ok()) {
            $json = $response->json();
            if ($json['Success']) {
                return $json['Response']['Data'];
            } else {
                return $json;
            }
        } else {
            dd('SERVER_ERROR ->',$response->serverError(), 'CLIENT_ERROR' ,$response->clientError());
        }
    }

    public function login() {
        $this->makeSession();
    }

}
