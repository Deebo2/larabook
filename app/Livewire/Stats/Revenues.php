<?php

namespace App\Livewire\Stats;

use App\Models\Order;
use Livewire\Component;

class Revenues extends Component
{
    public $selectedDays;
    public $revenue;
    public function mount(){
        $this->selectedDays = 30;
        $this->updateStats();
    }
    public function updateStats(){
        $rev = Order::where('created_at','>=',now()->subDays($this->selectedDays))->sum('total');
        $nfo = new \NumberFormatter('en_US',\NumberFormatter::CURRENCY );
        $this->revenue = $nfo->formatCurrency($rev / 100 ,'USD');
    }
    public function render()
    {
        return view('livewire.stats.revenues');
    }
}
