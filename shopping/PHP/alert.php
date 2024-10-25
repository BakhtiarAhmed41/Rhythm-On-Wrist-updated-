<?php
// Create a new file called PHP/alert.php
function display_alert($message, $type = 'success') {
    if (!isset($_SESSION['alerts'])) {
        $_SESSION['alerts'] = [];
    }
    $_SESSION['alerts'][] = [
        'message' => $message,
        'type' => $type
    ];
}

function show_alerts() {
    if (isset($_SESSION['alerts']) && !empty($_SESSION['alerts'])) {
        foreach ($_SESSION['alerts'] as $alert) {
            echo "<div class='alert alert-{$alert['type']} alert-dismissible fade show' role='alert'>
                    {$alert['message']}
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
        }
        // Clear alerts after displaying
        $_SESSION['alerts'] = [];
    }
}