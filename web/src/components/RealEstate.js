import React, {useState, useEffect} from 'react';
import axios from 'axios';

const RealEstate = () => {
    const [realEstateDatas, setRealEstate] = useState([]);
    const [fetch, setFetch] = useState(true);
    const [sortData, setSortData] = useState([]);

    useEffect(() => {
        if (fetch){
            axios.get('http://localhost:8000/RealEstate/').then((apiDatas) => {
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
                            <h5 className="card-title">{realEstateDatas.description}</h5>
                            <p className="card-text">{realEstateDatas.price} €</p>
                            <p className="card-text"><small className="text-muted">{realEstateDatas.landArea} m²</small></p>
                        </div>
                    </div>
                </div>
            ))}
        </>  
    );
};

export default RealEstate;