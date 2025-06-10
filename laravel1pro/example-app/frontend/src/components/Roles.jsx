import React, { useEffect, useState } from "react";
import axios from "axios";
import "../styles/Roles.css";


export default function UsersGroupedByRole() {
  const [users, setUsers] = useState({});

  useEffect(() => {
    fetchUsers();
  }, []);

  const fetchUsers = async () => {
    try {
      const res = await axios.get("http://localhost:8000/api/users");
      const grouped = res.data.reduce((acc, user) => {
        if (!acc[user.role]) acc[user.role] = [];
        acc[user.role].push(user);
        return acc;
      }, {});
      setUsers(grouped);
    } catch (error) {
      console.error("Error fetching users:", error);
    }
  };

  return (
    <div>
      <h2>Users Grouped by Role</h2>
      {Object.keys(users).length === 0 && <p>Loading users...</p>}

      {Object.entries(users).map(([role, usersInRole]) => (
        <div key={role} style={{ marginBottom: "20px" }}>
          <h3>{role}</h3>
          <table border="1" cellPadding="8" cellSpacing="0" width="100%">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>User ID</th>
              </tr>
            </thead>
            <tbody>
              {usersInRole.map(user => (
                <tr key={user.user_id}>
                  <td>{user.name}</td>
                  <td>{user.email}</td>
                  <td>{user.user_id}</td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      ))}
    </div>
  );
}
