<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;
    public $display = "block";

    public function increment(){
        $this->count++;
    }

    public function display(){
        if($this->display == "block"){
            $this->display = "none";
        }elseif($this->display == "none"){
            $this->display = "block";
        }
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
