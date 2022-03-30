import Navbar from '../components/Navbar';
import React, { useState } from 'react';
import axios from 'axios';
import { setUserSession } from '../Utils/Common';
import '@testing-library/jest-dom';

function Login(props) {
    const [loading, setLoading] = useState(false);
    const email = useFormInput('');
    const password = useFormInput('');
    const [error, setError] = useState(null);


    // handle button click of login form
    const handleLogin = () => {
        setError(null);
        setLoading(true);
        axios.post('http://localhost:8000/api/login', { email: email.value, password: password.value }).then(response => {
            setLoading(false);
            setUserSession(response.data.token, response.data.user);
            props.history.push('/UserProfile');
        }).catch(error => {
            console.log(error);
            setLoading(false);
            if (error.response.status === 401) {
                setError(error.response.data.message);
            }
            else setError("Erreur de saisie de votre adresse mail ou votre mot de passe .");
        });
    }
    return (
        <div className={"login"}>
            <Navbar/>
            <div className="card o-hidden border-2 box-shadow-lg m-5" id={"bow-shadow"}>
                <div className="card-body">
                    <div className="row no-gutters align-items-center">
                        <h3 className={"text-center"} id={"yellowTitle"}><b>Me connecter: </b></h3>
                        <form>
                            <div className={"text-center"}>
                                Votre adresse mail :<br />
                                <input type="text" {...email} autoComplete="new-password" />
                            </div>
                            <div className={"text-center"} style={{ marginTop: 10 }}>
                                votre mot de passe: <br />
                                <input type="password" {...password} autoComplete="new-password" />
                            </div>
                            {error && <><small style={{ color: 'red' }}>{error}</small><br /></>}<br />
                            <input className={"text-center"} type="button" value={loading ? 'Loading...' : 'Login'} onClick={handleLogin} disabled={loading} id={"loginInput"} /><br />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    );
}

const useFormInput = initialValue => {
    const [value, setValue] = useState(initialValue);

    const handleChange = e => {
        setValue(e.target.value);
    }
    return {
        value,
        onChange: handleChange
    }
}

export default Login;
