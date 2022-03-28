import React, {useState, useEffect} from 'react';
import axios from 'axios';
import Navbar from '../components/Navbar';
import RealEstate from '../components/RealEstate';
import { useForm } from "react-hook-form"

const Search = () => {
    const [realEstateDatas, setRealEstate] = useState([]);
    const [searchInfo, setSearchInfo] = useState([]);
    const { register, formState: { errors }, handleSubmit, setValue } = useForm();

    const onSubmit = (data) => {
        const params = new URLSearchParams()
        params.append('price', data.price)
        axios.get('http://localhost:8005/RealEstate/' + data.price).then((apiDatas) => setRealEstate(apiDatas.data));;
    }

    useEffect(() => {
        axios.get('http://localhost:8005/RealEstate/').then((apiDatas) => setRealEstate(apiDatas.data));;
    }, []);

    return (
        <div className="search">
            <Navbar/>
            <div className="container-fluid row g-0">
                <nav id="sidebar" className="col-lg-3 p-3">
                    <div className="sticky-top">
                        <h1>Recherche</h1>
                        <form onSubmit={handleSubmit(onSubmit)}>
                            <div className="form-floating input-group mb-3">
                                <span className="input-group-text" id="Localisation_icon"><i className="fas fa-map-marked-alt fa-2x"></i></span>
                                <input type="text" className="form-control" placeholder="Localisation" id="Localisation" aria-label="Localisation" aria-describedby="Localisation_icon"/>
                                <label htmlFor="Localisation">Localisation</label>
                            </div>
                            <div className="form-floating input-group mb-3">
                                <span className="input-group-text" id="Budget_icon"><i className="fas fa-wallet fa-2x"></i></span>
                                <input type="text" {...register("price")} {...setValue('price', searchInfo.price)} className="form-control" placeholder="Votre Budget" id="Budget" aria-label="Votre Budget" aria-describedby="Budget_icon"/>
                                <span className="input-group-text"><i className="fas fa-euro-sign fa-1x"></i></span>
                                <label className="text-center" htmlFor="Budget">Budget max</label>
                            </div>
                            <div className="form-floating input-group mb-3">
                                <span className="input-group-text" id="Superficie_icon"><i className="fas fa-expand-alt fa-2x"></i></span>
                                <input type="text" className="form-control" placeholder="Superficie min" id="Superficie" aria-label="Superficie min" aria-describedby="Superficie_icon"/>
                                <span className="input-group-text">m²</span>
                                <label className="text-center" htmlFor="Superficie">Superficie min</label>
                            </div>
                            <div className="form-floating input-group mb-3">
                                <span className="input-group-text" id="Pièces_icon"><i className="fas fa-couch fa-2x"></i></span>
                                <input type="text" className="form-control" placeholder="Nombre de Pièces" id="Pièces" aria-label="Nombre de Pièces" aria-describedby="Pièces_icon"/>
                                <label className="text-center" htmlFor="Pièces">Nombre de Pièces</label>
                            </div>
                            <div className="form-check form-switch">
                                <input className="form-check-input" type="checkbox" id="ParkingCheck"/>
                                <label className="form-check-label" htmlFor="ParkingCheck">Parking ?</label>
                            </div>
                            <div className="form-check form-switch">
                                <input className="form-check-input" type="checkbox" id="GarageCheck"/>
                                <label className="form-check-label" htmlFor="GarageCheck">Garage ?</label>
                            </div>
                            <input className="btn btn-success" type="submit" />
                        </form>
                    </div>
                </nav>
                <div className="col-lg-9 row row-cols-1 row-cols-md-2 g-2">
                    <RealEstate/>
                </div>
            </div>
        </div>
    );
};

export default Search;
