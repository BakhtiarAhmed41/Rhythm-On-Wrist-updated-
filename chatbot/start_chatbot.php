<?php
function isPortInUse($port) {
    $connection = @fsockopen('127.0.0.1', $port);
    if (is_resource($connection)) {
        fclose($connection);
        return true;
    }
    return false;
}

// Check if chatbot is already running
if (!isPortInUse(8000)) {
    // For Windows
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        pclose(popen('start /B start_chatbot.bat', 'r'));
    } else {
        // For Linux/Unix
        exec('bash start_chatbot.sh > /dev/null 2>&1 &');
    }
    // Wait for the server to start
    sleep(5);
}

// Redirect to the chatbot URL
header('Location: http://localhost:8000');
exit();
?>