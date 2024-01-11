@extends('template.main')

@section('content')
    <section style="margin: 5% auto; width: 60%" class="bg-white p-4 rounded-2">
        <div>
            <h3 class="text-uppercase">Edit orang</h3>
        </div>
        <hr>
        <div>
            <form class="row g-3" action="/keluarga/{{ $old_orang->id }}" method="POST">
                @method('PUT')
                @csrf
                <div class="col-md-12">
                    <label for="inputEmail4" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                        value="{{ $old_orang->nama }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="jenis_kelamin">
                        {{-- <option selected>Open this select menu</option> --}}
                        <option value="laki-laki" {{ $old_orang->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>laki-laki
                        </option>
                        <option value="perempuan" {{ $old_orang->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>perempuan
                        </option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Anak Dari</label>
                    <select class="form-select" name="parent">
                        @foreach ($orang as $item2)
                            @if ($old_orang->parent == null)
                                <option selected value="{{ null }}">Tidak ada</option>
                            @endif
                            <option value="{{ $item2->id }}" {{ $item2->id == $old_orang->parent ? 'selected' : '' }}>
                                {{ $item2->nama }}
                            </option>
                        @endforeach
                    </select>

                </div>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </section>
@endsection
