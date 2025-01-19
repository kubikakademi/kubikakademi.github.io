<?php
// Form verilerini al
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$service = $_POST['service'];
$note = $_POST['note'];

// Verileri işleme ve gerekli eylemleri gerçekleştirme
if(isset($name) && isset($email) && isset($phone) && isset($service)){
    // Veritabanına kaydetme veya e-posta gönderme gibi işlemler burada yapılabilir
    
    // Kullanıcıya onay e-postası gönder
    $to = $email;
    $subject = 'Talebiniz Alındı';
    $message = 'Merhaba ' . $name . ', talebiniz başarıyla alınmıştır.';
    $headers = 'From: emirhan.asik61@gmail.com' . "\r\n" .
        'Reply-To: emirhan.asik61@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
    
    // Başarılı gönderim durumunda mesajı oluştur
    $response = array('status' => 'success', 'message' => 'Talebiniz oluşturulmuştur.');
} else {
    // Başarısız gönderim durumunda mesajı oluştur
    $response = array('status' => 'error', 'message' => 'Maalesef talebiniz oluşturulamamıştır.');
}

// JSON formatında yanıtı geri gönder
header('Content-Type: application/json');
echo json_encode($response);
?>
