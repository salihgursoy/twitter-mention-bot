<?php

function logMentionSnapshot($tweetId, $mentions, $likes, $retweets) {

    $snapshot = [
        "tweet_id" => $tweetId,
        "mentions" => $mentions,
        "likes" => $likes,
        "retweets" => $retweets,
        "timestamp" => gmdate("c")
    ];

    $file = __DIR__ . "/mention_snapshots.jsonl";

    file_put_contents(
        $file,
        json_encode($snapshot) . PHP_EOL,
        FILE_APPEND
    );

    return $snapshot;
}


// example logging cycle
$tests = [
    ["tweet_id" => "882114", "mentions" => 1, "likes" => 2, "retweets" => 0],
    ["tweet_id" => "882114", "mentions" => 6, "likes" => 5, "retweets" => 1],
    ["tweet_id" => "882114", "mentions" => 18, "likes" => 11, "retweets" => 3]
];

foreach ($tests as $run) {

    $result = logMentionSnapshot(
        $run["tweet_id"],
        $run["mentions"],
        $run["likes"],
        $run["retweets"]
    );

    echo "Logged snapshot:\n";
    print_r($result);
    echo "\n";

    sleep(1);
}

?>
