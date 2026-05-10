<?php

namespace App\Livewire\Web\Booking;

use Livewire\Component;
use App\Models\Table;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $table_id;
    public $booking_date;
    public $booking_time;
    public $total_guest;
    public $notes;
    public $duration = 1;

    public $tables = [];

    public function mount()
    {
        // ambil semua meja available
        $this->tables = Table::where('status', 'available')->get();
    }

    public function store()
    {
        $this->validate([
            'table_id'      => 'required',
            'booking_date'  => 'required',
            'booking_time'  => 'required',
            'total_guest'   => 'required',
            'duration'      => 'required',
        ]);

        $checkBooking = Booking::where('table_id', $this->table_id)
            ->where('booking_date', $this->booking_date)
            ->where('booking_time', $this->booking_time)
            ->whereIn('status', ['pending', 'confirmed'])
            ->exists();

        if ($checkBooking) {

            session()->flash(
                'error',
                'Meja sudah dibooking di jam tersebut'
            );

            return;
        }

        Booking::create([
            'customer_id' => Auth::guard('customer')->id(),
            'table_id'    => $this->table_id,
            'booking_date'=> $this->booking_date,
            'booking_time'=> $this->booking_time,
            'total_guest' => $this->total_guest,
            'duration'    => $this->duration,
            'notes'       => $this->notes,
            'status'      => 'pending'
        ]);

        session()->flash(
            'success',
            'Booking berhasil dikirim'
        );

        return redirect()->route('account.my-bookings.index');
    }

    public function render()
    {
        return view('livewire.web.booking.index');
    }
}