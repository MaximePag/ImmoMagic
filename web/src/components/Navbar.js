import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { NavLink } from 'react-router-dom';

const Navbar = () => {
    const [UserMail, setUserMail] = useState('Se connecter');
    const [fetch, setFetch] = useState(true);

    useEffect(() => {
        if (fetch) {
            axios.get('http://localhost:8000/user/profile', {
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                }
            }).then((apiDatas) => {
                setUserMail(apiDatas.data.user.mail)
                setFetch(false)

            }).catch(function (error) {
                console.log(error);

            });
        };
    });
    console.log(UserMail);

    return (
        <div className="navbar">
            <NavLink exact to="/" activeClassName="nav-active"><img src="./img/immomagic_logo.png" alt={"logo de immomagic"} /></NavLink>
            <NavLink exact to="/rechercher" activeClassName="nav-active">Rechercher <i className={"fas fa-search"} /></NavLink>
            <NavLink exact to="/rechercher" activeClassName="nav-active">Acheter</NavLink>
            <NavLink exact to="/rechercher" activeClassName="nav-active">Louer</NavLink>
            <NavLink exact to="/vendre" activeClassName="nav-active">Vendre</NavLink>
            <NavLink exact to="/contact" activeClassName="nav-active">Contact</NavLink>
            <NavLink exact to="/inscription" activeClassName="nav-active">S'inscrire <i className="fas fa-user-circle" /></NavLink>
            <NavLink exact to="/login" activeClassName="nav-active">{UserMail} <i className="fas fa-user-circle" /></NavLink>
        </div>
    );
};

export default Navbar;