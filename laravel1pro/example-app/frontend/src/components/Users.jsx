import React, { useEffect, useState } from "react";
import { FaSearch, FaPlus, FaFilter, FaEdit, FaTrash, FaTimes } from "react-icons/fa";
import "../styles/Users.css";
import axios from "axios";

export default function Users() {
    const [users, setUsers] = useState([]);
    const [showModal, setShowModal] = useState(false);
    const [mode, setMode] = useState("add");
    const [selectedUser, setSelectedUser] = useState(null);
    const [formData, setFormData] = useState({ name: '', email: '', password: '', role: '' });

    const API_URL = "http://localhost:8000/api/users";

    useEffect(() => {
        fetchUsers();
    }, []);

    const fetchUsers = async () => {
        try {
            const res = await axios.get(API_URL);
            setUsers(res.data);
        } catch (err) {
            console.error("An error occurred while fetching data: ", err);
        }
    };

    const handleInputChange = e => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    const openAddModal = () => {
        setMode("add");
        setFormData({ name: '', email: '', password: '', role: '' });
        setShowModal(true);
    };

    const openEditModal = (user) => {
        setMode("edit");
        setSelectedUser(user);
        setFormData({ name: user.name, email: user.email, password: '', role: user.role });
        setShowModal(true);
    };

    const handleAdd = async (e) => {
        e.preventDefault();
        console.log("Form Data to Send:", formData);
        try {
            await axios.post(API_URL, formData);
            setShowModal(false);
            fetchUsers();
        } catch (err) {
            console.error("Error while adding user: ", err);
        }
    };

    const handleUpdate = async (e) => {
        e.preventDefault();
        try {
            if (selectedUser) {
                await axios.put(`${API_URL}/${selectedUser.user_id}`, formData);
                setShowModal(false);
                fetchUsers();
            }
        } catch (err) {
            console.error("Error while updating user: ", err);
        }
    };

    const handleDelete = async (userId) => {
        if (window.confirm("Are you sure you want to delete this user?")) {
            try {
                await axios.delete(`${API_URL}/${userId}`);
                fetchUsers();
            } catch (err) {
                console.error("An error occurred while deleting: ", err);
            }
        }
    };

    return (
        <div className="users-container">
            <div className="users-actions">
                <div className="left-actions">
                    <button className="btn orange-btn" onClick={openAddModal}>
                        <FaPlus /> <span>Add User</span>
                    </button>
                    <button className="btn gray-btn">
                        <FaFilter /> <span>Filter</span>
                    </button>
                </div>
                <div className="search-box">
                    <FaSearch />
                    <input type="text" placeholder="Search..." />
                </div>
            </div>

            <div className="users-table">
                <div className="table-row header">
                    <div>User ID</div>
                    <div>Name</div>
                    <div>Email</div>
                    <div>Role</div>
                    <div>Actions</div>
                </div>

                {users.map((user, i) => (
                    <div className={`table-row ${i % 2 === 1 ? 'alt-row' : ''}`} key={user.user_id}>
                        <div>{user.user_id}</div>
                        <div>{user.name}</div>
                        <div>{user.email}</div>
                        <div>{user.role}</div>
                        <div className="icon-cell">
                            <button className="btn icon-btn edit-btn" onClick={() => openEditModal(user)}>
                                <FaEdit />
                            </button>
                            <button className="btn icon-btn delete-btn" onClick={() => handleDelete(user.user_id)}>
                                <FaTrash />
                            </button>
                        </div>
                    </div>
                ))}
            </div>

            {showModal && (
                <div className="modal-overlay">
                    <div className="modal">
                        <div className="modal-header">
                            <h3>{mode === "edit" ? 'Edit User' : 'Add User'}</h3>
                            <button onClick={() => setShowModal(false)} className="close-btn"><FaTimes /></button>
                        </div>
                        <form onSubmit={mode === "edit" ? handleUpdate : handleAdd} className="modal-form">
                            <input name="name" placeholder="Name" value={formData.name} onChange={handleInputChange} required />
                            <input name="email" placeholder="Email" value={formData.email} onChange={handleInputChange} required />
                            {mode === "add" && (
                                <input name="password" type="password" placeholder="Password" value={formData.password} onChange={handleInputChange} required />
                            )}
                            <select name="role" value={formData.role} onChange={handleInputChange} required>
                                <option value="">Select Role</option>
                                <option value="Doctor">Doctor</option>
                                <option value="Patient">Patient</option>
                            </select>
                            <button type="submit" className="btn submit-btn">{mode === "edit" ? 'Update' : 'Add'}</button>
                        </form>
                    </div>
                </div>
            )}
        </div>
    );
}
