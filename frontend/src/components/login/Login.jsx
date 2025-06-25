// src/components/login/Login.jsx
import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import supabase from '../../supabaseClient';
import './Login.css';

import Logo from '../../assets/Logo.png';
import Login_pic from '../../assets/Login_pic.png';

const Login = () => {
  const [showPassword, setShowPassword] = useState(false);
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');

  const togglePasswordVisibility = () => {
    setShowPassword(!showPassword);
  };

  const handleLogin = async (e) => {
    e.preventDefault();

    try {
      const { data, error } = await supabase.auth.signInWithPassword({
        email,
        password,
      });

      if (error) {
        setError(error.message);
        return;
      }

      console.log('✅ Login success:', data);

      // حفظ التوكن لو حابب تستخدمه (عادة Supabase يتعامل مع الجلسة تلقائياً)
      if (data.session?.access_token) {
        localStorage.setItem('token', data.session.access_token);
      }

      alert('تم تسجيل الدخول بنجاح!');
      setError('');

      // تحويل لصفحة بعد تسجيل الدخول
      window.location.href = '/dashboard';
    } catch (err) {
      console.error(err);
      setError('فشل تسجيل الدخول. حاول مرة أخرى.');
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
              {showPassword ? '🙈' : '👁️'}
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
