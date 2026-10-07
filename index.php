<?php

$conn = new mysqli("localhost", "root", "", "sneaker_shop");

if ($conn->connect_error) {
    die("MySQL байланыс қатесі: " . $conn->connect_error);
}

$sql = "SELECT * FROM sneakers";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="kk">

<head>
    <meta charset="UTF-8">
    <title>Кроссовкалар</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <div class="logo">SNEAKER SHOP 👟</div>

    <nav>
        <a href="index.html">Басты бет</a>
        <a href="index.php">Кроссовкалар</a>
        <a href="index.html#about">Біз туралы</a>
        <a href="index.html#contact">Байланыс</a>
    </nav>
</header>

<section class="products-section">

    <h2>Кроссовкалар каталогы</h2>

    <div class="products">

        <?php

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                echo '
                <div class="product">

                    <img src="' . $row["image"] . '" alt="' . $row["name"] . '">

                    <h3>' . $row["name"] . '</h3>

                    <p>' . $row["description"] . '</p>

                    <div class="price">
                        ' . number_format($row["price"], 0, '.', ' ') . ' ₸
                    </div>

                    <button onclick="addToCart(\'' . 
                    $row["name"] . '\', ' . $row["price"] . ')">
                        Себетке қосу
                    </button>

                </div>
                ';
            }

        } else {

            echo "<p>Кроссовкалар табылмады.</p>";

        }

        ?>

    </div>

</section>

<footer>
    <p>© 2026 SNEAKER SHOP</p>
</footer>

<script src="script.js"></script>

</body>
</html>

<?php
$conn->close();
?>