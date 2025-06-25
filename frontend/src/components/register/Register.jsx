import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import './Register.css';
import axiosClient from '../../axiosClient';
import Logo from '../../assets/Logo.png';
import Login_pic from '../../assets/Login_pic.png';

const Register = () => {
  const [form, setForm] = useState({
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
  });

  const [error, setError] = useState('');
  const [success, setSuccess] = useState('');
  const [showPassword, setShowPassword] = useState(false);

  const togglePasswordVisibility = () => setShowPassword(!showPassword);

  const handleChange = (e) => {
    setForm({ ...form, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    setError('');
    setSuccess('');
    try {
      const response = await axiosClient.post('/register', form);
      setSuccess('تم إنشاء الحساب بنجاح!');
    } catch (err) {
        console.error('خطأ في التسجيل:', err.response?.data); // ← هذا مهم جداً
        setError(err.response?.data?.error || 'حدث خطأ، يرجى المحاولة لاحقاً');
      }
      
  };

  return (
    <div className="login-container">
      <div className="left-section">
        <img src={Login_pic} alt="Register Illustration" className="illustratio" />
        <h2>Skip the Line, Your time matters.</h2>
      </div>
      <div className="right-section">
        <img src={Logo} alt="Logo" className="main-logo" />
        <h2>Create an account</h2>
        <form onSubmit={handleSubmit}>
          <input type="text" name="name" placeholder="Name" value={form.name} onChange={handleChange} />
          <input type="email" name="email" placeholder="Email" value={form.email} onChange={handleChange} />
          <div className="password-container">
            <input
              type={showPassword ? 'text' : 'password'}
              name="password"
              placeholder="Password"
              value={form.password}
              onChange={handleChange}
            />
            <span className="toggle-password" onClick={togglePasswordVisibility}>
              {showPassword ? '🙈' : '👁️'}
            </span>
          </div>
          <input
            type={showPassword ? 'text' : 'password'}
            name="password_confirmation"
            placeholder="Confirm Password"
            value={form.password_confirmation}
            onChange={handleChange}
          />
          {error && <p className="error">{error}</p>}
          {success && <p className="success">{success}</p>}
          <button type="submit">Register</button>
          <p className="no-account">
            Already have an account? <Link to="/">Sign In</Link>
          </p>
        </form>
      </div>
    </div>
  );
};

export default Register;
