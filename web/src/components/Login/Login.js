import React from 'react';

export default function Login() {
    return(
        <div className="login-wrapper">
            <h1>Se connecter</h1>
            <form>
                <label>
                    <p>Votre adresse mail</p>
                    <input type="text" />
                </label>
                <label>
                    <p>Votre mot de passe :</p>
                    <input type="password" />
                </label>
                <div>
                    <button type="submit">Connexion</button>
                </div>
            </form>
        </div>
    )
}