<?php

/*
 * Author: Michał [Balor] Thoma
 * Author website: http://balor.pl
 * Version: 1.0
 */

class CJLeftMenuWidget extends CWidget
{
    // REQUIRED PARAMETER
    // this is a root taksonomy that will be used to build menu
    public $taksonomy_id = 0;

    // if set to false, only given taksonomy and its contents/children will be rendered 
    public $recursive = true;

    // if set to false, menu will only contain categories
    public $show_contents = true;

    // if set to true, all categories will be links with taskonomy->id param
    public $clickable_cats = false;

    // main <ul> object id param
    public $menu_container_id = 'yiicms_jleftmenu';
    
    // content link action described as array('/action', 'param'=>'value')
    // applied if $show_contents = true
    public $content_action = array('');

    // category link action described as array('/action', 'param'=>'value')
    // applied id $clickable_cats = true
    public $category_action = array('');

    public $taksonomy_param_name = 'taksonomy_id';
    public $content_param_name = 'content_id';

    public function run()
    {
        Yii::import('application.modules.cms.models.Taksonomy');
        Yii::import('application.modules.cms.models.TaksonomyLinker');
        Yii::import('application.modules.cms.models.Content');
        
        $taksonomy = Yii::createComponent('Taksonomy')->findByPk($this->taksonomy_id);
        if (!$taksonomy) {
            print 'CJLeftMenuWidgetException: Wrong taksonomy id';
            return false;
        }

        $dir = dirname(__FILE__);
        $asset_dir = Yii::app()->getAssetManager()->publish($dir.'/assets/');
  		$cs = Yii::app()->getClientScript();
		$cs->registerCoreScript('jquery');
		$cs->registerCssFile($asset_dir.'/css/style.css', 'screen');
		$cs->registerScriptFile($asset_dir.'/js/jquery.jleftmenu.js');
        $js =
            '$(document).ready(function(){'.
                'jLeftMenu("#'.$this->menu_container_id.'");'.
            '})';
        $cs->registerScript('CQueryboxWidget'.time(), $js, CClientScript::POS_HEAD);
        print $this->buildTaksonomyTree($taksonomy);
        return true;
    }

    private function buildTaksonomyTree($rootTaksonomy, $first = true)
    {
        $empty_action = 'javascript:void(0);';
        $breakker = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        $children = $rootTaksonomy->getChildren();
        
        if ($first)
            $tree = "\n".'<ul id="'.$this->menu_container_id.'" class="menu">'."\n";
        else
            $tree = '';

        foreach ($children as $child) {
            
            if ($this->recursive)
                $subTree = $this->buildTaksonomyTree($child, false);
            else
                $subTree = false;
            
            $category_action = $this->category_action;
            $category_action[$this->taksonomy_param_name] = $child->id;
            $categoryLink = $child->name;
            if ($this->clickable_cats)
                $categoryLink = CHtml::link($child->name, $category_action);
            
            if ($subTree == false) {
                $tree .= 
                    '<li>'.
                        CHtml::link($breakker, $empty_action, array(
                            'childid'=>'c_'.$child->id,
                            'class'=>'product',
                        )).
                        $categoryLink.
                    '</li>';
            }
            else {
                $tree .= 
                    '<li>'.
                        CHtml::link($breakker, $empty_action, array(
                            'childid'=>'c_'.$child->id,
                            'class'=>'cat_close category',
                        )).
                        $categoryLink.
                    '</li>'.
                    '<ul id="c_'.$child->id.'">'.
                        $subTree.
                    '</ul>';
            }
        }
        if ($this->show_contents) {
            $contents = $rootTaksonomy->getContents();
            foreach ($contents as $content) {
                $content_action = $this->content_action;
                $content_action[$this->content_param_name] = $content->id;
                $tree .= 
                    '<li>'.
                        CHtml::link($breakker, $empty_action, array(
                            'childid'=>'con_'.$content->id,
                            'class'=>'product',
                        )).
                        CHtml::link($content->name, $content_action). 
                   '</li>'; 
            }
        }
        if ($first)
            $tree .= '</ul>'."\n";
        if ($tree == '')
            return false;
        return $tree;
    }
}
