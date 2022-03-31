import React, {useState, useEffect} from 'react';
import axios from 'axios';
import {Link} from "react-router-dom";
import Navbar from "../components/Navbar";
import Form from "../components/RegisterForm";

class Register extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            firstname: '',
            lastname: '',
            address: '',
            zipCode: '',
             city: '',
            phoneNumber: '',
            mail: '',
            password: '',
            object: '',
            query: ''
        }
        useEffect(() => {
            if (onsubmit()) {
                axios.post('http://localhost:8000/api/Register/').then((apiDatas) => {
                    setUser(apiDatas.data)
                    setFetch(false)
                });
            };
        }, [UserDatas, fetch]);
    }

    render() {

/*class Register extends React.Component {
    render() {*/

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
            </div>)
    }
}

export default Form;



