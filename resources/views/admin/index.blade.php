@extends('layouts.sidebar')
@section('container')
<h3>Selamat Datang {{ auth()->user()->username }} di Rumah Sakit SIRUSA</h3>
@endsection