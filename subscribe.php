<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["email"])) {
    $email = htmlspecialchars($_POST["email"]);
    $to = "rooiventure@hotmail.com";
    $subject = "New Newsletter Subscriber";
    $message = "A new user subscribed: $email";

    $headers = "From: no-reply@rooiventure.com";

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