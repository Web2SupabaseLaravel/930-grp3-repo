import React, { useState, useEffect } from "react";
import axios from "axios";
import "bootstrap/dist/css/bootstrap.min.css";
import Step1PatientType from "./Step1PatientType";
import Step1NewPatient from "./Step1NewPatient";
import Step1ReturningPatient from "./Step1ReturningPatient";
import Step2AppointmentDetails from "./Step2AppointmentDetails";

const BookAppointment = () => {
  const [step, setStep] = useState(1);
  const [patientType, setPatientType] = useState("returning");

  const [patientData, setPatientData] = useState({
    name: "",
    birthDate: "",
    email: "",
    prnOrIC: "",
    address: "",
    contact: "",
    usersId: "",
  });

  const [appointmentData, setAppointmentData] = useState({
    appointmentDate: "",
    appointmentTime: "",
    services_id: "",
    doctorId: "",
    status: "Pending",
  });

  const [specialties, setSpecialties] = useState([]);
  const [doctors, setDoctors] = useState([]);

  const handlePatientChange = (e) => {
    setPatientData({ ...patientData, [e.target.name]: e.target.value });
  };

  const handleAppointmentChange = (e) => {
    setAppointmentData({ ...appointmentData, [e.target.name]: e.target.value });
  };

  const nextStep = () => setStep((prev) => Math.min(prev + 1, 3));
  const prevStep = () => setStep((prev) => Math.max(prev - 1, 1));

  const fetchSpecialtiesAndDoctors = async () => {
    try {
      const headers = {
        apikey:
          "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImhtZnhpbXhkY2ZpbW1uc2dpdXdnIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5NTE0NDEsImV4cCI6MjA2MTUyNzQ0MX0.PDnUhKy5ffq_Z0Ng2zH9Tt60BRZa3B9P8vl-MV6Mvso",
        Authorization:
          "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImhtZnhpbXhkY2ZpbW1uc2dpdXdnIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5NTE0NDEsImV4cCI6MjA2MTUyNzQ0MX0.PDnUhKy5ffq_Z0Ng2zH9Tt60BRZa3B9P8vl-MV6Mvso",
      };

      const specialtiesRes = await axios.get(
        "https://hmfximxdcfimmnsgiuwg.supabase.co/rest/v1/specialties?select=id,name",
        { headers }
      );
      setSpecialties(specialtiesRes.data);

      const doctorsRes = await axios.get(
        "https://hmfximxdcfimmnsgiuwg.supabase.co/rest/v1/doctors?select=id,name,specialty_id",
        { headers }
      );
      setDoctors(doctorsRes.data);
    } catch (error) {
      console.error("Error fetching specialties or doctors:", error);
    }
  };

  useEffect(() => {
    fetchSpecialtiesAndDoctors();
  }, []);

  const handleSubmit = async () => {
    try {
      let patientResponse;
      if (patientType === "new") {
        patientResponse = await axios.post(
          "https://hmfximxdcfimmnsgiuwg.supabase.co/rest/v1/patients",
          {
            name: patientData.name,
            contact: patientData.contact,
            birth_date: patientData.birthDate,
            address: patientData.address,
            users_id: null,
          },
          {
            headers: {
              apikey:
                "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImhtZnhpbXhkY2ZpbW1uc2dpdXdnIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5NTE0NDEsImV4cCI6MjA2MTUyNzQ0MX0.PDnUhKy5ffq_Z0Ng2zH9Tt60BRZa3B9P8vl-MV6Mvso",
              Authorization:
                "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImhtZnhpbXhkY2ZpbW1uc2dpdXdnIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5NTE0NDEsImV4cCI6MjA2MTUyNzQ0MX0.PDnUhKy5ffq_Z0Ng2zH9Tt60BRZa3B9P8vl-MV6Mvso",
              "Content-Type": "application/json",
              Prefer: "return=representation",
            },
          }
        );
      }

      const patientId =
        patientType === "returning"
          ? patientData.prnOrIC
          : patientResponse?.data?.id;

      await axios.post(
        "https://hmfximxdcfimmnsgiuwg.supabase.co/rest/v1/appointments",
        {
          appointment_date: appointmentData.appointmentDate,
          appointment_time: appointmentData.appointmentTime,
          services_id: appointmentData.services_id,
          doctor_id: appointmentData.doctorId,
          patients_id: patientId,
          status: appointmentData.status,
        },
        {
          headers: {
            apikey:
              "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImhtZnhpbXhkY2ZpbW1uc2dpdXdnIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5NTE0NDEsImV4cCI6MjA2MTUyNzQ0MX0.PDnUhKy5ffq_Z0Ng2zH9Tt60BRZa3B9P8vl-MV6Mvso",
            Authorization:
              "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImhtZnhpbXhkY2ZpbW1uc2dpdXdnIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5NTE0NDEsImV4cCI6MjA2MTUyNzQ0MX0.PDnUhKy5ffq_Z0Ng2zH9Tt60BRZa3B9P8vl-MV6Mvso",
            "Content-Type": "application/json",
            Prefer: "return=representation",
          },
        }
      );

      alert("Appointment booked successfully!");
      setStep(1);
      setPatientData({
        name: "",
        birthDate: "",
        email: "",
        prnOrIC: "",
        address: "",
        contact: "",
        usersId: "",
      });
      setAppointmentData({
        appointmentDate: "",
        appointmentTime: "",
        services_id: "",
        doctorId: "",
        status: "Pending",
      });
    } catch (error) {
      console.error("Error booking appointment:", error);
      alert("Failed to book appointment. Please check the console for details.");
    }
  };

  return (
    <div className="container-fluid vh-100 d-flex">
      <div className="bg-primary text-white d-flex flex-column justify-content-center align-items-center col-12 col-md-5 p-5">
        <h1 className="text-center display-6 fw-bold">
          Book
          <br />
          An
          <br />
          Appointment
        </h1>
      </div>
      <div className="col-12 col-md-7 d-flex align-items-center justify-content-center p-4">
        <div className="w-100" style={{ maxWidth: "500px" }}>
          <div
            className="progress mt-3 mb-4"
            style={{ height: "5px" }}
            role="progressbar"
            aria-valuenow={step === 1 ? 33 : step === 2 ? 66 : 100}
            aria-valuemin="0"
            aria-valuemax="100"
            aria-label="Booking Progress"
          >
            <div
              className="progress-bar bg-primary"
               style={{
               width: step === 1 ? "33%" : step === 2 ? "66%" : "100%",
              }}
></div>
          </div>

          {step === 1 && (
            <Step1PatientType
              patientType={patientType}
              setPatientType={setPatientType}
              onNext={nextStep}
            />
          )}
          {step === 2 && patientType === "new" && (
            <Step1NewPatient
              form={patientData}
              handleChange={handlePatientChange}
              onNext={nextStep}
              onBack={prevStep}
            />
          )}
          {step === 2 && patientType === "returning" && (
            <Step1ReturningPatient
              form={patientData}
              handleChange={handlePatientChange}
              onNext={nextStep}
              onBack={prevStep}
            />
          )}
          {step === 3 && (
            <Step2AppointmentDetails
              form={appointmentData}
              handleChange={handleAppointmentChange}
              handleSubmit={handleSubmit}
              onBack={prevStep}
              specialties={specialties}
              doctors={doctors}
            />
          )}
        </div>
      </div>
    </div>
  );
};

export default BookAppointment;