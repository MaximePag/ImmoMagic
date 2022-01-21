import React from 'react';
import Navbar from '../components/Navbar';

const Http404 = () => {
    return (
        <div className="http404">
            <Navbar/>
            <h1>Erreur 404</h1>
            <p>La page n'a pas été trouvée</p>
        </div>
    );
};

export default Http404;