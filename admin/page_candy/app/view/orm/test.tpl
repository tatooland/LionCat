<?php
echo $header;
?>
<div class='conatiner'>
	<h1>数据取自ORM</h1>
	<?php
		echo $name;
		echo "<br>";
		echo $age;
	?>
	<hr>
	<h1>数据取自model</h1>
	<?php
		echo $m_name;
		echo "<br>";
		echo $m_age;
	?>
</div>
<?php
echo $footer;
?>