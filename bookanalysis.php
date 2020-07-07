<?php
session_start();
include 'includes/connection.php';
include 'phpInsight-master/autoload.php';
$userid = $_SESSION["userid"];
$role = $_SESSION["role"];
$email = $_SESSION["email"];
if (!$_SESSION) {
    header("location:login/login");
}

$bkid = isset($_GET["u"]) ? base64_decode($_GET["u"]) : "";

$get_book_details = mysqli_query($conn, "select * from books where bookid='$bkid'");
$row = mysqli_fetch_array($get_book_details);
$bname = $row["bookname"];
$bid = $row["bookid"];
$bauthors = $row["bookauthor"];
$bimg = $row["img"];
$bdesc = $row["bookdesc"];

if (isset($_POST["submit"])) {
    $comment = htmlentities(addslashes($_POST["message"]));

    if (trim($comment) != "") {
        $sentiment = new \PHPInsight\Sentiment();
        $category = $sentiment->categorise($comment);

        if ($category == "pos") {
            $cat = "positive";
        } elseif ($category == "neu") {
            $cat = "neutral";
        } elseif ($category == "neg") {
            $cat = "negative";
        }
        $date = date("Y-m-d H:i:s");


        $insert_comment = mysqli_query($conn, "insert into comment values ('','$userid','$bid','$comment','$cat','$date')");
        if ($insert_comment) {
            $query_string = base64_encode($bkid);
            echo "<script>alert('Review Added Successfully'); window.location.href='bookanalysis?u=$query_string'</script>";
        } else {
            echo "<script>alert('Whoops! lloks like something went wrong please try again')</script>";
        }
    } else {
        echo "<script>alert('comment field can not be empty')</script>";
    }
}

//Determine sentiment here
$pos_sent_com = mysqli_num_rows(mysqli_query($conn, "select * from comment where bookid='$bid' and status='positive'"));
$neg_sent_com = mysqli_num_rows(mysqli_query($conn, "select * from comment where bookid='$bid' and status='negative'"));
$neu_sent_com = mysqli_num_rows(mysqli_query($conn, "select * from comment where bookid='$bid' and status='neutral'"));


//percentage evaluation
$total_comments = $pos_sent_com + $neg_sent_com + $neu_sent_com;
if ($total_comments != 0) {
    $pos_percent = round(($pos_sent_com / $total_comments) * 100, 2);
    $neg_percent = round(($neg_sent_com / $total_comments) * 100, 2);
    $neu_percent = round(($neu_sent_com / $total_comments) * 100, 2);
} else {
    $pos_percent = 0;
    $neg_percent = 0;
    $neu_percent = 0;
}
if ($pos_sent_com > $neg_sent_com) {
    $sentiment_outcome = "positive";
    $thumbs = "fa-thumbs-up";
} elseif ($neg_sent_com > $pos_sent_com) {
    $sentiment_outcome = "negative";
    $thumbs = "fa-thumbs-down";
} else {
    $sentiment_outcome = "neutral";
    $thumbs = "fa-neuter";
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title><?php echo $sitename; ?> | Book Analysis </title>
        <style type="text/css">
            .comment_imgs{
                width:10%;
                float:left;
                height: 100%;
                border: 1px solid grey;
            }

            .myrows{
                width:80%; 
                border: 1px solid grey;
                float: right;
            }

            .sub_comments{
                width: 100%;
                border: 1px solid grey;
            }

            .main_comments{
                width:100%;
                border: 1px solid grey;
            }

            .mycomments{
                border:1px solid grey;
                border-bottom-left-radius:30px;
                border-top-right-radius:30px;
                width: 100%;
                height: 100%;
            }
        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

        <!-- Custom CSS -->
        <link href="css/style.css" rel='stylesheet' type='text/css' />

        <!-- font-awesome icons CSS -->
        <link href="css/font-awesome.css" rel="stylesheet"> 
        <!-- //font-awesome icons CSS-->

        <!-- side nav css file -->
        <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
        <!-- //side nav css file -->

        <!-- js-->
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/modernizr.custom.js"></script>

        <!--webfonts-->
        <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
        <!--//webfonts--> 

        <!-- chart -->
        <script src="js/Chart.js"></script>
        <!-- //chart -->

        <!-- Metis Menu -->
        <script src="js/metisMenu.min.js"></script>
        <script src="js/custom.js"></script>
        <link href="css/custom.css" rel="stylesheet">
        <!--//Metis Menu -->
        <style>
            #chartdiv {
                width: 100%;
                height: 295px;
            }
        </style>


        <!--pie-chart --><!-- index page sales reviews visitors pie chart -->
        <script src="js/pie-chart.js" type="text/javascript"></script>
        <script type="text/javascript">

            $(document).ready(function () {
                $('#demo-pie-1').pieChart({
                    barColor: '#2dde98',
                    trackColor: '#eee',
                    lineCap: 'round',
                    lineWidth: 8,
                    onStep: function (from, to, percent) {
                        $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                    }
                });

                $('#demo-pie-2').pieChart({
                    barColor: '#8e43e7',
                    trackColor: '#eee',
                    lineCap: 'butt',
                    lineWidth: 8,
                    onStep: function (from, to, percent) {
                        $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                    }
                });

                $('#demo-pie-3').pieChart({
                    barColor: '#ffc168',
                    trackColor: '#eee',
                    lineCap: 'square',
                    lineWidth: 8,
                    onStep: function (from, to, percent) {
                        $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                    }
                });


            });

        </script>
        <!-- //pie-chart --><!-- index page sales reviews visitors pie chart -->

        <!-- requried-jsfiles-for owl -->
        <link href="css/owl.carousel.css" rel="stylesheet">
        <script src="js/owl.carousel.js"></script>
        <script>
            $(document).ready(function () {
                $("#owl-demo").owlCarousel({
                    items: 3,
                    lazyLoad: true,
                    autoPlay: true,
                    pagination: true,
                    nav: true,
                });
            });
        </script>
        <!-- //requried-jsfiles-for owl -->
    </head> 
    <body class="cbp-spmenu-push">
        <div class="main-content">
            <?php
            include 'includes/sidebar.php';
            ?>
            <!--left-fixed -navigation-->

            <!-- header-starts -->
            <?php
            include 'includes/header.php';
            ?>
            <!-- //header-ends -->
            <!-- main content start-->
            <div id="page-wrapper">
                <div class="main-page">


                    <div class="row widgettable">
                        <div style="width:100%; height: 100%; margin-left:0px;  margin-top: 30px !important;" class="col-md-12 general-grids grids-right widget-shadow">
                            <u><h1 style="color: #3b5998; text-align: center;" class="title2"><?php echo $bname; ?></h1></u>

                            <div style="width:100%; height: 100%;" id="myTabContent" class=" tab-content scrollbar1"> 

                                <div role="tabpanel" class="tab-pane col-md-6 fade active in" id="profile" aria-labelledby="profile-tab"> 
                                    <div class="bs-example widget-shadow" data-example-id="contextual-table"> 
                                        <div class="form-body">
                                            <img src="images/<?php echo $bimg; ?> " width="100%" height="100%"> 
                                        </div>
                                    </div>  
                                </div>

                                <div role="tabpanel" class="tab-pane col-md-6 fade active in" id="profile" aria-labelledby="profile-tab"> 
                                    <div class="bs-example widget-shadow" data-example-id="contextual-table"> 
                                        <div class="form-body">
                                            <form action="" method="post" enctype="multipart/form-data"> 
                                                <div class="form-group"> 
                                                    <label for="exampleInputEmail1">Book Name:</label>
                                                    <?php echo $bname; ?>
                                                </div> 
                                                <div class="form-group"> 
                                                    <label for="exampleInputPassword1">Author(s):</label>
                                                    <?php echo $bauthors; ?>
                                                </div> 
                                                <div class="form-group"> 
                                                    <label for="exampleInputPassword1">Book Description</label> 
                                                    <p style="text-align: justify;"><?php echo html_entity_decode($bdesc); ?></p>

                                                </div>
                                                <div class="form-group"> 
                                                    <label for="exampleInputPassword1">Analytic Review Output:</label>
                                                    <?php
                                                    $get_comments = mysqli_query($conn, "select * from comment where bookid='$bid' order by date desc");
                                                    $num_comments = mysqli_num_rows($get_comments)
                                                    ?>

                                                    <?php
                                                    if ($pos_sent_com > $neg_sent_com) {
                                                        echo "This Book is " . $pos_percent . "% recommended";
                                                        $thumbs = "fa-thumbs-up";
                                                    } elseif ($neg_sent_com > $pos_sent_com) {
                                                        echo "This Book is " . $neg_percent . "% poor";
                                                        $thumbs = "fa-thumbs-down";
                                                    } else {
                                                        echo "This Book is " . $neu_percent . "% moderate";
                                                        $thumbs = "fa-neuter";
                                                    }
                                                    ?>
                                                </div> 
                                            </form> 
                                        </div>
                                    </div>  
                                </div>                             

                            </div>
                        </div>
                    </div>

                    <div class="charts">		
                        <div class="mid-content-top charts-grids">
                            <div class="middle-content">
                                <h4 class="title">Review Metrics Indicators</h4>

                                <!-- start content_slider -->
                                <div id="owl-demo" class="owl-carousel text-center">

                                    <div class="content-top-1">
                                        <div class="col-md-6 top-content">
                                            <h5>Positive Reviews</h5>
                                            <label><?php echo $pos_sent_com; ?></label>
                                        </div>
                                        <div class="col-md-6 top-content1">	   
                                            <div id="demo-pie-1" class="pie-title-center" data-percent="<?php echo $pos_percent; ?>"> <span class="pie-value"></span> </div>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>    

                                    <div class="content-top-1">
                                        <div class="col-md-6 top-content">
                                            <h5>Neutral Reviews</h5>
                                            <label><?php echo $neu_sent_com; ?></label>
                                        </div>
                                        <div class="col-md-6 top-content1">	   
                                            <div id="demo-pie-2" class="pie-title-center" data-percent="<?php echo $neu_percent; ?>"> <span class="pie-value"></span> </div>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="content-top-1">
                                        <div class="col-md-6 top-content">
                                            <h5>Negative Reviews</h5>
                                            <label><?php echo $neg_sent_com ?></label>
                                        </div>
                                        <div class="col-md-6 top-content1">	   
                                            <div id="demo-pie-3" class="pie-title-center" data-percent="<?php echo $neg_percent; ?>"> <span class="pie-value"></span> </div>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>

                                </div>
                            </div>
                            <!--//sreen-gallery-cursual---->
                        </div>
                    </div>

                    <div class="charts">		
                        <div class="mid-content-top charts-grids">
                            <div class="middle-content">
                                <h4 class="title">Comment Reviews</h4><hr>

                                <!-- start content_slider -->
                                <div id="owl-demo" class="owl-carousels text-center">


                                    <div class="direct-chat-msg">
                                        <?php
                                        while ($row1 = mysqli_fetch_array($get_comments)) {
                                            $comments = $row1["comment"];
                                            $status = $row1["status"];
                                            $date = date_format(date_create($row1["date"]), "d M Y H:iA");
                                            $user = $row1["user_id"];
                                            $user_details = mysqli_query($conn, "select * from user where user_id='$user'");
                                            $row2 = mysqli_fetch_array($user_details);
                                            $fullname = $row2["sname"] . " " . $row2["fname"] . " " . $row2["oname"]
                                            ?>

                                            <div style="border:1px solid; border-radius:12px; margin-bottom: 10px;" class="activity-desc-sub mycommentsh">
                                                <div class="activity-row activity-row1">
                                                    <div class="col-xs-2 activity-img"><img src='images/avatar5.png' width="40" height="40" class="img-responsive" alt=""/>
                                                        <span style="font:bolder !important;"><b><?php echo $fullname; ?></b></span>
                                                    </div>
                                                    <div class="col-xs-12 activity-img1">
                                                        <div class="activity-desc-sub">
                                                            <span class="pull-right" style="font-style:bold !important;">Review Sentiment: <b><?php echo $status; ?></b></span>

                                                            <h6><?php echo $date; ?></h6>
                                                            <p style="color:black; " ><?php echo $comments ?></p>


                                                        </div>
                                                    </div>

                                                    <div class="clearfix"> </div>
                                                </div>

                                            </div>
                                            <div class="clear"></div>

                                            <?php
                                        }
                                        ?>
                                        <div class="box-footer">
                                            <form action="" method="post">
                                                <div class="ilnput-group">
                                                    <textarea  name="message" width="100%" rows="4" placeholder="Type Message ..." class="form-control"> </textarea><br>
                                                    <span class="input-group-btn">
                                                        <button  type="submit" height="100%"  name="submit" class="btn btn-warning btn-flat">Add Review</button>
                                                    </span>
                                                </div>

                                            </form>
                                        </div><!-- /.box-footer-->
                                    </div>
                                </div>
                                <!--//sreen-gallery-cursual---->
                            </div>
                        </div>

                        <!-- for amcharts js -->
                        <script src="js/amcharts.js"></script>
                        <script src="js/serial.js"></script>
                        <script src="js/export.min.js"></script>
                        <link rel="stylesheet" href="css/export.css" type="text/css" media="all" />
                        <script src="js/light.js"></script>
                        <!-- for amcharts js -->

                        <script  src="js/index1.js"></script>

                    </div>
                </div>
                <!--footer-->
                <?php
                include 'includes/footer.php';
                ?>
                <!--//footer-->
            </div>

            <!-- new added graphs chart js-->

            <script src="js/Chart.bundle.js"></script>
            <script src="js/utils.js"></script>

            <script>
            var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            var color = Chart.helpers.color;
            var barChartData = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                        label: 'Dataset 1',
                        backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                        borderColor: window.chartColors.red,
                        borderWidth: 1,
                        data: [
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor()
                        ]
                    }, {
                        label: 'Dataset 2',
                        backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
                        borderColor: window.chartColors.blue,
                        borderWidth: 1,
                        data: [
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor()
                        ]
                    }]

            };

            window.onload = function () {
                var ctx = document.getElementById("canvas").getContext("2d");
                window.myBar = new Chart(ctx, {
                    type: 'bar',
                    data: barChartData,
                    options: {
                        responsive: true,
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Chart.js Bar Chart'
                        }
                    }
                });

            };

            document.getElementById('randomizeData').addEventListener('click', function () {
                var zero = Math.random() < 0.2 ? true : false;
                barChartData.datasets.forEach(function (dataset) {
                    dataset.data = dataset.data.map(function () {
                        return zero ? 0.0 : randomScalingFactor();
                    });

                });
                window.myBar.update();
            });

            var colorNames = Object.keys(window.chartColors);
            document.getElementById('addDataset').addEventListener('click', function () {
                var colorName = colorNames[barChartData.datasets.length % colorNames.length];
                ;
                var dsColor = window.chartColors[colorName];
                var newDataset = {
                    label: 'Dataset ' + barChartData.datasets.length,
                    backgroundColor: color(dsColor).alpha(0.5).rgbString(),
                    borderColor: dsColor,
                    borderWidth: 1,
                    data: []
                };

                for (var index = 0; index < barChartData.labels.length; ++index) {
                    newDataset.data.push(randomScalingFactor());
                }

                barChartData.datasets.push(newDataset);
                window.myBar.update();
            });

            document.getElementById('addData').addEventListener('click', function () {
                if (barChartData.datasets.length > 0) {
                    var month = MONTHS[barChartData.labels.length % MONTHS.length];
                    barChartData.labels.push(month);

                    for (var index = 0; index < barChartData.datasets.length; ++index) {
                        //window.myBar.addData(randomScalingFactor(), index);
                        barChartData.datasets[index].data.push(randomScalingFactor());
                    }

                    window.myBar.update();
                }
            });

            document.getElementById('removeDataset').addEventListener('click', function () {
                barChartData.datasets.splice(0, 1);
                window.myBar.update();
            });

            document.getElementById('removeData').addEventListener('click', function () {
                barChartData.labels.splice(-1, 1); // remove the label first

                barChartData.datasets.forEach(function (dataset, datasetIndex) {
                    dataset.data.pop();
                });

                window.myBar.update();
            });
            </script>
            <!-- new added graphs chart js-->

            <!-- Classie --><!-- for toggle left push menu script -->
            <script src="js/classie.js"></script>
            <script>
            var menuLeft = document.getElementById('cbp-spmenu-s1'),
                    showLeftPush = document.getElementById('showLeftPush'),
                    body = document.body;

            showLeftPush.onclick = function () {
                classie.toggle(this, 'active');
                classie.toggle(body, 'cbp-spmenu-push-toright');
                classie.toggle(menuLeft, 'cbp-spmenu-open');
                disableOther('showLeftPush');
            };


            function disableOther(button) {
                if (button !== 'showLeftPush') {
                    classie.toggle(showLeftPush, 'disabled');
                }
            }
            </script>
            <!-- //Classie --><!-- //for toggle left push menu script -->

            <!--scrolling js-->
            <script src="js/jquery.nicescroll.js"></script>
            <script src="js/scripts.js"></script>
            <!--//scrolling js-->

            <!-- side nav js -->
            <script src='js/SidebarNav.min.js' type='text/javascript'></script>
            <script>
            $('.sidebar-menu').SidebarNav()
            </script>
            <!-- //side nav js -->

            <!-- for index page weekly sales java script -->
            <script src="js/SimpleChart.js"></script>
            <script>
            var graphdata1 = {
                linecolor: "#CCA300",
                title: "Monday",
                values: [
                    {X: "6:00", Y: 10.00},
                    {X: "7:00", Y: 20.00},
                    {X: "8:00", Y: 40.00},
                    {X: "9:00", Y: 34.00},
                    {X: "10:00", Y: 40.25},
                    {X: "11:00", Y: 28.56},
                    {X: "12:00", Y: 18.57},
                    {X: "13:00", Y: 34.00},
                    {X: "14:00", Y: 40.89},
                    {X: "15:00", Y: 12.57},
                    {X: "16:00", Y: 28.24},
                    {X: "17:00", Y: 18.00},
                    {X: "18:00", Y: 34.24},
                    {X: "19:00", Y: 40.58},
                    {X: "20:00", Y: 12.54},
                    {X: "21:00", Y: 28.00},
                    {X: "22:00", Y: 18.00},
                    {X: "23:00", Y: 34.89},
                    {X: "0:00", Y: 40.26},
                    {X: "1:00", Y: 28.89},
                    {X: "2:00", Y: 18.87},
                    {X: "3:00", Y: 34.00},
                    {X: "4:00", Y: 40.00}
                ]
            };
            var graphdata2 = {
                linecolor: "#00CC66",
                title: "Tuesday",
                values: [
                    {X: "6:00", Y: 100.00},
                    {X: "7:00", Y: 120.00},
                    {X: "8:00", Y: 140.00},
                    {X: "9:00", Y: 134.00},
                    {X: "10:00", Y: 140.25},
                    {X: "11:00", Y: 128.56},
                    {X: "12:00", Y: 118.57},
                    {X: "13:00", Y: 134.00},
                    {X: "14:00", Y: 140.89},
                    {X: "15:00", Y: 112.57},
                    {X: "16:00", Y: 128.24},
                    {X: "17:00", Y: 118.00},
                    {X: "18:00", Y: 134.24},
                    {X: "19:00", Y: 140.58},
                    {X: "20:00", Y: 112.54},
                    {X: "21:00", Y: 128.00},
                    {X: "22:00", Y: 118.00},
                    {X: "23:00", Y: 134.89},
                    {X: "0:00", Y: 140.26},
                    {X: "1:00", Y: 128.89},
                    {X: "2:00", Y: 118.87},
                    {X: "3:00", Y: 134.00},
                    {X: "4:00", Y: 180.00}
                ]
            };
            var graphdata3 = {
                linecolor: "#FF99CC",
                title: "Wednesday",
                values: [
                    {X: "6:00", Y: 230.00},
                    {X: "7:00", Y: 210.00},
                    {X: "8:00", Y: 214.00},
                    {X: "9:00", Y: 234.00},
                    {X: "10:00", Y: 247.25},
                    {X: "11:00", Y: 218.56},
                    {X: "12:00", Y: 268.57},
                    {X: "13:00", Y: 274.00},
                    {X: "14:00", Y: 280.89},
                    {X: "15:00", Y: 242.57},
                    {X: "16:00", Y: 298.24},
                    {X: "17:00", Y: 208.00},
                    {X: "18:00", Y: 214.24},
                    {X: "19:00", Y: 214.58},
                    {X: "20:00", Y: 211.54},
                    {X: "21:00", Y: 248.00},
                    {X: "22:00", Y: 258.00},
                    {X: "23:00", Y: 234.89},
                    {X: "0:00", Y: 210.26},
                    {X: "1:00", Y: 248.89},
                    {X: "2:00", Y: 238.87},
                    {X: "3:00", Y: 264.00},
                    {X: "4:00", Y: 270.00}
                ]
            };
            var graphdata4 = {
                linecolor: "Random",
                title: "Thursday",
                values: [
                    {X: "6:00", Y: 300.00},
                    {X: "7:00", Y: 410.98},
                    {X: "8:00", Y: 310.00},
                    {X: "9:00", Y: 314.00},
                    {X: "10:00", Y: 310.25},
                    {X: "11:00", Y: 318.56},
                    {X: "12:00", Y: 318.57},
                    {X: "13:00", Y: 314.00},
                    {X: "14:00", Y: 310.89},
                    {X: "15:00", Y: 512.57},
                    {X: "16:00", Y: 318.24},
                    {X: "17:00", Y: 318.00},
                    {X: "18:00", Y: 314.24},
                    {X: "19:00", Y: 310.58},
                    {X: "20:00", Y: 312.54},
                    {X: "21:00", Y: 318.00},
                    {X: "22:00", Y: 318.00},
                    {X: "23:00", Y: 314.89},
                    {X: "0:00", Y: 310.26},
                    {X: "1:00", Y: 318.89},
                    {X: "2:00", Y: 518.87},
                    {X: "3:00", Y: 314.00},
                    {X: "4:00", Y: 310.00}
                ]
            };
            var Piedata = {
                linecolor: "Random",
                title: "Profit",
                values: [
                    {X: "Monday", Y: 50.00},
                    {X: "Tuesday", Y: 110.98},
                    {X: "Wednesday", Y: 70.00},
                    {X: "Thursday", Y: 204.00},
                    {X: "Friday", Y: 80.25},
                    {X: "Saturday", Y: 38.56},
                    {X: "Sunday", Y: 98.57}
                ]
            };
            $(function () {
                $("#Bargraph").SimpleChart({
                    ChartType: "Bar",
                    toolwidth: "50",
                    toolheight: "25",
                    axiscolor: "#E6E6E6",
                    textcolor: "#6E6E6E",
                    showlegends: true,
                    data: [graphdata4, graphdata3, graphdata2, graphdata1],
                    legendsize: "140",
                    legendposition: 'bottom',
                    xaxislabel: 'Hours',
                    title: 'Weekly Profit',
                    yaxislabel: 'Profit in $'
                });
                $("#sltchartype").on('change', function () {
                    $("#Bargraph").SimpleChart('ChartType', $(this).val());
                    $("#Bargraph").SimpleChart('reload', 'true');
                });
                $("#Hybridgraph").SimpleChart({
                    ChartType: "Hybrid",
                    toolwidth: "50",
                    toolheight: "25",
                    axiscolor: "#E6E6E6",
                    textcolor: "#6E6E6E",
                    showlegends: true,
                    data: [graphdata4],
                    legendsize: "140",
                    legendposition: 'bottom',
                    xaxislabel: 'Hours',
                    title: 'Weekly Profit',
                    yaxislabel: 'Profit in $'
                });
                $("#Linegraph").SimpleChart({
                    ChartType: "Line",
                    toolwidth: "50",
                    toolheight: "25",
                    axiscolor: "#E6E6E6",
                    textcolor: "#6E6E6E",
                    showlegends: false,
                    data: [graphdata4, graphdata3, graphdata2, graphdata1],
                    legendsize: "140",
                    legendposition: 'bottom',
                    xaxislabel: 'Hours',
                    title: 'Weekly Profit',
                    yaxislabel: 'Profit in $'
                });
                $("#Areagraph").SimpleChart({
                    ChartType: "Area",
                    toolwidth: "50",
                    toolheight: "25",
                    axiscolor: "#E6E6E6",
                    textcolor: "#6E6E6E",
                    showlegends: true,
                    data: [graphdata4, graphdata3, graphdata2, graphdata1],
                    legendsize: "140",
                    legendposition: 'bottom',
                    xaxislabel: 'Hours',
                    title: 'Weekly Profit',
                    yaxislabel: 'Profit in $'
                });
                $("#Scatterredgraph").SimpleChart({
                    ChartType: "Scattered",
                    toolwidth: "50",
                    toolheight: "25",
                    axiscolor: "#E6E6E6",
                    textcolor: "#6E6E6E",
                    showlegends: true,
                    data: [graphdata4, graphdata3, graphdata2, graphdata1],
                    legendsize: "140",
                    legendposition: 'bottom',
                    xaxislabel: 'Hours',
                    title: 'Weekly Profit',
                    yaxislabel: 'Profit in $'
                });
                $("#Piegraph").SimpleChart({
                    ChartType: "Pie",
                    toolwidth: "50",
                    toolheight: "25",
                    axiscolor: "#E6E6E6",
                    textcolor: "#6E6E6E",
                    showlegends: true,
                    showpielables: true,
                    data: [Piedata],
                    legendsize: "250",
                    legendposition: 'right',
                    xaxislabel: 'Hours',
                    title: 'Weekly Profit',
                    yaxislabel: 'Profit in $'
                });

                $("#Stackedbargraph").SimpleChart({
                    ChartType: "Stacked",
                    toolwidth: "50",
                    toolheight: "25",
                    axiscolor: "#E6E6E6",
                    textcolor: "#6E6E6E",
                    showlegends: true,
                    data: [graphdata3, graphdata2, graphdata1],
                    legendsize: "140",
                    legendposition: 'bottom',
                    xaxislabel: 'Hours',
                    title: 'Weekly Profit',
                    yaxislabel: 'Profit in $'
                });

                $("#StackedHybridbargraph").SimpleChart({
                    ChartType: "StackedHybrid",
                    toolwidth: "50",
                    toolheight: "25",
                    axiscolor: "#E6E6E6",
                    textcolor: "#6E6E6E",
                    showlegends: true,
                    data: [graphdata3, graphdata2, graphdata1],
                    legendsize: "140",
                    legendposition: 'bottom',
                    xaxislabel: 'Hours',
                    title: 'Weekly Profit',
                    yaxislabel: 'Profit in $'
                });
            });

            </script>
            <!-- //for index page weekly sales java script -->


            <!-- Bootstrap Core JavaScript -->
            <script src="js/bootstrap.js"></script>
            <!-- //Bootstrap Core JavaScript -->

    </body>
</html>