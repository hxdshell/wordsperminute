<x-layout>
  <x-slot:title>| Login & Registration</x-slot:title>
  <x-slot:header>Login & Registration</x-slot:header>
  <div class="container">
    <div class="login">
      <h3>Login</h3>
      <hr>
      <form method="POST" action="/authenticate">
        @csrf
        @if(session('error'))
          <p style="color: #ff3333">{{ session('error') }}</p>
        @endif
        <div class="mb-3">
          <input type="text" class="form-control" name="unameoremail" placeholder="Username or Email" value="{{ old('unameoremail') }}">
          <p style="color: #ff3333">{{ $errors->first('unameoremail') }}</p>
        </div>
        <div class="mb-3">
          <input type="password" name="loginpassword" class="form-control" id="exampleInputPassword1" placeholder="Password">
          <p style="color: #ff3333">{{ $errors->first('loginpassword') }}</p>
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="remember" name="remember">
          <label class="form-check-label" for="remember">Remember me</label>
        </div>
        <button type="submit" class="btn btn-outline-light">Login</button>
      </form>
    </div>
    <div class="login">
      <h3>Sign up</h3>
      <hr>
      <form method="POST" action="/register">
        @csrf
        <div class="mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}">
          <p style="color: #ff3333">{{ $errors->first('username') }}</p>
          <div class="mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
            <p style="color: #ff3333">{{ $errors->first('email') }}</p>
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" name="password">
            <p style="color: #ff3333">{{ $errors->first('password') }}</p>
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Confirm Password" name="confirmpass">
            <p style="color: #ff3333">{{ $errors->first('confirmpass') }}</p>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember2" name="remember2">
            <label class="form-check-label" for="remember2">Remember me</label>
          </div>
          <button type="submit" class="btn btn-outline-light" name="signup">Sign up</button>
      </form>
    </div>
  </div>
  <script>
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
  </script>
</x-layout>