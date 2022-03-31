import React, {useState, useEffect} from 'react';
import axios from 'axios';
import Navbar from "../components/Navbar";
import Form from "../components/RegisterForm";

function Register () {
    //const User = props.location.state
        /*console.log(UsersDatas);*/
        return (
            <div className={Register}>
                <Navbar/>
                <div class="card o-hidden border-2 box-shadow-lg m-5 box-shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <Form/>
                        </div>
                    </div>
                </div>
            </div>
        );
};

export default Register;



