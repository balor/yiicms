<?php

class TaksonomyLinkerTest extends WebTestCase
{
	public $fixtures=array(
		'taksonomyLinkers'=>'TaksonomyLinker',
	);

	public function testShow()
	{
		$this->open('?r=taksonomyLinker/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=taksonomyLinker/create');
	}

	public function testUpdate()
	{
		$this->open('?r=taksonomyLinker/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=taksonomyLinker/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=taksonomyLinker/index');
	}

	public function testAdmin()
	{
		$this->open('?r=taksonomyLinker/admin');
	}
}
