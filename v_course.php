<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body background="image2.jpg">
<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a style="color:black"; href="front.php"><b>HOME</b></a>
<div class="askadmin" align="center">
	<form action="v_course.php" method="post">
		<input class="button" type="submit" name="submit_1" value="See All Information">
	</form>
        <form action="v_course.php" method="post">
        <table align="center" width=50% style="margin-top:50px;">
                <tr>
                        <td><b>Search by:</b></td>
                        <td>
                                <select name="by" required="required">
                                        <option value="COURSE_ID">COURSE_ID</option>
                                        <option value="CNAME">CNAME</option>
                                        <option value="PNAME">PNAME</option>
					<option value="DNAME">DNAME</option>
                                </select>
                        </td>
                </tr>
        <tr>
                <td><b>Enter the search that you want to made:</b></td><td><input type="text" name="search" placeholder="Enter" required="required"></td></tr>
                <tr><td></td><td><input class="button" type="submit" name="submit" value="Search"></td></tr>
	</table>
        </form>
</div>

<br><br><table align="center" width="80%" border="1px solid red">
        <tr style="background-color:black;color:white;">
                <th>SL_NO</th>
                <th>COURSE_ID</th>
                <th>CNAME</th>
		<th>LECTURE</th>                                                                      
                <th>THEORY</th>
                <th>PRACTICAL</th>
                <th>PNAME</th>
		<th>DNAME</th>
        </tr>
<?php
                        if(isset($_POST["submit"])){
                        include('my_connect_str.php');
                        $by=$_POST['by'];
                        $search=$_POST['search'];
                //print($by);
        //print($search);
        //$query="SELECT * FROM STUDENT,STUDENT_PHNO WHERE FNAME LIKE '%$search%'";
                        if($by=="COURSE_ID"){
                                $query="SELECT * FROM COURSE WHERE COURSE_ID LIKE '%$search%'";
                        }
                        else if($by=="CNAME"){
                                $query="SELECT * FROM COURSE WHERE CNAME LIKE '%$search%'";
                        }
			else if($by=="DNAME"){
                                $query="SELECT * FROM COURSE WHERE DNAME LIKE '%$search%'";
                        }
                        else{
                                $query="SELECT * FROM COURSE WHERE PNAME LIKE '%$search%'";
                        }
					$run=@oci_parse($con_str,$query);
        if(!@oci_execute($run)){
                print("querry can't be executed");
                exit;
        }
        else{
                //if(@oci_num_rows($run)<1){
                //<tr><td colspan="7"><?php print("No data Found!!")?>
                <?php
                //}
                //else{
                $count=0;
                while($data=@oci_fetch_assoc($run)){
                        $count++;
                        ?>
                        <tr>
                                <td> <?php print($count)?> </td>
                                <td><?php print($data["COURSE_ID"])?></td>
                                <td><?php print($data["CNAME"])?></td>
				<td><?php print($data["L"])?></td>
                                <td><?php print($data["T"])?></td>
                                <td><?php print($data["P"])?></td>
                                <td><?php print($data["PNAME"])?></td>
				<td><?php print($data["DNAME"])?></td>
                        </tr>
                        <?php
                }
        }
}
else if(isset($_POST["submit_1"])){
                        include('my_connect_str.php');
		$query="SELECT * FROM COURSE";
		 $run=@oci_parse($con_str,$query);
        if(!@oci_execute($run)){
                print("querry can't be executed");
                exit;
        }
        else{
                //if(@oci_num_rows($run)<1){
                //<tr><td colspan="7"><?php print("No data Found!!")?>
                <?php
                //}
                //else{
                $count=0;
                while($data=@oci_fetch_assoc($run)){
                        $count++;
                        ?>
                        <tr>
                                <td> <?php print($count)?> </td>
                                <td><?php print($data["COURSE_ID"])?></td>
                                <td><?php print($data["CNAME"])?></td>
                                <td><?php print($data["L"])?></td>
                                <td><?php print($data["T"])?></td>
                                <td><?php print($data["P"])?></td>
                                <td><?php print($data["PNAME"])?></td>
                                <td><?php print($data["DNAME"])?></td>
                        </tr>           
		 <?php
}                                                                                                         }
}
?>
</table>
</body>
</html>
