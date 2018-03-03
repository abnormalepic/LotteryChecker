<?php
require_once("../includes/header.php");
if(!isset($_SESSION["u_id"]))
{
	require_once("../includes/functions.php");
	redto("../login.php");
}
else
{
	require_once("../includes/menu.php");

?>

<div class="well container">
	<div style=' text-indent: 17%; font-size:17px; padding-bottom: 30px;' class="text">
<?php
	if (!isset($_SESSION["addBund"]))
	{
		echo "To add tickets , you can download <a class='text-danger' href='../includes/Bundle.csv'><b>demo file</b></a> to upload";
	}
	else
	{
		echo $_SESSION["addBund"];
		unset($_SESSION["addBund"]);
	}
			
?>		
	</div>
  <form class="form-horizontal reg-form" action="addBundCheck.php" method="post" enctype="multipart/form-data">
		<div class="form-group form-group-md">
			<label class="col-md-2 control-label">Lottery Company Name</label>
				<div class="col-sm-6">
				<input required class="form-control" type="text" placeholder="ex: Xyz" maxlength="50" name="b_comName">
				</div>
		</div>
		<div class="form-group form-group-md">
			<label class="col-md-2 control-label">Lottery Files</label>
				<div class="col-sm-6">
				<input required class="form-control" type="file" name="b_tickList">
				</div>
		</div>
		<div class="form-group">
            <div class="col-sm-offset-2 col-md-10">
                <button type="submit" class="btn btn-default" name="addBund">Add Ticket</button>
            </div>
        </div>

	</form>
</div>
<?php 
	require_once("../includes/footer.php");
}
?>