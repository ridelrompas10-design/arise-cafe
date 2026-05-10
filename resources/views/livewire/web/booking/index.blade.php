<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card border-0 shadow-lg rounded-5 booking-card">

                <div class="card-body p-5">

                    <!-- Header -->
                    <div class="text-center mb-5">

                        <h1 class="fw-bold booking-title">
                            Booking Meja Cafe
                        </h1>

                        <p class="text-muted booking-subtitle">
                            Reservasi meja favorit Anda dengan mudah
                        </p>

                    </div>

                    <!-- Success Alert -->
                    @if(session()->has('success'))

                        <div class="alert alert-success border-0 rounded-4 shadow-sm mb-4">
                            {{ session('success') }}
                        </div>

                    @endif

                    <!-- Error Alert -->
                    @if(session()->has('error'))

                        <div class="alert alert-danger border-0 rounded-4 shadow-sm mb-4">
                            {{ session('error') }}
                        </div>

                    @endif

                    <!-- Form -->
                    <form wire:submit.prevent="store">

                        <!-- Pilih Meja -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold mb-2">
                                Pilih Meja
                            </label>

                            <select
                                wire:model="table_id"
                                class="form-select custom-input"
                            >

                                <option value="">
                                    -- Pilih Meja --
                                </option>

                                @forelse($tables as $item)

                                    <option value="{{ $item->id }}">
                                        {{ $item->name }} - {{ $item->capacity }} Orang
                                    </option>

                                @empty

                                    <option value="">
                                        Tidak ada meja tersedia
                                    </option>

                                @endforelse

                            </select>

                            @error('table_id')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                        <!-- Tanggal Booking -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold mb-2">
                                Tanggal Booking
                            </label>

                            <input
                                type="date"
                                wire:model="booking_date"
                                class="form-control custom-input"
                            >

                            @error('booking_date')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                        <!-- Jam Booking -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold mb-2">
                                Jam Booking
                            </label>

                            <input
                                type="time"
                                wire:model="booking_time"
                                class="form-control custom-input"
                            >

                            @error('booking_time')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                        <!-- Durasi Booking -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold mb-2">
                                Durasi Booking
                            </label>

                            <select
                                wire:model="duration"
                                class="form-select custom-input"
                            >

                                <option value="1">1 Jam</option>
                                <option value="2">2 Jam</option>
                                <option value="3">3 Jam</option>
                                <option value="4">4 Jam</option>

                            </select>

                        </div>

                        <!-- Jumlah Orang -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold mb-2">
                                Jumlah Orang
                            </label>

                            <select
                                wire:model="total_guest"
                                class="form-select custom-input"
                            >

                                <option value="">
                                    -- Pilih Jumlah Orang --
                                </option>

                                @for($i = 1; $i <= 10; $i++)

                                    <option value="{{ $i }}">
                                        {{ $i }} Orang
                                    </option>

                                @endfor

                            </select>

                            @error('total_guest')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                        <!-- Catatan -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold mb-2">
                                Catatan
                            </label>

                            <textarea
                                wire:model="notes"
                                rows="4"
                                class="form-control custom-input"
                                placeholder="Tambahkan catatan booking..."
                            ></textarea>

                        </div>

                        <!-- Button -->
                        <button
                            type="submit"
                            class="btn btn-primary w-100 rounded-4 py-3 fw-semibold shadow-sm booking-btn"
                        >
                            Booking Sekarang
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<style>

    body {

        background: #f3f4f6;
    }

    .booking-card {

        background: #ffffff;
        overflow: hidden;
    }

    .booking-title {

        color: #1e293b;
        font-size: 42px;
    }

    .booking-subtitle {

        font-size: 15px;
    }

    .custom-input {

        border: none !important;

        border-radius: 20px !important;

        padding: 15px 18px !important;

        background: #f8fafc;

        box-shadow: 0 4px 12px rgba(0,0,0,0.05);

        transition: all 0.2s ease;
    }

    .custom-input:focus {

        background: #ffffff;

        box-shadow:
            0 0 0 0.25rem rgba(13,110,253,.12),
            0 4px 12px rgba(0,0,0,0.08);

        border: none !important;
    }

    .booking-btn {

        font-size: 16px;

        transition: 0.2s ease;
    }

    .booking-btn:hover {

        transform: translateY(-2px);

        box-shadow: 0 6px 15px rgba(13,110,253,.25);
    }

</style>