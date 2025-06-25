
import  './View.css'
import Buttons from "../Buttons";
import Delete1 from '../../image/delete1.png'
import React, { useEffect, useState } from "react";
import axios from "axios";
import Edit from '../../image/Edit.jpg';
import { Link } from 'react-router-dom';
import Delete from '../Delete';
const View=()=>{

const [doctors, setDoctors] = useState([]);
  const [message, setMessage] = useState('')
   const [selectedDoctorId, setSelectedDoctorId] = useState(null);
 useEffect(() => {
async function fetchData() {
  try {
    const response = await axios.get('http://127.0.0.1:8000/api/datadoctors');
    setDoctors(response.data);
    
 setMessage(' Data fetched successfully');

  } catch (error) {
    console.error(' An error occurred while fetching data successfully.');
  }
}

 fetchData();
  }, []);

const handleDelete = async (id) => {
    try {
      await axios.delete(`http://127.0.0.1:8000/api/datadoctors/${id}`);
     const response = await axios.get('http://127.0.0.1:8000/api/datadoctors');
    setDoctors(response.data);
      setMessage('Doctor deleted successfully');
    } catch (error) {
      setMessage('Error deleting doctor');
    }
  };








return(
  <header>
  <nav className="navbar bg-body-tertiary">
  <div className="container-fluid">
    <h1 className="navbar-brand">LIST PRACTITIONER</h1>
    <div className="d-flex  search " >
      <input className="form-control me-3 inputDoctor   " type="search " placeholder="Search"/>
      
       <Link id="ButtonAdd" to={"/add/"}  className="btn btn-outline-success" value="+ Add Practitioner"  > 
        Add  Practitioner
        </Link>
    </div>
  </div>
</nav>

  <div >

  
<div className="table-responsive mt-3">
  
<table className="table table-bordered border-primary">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">medical_field  </th>
      <th scope="col">phone</th>
      <th scope="col">Working_hours </th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
     {doctors.length > 0 ? (
            doctors.map((doctor) => (
    <tr>
          
          <td>{doctor.user?.name}</td>
        <td>{doctor.user?.email}</td>
                <td>{doctor.medical_field}</td>
                <td>{doctor.phone}</td>
                <td>{doctor.working_hours}</td>
      <td>
        <Link to={`/edit/${doctor.doctor_id}`}  className="buttonDelete ms-5  me-5"  > 
        <img src={Edit}  />
        </Link>
      <Buttons  type ="image" value="submit" src={Delete1} data-bs-toggle="modal"
                  data-bs-target="#deleteModal"
                  onClick={() => setSelectedDoctorId(doctor.doctor_id)}/>
      </td>
     
    </tr>
       ))
          ) : (
            <tr>
              <td colSpan="5" style={{ textAlign: 'center' }}>
               NO Data
              </td>
            </tr>
          )}
  </tbody>
</table>
<Delete onConfirm={handleDelete} doctor_Id={selectedDoctorId} />

 </div>
</div>
</header>


)
}
export default View;