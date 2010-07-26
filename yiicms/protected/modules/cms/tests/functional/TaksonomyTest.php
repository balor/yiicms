<?php

class TaksonomyTest extends WebTestCase
{
	public $fixtures=array(
		'taksonomys'=>'Taksonomy',
	);

	public function testShow()
	{
		$this->open('?r=taksonomy/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=taksonomy/create');
	}

	public function testUpdate()
	{
		$this->open('?r=taksonomy/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=taksonomy/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=taksonomy/index');
	}

	public function testAdmin()
	{
		$this->open('?r=taksonomy/admin');
	}
}
