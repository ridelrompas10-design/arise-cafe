<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-5">

                    <div class="text-center mb-5">

                        <h2 class="fw-bold mb-2">
                            Booking Meja Cafe
                        </h2>

                        <p class="text-muted">
                            Reservasi meja favorit Anda dengan mudah
                        </p>

                    </div>

                    @if(session()->has('success'))
                        <div class="alert alert-success border-0 rounded-4 shadow-sm">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session()->has('error'))
                        <div class="alert alert-danger border-0 rounded-4 shadow-sm">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="store">

                        <!-- Pilih Meja -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Pilih Meja
                            </label>

                            <select
                                wire:model="table_id"
                                class="form-select rounded-4 border-0 shadow-sm p-3"
                            >

                                <option value="">
                                    -- Pilih Meja --
                                </option>

                                @foreach($tables as $table)

                                    <option value="{{ $table->id }}">
                                        {{ $table->name }} - Kapasitas {{ $table->capacity }} Orang
                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- Tanggal -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Tanggal Booking
                            </label>

                            <input
                                type="date"
                                wire:model="booking_date"
                                class="form-control rounded-4 border-0 shadow-sm p-3"
                            >

                        </div>

                        <!-- Jam -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Jam Booking
                            </label>

                            <input
                                type="time"
                                wire:model="booking_time"
                                class="form-control rounded-4 border-0 shadow-sm p-3"
                            >

                        </div>

                        <!-- Jumlah Orang -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Jumlah Orang
                            </label>

                            <select
                                wire:model="total_guest"
                                class="form-select rounded-4 border-0 shadow-sm p-3"
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

                            <label class="form-label fw-semibold">
                                Catatan
                            </label>

                            <textarea
                                wire:model="notes"
                                rows="4"
                                class="form-control rounded-4 border-0 shadow-sm p-3"
                                placeholder="Tambahkan catatan booking..."
                            ></textarea>

                        </div>

                        <!-- Button -->
                        <button
                            type="submit"
                            class="btn btn-primary w-100 rounded-4 py-3 fw-semibold shadow-sm"
                        >
                            Booking Sekarang
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>