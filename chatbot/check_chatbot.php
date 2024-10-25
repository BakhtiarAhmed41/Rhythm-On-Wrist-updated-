<?php
header('Content-Type: application/json');

function isPortInUse($port) {
    $connection = @fsockopen('127.0.0.1', $port);
    if (is_resource($connection)) {
        fclose($connection);
        return true;
    }
    return false;
}

$status = isPortInUse(8000);
echo json_encode(['running' => $status]);


// Function to check if chatbot is running
function checkChatbotStatus() {
    fetch('check_chatbot.php')
        .then(response => response.json())
        .then(data => {
            const aiAssistantLink = document.querySelector('a[href*="start_chatbot.php"]');
            if (data.running) {
                aiAssistantLink.href = 'http://localhost:8000';
            } else {
                aiAssistantLink.href = '/Web Engineering Project (Rhythm on Wrist)/start_chatbot.php';
            }
        })
        .catch(error => console.error('Error checking chatbot status:', error));
}

// Check status when page loads
document.addEventListener('DOMContentLoaded', checkChatbotStatus);
// Check status every 30 seconds
setInterval(checkChatbotStatus, 30000);


?>


