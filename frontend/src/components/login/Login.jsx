import React, { useState } from 'react';
import { Link, useNavigate } from 'react-router-dom';
import { createClient } from '@supabase/supabase-js';
import './Login.css';

import Logo from '../../assets/Logo.png';
import Login_pic from '../../assets/Login_pic.png';

const supabaseUrl = 'https://hmfximxdcfimmnsgiuwg.supabase.co';
const supabaseKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImhtZnhpbXhkY2ZpbW1uc2dpdXdnIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5NTE0NDEsImV4cCI6MjA2MTUyNzQ0MX0.PDnUhKy5ffq_Z0Ng2zH9Tt60BRZa3B9P8vl-MV6Mvso';
const supabase = createClient(supabaseUrl, supabaseKey);

const Login = () => {
  const [showPassword, setShowPassword] = useState(false);
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');
  const navigate = useNavigate();

  const togglePasswordVisibility = () => {
    setShowPassword(!showPassword);
  };

  const handleLogin = async (e) => {
    e.preventDefault();
    setError('');

    // Direct login for test credentials
    if (email === 'yousefshubib@gmail.com' && password === '12345678') {
      alert('✅ Test login successful!');
      navigate('/dashboard');
      return;
    }

    try {
      const { data, error } = await supabase.auth.signInWithPassword({
        email,
        password,
      });

      if (error) {
        console.error('Login error:', error);
        setError(error.message || 'Login failed. Please check your credentials.');
      } else {
        if (data.session?.access_token) {
          localStorage.setItem('token', data.session.access_token);
        }
        alert('✅ Login successful!');
        navigate('/dashboard');
      }
    } catch (err) {
      console.error('Unexpected error:', err);
      setError('An unexpected error occurred. Please try again later.');
    }
  };

  return (
    <div className="login-container">
      <div className="left-section">
        <img src={Login_pic} alt="Login Illustration" className="illustratio" />
        <h2>Skip the Line, Your time matters.</h2>
      </div>
      <div className="right-section">
        <img src={Logo} alt="Logo" className="main-logo" />
        <h2>Sign In</h2>
        <form onSubmit={handleLogin}>
          <input
            type="email"
            placeholder="Email"
            value={email}
            onChange={(e) => setEmail(e.target.value)}
            required
          />

          <div className="password-container">
            <input
              type={showPassword ? 'text' : 'password'}
              placeholder="Password"
              value={password}
              onChange={(e) => setPassword(e.target.value)}
              required
            />
            <span
              className="toggle-password"
              onClick={togglePasswordVisibility}
              style={{ cursor: 'pointer' }}
            >
              {showPassword ? '🙈' : '👁'}
            </span>
          </div>

          {error && <p className="error-message">{error}</p>}

          <div className="form-options">
            <label>
              <input type="checkbox" /> Remember me
            </label>
            <Link to="/reset">Forgot password?</Link>
          </div>

          <button type="submit">Sign In</button>

          <p className="no-account">
            Don't have an account? <Link to="/register">Sign Up</Link>
          </p>
        </form>
      </div>
    </div>
  );
};

export default Login;