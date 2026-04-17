<?php

namespace App\Livewire\Account\MyOrders;

use Livewire\Component;
use App\Models\Customer;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithFileUploads;

    public $image;
    public $name;
    public $email;

    public function mount()
    {
        $user        = auth()->guard('customer')->user();
        $this->name  = $user->name;
        $this->email = $user->email;
    }

    public function rules()
    {
        $userId = auth()->guard('customer')->user()->id;

        return [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $userId,
        ];
    }

    public function update()
    {
        $this->validate();

        $user    = auth()->guard('customer')->user();
        $profile = Customer::findOrFail($user->id);

        $data = [
            'name'  => $this->name,
            'email' => $this->email,
        ];

        // Jika ada gambar baru yang di-upload
        if ($this->image) {
            // Hapus gambar lama jika ada
            if ($profile->image) {
                Storage::disk('public')->delete('avatars/' . $profile->image);
            }

            // Simpan gambar baru ke storage/app/public/avatars
            $imageName  = $this->image->hashName();
            $this->image->storeAs('avatars', $imageName, 'public');

            $data['image'] = $imageName;
        }

        $profile->update($data);

        session()->flash('success', 'Update Profil Berhasil!');

        return $this->redirect('/account/my-profile', navigate: true);
    }

    public function render()
    {
        return view('livewire.account.my-profile.index');
    }
}