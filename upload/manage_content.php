<?php
//кодировка UTF-8
include '..\includes\charset.php';
//Старт сессии
require_once '..\includes\session.php';
//подключение функций
require_once '..\includes\db_connection.php';
require_once '..\includes\function.php';


//голова сайта хтмл
include '..\includes\layouts\header.php';
?>
<?php find_selected_page(); ?>

<div id="main">
	<div id="navigation">
		<br />
		<a href="admin.php">&laquo; Главное меню</a><br />
		<?php
			echo navigation($current_subject, $current_page);
		?>
		<br />
		<a href="new_subject.php">+ Add a subject</a>

	</div>
	<div id="page">
		<?php echo message(); ?>
		<?php if ($current_subject) { ?>
		<h2>Управление контентом</h2>
		Имя Меню: <?php echo $current_subject['menu_name']; ?><br />
			Позиция: <?php echo $current_subject['position'];?><br />
			Видимость: <?php echo $current_subject['visible'] == 1 ? 'yes' : 'no'; ?>
			<br />
		<a href="edit_subject.php?subject=<?php echo urlencode($current_subject['id']); ?>">Изменить тему</a>

		<?php } elseif ($current_page) {?>
			<h2>Управление страницами</h2>

		Имя меню: <?php echo $current_page['menu_name'];?><br />
			Позиция: <?php echo $current_page['position'];?><br />
			Видимость: <?php echo $current_page['visible'] == 1 ? 'yes' : 'no'; ?>
			<br />
			Содержание: <br />
			<div class="view-content">
				<?php echo $current_page['content'];?><br />
			</div>
		<?php } else { ?>
		Пожалуйста выберите объект или страницу
		<?php } ?>
	</div>
</div>
<?php

//низ сайта хтмл + закрыте конекта с БД
include '..\includes\layouts\footer.php';
?>
