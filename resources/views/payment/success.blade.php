<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán thành công</title>
    {{-- <link rel="stylesheet" href="style.css"> --}}
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .main-box {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .checkout {
            width: 450px;
            box-shadow: 0 0 0 1px #6655ff;
            border-radius: 5px;
        }

        .product {
            padding: 6px 10px
        }

        .product p {
            font-size: medium;
        }

        #create-payment-link-btn {
            width: 100%;
            height: 36px;
            background-color: #6655ff;
            color: white;
            border: none;
            border-bottom-left-radius: 4px;
            border-bottom-right-radius: 4px;
            font-size: medium;
        }

        #result {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #result td,
        #result th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #result tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #result tr:hover {
            background-color: #ddd;
        }

        #result th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #6655ff;
            color: white;
        }

        #query-string-table {
            width: 50%;
        }

        .payment-titlte {
            color: #6655ff;
            font-size: larger;
        }

        #return-page-btn {
            margin-top: 10px;
            border: 1px solid #6655ff;
            border-radius: 5px;
            background-color: #6655ff;
            padding: 10px 8px;
            color: white;
            text-decoration: none;
            font-size: small;
        }
    </style>
</head>
<body>
    <div class="main-box">
        <h4 class="payment-titlte">Thanh toán thành công. Cảm ơn bạn đã sử dụng payOS!</h4>
        <p>Nếu có bất kỳ câu hỏi nào, hãy gửi email tới <a href="mailto:support@casso.vn">support@casso.vn</a></p>
        <a href="{{route('home')}}" id="return-page-btn">Trở về trang Tạo Link thanh toán</a>
    </div>
</body>
</html>