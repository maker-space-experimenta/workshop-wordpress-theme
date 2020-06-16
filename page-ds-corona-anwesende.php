<html>

<head>
    <style>
        body {
            background-color: black;
            overflow: hidden;
            color: #FFF;
        }

        .background {
            background-image: url(<?php echo get_template_directory_uri() ?>/images/_ds-ms-clear.png);
            background-size: contain;
            background-repeat: no-repeat;
            background-position-y: center;

            width: 100vw;
            height: 100vh;
        }


        .content {
            position: absolute;
            bottom: 200px;
            left: 120px;

            font-size: 100px;
            line-height: 120px;

        }
    </style>

</head>

<body>

    <?php

    global $wpdb;

    $sql = "SELECT COUNT(mpl_id) as count FROM makerspace_presence_logs WHERE mpl_datetime BETWEEN %s AND %s GROUP BY mpl_user_id";
    $day_start = (get_datetime()->setTime(0, 0, 0));
    $day_end = (get_datetime()->setTime(23, 59, 59));


    $entries = $wpdb->get_results($wpdb->prepare(
        $sql,
        $day_start->format("Y-m-d H:i:s"),
        $day_end->format("Y-m-d H:i:s")
    ));

    $count = 0;
    foreach ($entries as $e) {
        if ($e->count % 2 == 1) {
            $count++;
        }
    }


    ?>

    <div class="background">

    </div>


    <div class="content">

        <div class="">
            Aktuell befinden sich
        </div>

        <div class="" style="font-size: 150px; line-height: 200px;">
            <span><?php echo $count ?></span>
            <span>Personen</span>
        </div>


        <div class="">
            im Maker Space
        </div>

    </div>
</body>

</html>