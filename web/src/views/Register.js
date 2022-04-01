import Navbar from '../components/Navbar';
import React, { useState } from 'react';
import axios from 'axios';
import { useHistory } from "react-router-dom";
import { useForm } from "react-hook-form";

const Register = () => {
    const [errorConection, setErrorConnection] = useState('');
    const body = {
        lastname: '',
        firstname: '',
        mail: '',
        phoneNumber: '',
        address: '',
        zipCode: '',
        city: '',
        password: ''
    }
    const history = useHistory();


    const { register, formState: { errors }, handleSubmit } = useForm();


    const onSubmit = (data) => {
        body.lastname = data.lastname
        body.firstname = data.firstname
        body.mail = data.mail
        body.phoneNumber = data.phoneNumber
        body.address = data.address
        body.zipCode = data.zipCode
        body.city = data.city
        body.password = data.password
        body.passwordConfirm = data.passwordConfirm

        if (body.password === body.passwordConfirm) {
            if (body != null) { fetch(body) }
        }
    }

    // function disconnect() {
    //     localStorage.removeItem('token');
    // }

    const fetch = (formDatas) => {
        //axios.post(`http://localhost:8000/api/register?lastname=${formDatas.lastname}&firstname=${formDatas.firstname}&mail=${formDatas.mail}&address=${formDatas.address}&zipCode=${formDatas.zipCode}&city=${formDatas.city}&phoneNumber=${formDatas.phoneNumber}&password=${formDatas.password}`)
        axios.post('http://localhost:8000/api/register', formDatas)
            .then(response => {
                //localStorage.setItem('token', response.data.token);
                setErrorConnection(response);
                //history.push('/')
            })
            .catch(error => {
                if (error == 'Error: Request failed with status code 401') {
                    setErrorConnection('Nope')
                }
            });
    }
    return (
        <div className={"register"}>
            <Navbar />
            <div className="row g-0 o-hidden border-2 box-shadow-lg m-5 box-shadow p-3">
                <div className="col-lg-5 mx-auto">
                    <h1>Inscription</h1>
                    <form onSubmit={handleSubmit(onSubmit)}>
                        <div className="row">
                            <div className="mb-3 col">
                                <label htmlFor="firstname" className="form-label">Prénom</label>
                                <input type="text" className="form-control" id="firstname" {...register("firstname", { required: "Ce champs est requis" })} />
                            </div>
                            <div className="mb-3 col">
                                <label htmlFor="lastname" className="form-label">Nom</label>
                                <input type="text" className="form-control" id="lastname" {...register("lastname", { required: "Ce champs est requis" })} />
                            </div>
                        </div>

                        <div className="mb-3">
                            <label htmlFor="mail" className="form-label">Adresse mail</label>
                            <input type="email" className="form-control" id="mail" {...register("mail", { required: "Ce champs est requis" })} />
                        </div>
                        <div className="mb-3">
                            <label htmlFor="phoneNumber" className="form-label">Numéro de téléphone</label>
                            <input type="text" className="form-control" id="phoneNumber" {...register("phoneNumber", { required: "Ce champs est requis" })} />
                        </div>
                        <div className="mb-3">
                            <label htmlFor="address" className="form-label">Adresse postale</label>
                            <input type="text" className="form-control" id="address" {...register("address", { required: "Ce champs est requis" })} />
                        </div>
                        <div className="row">
                            <div className="mb-3 col">
                                <label htmlFor="zipCode" className="form-label">Code Postal</label>
                                <input type="text" className="form-control" id="zipCode" {...register("zipCode", { required: "Ce champs est requis" })} />
                            </div>
                            <div className="mb-3 col">
                                <label htmlFor="city" className="form-label">Ville</label>
                                <input type="text" className="form-control" id="city" {...register("city", { required: "Ce champs est requis" })} />
                            </div>
                        </div>

                        <div className="mb-3">
                            <label htmlFor="password" className="form-label">Mot de passe</label>
                            <input type="password" className="form-control" id="password" {...register("password", { required: "Ce champs est requis" })} />
                        </div>
                        <div className="mb-3">
                            <label htmlFor="passwordConfirm" className="form-label">Confirmer Mot de passe</label>
                            <input type="password" className="form-control" id="passwordConfirm" {...register("passwordConfirm", { required: "Ce champs est requis" })} />
                        </div>
                        <button type="submit" className="btn btn-magic">S'inscrire</button>
                    </form>
                    <p className="text-danger">{errorConection}</p>
                </div>
            </div>
        </div>
    );

}

export default Register;




