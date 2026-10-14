@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
  <h2>Admin Dashboard</h2>

  <p>Welcome to the Internship Management System.</p>

  <h3>Administration</h3>

  <ul>
    <li>Manage Institutions</li>
    <li>Manage Students</li>
    <li>Manage Internships</li>
    <li>Manage Payments</li>
  </ul>

  <form action="/logout" method="POST">
    @csrf
    <button type="submit">Logout</button>
  </form>
@endsection