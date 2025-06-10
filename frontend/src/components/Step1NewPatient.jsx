import React from "react";

const Step1NewPatient = ({ form, handleChange, onNext, onBack }) => (
    <div>
        <div className="mb-3">
            <label htmlFor="name" className="form-label">
                Full Name
            </label>
            <input
                type="text"
                id="name"
                className="form-control"
                name="name"
                placeholder="Your Full Name"
                value={form.name}
                onChange={handleChange}
                autoComplete="given-name"
            />
        </div>
        <div className="mb-3">
            <label htmlFor="birthDate" className="form-label">
                Date of Birth
            </label>
            <input
                type="date"
                id="birthDate"
                className="form-control"
                name="birthDate"
                value={form.birthDate}
                onChange={handleChange}
            />
        </div>

        <div className="mb-3">
            <label htmlFor="address" className="form-label">
                Address
            </label>
            <input
                type="text"
                id="address"
                className="form-control"
                name="address"
                placeholder="Enter your Address"
                value={form.address}
                onChange={handleChange}
            />
        </div>

        <div className="mb-3">
            <label htmlFor="contact" className="form-label">
                Contact Number
            </label>
            <input
                type="tel"
                id="contact"
                className="form-control"
                name="contact"
                placeholder="Your Contact Number"
                value={form.contact}
                onChange={handleChange}
                autoComplete="tel"
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

export default Step1NewPatient;
