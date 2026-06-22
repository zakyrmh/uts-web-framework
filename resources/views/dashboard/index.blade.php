@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-3xl mx-auto p-6 mt-4">
	<div class="flex items-center justify-between mb-4">
		<h1 class="text-2xl font-semibold">Dashboard</h1>
		<div class="text-sm text-gray-500">Halo, selamat datang {{ Auth::user()->name }}</div>
	</div>
</div>
@endsection
