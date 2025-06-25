// src/components/login/Login.jsx
import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import './EmailCode.css';

import Login_pic from '../../assets/Password.png';

const EmailCode = () => {
  return (
    <div className="login-container">
      <div className="left-section">
        <img src={Login_pic} alt="Login Illustration" className="illustratio" />
        <h2>Empower Your Mind, Anytime, Anywhere.</h2>
      </div>
      <div className="right-section">
        <h2>Check your mail</h2>
        <form>
          <input type="text" placeholder="Enter OTP Code" />

          <button type="submit">Verify Code</button>
          
        </form>
      </div>
    </div>
  );
};

export default EmailCode;
