import React from "react";

const Step1ReturningPatient = ({ form, handleChange, onNext, onBack }) => (
    <div>
        <div className="mb-3">
            <label htmlFor="prnOrIC" className="form-label">
                Patient PRN Number or IC Number
            </label>
            <input
                type="text"
                id="prnOrIC"
                className="form-control"
                name="prnOrIC"
                placeholder="Your PRN or IC"
                value={form.prnOrIC}
                onChange={handleChange}
            />
        </div>

        <div className="d-flex justify-content-between mt-4">
            <button className="btn btn-secondary" onClick={onBack}>
                ← Back
            </button>
            <button className="btn btn-primary" onClick={onNext}>
                Next →
            </button>
        </div>
    </div>
);

export default Step1ReturningPatient;
