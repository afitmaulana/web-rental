
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="admin-wrapper">
        <aside class="sidebar">
            <div class="logo">
                <img src="<?= base_url('assets/images/logo.png') ?>" alt="Livy Rentcos">
            </div>
            <nav class="menu">
                <h3>MENU</h3>
                <ul>
                    <li class="<?= (uri_string() == 'admin/dashboard') ? 'active' : '' ?>">
                        <a href="<?= site_url('admin/dashboard') ?>"><i class="fas fa-home"></i> HOME</a>
                    </li>
                    <li class="<?= (uri_string() == 'admin/kostum') ? 'active' : '' ?>">
                        <a href="<?= site_url('admin/kostum') ?>"><i class="fas fa-tshirt"></i> KATALOG KOSTUM</a>
                    </li>
                    <li class="<?= (uri_string() == 'admin/props') ? 'active' : '' ?>">
                        <a href="<?= site_url('admin/props') ?>"><i class="fas fa-magic"></i> KATALOG PROPS</a>
                    </li>
                    <li class="<?= (uri_string() == 'admin/pembayaran') ? 'active' : '' ?>">
                        <a href="<?= site_url('admin/pembayaran') ?>"><i class="fas fa-credit-card"></i> PEMBAYARAN</a>
                    </li>
                    <li>
                        <a href="<?= site_url('admin/logout') ?>"><i class="fas fa-sign-out-alt"></i> LOG OUT</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <header class="top-header">
                <div class="search-bar">
                    <input type="text" placeholder="Search...">
                    <i class="fas fa-search"></i>
                </div>
            </header>
            
            <div class="content-body">
                <?= $this->renderSection('content') ?>
            </div>

            <footer class="main-footer">
                <div>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-whatsapp"></i>
                </div>
                <p>
                    RENTAL KOSTUM COSPLAY MURAH PEKALONGAN JATENG<br>
                    Harga Pelajar Friendly - BISA RENTAL PISAHAN<br>
                    Kajen Pekalongan Jawa Tengah<br>
                    First rental friendly
                </p>
                <div class="footer-logo">
                     <img src="<?= base_url('assets/images/logo.png') ?>" alt="Livy Rentcos" style="height:50px;">
                </div>
            </footer>
        </main>
    </div>
</body>
</html>