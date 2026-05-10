<?php

namespace App\Livewire\Account\MyBookings;

use Livewire\Component;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public function delete($id)
    {
        $booking = Booking::findOrFail($id);

        // pastikan booking milik user login
        if ($booking->customer_id != Auth::guard('customer')->id()) {
            abort(403);
        }

        $booking->delete();

        session()->flash(
            'success',
            'Riwayat booking berhasil dihapus'
        );
    }

    public function render()
    {
        return view('livewire.account.my-bookings.index', [
            'bookings' => Booking::with('table')
                ->where('customer_id', Auth::guard('customer')->id())
                ->latest()
                ->get()
        ]);
    }
}