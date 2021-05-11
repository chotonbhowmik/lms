
     <?php

     include "header.php";
     if (isset($_POST['issue-book'])) {

              $student_id           =   $_POST['student_id'];
              $book_id              =   $_POST['book_id'];
              $book_issue_date      =   $_POST['book_issue_date'];


              $sql = "INSERT INTO issue_book (student_id, book_id, book_issue_date) VALUES ('$student_id', '$book_id', '$book_issue_date')";

              $bookdate = mysqli_query($db, $sql);

              $query = " UPDATE books SET available_qty = available_qty - 1 WHERE id = '$book_id'";
              $updatesbook = mysqli_query($db, $query);
             
          if ($bookdate) {
       
       header("Location:issueBook.php");
     }
     else{

      echo "something wrong";
     }        
             }




     ?>
        <!-- content HEADER -->
        <!-- ========================================================= -->
        <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
        <ul class="breadcrumbs">
        <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
        <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Issue Book</a></li>
        
        
        </ul>
        </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <div class="row animated fadeInUp">
          <div class="col-sm-6 col-sm-offset-3" >
              
         
            <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-inline" action="" method="POST">
                                        
                                        <div class="form-group">
                                      
                                            
                                            <select class="form-control" name="student_id">
                                                
                                                <option>Select</option>

                                     <?php
                                   $query = "SELECT * FROM students WHERE status ='1'";
                                    $result = mysqli_query($db, $query);
                                    while ($row  = mysqli_fetch_assoc($result)) { ?>

                                          <option value="<?= $row['id'] ?>"><?= ucwords($row['fname']. ' ' . $row['lname']) . ' ('. $row['roll']. ')' ?></option>

                                    <?php  }
                                         ?>

                                              
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <button type="submit" name="search" class="btn btn-primary">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <?php

                            if (isset($_POST['search'])) {
                                $id = $_POST['student_id'];

                                 $query = "SELECT * FROM students WHERE id = '$id' AND status ='1'";
                                    $result = mysqli_query($db, $query);
                                     $row  = mysqli_fetch_assoc($result);
                                     ?>

                                     <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" method="POST">
                                        
                                        <div class="form-group">
                                            <label for="name">Student Name</label>
                                            <input type="text" class="form-control" id="text" value="<?=$row['fname']. ' ' . $row['lname']?>" >
                                            <input type="hidden" value="<?= $row['id']?>" name="student_id">
                                        </div>


                                         <div class="form-group">
                                            <label>Book Name</label>
                                      
                                            
                                            <select class="form-control" name="book_id">
                                                
                                                <option>Select</option>

                                     <?php
                                   $query = "SELECT * FROM books WHERE available_qty > 0";
                                    $result = mysqli_query($db, $query);
                                    while ($row  = mysqli_fetch_assoc($result)) { ?>

                                          <option value="<?= $row['id'] ?>"><?= $row['book_name'] ?></option>

                                    <?php  }
                                         ?>

                                              
                                            </select>
                                        </div>

                                         <div class="form-group">
                                            <label>Book Issue Date</label>
                                            <input name="book_issue_date" type="text" class="form-control" value="<?= date('d-m-Y') ?>" readonly>

                                        </div>
                                       
                                        <div class="form-group">
                                            <button type="submit" name="issue-book" class="btn btn-primary">Save Issue Book</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>


                         
                        </div>
                    </div>
                     </div>
         

        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        </div>

       <?php

           include "footer.php";
       ?>