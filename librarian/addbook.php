
     <?php

     include "header.php";


     if (isset($_POST['save_book'])) {

       $book_name                = $_POST['book_name'];
       $book_author_name         = $_POST['book_author_name'];
       $book_publication_name    = $_POST['book_publication_name'];
       $book_purchase_date       = $_POST['book_purchase_date'];
       $book_price               = $_POST['book_price'];
       $book_qty                 = $_POST['book_qty'];
       $available_qty            = $_POST['available_qty'];
       $librarian_name           = $_SESSION['username'];

       $image  = explode('.', $_FILES['book_image']['name']);

       $image_ext = end($image);

       $image = rand().'.'.$image_ext;


    $query ="INSERT INTO books(book_name, book_image, book_author_name, book_publication_name, book_purchase_date, book_price, book_qty, available_qty, librarian_name) VALUES('$book_name', '$image', '$book_author_name','$book_publication_name', '$book_purchase_date', '$book_price', '$book_qty', '$available_qty', '$librarian_name')" ;
    $addbook= mysqli_query($db, $query);

     if ($addbook) {
       move_uploaded_file( $_FILES['book_image']['tmp_name'], '../images/book/'.$image);
       header("Location:managebook.php");
     }
     else{
        $error = "data not save";
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
        <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Add Book</a></li>
        
        
        </ul>
        </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <div class="row animated fadeInUp">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                        <h5 class="mb-lg">Add Book</h5>
                                        <div class="form-group">
                                            <label for="book_name" class="col-sm-2 control-label">Book Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="book_name" placeholder="Book Name" name="book_name">
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label for="book_image" class="col-sm-2 control-label">Image</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" id="book_image"  name="book_image">
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label for="book_author_name" class="col-sm-2 control-label">Book Author Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="book_author_name" placeholder="Book Author Name" name="book_author_name">
                                            </div>
                                        </div>
                                        

                                         <div class="form-group">
                                            <label for="book_publication_name" class="col-sm-2 control-label">Book Publication Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="book_publication_name" placeholder="Book Publication Name" name="book_publication_name">
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label for="book_purchase_date" class="col-sm-2 control-label">Book Purchase Date</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="book_purchase_date" placeholder="Book Purchase Date" name="book_purchase_date">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="book_price" class="col-sm-2 control-label">Book Price</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="book_price" placeholder="Book Price" name="book_price">
                                            </div>
                                        </div>

                                       

                                        <div class="form-group">
                                            <label for="book_qty" class="col-sm-2 control-label">Book Quantity</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="book_qty" placeholder="Book Quantity" name="book_qty">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="available_qty" class="col-sm-2 control-label">Available Quantity</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="available_qty" placeholder="Available Quantity" name="available_qty">
                                            </div>
                                        </div>


                                       
                                        
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" name="save_book" class="btn btn-primary">Save Book</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
         

        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        </div>

       <?php

           include "footer.php";
       ?>