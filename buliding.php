<?php
	include("connMysqlObj.php");
	$sql_query = "SELECT * FROM building ORDER BY B_ID ASC";
	$result = $db_link->query($sql_query);
	$total_records = $result->num_rows;
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset="UTF-8" />
<title>�]�q�޲z�t��</title>
</head>
<body>
<h1 align="center">�]�q�޲z�t��(��)</h1>
<p align="center">�ثe��Ƶ��ơG<?php echo $total_records;?>�A<a href="buliding_add.php">�s�W�ɦW</a>�C</p>
<table border="1" align="center">
  <!-- �����Y -->
  <tr>
    <th>�s��</th>
    <th>�ɦW</th>
    <th>�إ߮ɶ�</th>
    <th>�s��ɶ�</th>
    <th>�R���ɶ�</th>
  </tr>
  <!-- ��Ƥ��e -->
<?php
	while($row_result=$result->fetch_assoc()){
		echo "<tr>";
		echo "<td>".$row_result["B_ID"]."</td>";
		echo "<td>".$row_result["B_name"]."</td>";
		echo "<td>".$row_result["Add_time"]."</td>";
		echo "<td>".$row_result["Edit_time"]."</td>";
		echo "<td>".$row_result["Del_time"]."</td>";
		echo "<td><a href='buliding_update.php?id=".$row_result["B_ID"]."'>�ק�</a> ";
		echo "<a href='buliding_delete.php?id=".$row_result["B_ID"]."'>�R��</a></td>";
		echo "</tr>";
	}
?>
</table>
</body>
</html>