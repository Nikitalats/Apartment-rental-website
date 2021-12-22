
<?php
$dbh = new PDO('mysql:dbname=strawman_tophata;host=localhost', 'strawman_tophata', 'Nikita007');
if (!empty($_POST['search'])) {
    
	$search = $_POST['search'];

	$sth = $dbh->prepare("SELECT * from users WHERE id LIKE '{$search}%' ORDER BY id");
	$sth->execute();
	$result = $sth->fetchAll(PDO::FETCH_ASSOC);
 
	if ($result) {
		?>
		<div class="search_result">
			<table>
				<?php foreach ($result as $row): ?>
				<tr>
					<td class="search_result-name">
						<p><?php echo $row['name']; ?></p>
					</td>
					<td class="search_result-btn" id="del-<?php echo $row['id']; ?>" >
						<a href="#" class="user" value="<?php echo $row['id']; ?>" >Удалить</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
		<?php
	}
}

?>

