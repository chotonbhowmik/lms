
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
        <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Manage Book</a></li>
        
        
        </ul>
        </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <div class="row animated fadeInUp">
          <h4 class="section-subtitle"><b>All Books</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Book Name</th>
                                        <th>Book Image</th>
                                        <th>Author Name</th>
                                        <th>Publication Name</th>
                                        <th>Author Name</th>
                                        <th>Book Price</th>
                                        <th>Book Quantity</th>
                                        <th>Avaiable Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                          <?php
                                   $query = "SELECT * FROM books";
                                    $result = mysqli_query($db, $query);
                                    while ($row  = mysqli_fetch_assoc($result)) {

                                    
                                 ?>

                                    <tr>
                                        <td><?= $row['book_name'] ?></td>
                                        <td><img style="width: 70px;" "height= 80px;" src="../images/book/<?= $row['book_image'] ?>"></td>
                                        <td><?= $row['book_author_name'] ?></td>
                                        <td><?= $row['book_publication_name'] ?></td>
                                        <td><?= $row['book_purchase_date'] ?></td>
                                        <td><?= $row['book_price'] ?></td>
                                        <td><?= $row['book_qty'] ?></td>
                                        <td><?= $row['available_qty'] ?></td>
                                        <td>
                                            <a href="" class="btn btn-info" data-toggle="modal" data-target="#book-<?= $row['id']?>"><i class="fa fa-eye"></i></a>
                                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#book-update-<?= $row['id']?>"><i class="fa fa-pencil"></i></a>
                                            <a href="delete.php?deletebook=<?= $row['id']?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>

                                        </td>
                                        
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
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        </div>

        <!--------for view information ------------------->

                 <?php
                           $query = "SELECT * FROM books";
                            $result = mysqli_query($db, $query);
                            while ($row  = mysqli_fetch_assoc($result)) {

                            
                   ?>

         <!-- Modal -->
                            <div class="modal fade" id="book-<?= $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header state modal-info">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Book Informtion</h4>
                                        </div>
                                        <div class="modal-body">
                                           <table class="table table-bordered">
                                               <tr>
                                                    <th>Book Name</th>
                                                    <td><?= $row['book_name'] ?></td>
                                               </tr>
                                               <tr>
                                                   <th>Book Image</th>
                                       
                                                    <td><img style="width: 70px;" "height= 80px;" src="../images/book/<?= $row['book_image'] ?>"></td>
                                        
                                               </tr>

                                               <tr>
                                                     <th>Author Name</th>
                                        
                                                   <td><?= $row['book_author_name'] ?></td>
                                       

                                               <tr>
                                                    <th>Publication Name</th>
                                        
                                                     <td><?= $row['book_publication_name'] ?></td>
                                        
                                               </tr>
                                               </tr>


                                               <tr>
                                                    <th>Author Name</th>
                                        
                                                   <td><?= $row['book_purchase_date'] ?></td>
                                        
                                               </tr>


                                               <tr>
                                                    <th>Book Price</th>
                                        
                                                   <td><?= $row['book_price'] ?></td>
                                        
                                               </tr>


                                               <tr>
                                                   <th>Book Quantity</th>
                                        
                                                    <td><?= $row['book_qty'] ?></td>
                                        
                                               </tr>


                                               <tr>
                                                    <th>Avaiable Quantity</th>h>
                                        
                                                   <td><?= $row['available_qty'] ?></td>
                                               </tr>

                                           </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info" data-dismiss="modal">Ok</button>
                                            </div>
                                    </div>
                                </div>
                            </div>


                                    <?php
                                       }

                               ?>

 <!----- FOR UPDATE INFORMATION ----------------->

                 <?php
                           $query = "SELECT * FROM books";
                            $manageresult = mysqli_query($db, $query);
                            while ($row  = mysqli_fetch_assoc($manageresult)) {
                                $id =  $row['id'];
                                $updatequery = "SELECT * FROM books WHERE id= '$id'";
                                  $updateresult = mysqli_query($db, $updatequery);

                                  $update_book_info = mysqli_fetch_assoc($updateresult);

                            
                         ?>

         <!-- Modal -->
                            <div class="modal fade" id="book-update-<?= $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header state modal-info">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Update Book Informtion</h4>
                                        </div>
                                        <div class="modal-body">
                                          <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" method="post">
                                        
                                       <div class="form-group">
                                            <label for="book_name">Book Name</label>
                                            
                                                <input type="text" class="form-control" id="book_name" placeholder="Book Name" name="book_name" value="<?=  $update_book_info['book_name']?>">
                                                <input type="hidden" class="form-control"  name="id" value="<?=  $update_book_info['id']?>">
                                            
                                        </div>



                                           <div class="form-group">
                                            <label for="book_author_name" >Book Author Name</label>
                                            
                                                <input type="text" class="form-control" id="book_author_name" placeholder="Book Author Name" name="book_author_name" value="<?=  $update_book_info['book_author_name']?>">
                                           
                                        </div>
                                        

                                         <div class="form-group">
                                            <label for="book_publication_name" >Book Publication Name</label>
                                          
                                                <input type="text" class="form-control" id="book_publication_name" placeholder="Book Publication Name" name="book_publication_name" value="<?=  $update_book_info['book_publication_name']?>">
                                           
                                        </div>

                                         <div class="form-group">
                                            <label for="book_purchase_date" >Book Purchase Date</label>
                                           
                                                <input type="date" class="form-control" id="book_purchase_date" placeholder="Book Purchase Date" name="book_purchase_date" value="<?=  $update_book_info['book_purchase_date']?>">
                                           
                                        </div>

                                        <div class="form-group">
                                            <label for="book_price" >Book Price</label>
                                            
                                                <input type="number" class="form-control" id="book_price" placeholder="Book Price" name="book_price" value="<?=  $update_book_info['book_price']?>">
                                       
                                        </div>

                                       

                                        <div class="form-group">
                                            <label for="book_qty">Book Quantity</label>
                                            
                                                <input type="number" class="form-control" id="book_qty" placeholder="Book Quantity" name="book_qty" value="<?=  $update_book_info['book_qty']?>">
                                           
                                        </div>


                                        <div class="form-group">
                                            <label for="available_qty">Available Quantity</label>
                                            
                                                <input type="number" class="form-control" id="available_qty" placeholder="Available Quantity" name="available_qty" value="<?=  $update_book_info['available_qty']?>">
                                         
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" name="update-book" class="btn btn-primary">update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                                    </div>
                                </div>
                            </div>


                                    <?php
                                       }


     if (isset($_POST['update-book'])) {

       $id                       = $_POST['id'];
       $book_name                = $_POST['book_name'];
       $book_author_name         = $_POST['book_author_name'];
       $book_publication_name    = $_POST['book_publication_name'];
       $book_purchase_date       = $_POST['book_purchase_date'];
       $book_price               = $_POST['book_price'];
       $book_qty                 = $_POST['book_qty'];
       $available_qty            = $_POST['available_qty'];
       $librarian_name           = $_SESSION['username'];

    


    $query ="UPDATE `books` SET book_name='$book_name', book_author_name='$book_author_name', book_publication_name='$book_publication_name', book_purchase_date='$book_purchase_date', book_price='$book_price', book_qty='$book_qty', available_qty='$available_qty', librarian_name='$librarian_name' WHERE id = '$id'" ;

    
    $updatebook= mysqli_query($db, $query);

     if ($updatebook) {
       
       header("Location:managebook.php");
     }
     
       
     }

         ?>
                                  

                                  

       <?php

           include "footer.php";
       ?>