
     <?php

     include "header.php";



     ?>
        <!-- content HEADER -->
        <!-- ========================================================= -->
        <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
        <ul class="breadcrumbs">
        <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
        <li><i class="fa fa-home" aria-hidden="true"></i><a href="returnBook.php">Return Book</a></li>
        
        </ul>
        </div>
        </div>
        
        <div class="row animated fadeInUp">
          <h4 class="section-subtitle"><b>Return Book</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="table-bordered data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Phone Number</th>
                                        
                                        <th>Book Image</th>
                                        <th>Book Name</th>
                                        <th>Book Issue Date</th>
                                        <th>Return Book</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                          <?php
                                   $query = "SELECT issue_book.id,issue_book.book_id, issue_book.book_issue_date, students.fname ,students.lname , students.roll,students.phone, books.book_name , books.book_image FROM issue_book INNER JOIN students ON students.id = issue_book.student_id INNER JOIN books ON books.id = issue_book.book_id WHERE issue_book.book_return_date= ''";
                                    $result = mysqli_query($db, $query);
                                    while ($row  = mysqli_fetch_assoc($result)) {

                                    
                                 ?>

                                    <tr>
                                        <td><?= ucwords($row['fname'] .' '. $row['lname']) ?></td>
                                        <td><?= $row['roll']?></td>
                                        
                                        <td><?= $row['phone']?></td>
                                        
                                        
                                        <td><img style="height: 50px; width: 80px;" src="../images/book/<?= $row['book_image']?>"></td>
                                        
                                       <td><?= $row['book_name']?></td>
                                       <td><?= date('d- M -Y', strtotime($row['book_issue_date'])) ?></td>

                                       <td><a href="returnBook.php?id=<?= $row['id']?>&bookid=<?= $row['book_id']?>">Return Book</a></td>
                                       
                                        
                                    </tr>
                                  


                                    <?php
                                       }

                               ?>
                                    
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
        
        </div>
        <?php

        if (isset($_GET['id'])) {
          $id =   $_GET['id'];
          $bookid =   $_GET['bookid'];
          $date = date('d-M-Y') ;

          $query = "UPDATE issue_book SET book_return_date = '$date' where id = '$id'" ;

          $returnBook = mysqli_query($db, $query);

              $query = " UPDATE books SET available_qty = available_qty + 1 WHERE id = '$bookid'";
              $updatesbook = mysqli_query($db, $query);


              }


        ?>

        <?php

           include "footer.php";
        ?>