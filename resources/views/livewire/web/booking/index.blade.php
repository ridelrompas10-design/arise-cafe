<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div
                class="card border-0 shadow-lg rounded-5"
                style="
                    background: #ffffff;
                "
            >

                <div class="card-body p-5">

                    <!-- Header -->
                    <div class="text-center mb-5">

                        <h1
                            class="fw-bold mb-2"
                            style="
                                color: #1e293b;
                            "
                        >
                            Booking Meja Cafe
                        </h1>

                        <p
                            class="text-muted"
                            style="
                                font-size: 15px;
                            "
                        >
                            Reservasi meja favorit Anda dengan mudah
                        </p>

                    </div>

                    <!-- Alert Success -->
                    @if(session()->has('success'))

                        <div
                            class="alert alert-success border-0 rounded-4 shadow-sm mb-4"
                        >
                            {{ session('success') }}
                        </div>

                    @endif

                    <!-- Alert Error -->
                    @if(session()->has('error'))

                        <div
                            class="alert alert-danger border-0 rounded-4 shadow-sm mb-4"
                        >
                            {{ session('error') }}
                        </div>

                    @endif

                    <!-- Form -->
                    <form wire:submit.prevent="store">

                        <!-- Pilih Meja -->
                        <div class="mb-4">

                            <label
                                class="form-label fw-semibold mb-2"
                            >
                                Pilih Meja
                            </label>

                            <select
                                wire:model="table_id"
                                class="form-select custom-input"
                            >

                                <option value="">
                                    -- Pilih Meja --
                                </option>

                                @foreach($tables as $table)

                                    <option value="{{ $table->id }}">
                                        {{ $table->name }}
                                        -
                                        Kapasitas {{ $table->capacity }} Orang
                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- Tanggal Booking -->
                        <div class="mb-4">

                            <label
                                class="form-label fw-semibold mb-2"
                            >
                                Tanggal Booking
                            </label>

                            <input
                                type="date"
                                wire:model="booking_date"
                                class="form-control custom-input"
                            >

                        </div>

                        <!-- Jam Booking -->
                        <div class="mb-4">

                            <label
                                class="form-label fw-semibold mb-2"
                            >
                                Jam Booking
                            </label>

                            <input
                                type="time"
                                wire:model="booking_time"
                                class="form-control custom-input"
                            >

                        </div>

                        <!-- Durasi -->
                        <div class="mb-4">

                            <label
                                class="form-label fw-semibold mb-2"
                            >
                                Durasi Booking
                            </label>

                            <select
                                wire:model="duration"
                                class="form-select custom-input"
                            >

                                <option value="1">
                                    1 Jam
                                </option>

                                <option value="2">
                                    2 Jam
                                </option>

                                <option value="3">
                                    3 Jam
                                </option>

                                <option value="4">
                                    4 Jam
                                </option>

                            </select>

                        </div>

                        <!-- Jumlah Orang -->
                        <div class="mb-4">

                            <label
                                class="form-label fw-semibold mb-2"
                            >
                                Jumlah Orang
                            </label>

                            <select
                                wire:model="total_guest"
                                class="form-select custom-input"
                            >

                                <option value="">
                                    -- Pilih Jumlah Orang --
                                </option>

                                <option value="1">1 Orang</option>
                                <option value="2">2 Orang</option>
                                <option value="3">3 Orang</option>
                                <option value="4">4 Orang</option>
                                <option value="5">5 Orang</option>
                                <option value="6">6 Orang</option>
                                <option value="7">7 Orang</option>
                                <option value="8">8 Orang</option>
                                <option value="9">9 Orang</option>
                                <option value="10">10 Orang</option>

                            </select>

                        </div>

                        <!-- Catatan -->
                        <div class="mb-4">

                            <label
                                class="form-label fw-semibold mb-2"
                            >
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
                            class="btn btn-primary w-100 rounded-4 py-3 fw-semibold shadow-sm"
                            style="
                                font-size: 16px;
                            "
                        >
                            Booking Sekarang
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Custom Style -->
<style>

    .custom-input {

        border: none !important;

        border-radius: 20px !important;

        padding: 14px 18px !important;

        box-shadow: 0 3px 10px rgba(0,0,0,0.06);

        transition: 0.2s;
    }

    .custom-input:focus {

        box-shadow:
            0 0 0 0.2rem rgba(13,110,253,.15),
            0 3px 10px rgba(0,0,0,0.06);

        border: none !important;
    }

</style>