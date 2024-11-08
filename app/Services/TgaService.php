<?php

namespace App\Services;

use SoapClient;
use SoapFault;
use SoapVar;
use SoapHeader;
use DOMDocument;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Models\Course;
use App\Models\UnitOfCompetency;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateTimeZone;

class TgaService
{
    protected $client;
    protected $wsdlUrl = 'https://ws.training.gov.au/Deewr.Tga.Webservices/TrainingComponentServiceV12.svc?wsdl';
    protected $endpointUrl = 'https://ws.training.gov.au/Deewr.Tga.Webservices/TrainingComponentServiceV12.svc';

    public function __construct()
    {
        try {
            $username = config('tga.username');
            $password = config('tga.password');
            $wsseHeader = $this->createWsSecurityHeader($username, $password);
            $stream_context_opts = array(
                'http'=>array(
                    'header' => "Content-Type: text/xml; charset=utf-8" // For SOAP 1.2
                ),
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ],
            );
            $this->client = new SoapClient($this->wsdlUrl, [
                'soap_version' => SOAP_1_1,
                'stream_context' => $stream_context_opts, // Set the stream context
                'exceptions' => true,
                'trace' => 1, // Enable trace for debugging
                'cache_wsdl' => WSDL_CACHE_NONE, // Disable WSDL caching
            ]);
            $this->client->__setSoapHeaders($wsseHeader);

        } catch (SoapFault $e) {
            Log::error("SOAP Error during client initialization: " . $e->getMessage());
            throw $e; // Re-throw the exception after logging
        }
    }

    public function createWsSecurityHeader($username, $password)
    {
        $nonce = mt_rand();  // Create a random nonce
        $created = now()->format('Y-m-d\TH:i:s\Z');
        // Create the WS-Security header XML
        $xml = '
            <wsse:Security xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
                <wsse:UsernameToken>
                    <wsse:Username>' . $username . '</wsse:Username>
                    <wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">' . $password . '</wsse:Password>
                    <wsse:Nonce>' . base64_encode($nonce) . '</wsse:Nonce>
                    <wsu:Created xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">' . $created . '</wsu:Created>
                </wsse:UsernameToken>
            </wsse:Security>';

        // Create SoapVar object with the XML
        $soapVar = new \SoapVar($xml, XSD_ANYXML);

        // Create SoapHeader object
        $wsseHeader = new \SoapHeader(
            'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd',
            'Security',
            $soapVar,
            true
        );

        return $wsseHeader;
    }

    public function getCoursesByModifiedDate($startDate, $endDate, $page = 1, $pageSize = 100)
    {
        try {
            // Create the request object
            $request = [
                'request' => [
                    'StartDate' => [
                        'DateTime' => $startDate,
                        'OffsetMinutes' => 0
                    ],
                    'EndDate' => [
                        'DateTime' => $endDate,
                        'OffsetMinutes' => 0
                    ],
                    'PageSize' => $pageSize,
                    'PageNumber' => $page,
                    'IncludeLegacyData' => false,
                ],
            ];
            //SearchByModifiedDate
            $result = $this->client->__soapCall('SearchByModifiedDate', [$request]);
            return json_decode(json_encode($result), true)['SearchByModifiedDateResult'] ?? [];
        } catch (SoapFault $fault) {
            Log::error("SOAP Error getting total records: " . $fault->getMessage());
            return null;
        }
    }


    public function getCourseData($code)
    {
        try {
            // Create the request object
            $request = [
                'request' => [
                    'Code' => $code,
                ],
            ];
            //Get course details
            $result = $this->client->__soapCall('GetDetails', [$request]);
            return json_decode(json_encode($result), true)['GetDetailsResult'] ?? [];
        } catch (SoapFault $fault) {
            Log::error("SOAP Error fetching course details: " . $fault->getMessage());
            return null;
        } catch (Exception $e) {
            Log::error("General Error fetching course details: " . $e->getMessage());
            return null;
        }
    }
}