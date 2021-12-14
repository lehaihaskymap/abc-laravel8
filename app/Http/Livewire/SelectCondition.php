<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Nhomsanpham;

class SelectCondition extends Component
{
    public $selectionCatid=null;
    public $pMin=100;
    Public $pMax=1000;
    public $priceMin=100;
    Public $priceMax=1000;

    public function priceChanged(){
        dump("tt");
    }

    public function selectCategory($catid){
        if ($this->selectionCatid==$catid){
            $this->selectionCatid=null;
        }else {
            $this->selectionCatid=$catid;
        }

        $this->emit('updateSelection', $this->selectionCatid);
    }

    public function render()
    {
        $categories = Nhomsanpham::all();

        return view('livewire.select-condition', compact('categories'));
    }
}
