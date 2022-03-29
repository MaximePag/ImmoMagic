import React, {useState, useEffect} from 'react';
import axios from 'axios';
import { Link } from "react-router-dom";

const RealEstate = () => {
    const [realEstateDatas, setRealEstate] = useState([]);
    const [fetch, setFetch] = useState(true);
    const [sortData, setSortData] = useState([]);

    useEffect(() => {
        if (fetch){
            axios.get('http://localhost:8005/RealEstate/').then((apiDatas) => {
                setRealEstate(apiDatas.data)
                setFetch(false)
            });
        };

        const sortRealEstate = () => {
            const sortObject = Object.keys(realEstateDatas).map((i) => realEstateDatas[i]);
            const sortArray = sortObject.sort((a,b) => {
                return a.price - b.price;
            });
            setSortData(sortArray);
        };
        sortRealEstate();
    }, [realEstateDatas, fetch]);

    return (
        <>
            {sortData.map((realEstateDatas) => (
                <div className="col">
                    <div className="realEstate card mx-3">
                        <img src="./img/maison-2.jpg" className="card-img-top" alt="image maison"/>
                        <div className="card-body">
                            <h3>{realEstateDatas.id_g5e1D_typesOfContract === 1 ? 'À Louer' : 'À Vendre'}</h3>
                            <h5 className="card-title">{realEstateDatas.description}</h5>
                            <p className="card-text">{realEstateDatas.landArea} m²</p>
                        </div>
                        <div className="card-footer text-end">
                            <h5 className="card-text">{realEstateDatas.price} €</h5>
                            <p className="card-text"><small className="text-muted"><i className="fas fa-eye"></i> Vu {realEstateDatas.numberOfViews} fois</small></p>
                            <Link className="btn btn-magic"
                                to={{
                                    pathname: "/biens",
                                    state: realEstateDatas.id
                                }}>Voir les détails du bien
                            </Link>
                        </div>
                    </div>
                </div>
            ))}
        </>  
    );
};

export default RealEstate;