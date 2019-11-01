<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/10/19
 * Time: 2:51 PM
 */

namespace DedeGunawan\VaBtnUnsil2\Services;


use DedeGunawan\VaBtnUnsil2\Exceptions\BaseException;
use DedeGunawan\VaBtnUnsil2\Exceptions\ExceptionChooser;
use DedeGunawan\VaBtnUnsil2\Exceptions\InvalidJsonException;
use DedeGunawan\VaBtnUnsil2\Requests\BaseRequest;
use DedeGunawan\VaBtnUnsil2\Responses\BaseResponse;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

class Api
{
    protected static $debug=false;
    protected static $id;
    protected static $key;
    protected static $secret;
    protected $endpoint_url;
    protected static $api_url;
    protected static $signature;
    protected $options=array();
    protected $request=array();
    protected $response_class;
    /**
     * @var BaseResponse
     */
    protected $response;
    /**
     * @var ResponseInterface
     */
    protected $response_guzzle;

    /**
     * @var $guzzle Client
     */
    protected $guzzle;

    /**
     * @param null $datas
     * @return BaseResponse
     * @throws \Exception
     */
    public function send($datas=null)
    {
        $this->initGuzzle();

        $endpoint_url = $this->getEndpointUrl();
        if (!$endpoint_url) throw new \Exception("Endpoint Url belum di set");

        if ($datas instanceof BaseRequest) {
            $datas = $datas->toArray();
            $datas = array_filter($datas,function ($data) {
                return strlen($data);
            });
        }

        if (!$datas || !is_array($datas) || empty($datas)) $datas = $this->getRequest();

        $this->generateSignature($datas);

        $config = $this->getGuzzle()->getConfig();

        $response = $this->getGuzzle()->post($endpoint_url, [
            'headers' => ['signature' => self::getSignature()],
            RequestOptions::JSON => $datas,
        ]);

        $this->setResponseGuzzle($response);

        $this->parseResponse();

        return $this->getResponse();
    }

    protected function parseResponse()
    {
        $responseGuzzle = $this->getResponseGuzzle();
        $contents = @json_decode($responseGuzzle->getBody()->getContents(), 1);

        if (!is_array($contents)) throw new InvalidJsonException();

        $rsp = @$contents['rsp'];
        $rspdesc = @$contents['rspdesc'];
        if ($rsp !== '000') {
            $reflection = new \ReflectionClass(ExceptionChooser::choose($rsp));
            $instance = $reflection->newInstanceArgs([$rspdesc]);
            if (!$instance instanceof \Throwable) throw new BaseException();
            $instance->setRequest($this->getRequest());
            $instance->setResponse($this->getResponse());
            throw $instance;
        }

        if (!$this->getResponseClass()) $this->setResponseClass(BaseResponse::class);

        $response = call_user_func_array(
            array($this->getResponseClass(), 'build'),
            [$contents]
        );
        $this->setResponse($response);

    }

    public function generateSignature($body)
    {
        $signature = SignatureGenerator::generate(
            self::getId(), self::getSecret(),
            self::getKey(), json_encode($body)
        );
        self::setSignature($signature);
    }


    public function initGuzzle()
    {
        if (!self::getApiUrl()) throw new \Exception("Api Url belum di set");
        if (!self::getId()) throw new \Exception("Api ID belum di set");
        if (!self::getKey()) throw new \Exception("Api Key belum di set");
        if (!self::getSecret()) throw new \Exception("Api Secret belum di set");

        $options = $this->getOptions();
        $options['base_uri'] = self::getApiUrl();
        $options['debug'] = self::getDebug();
        $options['verify'] = false;
        $options['headers']['id'] = self::getId();
        $options['headers']['key'] = self::getKey();
        $options['headers']['secret'] = self::getSecret();

        $client = new Client($options);
        $this->setGuzzle($client);
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }

    /**
     * @return Client
     */
    public function getGuzzle()
    {
        return $this->guzzle;
    }

    /**
     * @param Client $guzzle
     */
    public function setGuzzle($guzzle)
    {
        $this->guzzle = $guzzle;
    }

    /**
     * @return mixed
     */
    public static function getId()
    {
        return self::$id;
    }

    /**
     * @param mixed $id
     */
    public static function setId($id)
    {
        self::$id = $id;
    }

    /**
     * @return mixed
     */
    public static function getKey()
    {
        return self::$key;
    }

    /**
     * @param mixed $key
     */
    public static function setKey($key)
    {
        self::$key = $key;
    }

    /**
     * @return mixed
     */
    public static function getSecret()
    {
        return self::$secret;
    }

    /**
     * @param mixed $secret
     */
    public static function setSecret($secret)
    {
        self::$secret = $secret;
    }

    /**
     * @return mixed
     */
    public function getEndpointUrl()
    {
        return $this->endpoint_url;
    }

    /**
     * @param mixed $endpoint_url
     */
    public function setEndpointUrl($endpoint_url)
    {
        $this->endpoint_url = $endpoint_url;
    }

    /**
     * @return mixed
     */
    public static function getApiUrl()
    {
        return self::$api_url;
    }

    /**
     * @param mixed $api_url
     */
    public static function setApiUrl($api_url)
    {
        self::$api_url = $api_url;
    }

    /**
     * @return mixed
     */
    public static function getSignature()
    {
        return self::$signature;
    }

    /**
     * @param mixed $signature
     */
    public static function setSignature($signature)
    {
        self::$signature = $signature;
    }

    /**
     * @return mixed
     */
    public static function getDebug()
    {
        return self::$debug;
    }

    /**
     * @param mixed $debug
     */
    public static function setDebug($debug)
    {
        self::$debug = $debug;
    }

    /**
     * @return array
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param array $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

    /**
     * @return BaseResponse
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param BaseResponse $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponseGuzzle()
    {
        return $this->response_guzzle;
    }

    /**
     * @param ResponseInterface $response_guzzle
     */
    public function setResponseGuzzle($response_guzzle)
    {
        $this->response_guzzle = $response_guzzle;
    }

    /**
     * @return mixed
     */
    public function getResponseClass()
    {
        return $this->response_class;
    }

    /**
     * @param mixed $response_class
     */
    public function setResponseClass($response_class)
    {
        $this->response_class = $response_class;
    }


}