<?php

/**
 * ایجاد یک دنبال‌کننده جدید
 *
 * با استفاده از این فرم می‌توان یک دنبا‌ل‌کننده جدید را ایجاد کرد.
 * 
 * @author hadi <mohammad.hadi.mansouri@dpq.co.ir>
 *
 */
class Newspaper_Form_FollowerCreate extends Pluf_Form
{

    public function initFields($extra = array())
    {
        $this->fields['type'] = new Pluf_Form_Field_Varchar(array(
            'required' => true
        ));
        $this->fields['address'] = new Pluf_Form_Field_Varchar(array(
            'required' => true
        ));
    }

    function save($commit = true)
    {
        if (! $this->isValid()) {
            throw new Pluf_Exception('cannot save the follower from an invalid form');
        }
        // Create the follower
        $follower = new Newspaper_Follower();
        $follower->setFromFormData($this->cleaned_data);
        if ($commit) {
            $follower->create();
        }
        return $follower;
    }
}
