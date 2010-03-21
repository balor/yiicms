<?php
$this->breadcrumbs=array(
	'Panel administracyjny',
);
?>
<h1>Panel administracyjny</h1>
<ul class="main_links_list">
    <li>
        <?php echo CHtml::link('Zarządzaj zawartością strony',
            $this->createUrl('/cms/content/admin'),
            array('class'=>'main_link'));?>
    </li>
    <li>
    <?php echo CHtml::link('Zarządzaj użytkownikami',
        $this->createUrl('/user/admin'),
        array('class'=>'main_link'));?>
    </li>
</ul>
