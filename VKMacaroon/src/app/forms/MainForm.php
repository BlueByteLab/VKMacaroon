<?php
namespace app\forms;

use php\gui\framework\AbstractForm;
use php\gui\event\UXMouseEvent; 
use php\gui\event\UXEvent; 
use php\gui\UXDialog; 


class MainForm extends AbstractForm
{





    /**
     * @event closeForm.mouseDown-Left 
     **/
    function doCloseFormMouseDownLeft(UXMouseEvent $event = null)
    {    
        $this->closeForm->style = "-fx-effect: dropshadow( three-pass-box , rgba(0,0,0,0.6) , 6, 0.0 , 0 , 2 );";
    }

    /**
     * @event closeForm.mouseUp-Left 
     **/
    function doCloseFormMouseUpLeft(UXMouseEvent $event = null)
    {    
        $this->closeForm->style = "-fx-effect: dropshadow( three-pass-box , rgba(0,0,0,0.6) , 4, 0.0 , 0 , 1 );";
    }

    /**
     * @event closeForm.click-Left 
     **/
    function doCloseFormClickLeft(UXMouseEvent $event = null)
    {    
        app()->shutdown();
    }

    /**
     * @event authButton.mouseDown-Left 
     **/
    function doAuthButtonMouseDownLeft(UXMouseEvent $event = null)
    {    
        $this->authButton->style = "-fx-effect: dropshadow( three-pass-box , rgba(0,0,0,0.6) , 6, 0.0 , 0 , 2 );";
    }

    /**
     * @event authButton.mouseUp-Left 
     **/
    function doAuthButtonMouseUpLeft(UXMouseEvent $event = null)
    {    
        $this->authButton->style = "-fx-effect: dropshadow( three-pass-box , rgba(0,0,0,0.6) , 4, 0.0 , 0 , 1 );";
    }

    /**
     * @event edit.click-Left 
     **/
    function doEditClickLeft(UXMouseEvent $event = null)
    {    
        $this->textFieldColorum2->strokeColor = "#cccccc";
        $this->textFieldColorum1->strokeColor = "#4d66cc";
    }

    /**
     * @event passwordField.click-Left 
     **/
    function doPasswordFieldClickLeft(UXMouseEvent $event = null)
    {    
        $this->textFieldColorum1->strokeColor = "#cccccc";
        $this->textFieldColorum2->strokeColor = "#4d66cc";
        
    }

    /**
     * @event authButton.click-Left 
     **/
    function doAuthButtonClickLeft(UXMouseEvent $event = null)
    {    
        $this->textFieldColorum1->strokeColor = "#cccccc";
        $this->textFieldColorum2->strokeColor = "#cccccc";
    }

    /**
     * @event authButton.click 
     */
    function doAuthButtonClick(UXMouseEvent $event = null)
    {    
		$this->progressBar->enabled = true;
		$this->progressBar->show();
		waitAsync(5000, function () use ($event) {
			UXDialog::show('Форма 2 загружена');
		});

        
    }

    /**
     * @event webaddress.mouseDown-Left 
     */
    function doWebaddressMouseDownLeft(UXMouseEvent $event = null)
    {    
		$this->showPreloader('');
		waitAsync(300, function () use ($event) {
			browse('https://vkmacaroon.ru/');
			waitAsync(300, function () use ($event) {
				$this->hidePreloader();
				$this->webaddress->enabled = false;
				waitAsync(12000, function () use ($event) {
					$this->webaddress->enabled = true;
				});
			});
		});

        
    }


}
