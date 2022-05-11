import React, {useState, useEffect} from 'react';
import {useFormik} from "formik";
import Navbar from "../components/Navbar";
import axios from 'axios';
import * as Yup from 'yup';
import data from "bootstrap/js/src/dom/data";

export default function RegisterForm() {

    const fd = new FormData();
    fd.append('firstname', data.firstname);
    fd.append('lastname', data.lastname);
    fd.append('phoneNumber', data.phoneNumber);
    fd.append('address', data.address);
    fd.append('zipCode', data.zipCode);
    fd.append('city', data.city);
    fd.append('mail', data.mail);
    fd.append('password', data.password);


    const RegisterForm = () => {
        const formik = useFormik({
            initialValues: {
                firstname: '',
                lastname: '',
                phoneNumber: '',
                address: '',
                zipCode: '',
                city: '',
                mail: '',
                password: '',
                confirmPassword: '',
            },
            validationSchema: Yup.object({
                firstname: Yup.string()
                    .min(5, "trop petit")
                    .max(50, "trop long!")
                    .required("Ce champ est obligatoire"),
                lastname: Yup.string()
                    .min(2, "trop petit")
                    .max(10, "trop long!")
                    .required("Ce champ est obligatoire"),
                phoneNumber: Yup.string()
                    .min(10, "Erreur lors de la saisie de votre numéro de téléphone")
                    .max(10, "Erreur lors de la saisie de votre numéro de téléphone")
                    .required("Merci de renseigner votre numéro de téléphone"),
                address: Yup.string()
                    .required("Merci de renseigner adresse"),
                zipCode: Yup.string()
                    .required("Code postal non saisi!"),
                city: Yup.string()
                    .required("Nom de votre commune non saisi"),
                mail: Yup.string()
                    .email("email invalide")
                    .required("l'email est obligatoire"),
                password: Yup.string()
                    .required("Mot de passe est obligatoire")
                    .min(8, "Mot de passe doit être plus grand que 8 caractères")
                    .max(50, "Mot de passe doit être plus petit que 50 caractères"),
                confirmPassword: Yup.string()
                    .required("Confirmation de mot de passe est obligatoire")
                    .oneOf(
                        [Yup.ref("password"), null],
                        "Le mot de passe de confirmation ne correspond pas"
                    ),
            }),

            onSubmit: values => {
                axios.post({
                    url: 'http://localhost:8000/api/register',
                    data: values
                });
               /* const fd = new FormData();
                fd.append('firstname', data.firstname);
                fd.append('lastname', data.lastname);
                fd.append('phoneNumber', data.phoneNumber);
                fd.append('address', data.address);
                fd.append('zipCode', data.zipCode);
                fd.append('city', data.city);
                fd.append('mail', data.mail);
                fd.append('password', data.password);*/
            },
        });
        return (
            <div className={"registerForm"}>
                <Navbar/>
                <div className="card o-hidden border-2 box-shadow-lg m-5 box-shadow">
                    <div className="card-body">
                        <div className="row no-gutters align-items-center">
                            <h1 className="text-center">Inscription</h1>
                            <form onSubmit={formik.handleSubmit}>
                                <div className="form-group mb-3">
                                    <label htmlFor="lastName">Nom :</label>
                                    <input
                                        id="lastname"
                                        name="lastname"
                                        type="text"
                                        onChange={formik.handleChange}
                                        onBlur={formik.handleBlur}
                                        value={formik.values.lastname}
                                    />
                                    {formik.touched.lastname && formik.errors.lastname ? (
                                        <div>{formik.errors.lastname}</div>
                                    ) : null}
                                </div>
                                <div className="form-group mb-3">
                                    <label htmlFor="firstname">Prénom : </label>
                                    <input
                                        id="firstname"
                                        name="firstname"
                                        type="text"
                                        onChange={formik.handleChange}
                                        onBlur={formik.handleBlur}
                                        value={formik.values.firstname}
                                    />
                                    {formik.touched.firstname && formik.errors.firstname ? (
                                        <div>{formik.errors.firstname}</div>
                                    ) : null}
                                </div>
                                <div className="form-group mb-3">
                                    <label htmlFor="phoneNumber">Numéro de téléphone : </label>
                                    <input
                                        id="phoneNumber"
                                        name="phoneNumber"
                                        type="text"
                                        onChange={formik.handleChange}
                                        onBlur={formik.handleBlur}
                                        value={formik.values.phoneNumber}
                                    />
                                    {formik.touched.phoneNumber && formik.errors.phoneNumber ? (
                                        <div>{formik.errors.phoneNumber}</div>
                                    ) : null}
                                </div>
                                <div className="form-group mb-3">
                                    <label htmlFor="address">Adresse: </label>
                                    <input
                                        id="address"
                                        name="address"
                                        type="text"
                                        onChange={formik.handleChange}
                                        onBlur={formik.handleBlur}
                                        value={formik.values.address}
                                    />
                                    {formik.touched.address && formik.errors.address ? (
                                        <div>{formik.errors.address}</div>
                                    ) : null}
                                </div>
                                <div className="form-group mb-3">
                                    <label htmlFor="zipCode">Code Postal: </label>
                                    <input
                                        id="zipCode"
                                        name="zipCode"
                                        type="text"
                                        onChange={formik.handleChange}
                                        onBlur={formik.handleBlur}
                                        value={formik.values.zipCode}
                                    />
                                    {formik.touched.zipCode && formik.errors.zipCode ? (
                                        <div>{formik.errors.zipCode}</div>
                                    ) : null}
                                </div>
                                <div className="form-group mb-3">
                                    <label htmlFor="city">Ville: </label>
                                    <input
                                        id="city"
                                        name="city"
                                        type="text"
                                        onChange={formik.handleChange}
                                        onBlur={formik.handleBlur}
                                        value={formik.values.city}
                                    />
                                    {formik.touched.city && formik.errors.city ? (
                                        <div>{formik.errors.city}</div>
                                    ) : null}
                                </div>
                                <div className="form-group mb-3">
                                    <label htmlFor="mail">Email Address</label>
                                    <input
                                        id="mail"
                                        name="mail"
                                        type="email"
                                        onChange={formik.handleChange}
                                        onBlur={formik.handleBlur}
                                        value={formik.values.mail}
                                    />
                                    {formik.touched.mail && formik.errors.mail ? (
                                        <div>{formik.errors.mail}</div>
                                    ) : null}
                                </div>
                                <div className="form-group mb-3">
                                    <label htmlFor="password">Mot de passe: </label>
                                    <input
                                        id="password"
                                        name="password"
                                        type="text"
                                        onChange={formik.handleChange}
                                        onBlur={formik.handleBlur}
                                        value={formik.values.password}
                                    />
                                    {formik.touched.password && formik.errors.password ? (
                                        <div>{formik.errors.password}</div>
                                    ) : null}
                                </div>
                                <div className="form-group mb-3">
                                    <label htmlFor="confirmPassword">Confirmation du mot de passe: </label>
                                    <input
                                        id="confirmPassword"
                                        name="confirmPassword"
                                        type="text"
                                        onChange={formik.handleChange}
                                        onBlur={formik.handleBlur}
                                        value={formik.values.confirmPassword}
                                    />
                                    {formik.touched.confirmPassword && formik.errors.confirmPassword ? (
                                        <div>{formik.errors.confirmPassword}</div>
                                    ) : null}
                                </div>
                                <div className="form-group mb-3">
                                    <button type="submit">s'inscrire</button>
                                </div>
                                console.log(data);
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        );
    };
}
