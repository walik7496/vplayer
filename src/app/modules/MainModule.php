<?php
namespace app\modules;

use std, gui, framework, app;


class MainModule extends AbstractModule
{

    /**
     * @event player.play 
     */
    function doPlayerPlay(ScriptEvent $e = null)
    {    
        $this->slider->value = $this->player->position;
        $this->label->text = $this->player->position;
        if ($this->slider->value == 100) {
            $this->slider->value = 0;
            $this->label->text = '0';
            $this->slider->enabled = false;
        }
    }

    /**
     * @event player.stop 
     */
    function doPlayerStop(ScriptEvent $e = null)
    {    
        $this->slider->value = 0;
        $this->label->text = '0';
    }

}
