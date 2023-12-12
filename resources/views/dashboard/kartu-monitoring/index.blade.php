@extends('dashboard.layouts.main')

@section('content')
    <h1 class="mt-4">Kartu Monitoring</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item active">Kartu Monitoring</li>
    </ol>

    <a href="{{ route('kartu-monitoring.create') }}" class="btn btn-primary mb-4">Tambah Data</a>
    <a href="{{ route('kartu-monitorings.export-excel') }}" class="btn btn-success mb-4">Export to Excel</a>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Kartu Monitoring
        </div>
        <div class="card-body">
            <table id="kartuMonitoringTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Lengkap</th>
                        <th>Nik Pemohon</th>
                        <th>No Hp</th>
                        <th>Alamat</th>
                        <th>Tanggal</th>
                        <th>No Antrian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nama Lengkap</th>
                        <th>Nik Pemohon</th>
                        <th>No Hp</th>
                        <th>Alamat</th>
                        <th>Tanggal</th>
                        <th>No Antrian</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @forelse ($kartuMonitorings as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->nik_pemohon }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->no_antrian }}</td>
                            <td>
                                <a target="_blank" href="{{ route('kartu-monitoring.show', $item->id) }}"
                                    class="btn btn-success btn-sm">Lihat</a>
                                <a href="{{ route('kartu-monitoring.edit', $item->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('kartu-monitoring.destroy', $item->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this data?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/js/simple-datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/kartu-monitoring-data-table.js') }}"></script>
@endsection
