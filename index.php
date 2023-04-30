<?php
require('configs/connection.php');
require('configs/functions.php');
if(isset($_SESSION['USER_LOGIN'])){
}else{
    header('location:login.php');
    die();
}
$page_title="StitchIt";
?>
<?php include('top_inc.php'); ?>
<div class="content-wrapper">
    <div class="content-wrapper-header">
        <div class="content-wrapper-context">
            <h3 class="img-content">
                <svg viewBox="0 0 512 512">
                    <path
                        d="M467 0H45C20.099 0 0 20.099 0 45v422c0 24.901 20.099 45 45 45h422c24.901 0 45-20.099 45-45V45c0-24.901-20.099-45-45-45z"
                        fill="#d6355b" data-original="#ff468c" />
                    <path xmlns="http://www.w3.org/2000/svg"
                        d="M512 45v422c0 24.901-20.099 45-45 45H256V0h211c24.901 0 45 20.099 45 45z" fill="#d6355b"
                        data-original="#d72878" />
                    <path xmlns="http://www.w3.org/2000/svg"
                        d="M467 30H45c-8.401 0-15 6.599-15 15v422c0 8.401 6.599 15 15 15h422c8.401 0 15-6.599 15-15V45c0-8.401-6.599-15-15-15z"
                        fill="#2e000a" data-original="#700029" />
                    <path xmlns="http://www.w3.org/2000/svg"
                        d="M482 45v422c0 8.401-6.599 15-15 15H256V30h211c8.401 0 15 6.599 15 15z" fill="#2e000a"
                        data-original="#4d0e06" />
                    <path xmlns="http://www.w3.org/2000/svg"
                        d="M181 391c-41.353 0-75-33.647-75-75 0-8.291 6.709-15 15-15s15 6.709 15 15c0 24.814 20.186 45 45 45s45-20.186 45-45-20.186-45-45-45c-41.353 0-75-33.647-75-75s33.647-75 75-75 75 33.647 75 75c0 8.291-6.709 15-15 15s-15-6.709-15-15c0-24.814-20.186-45-45-45s-45 20.186-45 45 20.186 45 45 45c41.353 0 75 33.647 75 75s-33.647 75-75 75z"
                        fill="#d6355b" data-original="#ff468c" />
                    <path xmlns="http://www.w3.org/2000/svg"
                        d="M391 361h-30c-8.276 0-15-6.724-15-15V211h45c8.291 0 15-6.709 15-15s-6.709-15-15-15h-45v-45c0-8.291-6.709-15-15-15s-15 6.709-15 15v45h-15c-8.291 0-15 6.709-15 15s6.709 15 15 15h15v135c0 24.814 20.186 45 45 45h30c8.291 0 15-6.709 15-15s-6.709-15-15-15z"
                        fill="#d6355b" data-original="#d72878" />
                </svg>
                StichIt
            </h3>
            <div class="content-text">
                Branded shirts to traditional sarees.<br />
                Juss stitch like a boss.
            </div>
            <button class="content-button" onclick="window.location.href='tailors'">Order Now</button>
        </div>
        <img class="content-wrapper-img" src="https://assets.codepen.io/3364143/glass.png" alt="" />
    </div>

    <div class="content-section">
        <div class="content-section-title">Tailers Near You</div>
        <div class="apps-card">

            <?php
        // list of tailors
        $res=mysqli_query($con,"select * from tailors");
        while($row=mysqli_fetch_array($res))
        {
        ?>

            <div class="app-card">
                <span>
                    <svg viewBox="0 0 52 52" style="border: 1px solid #c1316d">
                        <g xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M40.824 52H11.176C5.003 52 0 46.997 0 40.824V11.176C0 5.003 5.003 0 11.176 0h29.649C46.997 0 52 5.003 52 11.176v29.649C52 46.997 46.997 52 40.824 52z"
                                fill="#2f0015" data-original="#6f2b41" />
                            <path
                                d="M18.08 39H15.2V13.72l-2.64-.08V11h5.52v28zM27.68 19.4c1.173-.507 2.593-.761 4.26-.761s3.073.374 4.22 1.12V11h2.88v28c-2.293.32-4.414.48-6.36.48-1.947 0-3.707-.4-5.28-1.2-2.08-1.066-3.12-2.92-3.12-5.561v-7.56c0-2.799 1.133-4.719 3.4-5.759zm8.48 3.12c-1.387-.746-2.907-1.119-4.56-1.119-1.574 0-2.714.406-3.42 1.22-.707.813-1.06 1.847-1.06 3.1v7.12c0 1.227.44 2.188 1.32 2.88.96.719 2.146 1.079 3.56 1.079 1.413 0 2.8-.106 4.16-.319V22.52z"
                                fill="#e1c1cf" data-original="#ff70bd" />
                        </g>
                    </svg>
                    <?php echo $row["name"]; ?>
                </span>
                <div class="app-card__subtext">
                    <?php echo $row['des']; ?>
                </div>
                <div class="app-card-buttons">
                    <button onclick="window.location.href='tailorprofile?uid=<?php echo $row['id']; ?>'"
                        class="content-button status-button">Visit</button>
                    <div class="menu"></div>
                </div>
            </div>
            <?php
        }
        ?>

        </div>
    </div>
</div>
</div>
</div>
<div class="overlay-app"></div>
</div>
<!-- partial -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>

</html>