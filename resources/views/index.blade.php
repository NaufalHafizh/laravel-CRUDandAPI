@extends('template.main')

@section('content')
    <section style="margin: 5% auto; width: 60%" class="bg-white p-4 rounded-2">
        <div>
            <h2 class="">Daftar Keluarga</h2>
        </div>
        @if (session()->has('berhasil'))
            <div class="alert alert-success" role="alert">
                {{ session('berhasil') }}
            </div>
        @endif
        <hr>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Data
        </button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Anak</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orang as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            {{ $item->nama }}
                        </td>
                        <td>
                            {{ $item->jenis_kelamin }}
                        </td>
                        <td>
                            @if ($item->child->count() > 1)
                                @foreach ($item->child as $child)
                                    <p>
                                        {{ $child->nama }}
                                    </p>
                                @endforeach
                            @else
                                <p>Tidak Ada</p>
                            @endif
                        </td>
                        <td>
                            <a href="/keluarga/{{ $item->id }}/edit"><span
                                    class="badge text-bg-warning bg-opacity-100 text-decoration-none border-0">Edit</span></a>
                            <form class="d-inline" action="/keluarga/{{ $item->id }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="badge text-bg-danger bg-opacity-100 text-decoration-none border-0"
                                    onclick="return confirm('Are You Sure ?')">Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $orang->links() }}

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" action="/keluarga" method="post">
                            @csrf
                            <div class="col-md-12">
                                <label for="inputEmail4" class="form-label">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" name="jenis_kelamin">
                                    <option selected>Open this select menu</option>
                                    <option value="laki-laki">laki-laki</option>
                                    <option value="perempuan">perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Anak Dari</label>
                                <select class="form-select" name="parent">
                                    <option selected value="{{ null }}">Tidak ada</option>
                                    @foreach ($new_orang as $item2)
                                        <option value="{{ $item2->id }}">{{ $item2->nama }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
