<?php

namespace BlandIndustries\TimingApi;

use GuzzleHttp\Client;

class TimingApi
{

    /**
     * End point of api.
     *
     * @var string
     */
    protected $endPoint = 'time-entries';

    /**
     * An array of options to be used by the Mixpanel library.
     * @var array
     */
    protected $options = [];

    /**
     * Query Parameters to send in request.
     * @var array
     */
    protected $queryParameters = [];

    /**
     * Body to send in request.
     * @var string
     */
    protected $body = '';

    /**
     * Construct a new Timing API object and merge custom options with defaults
     * @param array $options
     */
    public function __construct($options = array())
    {
        $defaults = config('timing-api');

        $options = array_merge($defaults, $options);
        $this->options = $options;
        if (!$this->options['token']) {
            $this->options['token'] = config('timing-api.token');
        }
    }


    /**
     * Log a message to PHP's error log
     * @param $msg
     */
    protected function log($msg)
    {
        $arr = debug_backtrace();
        $class = $arr[0]['class'];
        $line = $arr[0]['line'];
        error_log("[ $class - line $line ] : " . $msg);
    }


    /**
     * Returns true if in debug mode, false if in production mode
     * @return bool
     */
    protected function debug()
    {
        return array_key_exists("debug", $this->options) && $this->options["debug"] == true;
    }

    public function call(array $options = [])
    {
        $endPoint = (array_key_exists('endPoint', $options)) ? $options['endPoint'] : $this->endPoint;
        $path = "api/{$this->options['version']}/{$endPoint}";

        $httpMethod
            = (array_key_exists('httpMethod', $options)) ? $options['httpMethod'] : "GET";

        $client = new Client(['base_uri' => $this->options['host']]);
        $response = $client->request(
            $httpMethod,
            $path,
            [
                'debug'   => $this->debug(),
                'body' => $this->body,
                'headers' =>
                [
                    'Authorization' => "Bearer " . $this->options['token'],
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json'
                ],
                'query' => $this->queryParameters
            ]
        );
        return json_decode($response->getBody(), true);
    }

    /**
     * Get the requested data from the api.
     * Returns the result set of the api request as associative array.
     *
     * @return array
     */
    public function get()
    {
        return $this->call()['data'];
    }
}
