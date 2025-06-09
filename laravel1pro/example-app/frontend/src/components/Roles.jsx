import React from "react";
import { FaSearch, FaPlus, FaFilter, FaEdit, FaTrash } from "react-icons/fa";
import "../styles/Users.css";

const roles = [
    {
        id: 1,
        role: "Admin",
        permissions: ["Add User", "Edit User", "Delete User"],
    },
    {
        id: 2,
        role: "Doctor",
        permissions: ["View Patients"],
    },
    {
        id: 3,
        role: "Receptionist",
        permissions: ["Add Patient", "Edit Appointment"],
    },
];

export default function Roles() {
    return (
        <div className="patients-container">

            {/* Header actions */}
            <div className="patients-actions">
                <div className="left-actions">
                    <button className="btn orange-btn">
                        <FaPlus /> <span>اضافة دور</span>
                    </button>
                    <button className="btn gray-btn">
                        <FaFilter /> <span>فلتر</span>
                    </button>
                </div>
                <div className="search-box">
                    <FaSearch />
                    <input type="text" placeholder="بحث..." />
                </div>
            </div>

            {/* Table */}
            <div className="patients-table">
                <div className="table-row header">
                    <div>الدور</div>
                    <div>الصلاحيات</div>
                    <div>الإجراءات</div>
                </div>

                {roles.map((r, i) => (
                    <div className={`table-row ${i % 2 === 1 ? 'alt-row' : ''}`} key={r.id}>
                        <div>{r.role}</div>
                        <div>{r.permissions.join(", ")}</div>
                        <div className="icon-cell">
                            <button className="icon-btn edit-btn"><FaEdit /></button>
                            <button className="icon-btn delete-btn"><FaTrash /></button>
                        </div>
                    </div>
                ))}
            </div>
        </div>
    );
}
