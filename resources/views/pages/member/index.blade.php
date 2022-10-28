@extends('layouts.master')

@section('content')
@push('style')
        @include('components.styles.datatables')
@endpush
<div class="card">
    <div class="card-body">
      <h4 class="card-title">Member</h4>
      <p class="card-description"> Add class <code>.table-striped</code>
      </p>
      <table class="table table-striped" id="table">
        <thead>
          <tr>
            <th> No </th>
            <th> Member </th>
            <th> Alamat </th>
            <th> No Hp </th>
            <th> Pinjaman </th>
            <th> Hari</th>
            <th> Tagihan </th>
            <th> Deadline </th>
            <th> Status </th>
            <th> Aksi </th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>





@push('script')

@include('components.scripts.datatables')
@include('components.scripts.sweetalert')

@include($script)
@endpush
@endsection
