import { useEffect, useState } from 'react';
import { useNavigate } from 'react-router-dom';
import api from '../services/api';
import 'bootstrap/dist/css/bootstrap.min.css';
import '../styles/ServicesList.css';

function ServicesList() {
  const [services, setServices] = useState([]);
  const navigate = useNavigate();

  useEffect(() => {
    api.get('/services')
      .then(response => setServices(response.data))
      .catch(error => console.error('Error fetching services:', error));
  }, []);

  const handleEdit = (id) => navigate(`/admin/services/edit/${id}`);

  const handleDelete = async (id) => {
    if (window.confirm('Are you sure you want to delete this service?')) {
      try {
        await api.delete(`/services/${id}`);
        setServices(services.filter(service => service.service_id !== id));
      } catch (error) {
        console.error('Error deleting service:', error);
      }
    }
  };

  return (
    <div className="container mt-5">
      <div className="d-flex justify-content-between align-items-center mb-4">
        <h2 className="title">All Services</h2>
        <button
          className="btn custom-add"
          onClick={() => navigate('/admin/services/create')}
        >
          Add New Service
        </button>
      </div>

      {services.length === 0 ? (
        <div className="text-center text-muted">No services found.</div>
      ) : (
        <div className="table-responsive">
          <table className="table table-bordered table-hover align-middle text-center">
            <thead className="table-light">
              <tr>
                <th>ID</th>
                <th>Doctor ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Fees ($)</th>
                <th>Duration (min)</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              {services.map(service => (
                <tr key={service.service_id}>
                  <td>{service.service_id}</td>
                  <td>{service.doctors_id}</td>
                  <td>{service.service_name}</td>
                  <td style={{ maxWidth: '250px', whiteSpace: 'normal' }}>{service.description}</td>
                  <td>{Number(service.fees).toFixed(2)}</td>
                  <td>{service.duration}</td>
                  <td>
                    <div className="d-flex justify-content-center gap-2">
                      <button className="btn btn-sm custom-edit" onClick={() => handleEdit(service.service_id)}>Edit</button>
                      <button className="btn btn-sm custom-delete" onClick={() => handleDelete(service.service_id)}>Delete</button>
                    </div>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      )}
    </div>
  );
}

export default ServicesList;
