<?php

namespace App\Http\Livewire\Event;

use App\Models\TripayPayment;
use Livewire\Component;

class Payment extends Component
{
    public $event, $prize_total, $instruksi, $requestPembayaran;
    public $bank = 'BCAVA';

    public function mount($event)
    {
        $this->$event = $event;
        $this->prize_total = $event->prize_total;

        $tripay = new TripayPayment();
        $this->requestPembayaran = $tripay->requestPembayaran($this->bank, $this->prize_total, $this->event);
        $this->instruksi = $this->requestPembayaran['instructions'][0]['steps'];
    }

    public function render()
    {
        $instruksi = $this->instruksi;
        $requestPembayaran = $this->requestPembayaran;

        return view('livewire.event.payment', compact('instruksi', 'requestPembayaran'));
    }

    public function changePayment($bank)
    {
        $tripay = new TripayPayment();

        $this->bank = $bank;
        $this->requestPembayaran = $tripay->requestPembayaran($this->bank, $this->prize_total, $this->event);
        $this->instruksi = $this->requestPembayaran['instructions'][0]['steps'];
    }
}
