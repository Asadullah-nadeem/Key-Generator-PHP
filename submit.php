<?php
$name = $_POST['name'];
$phone_number = $_POST['phone_number'];
$age = $_POST['age'];
$address = $_POST['address'];
$debit_card_number = $_POST['debit_card_number'];
$api_url = 'http://localhost:3000/api/generate-key';
$data = array(
    'name' => $name,
    'phone_number' => $phone_number,
    'age' => $age,
    'address' => $address,
    'debit_card_number' => $debit_card_number
);
$ch = curl_init($api_url);
$payload = json_encode($data);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$result = json_decode($response, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Key Generated</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #e7f3e7;
            border-left: 4px solid #4CAF50;
        }
        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .back-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>API Key Generated</h2>
        <?php if (isset($result['key'])): ?>
            <div class="result">
                <strong>Generated API Key:</strong> <?php echo htmlspecialchars($result['key']); ?>
            </div>
        <?php else: ?>
            <div class="result">
                <strong>Error:</strong> <?php echo htmlspecialchars($result['error']); ?>
            </div>
        <?php endif; ?>
        <a href="index.php" class="back-button">Go Back</a>
    </div>
</body>
</html>
