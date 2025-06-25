import { BrowserRouter, Routes, Route, Navigate } from 'react-router-dom';
import "bootstrap/dist/css/bootstrap.css";
import ServicesList from './components/ServicesList';
import ServiceForm from './components/ServiceForm';
import BookAppointment from './components/BookAppointment';
import Users from './components/Users';
import Roles from './components/Roles';
import Edit from './components/Edit';
import View from './components/view/View';
import Add from './components/add/Add';
import Delete from './components/Delete';
import Login from './components/login/Login';
import Register from './components/register/Register';
import Reset from './components/reset/Reset';
import NewPassword from './components/new_password/NewPassword.jsx';
import EmailCode from './components/email_code/Email_Code.jsx';



function App() {
  return (
    <Routes>
      <Route path="/" element={<Login />} />
      <Route path="/admin/services" element={<ServicesList />} />
      <Route path="/admin/services/create" element={<ServiceForm />} />
      <Route path="/admin/services/edit/:id" element={<ServiceForm isEdit />} />
      <Route path="/users" element={<Users />} />
      <Route path="/roles" element={<Roles />} />
      <Route path="/book" element={<BookAppointment />} />
      <Route path="/view" element={<View />} />
      <Route path="/add" element={<Add />} />
      <Route path="/edit/:id" element={<Edit />} />
      <Route path="/delete/:id" element={<Delete />} />
    
        <Route path="/register" element={<Register />} />
        <Route path="/reset" element={<Reset />} />
        <Route path="/newpassword" element={<NewPassword />} />
        <Route path="/emailcode" element={<EmailCode />} />

    </Routes>
  );
}

export default App;
