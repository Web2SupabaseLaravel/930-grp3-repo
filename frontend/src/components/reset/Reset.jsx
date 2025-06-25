// src/components/login/Login.jsx
import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import './Reset.css';

import Login_pic from '../../assets/Password.png';

const Reset = () => {
  return (
    <div className="login-container">
      <div className="left-section">
        <img src={Login_pic} alt="Login Illustration" className="illustratio" />
        <h2>Empower Your Mind, Anytime, Anywhere.</h2>
      </div>
      <div className="right-section">
        <h2>Reset Your Password Now</h2>
        <form>
          <input type="email" placeholder="Email" />

          <button type="submit">Reset Password</button>
          
        </form>
      </div>
    </div>
  );
};

export default Reset;
