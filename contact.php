<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $to = "rooiventure@hotmail.com"; // Your email
    $subject = "";
    $message = "";

    // --- CONTACT FORM ---
    if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["message"])) {
        $name = htmlspecialchars(trim($_POST["name"]));
        $email = filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL);
        $msg = htmlspecialchars(trim($_POST["message"]));

        if (!$name || !$email || !$msg) {
            header("Location: contact.html?error=1");
            exit;
        }

        $subject = "New Contact Message - Rooi Venture";
        $message = "Contact Form Submission:\n\n";
        $message .= "Name: $name\n";
        $message .= "Email: $email\n\n";
        $message .= "Message:\n$msg\n";

        $headers = "From: no-reply@rooiventure.com\r\n";
        $headers .= "Reply-To: $email\r\n";

    // --- BOOKING FORM ---
    } elseif (isset($_POST["tour-date"]) && isset($_POST["tour-type"]) && isset($_POST["details"])) {
        $date = htmlspecialchars(trim($_POST["tour-date"]));
        $type = htmlspecialchars(trim($_POST["tour-type"]));
        $details = htmlspecialchars(trim($_POST["details"]));

        if (!$date || !$type || !$details) {
            header("Location: contact.html?error=1");
            exit;
        }

        $subject = "New Tour Booking Request - Rooi Venture";
        $message = "Tour Booking Request:\n\n";
        $message .= "Date: $date\n";
        $message .= "Type: $type\n";
        $message .= "Details:\n$details\n";

        $headers = "From: no-reply@rooiventure.com\r\n";
        $headers .= "Reply-To: $to\r\n"; // Booking form may not include email
    } else {
        header("Location: contact.html?error=1");
        exit;
    }

    // --- SEND EMAIL ---
    if (mail($to, $subject, $message, $headers)) {
        header("Location: contact.html?success=1");
        exit;
    } else {
        header("Location: contact.html?error=1");
        exit;
    }
} else {
    header("Location: contact.html?error=1");
    exit;
}
?>