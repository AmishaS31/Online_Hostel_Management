<?php
include("header.php");


if(isset($_POST['submit']))
{
	$sql = "INSERT INTO leave_application(hostellerid,application_dt,from_dt,to_dt,leave_reason,person_visiting,guardian,warden_remark,cheif_warden_remark,leave_status)VALUES('" . $_SESSION['hostellerid'] . "','$dt','" . $_POST['from_dt'] . "','" . $_POST['to_dt'] . "','" .  $_POST['leave_reason'] . "','" .  $_POST['person_visiting'] . "','" .  $_POST['guardian'] . "','','','Pending')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) ==1 )
	{
		echo "<script>viewmessagebox('Leave Application sent successfully...','viewleaveapplication.php')</script>";
	}
}
?>
	</div>
	
	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">New Leave Application</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>
			<div class="row pt-xl-4">
				<div class="col-lg-8 offset-2">
					<div class="contact-form-wthreelayouts">
<form action="" method="post" class="register-wthree" name="frmform" onsubmit="return validateform()">
	
<div class="form-group">
		<label>
			Leave From
		</label><span class="errclass" id="idfd"></span>
		<input class="form-control"  type="date" name="fromdt" id="fromdt"  value="<?php echo $rsedit['from_dt'];?>" min="<?php echo date("Y-m-d"); ?>" >
	</div>
	
	<div class="form-group">
		<label>
			Leave till
		</label><span class="errclass" id="idtd"></span>
		<input class="form-control"  type="date" name="to_dt" id="to_dt"  value="<?php echo $rsedit['to_dt'];?>" min="<?php echo date("Y-m-d"); ?>" >
	</div>
    
	<div class="form-group">
		<label>
			Reason for taking leave
		</label><span class="errclass" id="idleave_reason"></span>
		<input class="form-control" style="height:110px;" type="text" name="leave_reason"   id="leave_reason"  required="required" pattern="[a-zA-Z'-'\s]*" title="only alphabets"  value="<?php echo $rsedit['leave_reason']; ?>" >
	</div>
    
	<div class="form-group">
		<label>
			Visiting Person
		</label><span class="errclass" id="idperson_visiting"></span>
		<input class="form-control" type="text" name="person_visiting" id="person_visiting" required="required" pattern="[a-zA-Z'-'\s]*" title="only alphabets"value="<?php echo $rsedit['person_visiting'];?>">
	</div>
	<div class="form-group">
		<label>
			Guardian Detail
		</label><span class="errclass" id="idguardian"></span>
		<input class="form-control" type="text" placeholder="guardian" name="guardian" required="required" pattern="[a-zA-Z'-'\s]*" title="only alphabets" value="<?php echo $rsedit['guardian'];?>">
	</div>
	<div class="form-group mt-4 mb-0">
		<button type="submit" name="submit" class="btn btn-w3layouts w-100">Apply for Leave</button>
	</div>
</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- //contact -->

	<?php
	include("footer.php");
	?>
<script>
function validateform()
{
	var numericExpression = /^[0-9]+$/;
	var alphaExp = /^[a-zA-Z]+$/;
	var alphaSpaceExp = /^[a-zA-Z\s]+$/;
	var alphanumericExp = /^[0-9a-zA-Z]+$/;
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;

	$(".errclass").html('');
	
	var errstatus = "true";
	
	if(document.frmform.fromdt.value=="")
	{
		document.getElementById("idfd").innerHTML = "Date  should not be empty...";
		document.getElementById("fromdt").focus();
		errstatus = "false";
	}
	
	if(document.frmform.to_dt.value=="")
	{
		document.getElementById("idtd").innerHTML = "Date  should not be empty...";
		document.getElementById("to_dt").focus();
		errstatus = "false";
	}
	if(document.frmform.leave_reason.value=="")
	{
		document.getElementById("idleave_reason").innerHTML = "Reason should not be empty";
		document.getElementById("leave_reason").focus();
		errstatus = "false";
	}
	/*if(document.frmform.leave_reason.value.match(alphaExp))
	{
		document.getElementById("idleave_reason").innerHTML = "Reason should be valid one ";
		document.getElementById("leave_reason").focus();
		errstatus = "false";
	}*/	
	if(document.frmform.person_visiting.value=="")
	{
		document.getElementById("idperson_visiting").innerHTML = "person name  should not be empty";
		document.getElementById("person_visiting").focus();
		errstatus = "false";
	}
	/*if(document.frmform.person_visiting.value.match(alphaExp))
	{
		document.getElementById("idperson_visiting").innerHTML = "Reason should be valid one ";
		document.getElementById("person_visiting").focus();
		errstatus = "false";
	}*/
	
	if(document.frmform.to_dt.value <= document.frmform.fromdt.value)
	{
		document.getElementById("idtd").innerHTML = "this is in valid date";
		document.getElementById("to_dt").focus();
		errstatus = "false";
	}
	if(errstatus == "true")
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>