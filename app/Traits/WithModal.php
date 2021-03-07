<?php

namespace App\Traits;

trait WithModal {

    /**
     * Determines if modal is open or closed
     */
    public $isOpen = false;

    /**
     * Open the modal
     */
    public function openModal()
    {
        $this->isOpen = true;
    }

    /**
     * Close the modal
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }
}
