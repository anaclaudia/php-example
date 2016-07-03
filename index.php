<html>
	<head>
		<title>Gameduell Sysadmin Challenge</title>
	</head>
	<body>
		<?php	require 'conn.php';
			$conn = new Db();
			$rows = $conn->select("SELECT message FROM messages WHERE id = 1");
			foreach ($rows as $row){
				foreach ($row as $key => $value){
					echo "{$value}"."\n";
				}
			}	
		?>
	</body>
</html>
