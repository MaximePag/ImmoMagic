import React from 'react';
import { getUser, removeUserSession } from '../Utils/Common';

function UserProfile(props) {
    const user = getUser();

    // handle click event of logout button
    const handleLogout = () => {
        removeUserSession();
        props.history.push('/login');
    }

    return (
        <div>
            Fiche utilisateur de {user.lastname}<br /><br />
            <input type="button" onClick={handleLogout} value="Logout" />
        </div>
    );
}

export default UserProfile;