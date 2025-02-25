<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đồng Hồ Nổi Bật Nhất</title>
    <link rel="stylesheet" href="../assets/css/formm.css">
    <style>
        body {
            background-color: #f8f8f8;
            padding: 20px;
        }

        .watch-list {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .watch-card {
            background: white;
            border: 2px solid #eee;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            width: 250px;
            transition: 0.3s ease-in-out;
            height: 300px;
            box-shadow: 10px;
            margin: 0;
        }

        .watch-card:hover {
            border-color: red;
        }

        .watch-card img {
            max-width: 100%;
            height: 200px;
            border-radius: 5px;
            object-fit: cover;

        }

        .watch-card p {
            margin: 10px 0;
            font-size: 16px;
            font-weight: bold;
        }

        .price {
            color: red;
            font-size: 18px;
            font-weight: bold;
        }

        .old-price {
            color: gray;
            text-decoration: line-through;
            font-size: 14px;
            margin-left: 5px;
        }

        .buy-btn {
            background-color: white;
            color: red;
            border: 1px solid red;
            padding: 8px 15px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .buy-btn:hover {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
    <div class="watch-container">
        <div class="watch-list">
            <div class="watch-card">
                <img src="https://benhviendongho.com/wp-content/uploads/2020/05/dong-ho-high-end-luxury-03.jpg" alt="Đồng hồ Orient Nam 6">
                <p>Đồng hồ Orient Nam 6</p>
                <p class="price">2900000đ <span class="old-price">3400000đ</span></p>
                <button onclick="myFunction()" class="buy-btn">Đặt Mua</button>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
            alert("Cảm ơn quý khách\nBạn đặt mua thành công");
        }
    </script>
</body>
</html>