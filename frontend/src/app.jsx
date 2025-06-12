import { Routes, Route, Navigate } from 'react-router-dom';
import ServicesList from './components/ServicesList';
import ServiceForm from './components/ServiceForm';
import BookAppointment from './components/BookAppointment';

function App() {
  return (
    <Routes>
      {/* إعادة توجيه الصفحة الرئيسية */}
      <Route path="/" element={<Navigate to="/admin/services" />} />

      {/* واجهة الإدارة */}
      <Route path="/admin/services" element={<ServicesList />} />
      <Route path="/admin/services/create" element={<ServiceForm />} />
      <Route path="/admin/services/edit/:id" element={<ServiceForm isEdit />} />

      {/* صفحة حجز المواعيد للمستخدمين */}
      <Route path="/book" element={<BookAppointment />} />
    </Routes>
  );
}

export default App;
