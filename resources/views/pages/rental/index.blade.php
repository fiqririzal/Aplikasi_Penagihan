@extends('layouts.master')

@section('content')
@push('style')
        @include('components.styles.datatables')
@endpush
<div class="card">
    <div class="card-body">
      <h4 class="card-title">Mobil Rentalan</h4>
      @role('Admin')
      <button type="button" class="btn btn-gradient-primary btn-rounded btn-fw" onclick="create()">Tambah Stok</button>
      @endrole
      <table class="table table-striped" id="rental">
        <thead>
          <tr>
            <th> No </th>
            <th> Nama Mobil </th>
            <th> Deskripsi </th>
            <th> Gambar </th>
            <th> Harga Sewa </th>
            <th> Status </th>
            <th> Aksi </th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>
  @include('components.modals.rental.create')
  @include('components.modals.rental.edit')
  @include('components.modals.rental.sewa')

@push('script')

@include('components.scripts.datatables')
@include('components.scripts.sweetalert')

@include($script)
@endpush
@endsection
