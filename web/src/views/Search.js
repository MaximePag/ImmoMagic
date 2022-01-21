import React, {useState, useEffect} from 'react';
import axios from 'axios';
import Navbar from '../components/Navbar';
import RealEstate from '../components/RealEstate';

const Search = () => {
    const [realEstateDatas, setRealEstate] = useState([]);

    useEffect(() => {
        axios.get('http://localhost:8005/RealEstate/').then((apiDatas) => setRealEstate(apiDatas.data));
        axios.get('http://localhost:8005/RealEstate/').then((apiDatas) => console.log(apiDatas.data[0].price));
    }, []);

    return (
        <div className="search">
            <Navbar/>
            <div className="container-fluid row g-0">
                <nav id="sidebar" class="col-lg-3 p-3">
                    <div class="sticky-top">
                        <h1>Recherche</h1>
                        <div className="form-floating input-group mb-3">
                            <span className="input-group-text" id="Localisation_icon"><i className="fas fa-map-marked-alt fa-2x"></i></span>
                            <input type="text" className="form-control" placeholder="Localisation" id="Localisation" aria-label="Localisation" aria-describedby="Localisation_icon"/>
                            <label for="Localisation">Localisation</label>
                        </div>
                        <div className="form-floating input-group mb-3">
                            <span className="input-group-text" id="Budget_icon"><i className="fas fa-wallet fa-2x"></i></span>
                            <input type="text" className="form-control" placeholder="Votre Budget" id="Budget" aria-label="Votre Budget" aria-describedby="Budget_icon"/>
                            <span className="input-group-text"><i className="fas fa-euro-sign fa-1x"></i></span>
                            <label className="text-center" for="Budget">Budget max</label>
                        </div>
                        <div className="form-floating input-group mb-3">
                            <span className="input-group-text" id="Superficie_icon"><i className="fas fa-expand-alt fa-2x"></i></span>
                            <input type="text" className="form-control" placeholder="Superficie min" id="Superficie" aria-label="Superficie min" aria-describedby="Superficie_icon"/>
                            <span className="input-group-text">m²</span>
                            <label className="text-center" for="Superficie">Superficie min</label>
                        </div>
                        <div className="form-floating input-group mb-3">
                            <span className="input-group-text" id="Pièces_icon"><i className="fas fa-couch fa-2x"></i></span>
                            <input type="text" className="form-control" placeholder="Nombre de Pièces" id="Pièces" aria-label="Nombre de Pièces" aria-describedby="Pièces_icon"/>
                            <label className="text-center" for="Pièces">Nombre de Pièces</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="ParkingCheck"/>
                            <label class="form-check-label" for="ParkingCheck">Parking ?</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="GarageCheck"/>
                            <label class="form-check-label" for="GarageCheck">Garage ?</label>
                        </div>
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