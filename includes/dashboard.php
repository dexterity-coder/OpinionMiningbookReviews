<div class="col_3" style="margin-bottom: 10px;">
    <div class="col-md-5 widget widget1">
        <div class="r3_counter_box">
            <i class="pull-left fa fa-book icon-rounded"></i>
            <div class="stats">
                <?php
                $num_books = mysqli_num_rows(mysqli_query($conn, "select * from books"));
                ?>
                <h5><strong><?php echo $num_books; ?></strong></h5>
                <span>Total Books</span>
            </div>
        </div>
    </div>
    <div class="col-md-5 widget widget1">
        <div class="r3_counter_box">
            <i class="pull-left fa fa-laptop user1 icon-rounded"></i>
            <div class="stats">
                <?php
                $num_contact = mysqli_num_rows(mysqli_query($conn, "select * from contact"));
                ?>
                <h5><strong><?php echo $num_contact; ?></strong></h5>
                <span>Total Feedbacks</span>
            </div>
        </div>
    </div>


    <div class="col-md-5 widget">
        <div class="r3_counter_box">
            <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
            <div class="stats">
                <?php
                $num_users = mysqli_num_rows(mysqli_query($conn, "select * from user"));
                ?>
                <h5><strong><?php echo $num_users; ?></strong></h5>
                <span>Total Users</span>
            </div>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>