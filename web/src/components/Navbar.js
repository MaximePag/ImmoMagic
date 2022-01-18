import React from 'react';
import { NavLink } from 'react-router-dom';

const Navbar = () => {
    return (
        <div className="navbar">
            <NavLink exact to="/" activeClassName="nav-active">Accueil</NavLink>
            <NavLink exact to="/contact" activeClassName="nav-active">Contact</NavLink>
            <NavLink exact to="/rqgdwvdf" activeClassName="nav-active">404 page</NavLink>
        </div>
    );
};

export default Navbar;