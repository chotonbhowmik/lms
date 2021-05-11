
     <?php

     include "header.php";



     ?>
        <!-- content HEADER -->
        <!-- ========================================================= -->
        <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
        <ul class="breadcrumbs">
        <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
        
        
        </ul>
        </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <div class="row animated fadeInUp">

            <div class="row">

                         <?php

                     $query = "SELECT * FROM books";
                     $totalBook = mysqli_query($db, $query);
                     $boks= mysqli_num_rows($totalBook);

                     $testquery = "SELECT SUM(available_qty) as total FROM books";
                     $totalQuantity = mysqli_query($db, $testquery);
                     $qty = mysqli_fetch_assoc($totalQuantity);



                ?>
                    <!--BOX Style 1-->
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-darker-1">
                            <a href="managebook.php">
                                <div class="panel-content">
                                    <h4 class="title color-w"><i class="fa fa-book"></i> Total Books </h4>
                                    <h4 class="subtitle color-lighter-1"><?= $boks . '(Available : '.$qty['total'] .')'; ?></h4>
                                </div>
                            </a>
                        </div>
                    </div>

                                  <?php

 $query = "SELECT * FROM libraian";
 $totalLibraian = mysqli_query($db, $query);
 $librarian = mysqli_num_rows($totalLibraian);



                ?>
                <?php

 $query = "SELECT * FROM students";
 $totalStudents = mysqli_query($db, $query);
 $student = mysqli_num_rows($totalStudents);



                ?>
                    <!--BOX Style 1-->
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-darker-1">
                            <a href="students.php">
                                <div class="panel-content">
                                    <h4 class="title color-w"><i class="fa fa-globe"></i> Total Students </h4>
                                    <h4 class="subtitle color-lighter-1"><?= $student; ?></h4>
                                </div>
                            </a>
                        </div>
                    </div>

                                  <?php

 $query = "SELECT * FROM libraian";
 $totalLibraian = mysqli_query($db, $query);
 $librarian = mysqli_num_rows($totalLibraian);



                ?>
                    <!--BOX Style 1-->
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-darker-1">
                            <a href="">
                                <div class="panel-content">
                                    <h4 class="title color-w"><i class="fa fa-globe"></i> Total Librarian </h4>
                                    <h4 class="subtitle color-lighter-1"><?= $librarian; ?></h4>
                                </div>
                            </a>
                        </div>
                    </div>

                    
                </div>
         

        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        </div>

       <?php

           include "footer.php";
       ?>