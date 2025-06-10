import React from "react";

const Step2AppointmentDetails = ({
    form,
    handleChange,
    handleSubmit,
    onBack,
    specialties,
    doctors,
}) => {
    const filteredDoctors = doctors.filter(
        (doc) => doc.specialty_id === parseInt(form.services_id)
    );

    return (
        <div>
            <div className="mb-3">
                <label htmlFor="services_id" className="form-label">
                    Specialty
                </label>
                <select
                    id="services_id"
                    className="form-select"
                    name="services_id"
                    value={form.services_id}
                    onChange={handleChange}
                >
                    <option value="">Please Select</option>
                    {specialties.map((sp) => (
                        <option key={sp.id} value={sp.id}>
                            {sp.name}
                        </option>
                    ))}
                </select>
            </div>

            <div className="mb-3">
                <label htmlFor="doctorId" className="form-label">
                    Doctor Name
                </label>
                <select
                    id="doctorId"
                    className="form-select"
                    name="doctorId"
                    value={form.doctorId}
                    onChange={handleChange}
                >
                    <option value="">Please Select</option>
                    {filteredDoctors.length > 0 ? (
                        filteredDoctors.map((doc) => (
                            <option key={doc.id} value={doc.id}>
                                {doc.name}
                            </option>
                        ))
                    ) : (
                        <option disabled>
                            No doctor found for this specialty
                        </option>
                    )}
                </select>
            </div>

            <div className="mb-3">
                <label htmlFor="appointmentDate" className="form-label">
                    Appointment Date
                </label>
                <input
                    type="date"
                    id="appointmentDate"
                    className="form-control"
                    name="appointmentDate"
                    value={form.appointmentDate}
                    onChange={handleChange}
                />
            </div>

            <div className="mb-3">
                <label htmlFor="appointmentTime" className="form-label">
                    Appointment Time
                </label>
                <input
                    type="time"
                    id="appointmentTime"
                    className="form-control"
                    name="appointmentTime"
                    value={form.appointmentTime}
                    onChange={handleChange}
                />
            </div>

            <div className="d-flex justify-content-between mt-4">
                <button className="btn btn-secondary" onClick={onBack}>
                    ← Back
                </button>
                <button className="btn btn-success" onClick={handleSubmit}>
                    Book Appointment
                </button>
            </div>
        </div>
    );
};

export default Step2AppointmentDetails;
