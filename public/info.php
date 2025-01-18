<?php
echo '<table>';
echo '<tr>';
echo '<td><img src="https://s3.ap-south-1.amazonaws.com/st-airline-images/9P.png" class="img-fluid blur-up lazyloaded" width="100" alt=""></td>';
echo '</tr>';
foreach (range('A', 'Z') as $col){
    echo '<tr>';
    foreach (range('A', 'Z') as $column){
        echo '<td><img src="https://s3.ap-south-1.amazonaws.com/st-airline-images/'.$col . $column.'.png" class="img-fluid blur-up lazyloaded" width="100" alt=""></td>';
    }
    echo '</tr>';
}
echo '</table>';
die();

//$search = ["/(\<|\/)?\w\:/m", 'htt//'];
//$replace = ["$1", 'http://'];

//$search = "/(\<|\/)?\w\:/m";
$search = "/(\<|\/+)\w\:/m";
$replace = "$1";

$xml = '<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/"><s:Body><GetFlightScheduleInformationResponse xmlns="http://tempuri.org/"><GetFlightScheduleInformationResult xmlns:a="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Flight.Response" xmlns:i="http://www.w3.org/2001/XMLSchema-instance"><a:FlightSchedule><a:FlightInformation><a:FlightNumber>ER-502</a:FlightNumber><a:Origin>KHI</a:Origin><a:Destination>ISB</a:Destination><a:EstimatedDeparture>13:15</a:EstimatedDeparture><a:EstimatedArrival>15:15</a:EstimatedArrival><a:ActualDeparture>13:15</a:ActualDeparture><a:ActualArrival>15:15</a:ActualArrival><a:TimeAdjustor>0</a:TimeAdjustor><a:Stops>0</a:Stops><a:Frequency>1</a:Frequency><a:Duration>2:00</a:Duration><a:EffectiveDate>2022-10-24T00:00:00</a:EffectiveDate><a:ExpirationDate>2022-10-30T00:00:00</a:ExpirationDate></a:FlightInformation><a:FlightInformation><a:FlightNumber>ER-504</a:FlightNumber><a:Origin>KHI</a:Origin><a:Destination>ISB</a:Destination><a:EstimatedDeparture>21:00</a:EstimatedDeparture><a:EstimatedArrival>23:00</a:EstimatedArrival><a:ActualDeparture>21:00</a:ActualDeparture><a:ActualArrival>23:00</a:ActualArrival><a:TimeAdjustor>0</a:TimeAdjustor><a:Stops>0</a:Stops><a:Frequency>2</a:Frequency><a:Duration>2:00</a:Duration><a:EffectiveDate>2022-10-24T00:00:00</a:EffectiveDate><a:ExpirationDate>2022-10-30T00:00:00</a:ExpirationDate></a:FlightInformation><a:FlightInformation><a:FlightNumber>ER-504</a:FlightNumber><a:Origin>KHI</a:Origin><a:Destination>ISB</a:Destination><a:EstimatedDeparture>18:30</a:EstimatedDeparture><a:EstimatedArrival>20:30</a:EstimatedArrival><a:ActualDeparture>18:30</a:ActualDeparture><a:ActualArrival>20:30</a:ActualArrival><a:TimeAdjustor>0</a:TimeAdjustor><a:Stops>0</a:Stops><a:Frequency>3</a:Frequency><a:Duration>2:00</a:Duration><a:EffectiveDate>2022-10-24T00:00:00</a:EffectiveDate><a:ExpirationDate>2022-10-30T00:00:00</a:ExpirationDate></a:FlightInformation><a:FlightInformation><a:FlightNumber>ER-504</a:FlightNumber><a:Origin>KHI</a:Origin><a:Destination>ISB</a:Destination><a:EstimatedDeparture>18:30</a:EstimatedDeparture><a:EstimatedArrival>20:30</a:EstimatedArrival><a:ActualDeparture>18:30</a:ActualDeparture><a:ActualArrival>20:30</a:ActualArrival><a:TimeAdjustor>0</a:TimeAdjustor><a:Stops>0</a:Stops><a:Frequency>4</a:Frequency><a:Duration>2:00</a:Duration><a:EffectiveDate>2022-10-24T00:00:00</a:EffectiveDate><a:ExpirationDate>2022-10-30T00:00:00</a:ExpirationDate></a:FlightInformation><a:FlightInformation><a:FlightNumber>ER-502</a:FlightNumber><a:Origin>KHI</a:Origin><a:Destination>ISB</a:Destination><a:EstimatedDeparture>13:15</a:EstimatedDeparture><a:EstimatedArrival>15:15</a:EstimatedArrival><a:ActualDeparture>13:15</a:ActualDeparture><a:ActualArrival>15:15</a:ActualArrival><a:TimeAdjustor>0</a:TimeAdjustor><a:Stops>0</a:Stops><a:Frequency>5</a:Frequency><a:Duration>2:00</a:Duration><a:EffectiveDate>2022-10-24T00:00:00</a:EffectiveDate><a:ExpirationDate>2022-10-30T00:00:00</a:ExpirationDate></a:FlightInformation><a:FlightInformation><a:FlightNumber>ER-504</a:FlightNumber><a:Origin>KHI</a:Origin><a:Destination>ISB</a:Destination><a:EstimatedDeparture>21:00</a:EstimatedDeparture><a:EstimatedArrival>23:00</a:EstimatedArrival><a:ActualDeparture>21:00</a:ActualDeparture><a:ActualArrival>23:00</a:ActualArrival><a:TimeAdjustor>0</a:TimeAdjustor><a:Stops>0</a:Stops><a:Frequency>6</a:Frequency><a:Duration>2:00</a:Duration><a:EffectiveDate>2022-10-24T00:00:00</a:EffectiveDate><a:ExpirationDate>2022-10-30T00:00:00</a:ExpirationDate></a:FlightInformation><a:FlightInformation><a:FlightNumber>ER-502</a:FlightNumber><a:Origin>KHI</a:Origin><a:Destination>ISB</a:Destination><a:EstimatedDeparture>13:00</a:EstimatedDeparture><a:EstimatedArrival>15:00</a:EstimatedArrival><a:ActualDeparture>13:00</a:ActualDeparture><a:ActualArrival>15:00</a:ActualArrival><a:TimeAdjustor>0</a:TimeAdjustor><a:Stops>0</a:Stops><a:Frequency>7</a:Frequency><a:Duration>2:00</a:Duration><a:EffectiveDate>2022-10-24T00:00:00</a:EffectiveDate><a:ExpirationDate>2022-10-30T00:00:00</a:ExpirationDate></a:FlightInformation></a:FlightSchedule><a:Exceptions xmlns:b="http://schemas.datacontract.org/2004/07/Radixx.ConnectPoint.Exceptions"/></GetFlightScheduleInformationResult></GetFlightScheduleInformationResponse></s:Body></s:Envelope>';


//$clean_xml = str_replace('htt//', 'http://', preg_replace($search, $replace, $xml));
$clean_xml = preg_replace($search, $replace, $xml);

//$clean_xml = preg_replace($search, $replace, $xml);

$xml = simplexml_load_string($clean_xml);
$json_data = json_decode(json_encode($xml), 1);
echo "<pre>"; print_r($json_data); echo "</pre>";
?>
