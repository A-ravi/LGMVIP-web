import { useState } from "react";


const API_URL = "https://reqres.in/api/users?page=1";

function App() {

  const [users, setUsers] = useState([]);
  const [loading, setLoading] = useState(false);

  const loadUsers = async () => {
    setLoading(true);
    const response = await fetch(API_URL);

    const jsonResponse = await response.json();

    setUsers(jsonResponse["data"]);
    setLoading(false);
  }

  return (
    <>

      {/* Navbar */}

    <h1 className="bg-light text-center m-3 p-3 fs-3">LGM VIP-Web Task2</h1>
    <div className="container text-center">
    <button className="btn btn-outline-primary  m-3 p-2" onClick={loadUsers} type="submit">Get Users</button>
    </div>

      {/* Spinner */}

      { loading?
      <div className="d-flex justify-content-center p-10">
          <div className="spinner-border m-5" role="status">
            <span className="visually-hidden">Loading...</span>
          </div>
        </div>
        : ""}

      {/* Card */}
      <div className="container w-auto ">
        <div className="row row-cols-1 row-cols-md-3 g-4">
          {
            users.map(({ id, first_name, last_name, email, avatar, }) => (
              <div className="col p-3 " key={id}>
                <div className="card h-100 bg-warning bg-opacity-25">
                  <img src={avatar} className="card-img-top img-fluid rounded" alt="users-avatar" />
                  <div className="card-body">
                    <h2 className="card-title fs-3 text-center">{first_name + " " + last_name}</h2>
                    <h6 className="card-text fs-6 text-center">{email}</h6>
                  </div>
                </div>
              </div>
            ))
          }
        </div>
      </div>
    </>
  );
}

export default App;
