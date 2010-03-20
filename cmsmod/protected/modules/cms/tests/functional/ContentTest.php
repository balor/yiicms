<?php

class ContentTest extends WebTestCase
{
	public $fixtures=array(
		'contents'=>'Content',
	);

	public function testShow()
	{
		$this->open('?r=content/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=content/create');
	}

	public function testUpdate()
	{
		$this->open('?r=content/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=content/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=content/index');
	}

	public function testAdmin()
	{
		$this->open('?r=content/admin');
	}
}
