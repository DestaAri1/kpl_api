@extends('main.master')

@section('judul_halaman', 'Halaman Edit Buku')

@section('konten')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Buku</h1>
</div>
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">
        @if ($message = Session::get('error'))
                <div class="alert alert-warning">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Buku</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('buku.update', $buku->id) }}" method="POST">
                    @csrf
                    {{-- {{method_field('PATCH')}} --}}
                    @method('PATCH')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Judul</label>
                            <input name="judul" id="judul" type="text" class="form-control" placeholder="{{$buku->judul}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Pengarang</label>
                            <input name="pengarang" id="pengarang" type="text" class="form-control" placeholder="{{$buku->pengarang}}" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">Pilih Kategori</label>
                            <select class="form-control" required>
                                <option value="" name="id_kategori" id="id_kategori">...</option>
                                @foreach ($kategori as $k)
                                    <option value="{{$k->nama_kategori}}">{{$k->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Penerbit</label>
                            <input name="penerbit" id="penerbit" type="text" class="form-control" placeholder="{{$buku->penerbit}}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Tahun</label>
                            <input name="year" id="year" type="number" class="form-control" placeholder="{{$buku->year}}" required>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="">Sinopsis / Deskripsi</label>
                        <textarea name="sinopsis" id="sinopsis" cols="30" rows="10" class="form-control" required placeholder="{{$buku->sinopsis}}"></textarea>
                    </div>

                    <div class="modal-footer">
                        <a href="{{route('buku.index')}}" class="btn btn-close-white">Kembali</a>
                        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
