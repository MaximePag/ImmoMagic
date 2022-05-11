import React  from 'react'
import logo from './assets/logo.png';
import './css/style.css';
import Header from './parts/header';
import SideBar from './parts/sidebar';
import Login from './vues/login'
import axios from 'axios';

function App() {

    function token() {
        console.log(localStorage.getItem('token'))
    }
    function CheckLogin() {
        const token = localStorage.getItem('token')
        if (token == null) {
            //si pas de token en local storage
            return (
                <div className="col-10">
                    <Login />
                </div>
            )
        } else {
            // ordre Axios POST -> url, data, header
            axios.post('http://no.api.tfvimmo.manusien-ecolelamanu.fr/public/refreshToken', null, {
                headers: {
                    'Authorization': 'Bearer ' + token
                }
            })
                .then(response => {
                    localStorage.setItem('token', response.data);
                })
                .catch(error => {
                    if (error)
                        console.log(error)
                });
            return (
                <div className=" logoCentral col-10">
                    <img className="logoCentral" src={logo} alt="Logo FV_Immo" />
                </div>
            )
        }
    }

    return (
        <>
            <Header />
            <div className="container-fluid">
                <div className="row">
                    <SideBar />
                    <CheckLogin />

                    {/* Bouton test a suppr */}
                    <button onClick={token} >token !</button>
                </div>
            </div>
        </>
    );
}

export default App;