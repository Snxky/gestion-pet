<?php 

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

    require 'database.php';
    $statement = $pdo -> prepare('SELECT * FROM pets');
    $statement -> execute();
    $pets = $statement -> fetchAll(PDO::FETCH_ASSOC);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
	<h1 class="mb-8">
     Pets available for adoption
  </h1>

	<table class="text-left w-full">
		<thead class="bg-black flex text-white w-full">
			<tr class="flex w-full mb-4">
				<th class="p-4 w-1/4">Name</th>
				<th class="p-4 w-1/4">Type</th>
				<th class="p-4 w-1/4">breed</th>
				<th class="p-4 w-1/4">age</th>
                <th class="p-4 w-1/4">size</th>
			</tr>
		</thead>
		<tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" style="height: 50vh;">
        <?php foreach ($pets as $pet) : ?>
			<tr class="flex w-full mb-4">
                <th class="p-4 w-1/4"><?php echo $pet['name'] ?> </th>
				<th class="p-4 w-1/4"><?php echo $pet['type_pet'] ?></th>
				<th class="p-4 w-1/4"><?php echo $pet['breed'] ?></th>
				<th class="p-4 w-1/4"><?php echo $pet['age'] ?></th>
                <th class="p-4 w-1/4"><?php echo $pet['size'] ?></th>
			</tr>
            <?php endforeach ;?>
		</tbody>
	</table>
</div>
</body>
</html>