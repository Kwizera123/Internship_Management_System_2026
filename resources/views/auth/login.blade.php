<h1>IMS Login</h1>
<form action="/login" method="POST">
  @csrf
  <label for="email">Email:</label>
  <input type="email" name="email" id="email" required>
  <br>
  <label for="password">Password:</label>
  <input type="password" name="password" id="password" required>
  <br>
  <button type="submit">Login</button>

</form>