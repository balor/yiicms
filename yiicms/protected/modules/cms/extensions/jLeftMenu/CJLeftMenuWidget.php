<?php

/*
 * Author: Michał [balor] Thoma
 * Version: 1.0
 */

class CJLeftMenuWidget extends CWidget
{
    public $taksonomy_id = 0;
    public $recursive = true;
    public $show_contents = true;
    public $menu_container_id = 'yiicms_jleftmenu';

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
        $children = $rootTaksonomy->getChildren();
        if (!$children)
            return false;

        if ($first)
            $tree = "\n".'<ul id="'.$this->menu_container_id.'" class="menu">'."\n";
        else
            $tree = '';
        //else
        //    $tree = "\n".'<ul>'."\n";

        foreach ($children as $child) {
            $subTree = $this->buildTaksonomyTree($child, false);
            if ($subTree == false) {
                $tree .= '<li>'."\n".
                    "\t".'<a href="javascript:void(0);" childid="c_'.$child->id.'" class="product">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>'."\n".
                    "\t".'<a href="javascript:void(0);">'.$child->name.'</a>'."\n".
                    '</li>'."\n";
            }
            else {
                $tree .= 
                    '<li>'."\n".
                    "\t".'<a href="javascript:void(0);" childid="c_'.$child->id.'" class="cat_close category">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>'."\n".
                    "\t".'<a href="javascript:void(0);">'.$child->name.'</a>'."\n".
                    '</li>'."\n".
                    '<ul id="c_'.$child->id.'">'."\n".
                    $subTree.
                    '</ul>'."\n";
            }
        }
        if ($first)
            $tree .= '</ul>'."\n";
        return $tree;
    }
}
