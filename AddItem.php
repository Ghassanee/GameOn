<?php $file = file_get_contents('header.php');
$content = eval("?>$file");
echo $content;
include_once 'DataBaseConnection.php';
?>




<div class="container">
<form style="font-size: 20px !important;" role="form" id="addForm" action="includes/form.inc.php"  method="post" enctype="multipart/form-data" >

    <div class="form-group">
        <label for="Name">Name</label>
        <input type="text" name="Name" placeholder="GTA5"  required class="form-control">
    </div>

    <div class="form-group">
        <label for="Price">Price($)</label>
        <input type="number" name="Price" placeholder="19,99" min="0"  required class="form-control">
    </div>
    <div class="form-group">
        <label for="Type">Type</label>
        <input type="text" name="Type" placeholder="game"  required class="form-control">
    </div>
    <div class="form-group">
        <label for="Stock">Stock</label>
        <input type="number" name="Stock" min="1" placeholder="12" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="ReleaseD">Release Date </label>
        <input type="date" name="ReleaseD" placeholder="" required class="form-control">
    </div>
    <div class="form-group">
        <label for="Rating">Rating</label>
        <input type="number" name="Rating" placeholder="+4" required class="form-control" min="0" max="10">
    </div>

    <div class="form-group">
        <label for="Genre">Genre</label>
        <input type="text" name="Genre" placeholder="Fps" required class="form-control" >
    </div>
    <div class="form-group">
        <label for="Publisher">Publisher</label>
        <input type="text" name="Publisher" placeholder="Ubisoft" required class="form-control" >
    </div>
    <div class="form-group">
        <label for="Version">Version</label>
        <input type="text" name="Version" placeholder="Normal" required class="form-control" >
    </div>
    <div class="form-group">
        <label for="Title">Title</label>
        <input type="text" name="Title" placeholder="Grand theft auto " required class="form-control" >
    </div>
    <div class="form-group">
        <label for="Details">Details</label>
        <textarea type="" name="Details"   required class="form-control" form="addForm" placeholder="Details.."  ></textarea>

    </div>
    <div class="form-group">
        <label for="Image">Image</label>
        <div style="font-size: 15px !important; background-color: transparent !important; border: none !important; " class="btn btn-primary btn-sm  ">

            <input name="Image" style=" padding: 10px !important; height: 60px !important;  border: none !important;  background-color: transparent !important; "  class="form-control" required type="file">
        </div>

    </div>
    <div class="form-group">
        <label for="Video">Video</label>
        <div style="font-size: 15px !important; background-color: transparent !important; border: none !important; " class="btn btn-primary btn-sm  ">

            <input name="Video" style=" padding: 10px !important; height: 60px !important;  border: none !important;  background-color: transparent !important; "  class="form-control" required type="file">
        </div>

    </div>
    <input id="button" name="submitAdd" type="submit" value="Add Game" > </form>

</div>


<?php $file = file_get_contents('footer.php');
$content = eval("?>$file");
echo $content; ?>
