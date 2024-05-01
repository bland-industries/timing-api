<?php

// config for BlandIndustries/TimingApi
return [
    'max_batch_size' => 50, // the max batch size Mixpanel will accept is 50,
    'max_queue_size' => 1000, // the max num of items to hold in memory before flushing
    'debug' => false, // enable/disable debug mode
    'host' => 'https://web.timingapp.com', // the host name for api calls
    'use_ssl' => true, // use ssl when available
    'error_callback' => null, // callback to use on consumption failures
    'version' => 'v1', // default api version
    'token' => env('TIMING_API_TOKEN'), // api token
];
