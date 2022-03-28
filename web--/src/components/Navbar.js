import React from 'react';
import { NavLink } from 'react-router-dom';

const Navbar = () => {
    return (
        <div className="navbar">
            <NavLink exact to="/" activeClassName="nav-active"><img src="./img/immomagic_logo.png" alt={"logo de immomagic"}/></NavLink>
            <NavLink exact to="/rechercher" activeClassName="nav-active">Rechercher <i className={"fas fa-search"} /></NavLink>
            <NavLink exact to="/rechercher" activeClassName="nav-active">Acheter</NavLink>
            <NavLink exact to="/rechercher" activeClassName="nav-active">Louer</NavLink>
            <NavLink exact to="/vendre" activeClassName="nav-active">Vendre</NavLink>
            <NavLink exact to="/biens" activeClassName="nav-active">vue bien</NavLink>
            <NavLink exact to="/contact" activeClassName="nav-active">Contact</NavLink>
            <NavLink exact to="/inscription" activeClassName="nav-active">S'inscrire <i className="fas fa-user-circle" /></NavLink>
            <NavLink exact to="/login" activeClassName="nav-active">Me connecter <i className="fas fa-user-circle" /></NavLink>
        </div>
    );
};

export default Navbar;