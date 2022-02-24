import React, { useState } from 'react';
import Form from "react-bootstrap/Form";
import Button from "react-bootstrap/Button";
import "./login.css";

export default function Login() {
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");

    function validateForm() {
        return email.lenght > 0 && password.lenght >0;
    }

    function handleSubmit(event) {
        event.preventDefault();
    }

    return(

    )
}

