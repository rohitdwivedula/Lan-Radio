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
        <form action="banner.php">
            <h1>Banners</h1>
            <div class="form-group">
            Choose which banner to update : <select name="banner" id="banner">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Banner Title">
            </div>
            <div class="form-group">
                <input type="text" name="subtitle" class="form-control" placeholder="Banner Subtitle">
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
        <form action="banner.php">
            <h1>Featured Page</h1>
            <p>There are 8 items on the featured page. Choose to change any one of them at a time</p>
            <div class="form-group">
            Choose which item to update : <select name="item" id="item">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>
            
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Title of the podcast ( must be exact an match )" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update Item">
            </div>
        </form>
     </div>
</body>
</html>