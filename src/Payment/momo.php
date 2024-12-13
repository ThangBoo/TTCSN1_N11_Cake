<?php
session_start();
include "../admincp/config/Connect.php";

if (isset($_POST['cod']) ) {
    $user_id = isset($_SESSION['user']) ? $_SESSION['user'] : null;
    $fullname = $_POST['name'];
    $total = $_POST['total'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $note = $_POST['note'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $currentTime = date("Y-m-d H:i:s");
    $status = 'pending'; // Trạng thái mặc định

    if ($user_id) {
        $insertOrderSQL = "INSERT INTO orders (user_id, fullname, total, address, phone, content, order_date, status) 
                           VALUES ('$user_id', '$fullname','$total', '$address', '$phone', '$note', '$currentTime', '$status')";

        if (mysqli_query($conn, $insertOrderSQL)) {
            echo '<script>alert("Đặt hàng thành công! Cảm ơn bạn đã tin tưởng chúng tôi.");</script>';
            header("Location:../index.php?page=paymentdone");
            exit();
        } else {
            echo '<script>alert("Đặt hàng thất bại. Vui lòng thử lại sau.");</script>';
            header("Location: payment.php");
            exit();
        }
        
    } else {
        echo '<script>alert("Bạn cần đăng nhập trước khi thanh toán!");</script>';
        header("Location: ../pages/registrationForm.php");
        exit();
    }
    
}
// $fullname = $_POST['name'];
// $address = $_POST['address'];
// $phone = $_POST['phone'];
// //$email = $_POST['email'];
// $note = $_POST['note'];
// $order_id = $_POST['order_id'];
// $amount = $_POST['total'];
// date_default_timezone_set('Asia/Ho_Chi_Minh');
//     $currentTime = date("Y-m-d H:i:s");
// $sql_order = "INSERT INTO orders (fullname, phone, content, address, order_date, total, status) VALUES ('$fullname','$phone','$note','$address','$currentTime','$amount', 'Đang chuẩn bị')";
// $query_order = mysqli_query($conn, $sql_order) or die("Couldn't connect");

function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}
if(isset($_POST['payUrl'])){
  
$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


$partnerCode = 'MOMOBKUN20180529';
$accessKey = 'klm05TvNBzhg7h7j';
$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
$orderInfo = "Thanh toán qua MoMo";
$amount = $_POST['total'];
$orderId = time() . "";
$redirectUrl = "http://localhost:8088/php-n9-cakehouse/src/index.php?page=paymentdone";
$ipnUrl = "http://localhost:8088/php-n9-cakehouse/src/index.php?page=paymentdone";
$extraData = "";
    $partnerCode = $partnerCode;
    $accessKey = $accessKey ;
    $serectkey = $secretKey;
    $orderId = $orderId; // Mã đơn hàng
    $orderInfo = $orderInfo;
    $amount = $amount;
    $ipnUrl = $ipnUrl;
    $redirectUrl = $redirectUrl;
    $extraData = $extraData;
    $requestId = time() . "";
    $requestType = "payWithATM";
    //$extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
    //before sign HMAC SHA256 signature
    $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
    $signature = hash_hmac("sha256", $rawHash, $serectkey);
    $data = array('partnerCode' => $partnerCode,
        'partnerName' => "Test",
        "storeId" => "MomoTestStore",
        'requestId' => $requestId,
        'amount' => $amount,
        'orderId' => $orderId,
        'orderInfo' => $orderInfo,
        'redirectUrl' => $redirectUrl,
        'ipnUrl' => $ipnUrl,
        'lang' => 'vi',
        'extraData' => $extraData,
        'requestType' => $requestType,
        'signature' => $signature);
    $result = execPostRequest($endpoint, json_encode($data));
    $jsonResult = json_decode($result, true);  // decode json

    //Just a example, please check more in there

    header('Location: ' . $jsonResult['payUrl']);
   
}elseif(isset($_POST['cod'])){
    header("Location:../index.php?page=paymentdone");
}

?>