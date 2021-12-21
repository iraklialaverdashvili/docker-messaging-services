<?php

require 'vendor/autoload.php';

use Aws\Sqs\SqsClient;
use Aws\Exception\AwsException;

/**
 * Receive SQS Queue with Long Polling
 *
 * ABOUT THIS PHP SAMPLE: This sample is part of the SDK for PHP Developer Guide topic at
 * https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/sqs-examples-send-receive-messages.html
 *
 * This code expects that you have AWS credentials set up per:
 * https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/guide_credentials.html
 */

$client = new SqsClient([
    'profile' => 'default',
    'region' => 'us-west-2',
    'version' => '2012-11-05'
]);

$params = [
    'DelaySeconds' => 10,
    'MessageAttributes' => [
        'Title' => [
            'DataType' => 'String',
            'StringValue' => "The Hitchhiker's Guide to the Galaxy"
        ],
        'Author' => [
            'DataType' => 'String',
            'StringValue' => 'Douglas Adams.'
        ],
        'WeeksOn' => [
            'DataType' => 'Number',
            'StringValue' => '6'
        ]
    ],
    'MessageBody' => 'Information about current NY Times fiction bestseller for week of 12/11/2016.',
    'QueueUrl' => 'http://sqs:9324/queue/default'
];

try {
    $result = $client->sendMessage($params);
    print_r($result);
} catch (AwsException $e) {
    /* output error message if fails */
    error_log($e->getMessage());
}
