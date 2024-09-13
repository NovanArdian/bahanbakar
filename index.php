<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembelian Bahan Bakar</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(165deg, #FFF0F5,#483D8B);
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #container {
            width: 50%;
            max-width: 600px;
            background-color: rgba(255, 255, 255, 0.5);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            border: 1px solid #b2ebf2;
        }

        h2 {
            color: #004d99;
            font-size: 24px;
            margin-bottom: 30px;
            font-weight: 600;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #0077cc;
            font-weight: 500;
        }

        select,
        input[type="number"] {
            width: calc(100% - 20px);
            padding: 12px;
            border: 1px solid #0077cc;
            border-radius: 6px;
            box-sizing: border-box;
            margin-bottom: 20px;
            font-size: 16px;
        }

        button {
            width: calc(100% - 20px);
            padding: 15px;
            border: none;
            border-radius: 6px;
            background-color: #004d99;
            color: #ffffff;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.2s;
            margin-top: 10px;
        }

        button:hover {
            background-color: #003366;
            transform: scale(1.02);
        }

        @media screen and (max-width: 768px) {
            #container {
                width: 90%;
                padding: 20px;
            }

            h2 {
                font-size: 20px;
            }

            select,
            input[type="number"],
            button {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div id="container">
        <h2>Shell <span>SHOP</span></h2>
        <form action="result.php" method="POST">
            <label for="jenis">Jenis Bahan Bakar:</label>
            <select id="jenis" name="jenis">
                <option value="Shell Super">Shell Super</option>
                <option value="Shell V-Power">Shell V-Power</option>
                <option value="Shell V-Power Diesel">Shell V-Power Diesel</option>
                <option value="Shell V-Power Nitro">Shell V-Power Nitro</option>
            </select>
            <label for="jumlah">Jumlah Liter:</label>
            <input type="number" id="jumlah" name="jumlah" required>
            <button type="submit">Beli</button>
        </form>
    </div>
</body>

</html>
