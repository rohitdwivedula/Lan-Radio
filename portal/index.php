<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        form{
            max-width:500px;
        }
    </style>
</head>
<body>
    <div class="container main-content">
        <form action="banner.php" enctype="multipart/form-data" method="POST">
            <h1>Banners</h1>
            <div class="form-group">
            Choose which banner to update : <select name="id" id="id">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Banner Title">
            </div>
            <div class="form-group">
                <input type="text" name="subtitle" class="form-control" placeholder="Banner Subtitle">
            </div>
            <div class="form-group">
                <input type="text" name="podcast" class="form-control" placeholder="Name of podcast it points to">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="" placeholder="Banner Subtitle">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update Banner">
            </div>
        </form>
        <hr>
        <form action="featured.php" method="GET">
            <h1>Featured Page</h1>
            <p>Choose the name of the podcast you want to add/remove to featured page</p>

            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Title of the podcast ( must be exact an match )" autocomplete="off">
            </div>
            <div class="form-group">
                <select name="featured" id="featured" class="form-control">
                    <option value="1">Yes - make it featured</option>
                    <option value="0">No - remove it from featured</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update featured item">
            </div>
        </form>
     </div>
</body>
</html>