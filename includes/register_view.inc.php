<?php

declare(strict_types=1);

function check_register_errors() {
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        echo "<br>";
        foreach ($errors as $error) {
            echo '<p>'. $error . '</p>';
        }

        unset($_SESSION['errors_signup']);
    }
}