import React from "react";

const Step1ReturningPatient = ({ form, handleChange, onNext, onBack }) => (
  <div>
    <div className="mb-3">
      <label htmlFor="prnOrIC" className="form-label">
        PRN or IC Number
      </label>
      <input
        type="text"
        id="prnOrIC"
        className="form-control"
        name="prnOrIC"
        placeholder="Enter PRN or IC Number"
        value={form.prnOrIC}
        onChange={handleChange}
      />
    </div>

    <div className="d-flex justify-content-between">
      <button className="btn btn-outline-secondary" onClick={onBack}>
        ← Back
      </button>
      <button className="btn btn-primary" onClick={onNext}>
        Next →
      </button>
    </div>
  </div>
);

export default Step1ReturningPatient;