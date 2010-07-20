<?php

class GalleryFolderTest extends WebTestCase
{
	public $fixtures=array(
		'galleryFolders'=>'GalleryFolder',
	);

	public function testShow()
	{
		$this->open('?r=galleryFolder/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=galleryFolder/create');
	}

	public function testUpdate()
	{
		$this->open('?r=galleryFolder/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=galleryFolder/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=galleryFolder/index');
	}

	public function testAdmin()
	{
		$this->open('?r=galleryFolder/admin');
	}
}
