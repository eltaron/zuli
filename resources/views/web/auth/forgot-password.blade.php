<form action="{{ route('password.request') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit">Send Reset Link</button>
</form>
<a href="{{ route('login') }}">Login</a>
