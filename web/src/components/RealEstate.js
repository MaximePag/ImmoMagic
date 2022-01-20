import React, {useState, useEffect} from 'react';
import axios from 'axios';

const RealEstate = () => {
    const [realEstateDatas, setRealEstate] = useState([]);

    useEffect(() => {
        axios.get('http://localhost:8005/RealEstate/').then((apiDatas) => setRealEstate(apiDatas.data));
        axios.get('http://localhost:8005/RealEstate/').then((apiDatas) => console.log(apiDatas.data[0].price));
    }, []);

    return (
        <>
            {realEstateDatas.map((realEstate) => (
                <div className="realEstate card mx-3">
                    <img src="assets/images/maison-2.jpg" className="card-img-top" alt="image maison"/>
                    <div className="card-body">
                        <h5 className="card-title">{realEstate.description}</h5>
                        <p className="card-text">{realEstate.price} €</p>
                        <p className="card-text"><small className="text-muted">{realEstate.landArea} m²</small></p>
                    </div>
                </div>
            ))}
        </>  
    );
};

export default RealEstate;