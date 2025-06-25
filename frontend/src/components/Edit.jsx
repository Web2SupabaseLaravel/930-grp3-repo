









import React, { useEffect, useState } from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import axios from 'axios'

import Buttons from  "./Buttons"; 
import Input from "./Input";
import  './add/Add.css'
const Edit=()=>{
const [name, setName] = useState('')
const [email, setEmail] = useState('')
  const [password, setPassword] = useState('')
  const [ medical_field, setMedical_field] = useState('')
  const [phone, setPhone] = useState('')
  const [working_hours, setWorking_hours] = useState('')
  const [message, setMessage] = useState('')
   const { id } = useParams();
  const navigate = useNavigate();

 useEffect(() => {
    axios.get(`http://127.0.0.1:8000/api/datadoctors/${id}`)
      .then(response => {
        const data = response.data;
       
          setName(data.user.name) 
          setEmail( data.user.email)
          setMedical_field( data.medical_field)
          setPassword (data.user.password)
          setPhone(data.phone) 
          setWorking_hours (data.working_hours)
       
      });
  }, [id]);






const handleSubmit = async (e) => {
    e.preventDefault()

    try {
      const response = await axios.put(`http://127.0.0.1:8000/api/datadoctors/${id}` ,{
        name,
        email,
        password,
        medical_field,
        phone,
     working_hours,
     
      })
     setMessage('Doctor data saved successfully');
    navigate('/view');
      setName('')
      setEmail('')
      setPassword('')
      setMedical_field('')
       setPhone('')
       setWorking_hours('')
      setMessage('Doctor data saved successfully');
    } catch (error) {
      setMessage('An error occurred while adding the doctor.')
    }
  }


return(
    <>

   
    <div class="offcanvas offcanvas-start show  asideAdd" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel"  >
  <div class="offcanvas-body row align-items-center">
   <h2> EDIT PRACTITIONER</h2>
  </div>
</div>
    
    
<form className="page" onSubmit={handleSubmit}>
   <h1> EDIT PRACTITIONER </h1>

<div className="row justify-content-end me-5">
  
  <div className="col-3  me-5">
<label > Name     </label>
<Input type ="Text" className="form-control mt-3 inputDoctor" value={name}onChange={(e) => setName(e.target.value)} />
</div>

 <div className="col-3  me-5"> 
<label > Email     </label>
<Input type ="email" className="form-control mt-3 inputDoctor"  value={email} onChange={(e) => setEmail(e.target.value)}/>
</div>
</div>

<div className="row justify-content-end  mt-5  me-5">
<div className="col-3  me-5">
<label > Password     </label>
<Input type ="password" className="form-control mt-3 inputDoctor"  value={password}  onChange={(e) => setPassword(e.target.value)}/>
</div>


<div className="col-3  me-5">
<label > medical_field     </label>
<Input type ="Text" className="form-control mt-3  inputDoctor" value={medical_field}  onChange={(e) => setMedical_field(e.target.value)}/>
</div>
</div>


<div className="row justify-content-end  mt-5  me-5">
<div className="col-3  me-5">
<label > phone     </label>
<Input type ="Text" className="form-control mt-3 inputDoctor" value={phone}  onChange={(e) => setPhone(e.target.value)}/>
</div>
<div className="col-3  me-5">
<label > Working_hours     </label>
<Input type ="Text" className="form-control mt-3 inputDoctor" value={working_hours}  onChange={(e) => setWorking_hours(e.target.value)}/>
</div>
</div>

<div className="row justify-content-center mt-4 " >
<Buttons  id="submitdoctor" type ="submit" value="submit" className=" btn  col-2  "/>
</div>

</form>
</>
)
}
export default Edit;