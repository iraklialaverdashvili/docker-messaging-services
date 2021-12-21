<?php

require 'vendor/autoload.php';

use Aws\Sqs\SqsClient;
use Aws\Exception\AwsException;

/**
 * Receive SQS message
 *
 * ABOUT THIS PHP SAMPLE: This sample is part of the SDK for PHP Developer Guide topic at
 * https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/sqs-examples-send-receive-messages.html
 *
 * This code expects that you have AWS credentials set up per:
 * https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/guide_credentials.html
 */
$queueUrl = 'http://sqs:9324/queue/default';


$client = new SqsClient([
    'profile' => 'default',
    'region' => 'us-west-2',
    'version' => '2012-11-05'
]);

try {
    $result = $client->receiveMessage([
        'AttributeNames' => ['SentTimestamp'],
        'MaxNumberOfMessages' => 1,
        'MessageAttributeNames' => ['All'],
        'QueueUrl' => $queueUrl, /* Required */
        'WaitTimeSeconds' => 10, /* Required */
    ]);
    if (!empty($result->get('Messages'))) {
        print_r($result->get('Messages')[0]);

        $result = $client->deleteMessage([
            'QueueUrl' => $queueUrl, /* Required */
            'ReceiptHandle' => $result->get('Messages')[0]['ReceiptHandle'], /* Required */
        ]);
    } else {
        echo 'No messages in queue.' . PHP_EOL;
    }
} catch (AwsException $e) {
    /* output error message if fails */
    error_log($e->getMessage());
}
