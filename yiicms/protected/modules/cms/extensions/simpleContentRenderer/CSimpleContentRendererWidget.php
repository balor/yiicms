<?php

/*
 * Author: Michał [Balor] Thoma
 * Author website: http://balor.pl
 * Version: 1.0
 */

class CSimpleContentRendererWidget extends CWidget
{
    // REQUIRED PARAMETER
    // id of a Content object to be rendered
    public $content_id = 0;

    // id of a main container 
    public $content_container_id = 'yiicms_content';

    // classes of a main container, as string, ex. "class1, class2"
    public $content_container_classes = '';

    // title header
    public $header_tag = 'h1';

    // print content author
    public $print_author = true;

    public function run()
    {
        Yii::import('application.modules.cms.models.Content');
        
        $content = Yii::createComponent('Content')->findByPk($this->content_id);
        if (!$content) {
            print 'CSimpleContentRendererWidgetException: Wrong content id';
            return false;
        }

        print '<div id="'.$this->content_container_id.'" class="'.$this->content_container_classes.'" >';
        print '<'.$this->header_tag.'>'.$content->name.'</'.$this->header_tag.'>';
        if ($this->print_author)
            print '<div class="content_author">'.$content->author.'</div>';
        print '<div class="content_body">'.$content->html.'</div>';
        print '</div>';

        return true;
    }
}
