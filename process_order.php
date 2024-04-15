<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $flash_size = $_POST['flash_size'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $whatsapp = $_POST['whatsapp'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $notes = $_POST['notes'];

    // Calculate total order
    $total_order = $flash_size + $city;

    // Send email
    $to = "mesalmy@gmail.com";
    $subject = "طلب فلاشة";
    $message = "تم استلام طلب فلاشة بالتفاصيل التالية: \n\n";
    $message .= "حجم الفلاشة: " . $flash_size . " جيجا\n";
    $message .= "الاسم: " . $name . "\n";
    $message .= "رقم الهاتف: " . $phone . "\n";
    $message .= "رقم الواتساب: " . $whatsapp . "\n";
    $message .= "المحافظة: " . $city . "\n";
    $message .= "العنوان: " . $address . "\n";
    $message .= "ملحوظات: " . $notes . "\n";
    $message .= "المبلغ الإجمالي: " . $total_order . " جنيه";

    $headers = "From: mesalmy@gmail.com";

    mail($to, $subject, $message, $headers);

    // Redirect after sending email
    header('Location: thank_you.html');
}

?>
