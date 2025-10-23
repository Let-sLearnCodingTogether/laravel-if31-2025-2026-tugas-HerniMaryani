@extends('layouts.app')

@section('title', 'Buku')
@section('content')
    <!--begin::Row-->
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Form Ubah Daftar Buku</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action="{{ route('book.update', $book->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="title" class="form-label">Judul Buku</label>
                        <input type="text" class="form-control" name="title">
                      </div>
                      <div class="mb-3">
                        <label for="author" class="form-label">Nama penulis</label>
                        <input type="text" class="form-control" name="author">
                      </div>
                      <div class="mb-3">
                        <label for="publication_year" class="form-label">Tahun Terbit</label>
                        <input type="year" class="form-control" name="publication_year">
                      </div>
                      <div class="mb-3">
                        <label for="genre" class="form-label">Genre</label>
                        <input type="text" class="form-control" name="genre">
                      </div>
                      <div class="mb-3">
                         <label for="read_status" class="form-label">Status Baca</label>
                            <select name="read_status" id="read_status" class="form-control">
                                <option value="Sudah">Sudah Dibaca</option>
                                <option value="Belum">Belum Dibaca</option>
                            </select>
                        </div>
                    </div>
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <!--end::Footer-->
                  </form>
                  <!--end::Form-->
            </div>
        </div>
    </div>
    <!--end::Row-->
@endsection