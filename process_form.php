<!DOCTYPE html>
<html>
<head>
    <title>طلب فلاشة</title>
</head>
<body>

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
    echo "<h2>شكرًا لك!</h2>";
    echo "<p>تم استلام طلبك بنجاح. سنتواصل معك قريبًا.</p>";
} else {
?>
<h2>طلب فلاشة</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="flash_size">اختر حجم الفلاشة:</label>
    <select id="flash_size" name="flash_size">
        <option value="16">16 جيجا (120 جنيه)</option>
        <option value="32">32 جيجا (240 جنيه)</option>
        <option value="64">64 جيجا (325 جنيه)</option>
    </select>
    <br><br>
    <label for="name">الاسم:</label>
    <input type="text" id="name" name="name" required>
    <br><br>
    <label for="phone">رقم الهاتف:</label>
    <input type="tel" id="phone" name="phone" required>
    <br><br>
    <label for="whatsapp">رقم الواتساب:</label>
    <input type="tel" id="whatsapp" name="whatsapp" required>
    <br><br>
    <label for="city">المحافظة:</label>
    <select id="city" name="city">
        <option value="35">القاهرة (35 جنيه)</option>
        <option value="50">الإسكندرية (50 جنيه)</option>
        <!-- اكمل الخيارات هنا -->
    </select>
    <br><br>
    <label for="address">العنوان:</label>
    <textarea id="address" name="address" required></textarea>
    <br><br>
    <label for="notes">ملحوظات:</label>
    <textarea id="notes" name="notes"></textarea>
    <br><br>
    <input type="submit" value="شراء الآن">
</form>
<?php
}
?>

</body>
</html>
