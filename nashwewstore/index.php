<?php

// ==========================================
// DATA PRODUK SCOOP'S
// ==========================================

$products = [
    [
        "nama" => "Strawberry Bliss",
        "kategori" => "Ice Cream Cup",
        "harga" => 60000,
        "stok" => 10,
        "gambar" => "images/sb.png"
    ],
    [
        "nama" => "Cookies & Cream",
        "kategori" => "Ice Cream Cup",
        "harga" => 55000,
        "stok" => 12,
        "gambar" => "images/CC.png"
    ],
    [
        "nama" => "Chocolate Fudge",
        "kategori" => "Ice Cream Cup",
        "harga" => 55000,
        "stok" => 5,
        "gambar" => "images/cf.png"
    ],
    [
        "nama" => "Taro Choco",
        "kategori" => "Waffle Ice Cream",
        "harga" => 80000,
        "stok" => 3,
        "gambar" => "images/waffle.png"
    ],
    [
        "nama" => "Salted Caramel",
        "kategori" => "Ice Cream Cone",
        "harga" => 40000,
        "stok" => 0,
        "gambar" => "images/cone.png"
    ],
    [
        "nama" => "SQUA",
        "kategori" => "Air Mineral",
        "harga" => 5000,
        "stok" => 15,
        "gambar" => "images/air.png"
    ]
];


// ==========================================
// FUNCTION FORMAT RUPIAH
// ==========================================

function rupiah($harga)
{
    return "Rp" . number_format($harga, 0, ',', '.');
}


// ==========================================
// INFORMASI PRODUK
// ==========================================

// Menghitung seluruh produk secara otomatis
$totalProduk = count($products);

// Menghitung jumlah produk yang tersedia
$produkTersedia = 0;

foreach ($products as $product) {
    if ($product["stok"] > 0) {
        $produkTersedia++;
    }
}

?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SCOOP'S</title>

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@700;800&display=swap"
        rel="stylesheet"
    >
</head>

<body>


<!-- ==========================================
     TOP BAR
=========================================== -->

<div class="top-bar">
    <div class="container top-content">

        <p>📍 Scoop's Store, Jakarta</p>

        <p>Senin - Minggu: 09.00 - 21.00</p>

        <p>Follow Us: IG &nbsp; TikTok</p>

    </div>
</div>


<!-- ==========================================
     NAVBAR
=========================================== -->

<header>
    <nav class="container navbar">

        <!-- Logo -->
        <a href="#home" class="logo">
            SCOOP'S <span>ICE</span> 
        </a>

        <!-- Navigation -->
        <div class="nav-menu">
            <a href="#home">Home</a>
            <a href="#products">Products</a>
            <a href="#discount">Discount</a>
            <a href="#review">Review</a>
        </div>

        <!-- Button -->
        <a href="#products" class="nav-button">
            Shop Now
        </a>

    </nav>
</header>


<!-- ==========================================
     HERO SECTION
=========================================== -->

<section class="hero" id="home">

    <div class="container hero-wrapper">

        <!-- Hero Content -->
        <div class="hero-content">

            <h1>
                Order Your
                <span>Perfect Ice</span>
            </h1>

            <p class="hero-description">
                Pesan ice cream favoritemu.
                <br>
                SCOOP'S menyediakan berbagai varian rasa dan jenis
                <br>
                ice cream untukmu.
            </p>

            <div class="hero-buttons">

                <a href="#products" class="primary-button">
                    Belanja Sekarang
                </a>

                <a href="#products" class="secondary-button">
                    Lihat Menu
                </a>

            </div>

        </div>


        <!-- Hero Image -->
        <div class="hero-image">

            <img
                src="images/logo.png"
                alt="SCOOP'S Ice Cream"
            >

            <div class="hero-badge">
                <strong>10%</strong>
                <span>OFF</span>
            </div>

        </div>

    </div>

</section>


<!-- ==========================================
     PRODUCT SECTION
=========================================== -->

<section class="products-section" id="products">

    <div class="container">

        <!-- Section Heading -->
        <div class="section-heading">

            <p class="small-title">
                OUR MENU
            </p>

            <h2>
                Produk Pilihan SCOOP'S
            </h2>

            <p>
                Temukan produk favorit yang sesuai
                dengan seleramu.
            </p>

        </div>


        <!-- ==================================
             PRODUCT SUMMARY
        =================================== -->

        <div class="product-summary">

            <div>
                <span>Total Produk</span>
                <strong><?= $totalProduk; ?></strong>
            </div>

            <div>
                <span>Produk Tersedia</span>
                <strong><?= $produkTersedia; ?></strong>
            </div>

        </div>


        <!-- ==================================
             PRODUCT GRID
        =================================== -->

        <div class="product-grid">

            <?php foreach ($products as $product): ?>

                <?php

                // Mengecek ketersediaan stok
                $tersedia = $product["stok"] > 0;

                // Semua produk mendapatkan diskon 10%
                $diskon = 10;

                // Menghitung harga setelah diskon
                $hargaDiskon =
                    $product["harga"] -
                    ($product["harga"] * $diskon / 100);

                ?>

                <!-- ==================================
                     PRODUCT CARD
                =================================== -->

                <article class="product-card">

                    <!-- Product Image -->
                    <div class="product-image">

                        <img
                            src="<?= htmlspecialchars($product["gambar"]); ?>"
                            alt="<?= htmlspecialchars($product["nama"]); ?>"
                        >

                        <!-- Badge Diskon -->
                        <span class="discount-badge">
                            -<?= $diskon; ?>%
                        </span>

                        <!-- Badge Stok Habis -->
                        <?php if (!$tersedia): ?>

                            <span class="sold-badge">
                                STOK HABIS
                            </span>

                        <?php endif; ?>

                    </div>


                    <!-- Product Information -->
                    <div class="product-info">

                        <!-- Category -->
                        <p class="category">
                            <?= htmlspecialchars($product["kategori"]); ?>
                        </p>

                        <!-- Product Name -->
                        <h3>
                            <?= htmlspecialchars($product["nama"]); ?>
                        </h3>


                        <!-- ==========================
                             PRICE
                        =========================== -->

                        <div class="price-area">

                            <!-- Harga Normal + Diskon -->
                            <div class="price-top">

                                <span class="normal-price">
                                    <?= rupiah($product["harga"]); ?>
                                </span>

                                <span class="discount-price">
                                    -<?= $diskon; ?>%
                                </span>

                            </div>

                            <!-- Harga Setelah Diskon -->
                            <p class="final-price">
                                <?= rupiah($hargaDiskon); ?>
                            </p>

                        </div>


                        <!-- ==========================
                             STOCK
                        =========================== -->

                        <div class="stock-info">

                            <span>
                                Stok: <?= $product["stok"]; ?>
                            </span>

                            <?php if ($tersedia): ?>

                                <span class="status available">
                                    ● Tersedia
                                </span>

                            <?php else: ?>

                                <span class="status unavailable">
                                    ● Stok Habis
                                </span>

                            <?php endif; ?>

                        </div>


                        <!-- ==========================
                             BUY BUTTON
                        =========================== -->

                        <?php if ($tersedia): ?>

                            <a href="#" class="buy-button">
                                Beli Sekarang
                            </a>

                        <?php else: ?>

                            <button
                                class="buy-button disabled"
                                disabled
                            >
                                Stok Habis
                            </button>

                        <?php endif; ?>

                    </div>

                </article>

            <?php endforeach; ?>

        </div>

    </div>

</section>


<!-- ==========================================
     DISCOUNT / PROMO SECTION
=========================================== -->

<section class="promo-section" id="discount">

    <div class="container promo-wrapper">

        <!-- Promo Content -->
        <div class="promo-content">

            <p class="small-title">
                SPECIAL PROMO
            </p>

            <h2>
                Get 10% Off
                <br>
                Your Order
            </h2>

            <p>
                Nikmati diskon sebesar 10%
                untuk seluruh produk SCOOP'S.
            </p>

            <a href="#products" class="primary-button">
                Lihat Produk
            </a>

        </div>


        <!-- Discount Coupon -->
        <div class="promo-box">

            <span>SPECIAL OFFER</span>

            <strong>10%</strong>

            <h3>DISCOUNT</h3>

            <p>All Products</p>

        </div>

    </div>

</section>


<!-- ==========================================
     TESTIMONIAL SECTION
=========================================== -->

<section class="testimonial-section" id="review">

    <div class="container">

        <!-- Testimonial Heading -->
        <div class="testimonial-heading">

            <p class="testimonial-label">
                WHAT OUR CUSTOMERS SAY
            </p>

            <h2>
                Sweet Words From Our Customers
            </h2>

            <p class="testimonial-description">
                Cerita manis dari pelanggan yang sudah
                menikmati produk favorit SCOOP'S.
            </p>

        </div>


        <!-- Testimonial Grid -->
        <div class="testimonial-grid">


            <!-- Testimonial 1 -->
            <div class="testimonial-card">

                <div class="customer-profile">

                    <div class="customer-avatar">
                        A
                    </div>

                    <div class="customer-info">
                        <h4>Amanda K.</h4>
                        <span>Jakarta</span>
                    </div>

                </div>

                <div class="testimonial-stars">
                    ★★★★★
                </div>

                <p class="testimonial-text">
                    "Strawberry Bliss-nya enak banget!
                    Rasa strawberry-nya terasa dan topping-nya
                    juga banyak."
                </p>

            </div>


            <!-- Testimonial 2 -->
            <div class="testimonial-card">

                <div class="customer-profile">

                    <div class="customer-avatar">
                        J
                    </div>

                    <div class="customer-info">
                        <h4>Jessica M.</h4>
                        <span>Depok</span>
                    </div>

                </div>

                <div class="testimonial-stars">
                    ★★★★★
                </div>

                <p class="testimonial-text">
                    "Cookies & Cream jadi favorit aku.
                    Es krimnya creamy dan potongan cookies-nya
                    bikin rasanya makin enak."
                </p>

            </div>


            <!-- Testimonial 3 -->
            <div class="testimonial-card">

                <div class="customer-profile">

                    <div class="customer-avatar">
                        N
                    </div>

                    <div class="customer-info">
                        <h4>Nashwa</h4>
                        <span>Depok</span>
                    </div>

                </div>

                <div class="testimonial-stars">
                    ★★★★★
                </div>

                <p class="testimonial-text">
                    "Semua varian ice cream-nya sudah pernah
                    aku coba. Selalu enak dan konsisten."
                </p>

            </div>

        </div>

    </div>

</section>


</body>
</html>