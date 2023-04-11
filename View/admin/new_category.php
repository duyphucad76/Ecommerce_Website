<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4 col-md-offset-4 mt-3">
        <h3>New Category</h3>
        <form action="index.php?action=admin&act=new_category" method="post" enctype="multipart/form-data">
            <input type="file" name="file" id="file">
            <button name="submit_file" type="submit" class="normal" style="background-color: #088178; color: white;">Submit</button>
        </form>
        <form action="index.php?action=admin&act=new_category" method="post" enctype="multipart/form-data">
            <table class="table" style="border: 0px;">
                <tr>
                    <td>Name</td>
                    <td><input type="text" class="form-control" name="name" maxlength="100px"></td>
                </tr>
                <tr>
                    <td><button type="submit" name="submit" class="normal" style="background-color: #088178; color: white;">Submit</button></td>
                </tr>
            </table>
        </form>
    </div>
</div>