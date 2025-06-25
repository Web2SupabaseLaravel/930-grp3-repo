// src/components/login/Login.jsx
import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import './NewPassword.css';

import Login_pic from '../../assets/Password.png';

const NewPassword = () => {
  return (
    <div className="login-container">
      <div className="left-section">
        <img src={Login_pic} alt="Login Illustration" className="illustratio" />
        <h2>Empower Your Mind, Anytime, Anywhere.</h2>
      </div>
      <div className="right-section">
        <h2>Enter New Password</h2>
        <form>
          <input type="text" placeholder="New Password" />

          <button type="submit">Save</button>
          
        </form>
      </div>
    </div>
  );
};

export default NewPassword;
