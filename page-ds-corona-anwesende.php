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

    global $wpdb;

        $logged_in_sql = "
        SELECT count(*) as count FROM (
            SELECT 
                mpl_user_id,
                MOD(COUNT(mpl_user_id), 2) as log_count,
                MIN(mpl_datetime) as arrived_at,
                MAX(mpl_datetime) as leaved_at
            FROM `makerspace_presence_logs`
            WHERE 
                mpl_datetime between %s AND %s AND mpl_temp_visitor_id IS NULL
            GROUP BY mpl_user_id
            ) as tmp
            WHERE log_count > 0
        ";

        $logged_in_count = $wpdb->get_var($wpdb->prepare(
            $logged_in_sql,
            $from->format("Y-m-d H:i:s"),
            $to->format("Y-m-d H:i:s")
        ));

        $logged_in_sql = "
        SELECT count(*) as count FROM (
            SELECT 
                mpl_temp_visitor_id,
                MOD(COUNT(mpl_temp_visitor_id), 2) as log_count,
                MIN(mpl_datetime) as arrived_at,
                MAX(mpl_datetime) as leaved_at
            FROM `makerspace_presence_logs`
            WHERE 
                mpl_datetime between %s AND %s AND mpl_temp_visitor_id IS NOT NULL
            GROUP BY mpl_temp_visitor_id
            ) as tmp
            WHERE log_count > 0
        ";

        $logged_in_count += $wpdb->get_var($wpdb->prepare(
            $logged_in_sql,
            $from->format("Y-m-d H:i:s"),
            $to->format("Y-m-d H:i:s")
        ));



    ?>

    <div class="background">

    </div>


    <div class="content">

        <div class="">
            Aktuell befinden sich
        </div>

        <div class="" style="font-size: 150px; line-height: 200px;">
            <span><?php echo $logged_in_count ?></span>
            <span>Personen</span>
        </div>


        <div class="">
            im Maker Space
        </div>

    </div>
</body>

</html>