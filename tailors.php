<?php

include('configs/connection.php');
include('configs/functions.php');
include('top_inc.php'); 

?>
<div class="content-wrapper">
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