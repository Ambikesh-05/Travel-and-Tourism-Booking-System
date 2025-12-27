<?php
include "admin_auth.php";
include "../PHP/config.php";

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];

    move_uploaded_file($_FILES['image']['tmp_name'], "../Images/" . $image);

    mysqli_query($conn, "INSERT INTO tours(name,description,price,image)
    VALUES('$name','$desc','$price','$image')");

    header("Location: manage_tours.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Tour</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        /* ================= RESET ================= */
        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
        }

        /* ================= GLOBAL ================= */
        body {
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            background:
                linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.55)),
                url("../Images/Udaipur.jpg") no-repeat center center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* ================= CARD ================= */
        .card {
            width: 100%;
            max-width: 520px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(14px);
            padding: 35px 30px;
            border-radius: 22px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.45);
            color: #fff;
        }

        /* ================= TITLE ================= */
        .card h2 {
            text-align: center;
            margin: 0 0 25px;
            font-size: 28px;
            letter-spacing: 1.5px;
        }

        .card h2::after {
            content: "";
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, #facc15, #f59e0b);
            display: block;
            margin: 12px auto 0;
            border-radius: 4px;
        }

        /* ================= FORM ================= */
        form {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        input,
        textarea {
            width: 100%;
            padding: 14px 16px;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            outline: none;
            background: rgba(255, 255, 255, 0.95);
        }

        textarea {
            resize: none;
            min-height: 110px;
        }

        /* ================= FILE INPUT ================= */
        .file-input {
            position: relative;
            background: #fff;
            border-radius: 12px;
            padding: 14px 16px;
            font-size: 15px;
            color: #6b7280;
            cursor: pointer;
        }

        .file-input span {
            pointer-events: none;
        }

        /* hidden real input */
        .file-input input[type="file"] {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
        }

        /* ================= BUTTON ================= */
        button {
            margin-top: 10px;
            padding: 14px;
            border: none;
            border-radius: 14px;
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 1px;
            color: #1f2937;
            cursor: pointer;
            background: linear-gradient(135deg, #fde68a, #f59e0b);
            transition: 0.3s ease;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.35);
        }

        /* ================= BACK LINK ================= */
        .back {
            text-align: center;
            margin-top: 18px;
        }

        .back a {
            color: #facc15;
            font-weight: 600;
            text-decoration: none;
        }

        .back a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="card">
        <h2>➕ Add New Tour</h2>

        <form method="post" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Destination Name" required>

            <textarea name="description" placeholder="Tour Description" required></textarea>

            <input type="number" name="price" placeholder="Price (₹)" required>

            <!-- FILE INPUT -->
            <label class="file-input">
                <span id="fileText">Choose file for image</span>
                <input type="file" name="image" id="imageInput" required>
            </label>

            <button type="submit" name="add">Add Tour</button>
        </form>

        <div class="back">
            <a href="manage_tours.php">← Back to Manage Tours</a>
        </div>
    </div>

    <!-- ✅ ONLY THIS JS ADDED -->
    <script>
        document.getElementById("imageInput").addEventListener("change", function() {
            if (this.files.length > 0) {
                document.getElementById("fileText").innerText = this.files[0].name;
            }
        });
    </script>

</body>

</html>