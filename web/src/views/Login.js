import Navbar from '../components/Navbar';
import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { useHistory } from "react-router-dom";
import { useForm } from "react-hook-form";

const Login = () => {
    const [errorConection, setErrorConnection] = useState('');
    const [userDatas, setUserDatas] = useState([]);
    const [fetchUser, setFetchUser] = useState(true);
    const body = {
        mail: '',
        password: '',

    }
    const history = useHistory();


    const { register, formState: { errors }, handleSubmit } = useForm();


    const onSubmit = (data) => {
        body.mail = data.mail
        body.password = data.password

        if (body != null) { fetch(body) }
    }
    const fetch = (formDatas) => {
        //axios.post(`http://localhost:8000/api/login?mail=${formDatas.mail}&password=${formDatas.password}`)
        axios.post('http://localhost:8000/api/login', formDatas)
            .then(response => {
                localStorage.setItem('token', response.data.token);
                setErrorConnection(response.data.token);
                console.log(localStorage.getItem('token'));
                //history.push('/')
            })
            .catch(error => {
                if (error == 'Error: Request failed with status code 401') {
                    setErrorConnection('Adresse mail ou mot de passe incorrect')
                }
            });
    }
    useEffect(() => {
        if (localStorage.getItem('token') !== null && fetchUser) {
            axios.get('http://localhost:8000/user/profile', {
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                }
            }).then((apiDatas) => {
                setUserDatas(apiDatas.data.user);
                setFetchUser(false);
                console.log(userDatas);

            }).catch(function (error) {
                console.log(error);

            });
        };
    });
    if (localStorage.getItem('token') !== null) {
        return (
            <div className={"login"}>
                <Navbar />
                <div className="row g-0 o-hidden border-2 box-shadow-lg m-5 box-shadow p-3">
                    <div className="col-lg-8 mx-auto">
                        <div className="col mt-2">
                            <div className="realEstate card mx-3">
                                <div className="card-header">
                                    <h1>Connecté en tant que {userDatas.mail}</h1>
                                </div>
                                <div className="card-body row">
                                    <h2>Mes informations</h2>
                                    <form onSubmit={handleSubmit(onSubmit)}>
                                        <div className="row">
                                            <div className="mb-3 col">
                                                <label htmlFor="firstname" className="form-label">Prénom</label>
                                                <input type="text" className="form-control" id="firstname" value={userDatas.firstname} />
                                            </div>
                                            <div className="mb-3 col">
                                                <label htmlFor="lastname" className="form-label">Nom</label>
                                                <input type="text" className="form-control" id="lastname" value={userDatas.lastname} />
                                            </div>
                                        </div>

                                        <div className="mb-3">
                                            <label htmlFor="mail" className="form-label">Adresse mail</label>
                                            <input type="email" className="form-control" id="mail" value={userDatas.mail} />
                                        </div>
                                        <div className="mb-3">
                                            <label htmlFor="phoneNumber" className="form-label">Numéro de téléphone</label>
                                            <input type="text" className="form-control" id="phoneNumber" value={userDatas.phoneNumber} />
                                        </div>
                                        <div className="mb-3">
                                            <label htmlFor="address" className="form-label">Adresse postale</label>
                                            <input type="text" className="form-control" id="address" value={userDatas.address} />
                                        </div>
                                        <div className="row">
                                            <div className="mb-3 col">
                                                <label htmlFor="zipCode" className="form-label">Code Postal</label>
                                                <input type="text" className="form-control" id="zipCode" value={userDatas.zipCode} />
                                            </div>
                                            <div className="mb-3 col">
                                                <label htmlFor="city" className="form-label">Ville</label>
                                                <input type="text" className="form-control" id="city" value={userDatas.city} />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div className="card-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    } else {
        return (
            <div className={"login"}>
                <Navbar />
                <div className="row g-0 o-hidden border-2 box-shadow-lg m-5 box-shadow p-3">
                    <div className="col-lg-5 mx-auto">
                        <h1>Connexion</h1>
                        <form onSubmit={handleSubmit(onSubmit)}>
                            <div className="mb-3">
                                <label htmlFor="exampleInputEmail1" className="form-label">Adresse mail</label>
                                <input type="email" className="form-control" id="exampleInputEmail1" {...register("mail", { required: "Ce champs est requis" })} />
                            </div>
                            <div className="mb-3">
                                <label htmlFor="exampleInputPassword1" className="form-label">Mot de passe</label>
                                <input type="password" className="form-control" id="exampleInputPassword1" {...register("password", { required: "Ce champs est requis" })} />
                            </div>
                            <button type="submit" className="btn btn-magic">Se connecter</button>
                        </form>
                        <p className="text-danger">{errorConection}</p>
                    </div>
                </div>
            </div>
        );

    }
}

export default Login;




