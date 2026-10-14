@extends('layouts.app')

@section('title', 'Student Dashboard')

@section('content')
  <h2>Student Dashboard</h2>

  <p>Welcome to your Internship Management System account.</p>

  <h3>My Internship</h3>

  <ul>
    <li>My Profile</li>
    <li>My Internship Details</li>
    <li>My Registration Fees</li>
    <li>My Payment History</li>
  </ul>

  <form action="/logout" method="POST">
    @csrf
    <button type="submit">Logout</button>
  </form>
@endsection