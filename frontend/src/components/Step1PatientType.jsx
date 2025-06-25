import React from "react";

const Step1PatientType = ({ patientType, setPatientType, onNext }) => (
  <div>
    <div className="mb-3">
      <label className="form-label fw-bold">Type of Patient</label>
      <div className="d-flex gap-3 mb-3">
        <div className="form-check">
          <input
            className="form-check-input"
            type="radio"
            name="patientType"
            value="returning"
            checked={patientType === "returning"}
            onChange={(e) => setPatientType(e.target.value)}
            id="returningPatient"
          />
          <label className="form-check-label" htmlFor="returningPatient">
            Returning Patient
          </label>
        </div>
        <div className="form-check">
          <input
            className="form-check-input"
            type="radio"
            name="patientType"
            value="new"
            checked={patientType === "new"}
            onChange={(e) => setPatientType(e.target.value)}
            id="newPatient"
          />
          <label className="form-check-label" htmlFor="newPatient">
            New Patient
          </label>
        </div>
      </div>
    </div>

    <button className="btn btn-primary w-100" onClick={onNext}>
      Next →
    </button>
  </div>
);

export default Step1PatientType;