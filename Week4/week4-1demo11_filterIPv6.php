<?php
    $ip = "6001:0db8:85a3:08d3:1319:8a2e:0370:733E";

    if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false) {
        echo("$ip is a valid IPv6 address");
    } else {
        echo("$ip is not a valid IPv6 address");
    }
?>
