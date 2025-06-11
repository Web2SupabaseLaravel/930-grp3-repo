import { Routes, Route, Navigate } from 'react-router-dom';
import ServicesList from './components/ServicesList';
import ServiceForm from './components/ServiceForm';


function App() {
  return (
    <Routes>
      
      <Route path="/" element={<Navigate to="/admin/services" />} />

      <Route path="/admin/services" element={<ServicesList />} />
      <Route path="/admin/services/create" element={<ServiceForm />} />
      <Route path="/admin/services/edit/:id" element={<ServiceForm isEdit />} />
    </Routes>
  );
}

export default App;
