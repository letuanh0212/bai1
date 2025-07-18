<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Account List</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 mt-5">
                <div class="d-flex justify-content-between align-items-center mb-4" >
                    <div class="div">
                        <form action="">
                            <div class="row">
                                <label for="email" class='col-md-1'>Email</label>
                                <input type='text'name='email'id='email'/>
                                <input type='submit' name='btnSearch' value='Search' />
                            </div>   
                        </form>
                        <h1>Account List</h1>
                        <h4><a href="create.php" class="btn btn-sencondary">Create New</a></h4>
                            <table class="table table-bordered table-hover text-center align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Id</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                    
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include 'connectDB.php';
                                    $conn = connectDB();

                                    $sql = "SELECT id, username , password , email  FROM user";
                                           if(isset($_GET['btnSearch'])){
                                                $email = $_GET['email'];
                                                $sql .= "Where email Like '%$email%'";
                         
                                             }
                                    $result = $conn->query($sql);
                                    if($result->num_rows > 0) {
                                        while($row = $result->fetch_array(MYSQLI_NUM)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row[0]; ?></td>
                                        <td><?php echo $row[1]; ?></td>
                                        <td><?php echo $row[2]; ?></td>
                               
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="updateAccounts.php?id=<?php echo $row[0]; ?>" class="btn btn-sm btn-outline-primary">
                                                    Update
                                                </a>
                                                <a href="deleteAccount.php?id=<?php echo $row[0]; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure to delete?')">
                                                    Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                        $result->free_result();
                                    }else {
                                    ?>
                                    <tr>
                                        <td colspan="5">No data</td>
                                    </tr>
                                    <?php
                                    }
                                    $conn->close();
                                    ?>
                                </tbody>
                        </table>
                    </div>    
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
