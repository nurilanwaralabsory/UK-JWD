@extends('master.app')
@section('header')
    <h2 style="width: max-content">Selamat Datang di UNIBOOKSTORE</h2>
@endsection
@section('konten')
    <div class="row">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="float-right heading1 margin_0">
                        <form class="float-end" action="{{ route('dashboard') }}" method="get">
                            <div class="input-group">
                                <input type="search" value="{{ old('search') }}" name="search"
                                    class="rounded form-control me-1" placeholder="Search...">
                                <button class="rounded btn btn-success" type="submit" id="button-addon2">
                                    <i class="fa fa-search"></i> Cari
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table_section padding_infor_info">
                    <div class="table-responsive-sm">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Kategori</th>
                                    <th>Nama Buku</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Penerbit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($buku->count() != null)
                                    @foreach ($buku as $b)
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td>{{ $b->kode }}</td>
                                            <td>{{ $b->kategori }}</td>
                                            <td>{{ $b->nama_buku }}</td>
                                            <td>{{ $b->harga }}</td>
                                            <td>{{ $b->stok }}</td>
                                            <td>{{ $b->nerbit->nama }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center">Data buku tidak ditemukan
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7" class="text-end">
                                        {{--  {{ $buku->withQueryString()->links('pagination::bootstrap-5') }}  --}}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
