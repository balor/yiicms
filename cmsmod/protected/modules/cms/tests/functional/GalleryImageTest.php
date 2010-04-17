<?php

class GalleryImageTest extends WebTestCase
{
	public $fixtures=array(
		'galleryImages'=>'GalleryImage',
	);

	public function testShow()
	{
		$this->open('?r=galleryImage/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=galleryImage/create');
	}

	public function testUpdate()
	{
		$this->open('?r=galleryImage/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=galleryImage/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=galleryImage/index');
	}

	public function testAdmin()
	{
		$this->open('?r=galleryImage/admin');
	}
}
