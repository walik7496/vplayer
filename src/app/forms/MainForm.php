<?php
namespace app\forms;

use std, gui, framework, app;


class MainForm extends AbstractForm
{
    /**
     *  isFullScreen
     */
    function isfscr() {
        if ($this->fullScreen == false) {
            $this->fullScreen = true;
            $this->cursor = 'none';
        } else {
            $this->fullScreen = false;
            $this->cursor = 'default';
        }
    }
    
    /**
     *  isOpen
     */
    function opn() {
        
        if ($this->fileChooser->execute()) {
            $f = $this->fileChooser->file;
            $this->player->open($f);
            $this->slider->enabled = true;
            $this->form('MainForm')->title = fs::name($f);
            $this->player->play();
        }
    }
    
    /**
     *  isStop
     */
    function stp() {
        $this->slider->enabled = false;
        $this->form('MainForm')->title = 'vplayer';
        $this->player->stop();
    }

    /**
     * @event close 
     */
    function doClose(UXWindowEvent $e = null)
    {    
        $this->player->stop();
        $this->free();
    }

    /**
     * @event keyDown-F 
     */
    function doKeyDownF(UXKeyEvent $e = null)
    {    
        $this->isfscr();
    }

    /**
     * @event click-2x 
     */
    function doClick2x(UXMouseEvent $e = null)
    {    
        $this->isfscr();
    }

    /**
     * @event keyDown-Esc 
     */
    function doKeyDownEsc(UXKeyEvent $e = null)
    {    
        $this->fullScreen = false;
    }

    /**
     * @event panel.mouseEnter 
     */
    function doPanelMouseEnter(UXMouseEvent $e = null)
    {    
        $this->cursor = 'default';
    }

    /**
     * @event mediaView.mouseEnter 
     */
    function doMediaViewMouseEnter(UXMouseEvent $e = null)
    {    
        $this->cursor = 'none';
    }

    /**
     * @event button.action 
     */
    function doButtonAction(UXEvent $e = null)
    {
        $this->slider->enabled = true;
        $this->form('MainForm')->title = fs::name($this->fileChooser->file);
        $this->player->play();
    }

    /**
     * @event buttonAlt.action 
     */
    function doButtonAltAction(UXEvent $e = null)
    {    
        $this->player->pause();
    }

    /**
     * @event button3.action 
     */
    function doButton3Action(UXEvent $e = null)
    {
        $this->stp();
    }

    /**
     * @event button4.action 
     */
    function doButton4Action(UXEvent $e = null)
    {    
        $this->opn();
    }

    /**
     * @event show 
     */
    function doShow(UXWindowEvent $e = null)
    {    
        $this->slider->enabled = false;
    }

    /**
     * @event slider.mouseDown-Left 
     */
    function doSliderMouseDownLeft(UXMouseEvent $e = null)
    {    
        $this->player->pause();
        $this->player->position = $this->slider->value;
    }

    /**
     * @event slider.mouseUp-Left 
     */
    function doSliderMouseUpLeft(UXMouseEvent $e = null)
    {    
        $this->player->position = $this->slider->value;
        $this->player->play();
    }

    /**
     * @event keyDown-O 
     */
    function doKeyDownO(UXKeyEvent $e = null)
    {    
        $this->opn();
    }

    /**
     * @event keyDown-S 
     */
    function doKeyDownS(UXKeyEvent $e = null)
    {    
        $this->stp();
    }

    /**
     * @event mouseDown-Left 
     */
    function doMouseDownLeft(UXMouseEvent $e = null)
    {    
        $this->player->pause();
    }

    /**
     * @event mouseDown-Right 
     */
    function doMouseDownRight(UXMouseEvent $e = null)
    {
        $this->slider->enabled = true;  
        $this->form('MainForm')->title = fs::name($this->fileChooser->file);  
        $this->player->play();
    }
    

}
