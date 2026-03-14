@extends('layouts.app')

@section('content')
<section class="page-heading">
    <div class="container">
        <h1>Contact</h1>
    </div>
</section>

<section class="section">
    <div class="container narrow-container">
        @if(session('success'))
        <div class="success-box">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('contact.store') }}" class="contact-form">
            @csrf
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="text" name="subject" placeholder="Subject">
            <textarea name="message" rows="6" placeholder="Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </div>
</section>
@endsection