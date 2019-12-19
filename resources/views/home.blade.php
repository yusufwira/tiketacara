
@can('isAdmin')
	@extends('admin.dashboard')
	@section('content')
		<h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
	@endsection

@elsecan('isAdminAcara')
	@section('content')
		<h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
	@endsection
    <li class="nav-item">
        Author Account
    </li>

@else
    <li class="nav-item">
        Registered Account
    </li>
@endcan

