<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Create new Account</title>
</head>
<body>
    <div class="container">
        <div class="row ">
            <div class="col-md-12 ">
                <h1> Create new Account</h1>
                <form action="processCreate.php" method='Post'>
                    <div>
                        <label for="username" class="form-label">User Name</label>
                        <input type="text" name="username" id="username" class="form-control" >
                    </div>
                    <div>
                        <label for="password" class="form-label">Password</label>
                        <input type="text" name="password" id="password" class="form-control" >
                    </div>
                    <div>
                        <label for="comfirm" class="form-label">Confirm</label>
                        <input type="password" name="comfirm" id="comfirm" class="form-control" >
                    </div>
                    <div>
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div>
                        <input type="submit" value="Create" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>