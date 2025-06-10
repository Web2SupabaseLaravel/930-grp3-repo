import React, { useState, useEffect } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import axios from 'axios';
import 'bootstrap/dist/css/bootstrap.min.css';
import '../styles/ServiceForm.css';

function ServiceForm({ isEdit = false }) {
  const [formData, setFormData] = useState({
    doctors_id: '',
    service_name: '',
    description: '',
    fees: '',
    duration: '',
  });

  const navigate = useNavigate();
  const { id } = useParams();

  useEffect(() => {
    if (isEdit && id) {
      axios.get(`http://localhost:8000/api/services/${id}`)
        .then(response => {
          const { service_id, ...rest } = response.data;
          setFormData(rest);
        })
        .catch(error => {
          console.error('Error fetching service:', error);
        });
    }
  }, [id, isEdit]);

  const handleChange = e => {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  };

  const handleSubmit = async e => {
    e.preventDefault();

    const url = isEdit
      ? `http://localhost:8000/api/services/${id}`
      : 'http://localhost:8000/api/services';

    try {
      if (isEdit) {
        await axios.put(url, formData);
      } else {
        await axios.post(url, formData);
      }
      navigate('/admin/services');
    } catch (error) {
      alert('Error saving service');
      console.error(error);
    }
  };

  return (
    <div className="service-form-container">
      <h2>{isEdit ? `Edit Service #${id}` : 'Add New Service'}</h2>

      <form onSubmit={handleSubmit}>
        <div className="mb-3">
          <label htmlFor="doctors_id" className="form-label">Doctor ID</label>
          <input
            type="number"
            id="doctors_id"
            name="doctors_id"
            className="form-control"
            value={formData.doctors_id}
            onChange={handleChange}
            required
          />
        </div>

        <div className="mb-3">
          <label htmlFor="service_name" className="form-label">Service Name</label>
          <input
            type="text"
            id="service_name"
            name="service_name"
            className="form-control"
            value={formData.service_name}
            onChange={handleChange}
            required
          />
        </div>

        <div className="mb-3">
          <label htmlFor="description" className="form-label">Description</label>
          <textarea
            id="description"
            name="description"
            className="form-control"
            rows="4"
            value={formData.description}
            onChange={handleChange}
            required
          />
        </div>

        <div className="mb-3">
          <label htmlFor="fees" className="form-label">Fees ($)</label>
          <input
            type="number"
            step="0.01"
            id="fees"
            name="fees"
            className="form-control"
            value={formData.fees}
            onChange={handleChange}
            required
          />
        </div>

        <div className="mb-4">
          <label htmlFor="duration" className="form-label">Duration (minutes)</label>
          <input
            type="number"
            id="duration"
            name="duration"
            className="form-control"
            value={formData.duration}
            onChange={handleChange}
            required
          />
        </div>

        <button type="submit" className="btn btn-success w-100">
          {isEdit ? 'Update Service' : 'Save Service'}
        </button>
      </form>
    </div>
  );
}

export default ServiceForm;
