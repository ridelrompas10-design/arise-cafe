<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-10">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>
                    <h2 class="fw-bold mb-1">
                        My Bookings
                    </h2>

                    <p class="text-muted mb-0">
                        Daftar booking meja cafe Anda
                    </p>
                </div>

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

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table align-middle mb-0">

                            <thead class="bg-light">

                                <tr>
                                    <th class="px-4 py-3">Meja</th>
                                    <th class="px-4 py-3">Tanggal</th>
                                    <th class="px-4 py-3">Jam</th>
                                    <th class="px-4 py-3">Jumlah Orang</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3 text-center">Aksi</th>
                                </tr>

                            </thead>

                            <tbody>

                                @forelse($bookings as $booking)

                                    <tr>

                                        <td class="px-4 py-3 fw-semibold">
                                            {{ $booking->table->name }}
                                        </td>

                                        <td class="px-4 py-3">
                                            {{ $booking->booking_date }}
                                        </td>

                                        <td class="px-4 py-3">
                                            {{ $booking->booking_time }}
                                        </td>

                                        <td class="px-4 py-3">
                                            {{ $booking->total_guest }} Orang
                                        </td>

                                        <td class="px-4 py-3">

                                            @if($booking->status == 'pending')

                                                <span class="badge bg-warning text-dark rounded-pill px-3 py-2">
                                                    Menunggu Konfirmasi
                                                </span>

                                            @elseif($booking->status == 'confirmed')

                                                <span class="badge bg-success rounded-pill px-3 py-2">
                                                    Meja Sudah Dikonfirmasi
                                                </span>

                                            @elseif($booking->status == 'cancelled')

                                                <span class="badge bg-danger rounded-pill px-3 py-2">
                                                    Booking Ditolak
                                                </span>

                                            @endif

                                        </td>

                                        <td class="px-4 py-3 text-center">

                                            <button
                                                wire:click="delete({{ $booking->id }})"
                                                wire:confirm="Yakin ingin menghapus booking ini?"
                                                class="btn btn-sm btn-danger rounded-pill px-3"
                                            >
                                                Hapus
                                            </button>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="6" class="text-center py-5 text-muted">

                                            Belum ada booking

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>