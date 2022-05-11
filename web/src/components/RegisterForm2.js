import React, {useState, useEffect} from 'react';
import axios from 'axios';
import Navbar from "../components/Navbar";


export default function Form() {

    // States for registration
    const [firstname, setFirstname] = useState('');
    const [lastname, setLastname] = useState('');
    const [mail, setMail] = useState('');
    const [phoneNumber, setPhoneNumber] = useState('');
    const [password, setPassword] = useState('');
    const [address, setAddress] = useState('');
    const [zipCode, setZipCode] = useState('');
    const [city, setCity] = useState('');

    // States for checking the errors
    const [submitted, setSubmitted] = useState(false);
    const [error, setError] = useState(false);
    const [fetch, setFetch] = useState(true);
    const [sortData, setSortData] = useState([]);
    const [UserDatas, setUser] = useState([]);


    // Handling the firstname change
    const handleFirstname = (e) => {
        setFirstname(e.target.value);
        setSubmitted(false);
    };

    //handling the lastname change
    const handleLastname = (e) => {
        setLastname(e.target.value);
        setSubmitted(false);
    };

    // Handling the email change
    const handleMail = (e) => {
        setMail(e.target.value);
        setSubmitted(false);
    };

    // Handling the email change
    const handlePassword = (e) => {
        setPassword(e.target.value);
        setSubmitted(false);
    };

    // Handling the email change
    const handlePhoneNumber = (e) => {
        setPhoneNumber(e.target.value);
        setSubmitted(false);
    };

    // Handling the adress change
    const handleAddress = (e) => {
        setAddress(e.target.value);
        setSubmitted(false);
    };

    //Handling the zipCode change
    const handleZipCode = (e) => {
        setZipCode(e.target.value);
        setSubmitted(false);
    };

    const handleCity = (e) => {
        setCity(e.target.value);
        setSubmitted(false);
    };

    // Handling the form submission
    const handleSubmit = (e) => {
        e.preventDefault()
        const data = new FormData(e);
       console.log(e);
        if (firstname === '' || lastname === '' || mail === '' || phoneNumber === '' || password === '' || address === '' || zipCode === '' || city === '') {
            setError(true);
        } else {
            setSubmitted(true);
            setError(false);
        }
    };

    // Showing success message
     const successMessage = () => {
        return (
            <div
                className="success"
                style={{
                    display: submitted ? '' : 'none',
                }}>
                <h1>Vous êtes bien enregistré</h1>
            </div>
        );
    };

    const errorMessage = () => {
            return (
            <div className="error" style={{display: error ? '' : 'none'}}>
                <h1>Merci de remplir tous les champs</h1>
            </div>
            );
            };
            return (
            <div className="form">
                <div>
                    <h1>Inscription</h1>
                </div>

                {/* Calling to the methods */}
                <div className="messages">
                    {errorMessage()}
                    {successMessage()}
                </div>

                <form onSubmit={handleSubmit}>
                    {/* Labels and inputs for form data */}
                    <label className="label">Prénom :</label>
                    <input onChange={handleFirstname} className="input"
                           value={firstname} type="text"/>

                    <label className="label">Nom de famille :</label>
                    <input onChange={handleLastname} className="input"
                           value={lastname} type="text"/>

                    <label className="label">Adresse :</label>
                    <input onChange={handleAddress} className="input"
                           value={address} type="text"/>

                    <label className="label">Code postal :</label>
                    <input onChange={handleZipCode} className="input"
                           value={zipCode} type="text"/>

                    <label className="label">Ville :</label>
                    <input onChange={handleCity} className="input"
                           value={city} type="text"/>

                    <label className="label">Numéro de téléphone :</label>
                    <input onChange={handlePhoneNumber} className="input"
                           value={phoneNumber} type="text"/>

                    <label className="label">Adresse mail :</label>
                    <input onChange={handleMail} className="input"
                           value={mail} type="email"/>

                    <label className="label">Password</label>
                    <input onChange={handlePassword} className="input"
                           value={password} type="password"/>

                    <button  className="btn" type="submit">
                        Submit
                    </button>
                </form>
            </div>
            )
        };

