<?php

namespace App\Traits;
use App\Booking;
use Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use SimpleXMLElement;

trait Airserene
{    

    private static $credential;
    public static $search = "/(\<|\/+)\w\:/m";
    public static $replace = "$1";

    public static function SetCredential()
    {
        $OPT = json_decode(opt('airserene'), 1);
        $mode = $OPT['mode'];
        $crd = [
            'Username' => $OPT[$mode]['Username'],
            'Password' => $OPT[$mode]['Password'],
            'CarrierCode' => $OPT[$mode]['CarrierCode'],
            'IATANum' => $OPT[$mode]['IATANum'],
        ];
        //dd($crd);
        self::$credential = $crd;
    }

    public static function parseXML($xml)
    {
        $clean_xml = str_replace('htt//', 'http://', preg_replace(self::$search, self::$replace, $xml));
        $xml = simplexml_load_string($clean_xml);
        return json_decode(json_encode($xml));
    }

    public  function SaveReservation($response = [],$params = [])
    {
        self::SetCredential();        

        // $token = \App\AirSerene::RetrieveSecurityToken();

        $booking = Booking::find($response['Order_Ref_Number']);
        
        $token = $booking->serene_token;
        $default = [
            'ActionType' => 'SaveReservation',
            'SeriesNumber' => 299,
            'ConfirmationNumber' => $booking->pnr
        ];

            //  dd($default);
        $params = array_merge($default, $params);
        
        $client = new Client();
        $headers = [
            'Content-Type' => 'text/xml',
            'SOAPAction' => 'http://tempuri.org/IConnectPoint_Reservation/CreatePNR',
            // 'Cookie' => 'ASP.NET_SessionId=lo4ynsutfldthdgtltstck4w'

        ];
        $action = end(explode('/', $headers['SOAPAction']));

        $body = '<soapenv:Envelope
        xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/"
        xmlns:tem="http://tempuri.org/"
        xmlns:rad="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request"
        xmlns:rad1="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Reservation.Request">
        <soapenv:Header/>
        <soapenv:Body>
            <tem:CreatePNR>
                <!--Optional:-->
                <tem:CreatePnrRequest>
                    <rad:SecurityGUID>' . $token . '</rad:SecurityGUID>
                    <rad:CarrierCodes>
                        <!--Zero or more repetitions:-->
                        <rad:CarrierCode>
                            <rad:AccessibleCarrierCode>' . self::$credential['CarrierCode'] . '</rad:AccessibleCarrierCode>
                        </rad:CarrierCode>
                    </rad:CarrierCodes>
                    <!--Optional:-->
                    <rad:ClientIPAddress xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">'. \request()->ip() .' </rad:ClientIPAddress>
                    <!--Optional:-->
                    <rad:HistoricUserName xsi:nil="true"
                        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                        <rad1:ActionType>'.$params['ActionType'].'</rad1:ActionType>
                        <rad1:ReservationInfo>
                            <rad:SeriesNumber>'.$params['SeriesNumber'].'</rad:SeriesNumber>
                            <rad:ConfirmationNumber xmlns="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Request">'.$params['ConfirmationNumber'].'</rad:ConfirmationNumber>
                            </rad1:ReservationInfo>
                        </tem:CreatePnrRequest>
                    </tem:CreatePNR>
                </soapenv:Body>
            </soapenv:Envelope>';
            // dd($body);
        // dump('CreatePNR(CommitSummary)' , $body);

        if(req('c')){
            $action = end(explode('/', $headers['SOAPAction']));
            $RQ = collect(['URI' => 'https://srn.app.radixxhost.com/SRN/Radixx.ConnectPoint/ConnectPoint.Reservation.svc'])->merge($headers)->map(function ($val, $key){
                return "{$key} : {$val}";
            })->join("\n");
            $RQ .= "\n-------------------------------------------------------------------------- \n\n";
            $RQ .= $body;
            \File::put("{$action}-RQ.xml", $RQ);
        }

        $response = $client->request('POST', 'https://srn.app.radixxhost.com/SRN/Radixx.ConnectPoint/ConnectPoint.Reservation.svc', [
            'headers' => $headers,
            'body' => $body
        ]);

        $xml = $response->getBody()->getContents();
        if(req('c')){
            \File::put( "{$action}-RS.xml", $xml);
        }

        $json_data = self::parseXML($xml);
        // dump($params['ActionType'],$body);
        // dump($params['ActionType'],$json_data);
        // exit;
        $response =  $json_data->Body->{"{$action}Response"}->{"{$action}Result"};

    }
}